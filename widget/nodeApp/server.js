var mqtt = require('mqtt')
var client = mqtt.connect('mqtt://172.105.50.239', {
	username: 'total',
	password: 'total@!@#$'
});
var mysql = require('mysql');
var con = mysql.createConnection({
	host: "localhost",
	user: "sujay_php",
	password: "Sujay@1234",
	database: "total_board"
});

console.log("App Started");

client.on('connect', function () {
	client.subscribe('Device_Status', function (err) {
		console.log('error__Device_Status', err)
	})
	client.subscribe('L1_PC', function (err) {
		console.log('error__L1_PC', err)
	})
	client.subscribe('L1_DT', function (err) {
		console.log('error__L1_DT', err)
	})
	client.subscribe('L1_DT_Alert', function (err) {
		console.log('error__L1_DT_Alert', err)
	})
})

const showQueryError = function (err) {
	if (err) {
		console.log("S___ERROR___");
		console.log(err);
		console.log("E___ERROR___");
	}
}

const getLeanID = function (lan) {
	if (lan) {
		return parseInt(lan.replace(/[^\d.]/g, ''), 10);
	}
	return lan;
}

const machineId = {
	NULL:0,
	LM:1,
	FM:2,
	CM:3,
	ISM:4,
	IPM:5,
	CFM:6,
	PPM:7,
	TM:8,
	WCM:9,
	CIP:10,
	CSM:11,
	RP:12,
	SW:13,
}

con.connect(function (err) {
	if (err) throw err;
	console.log("Message recording started!");
	client.on('message', function(topic, message) {
		let requestData = message.toString();
		let queryStr = "";
		console.log(topic, "___", message.toString());
		const dataObj = JSON.parse(`{${message.toString().replace(/'/g, "\"")}}`);
		dataObj.D = dataObj.D.split("_");

		let runningBatch = 0;
		con.query("SELECT * FROM batch_details where batch_status=1", function (batch_err, batch_result, batch_fields) {
			if (!batch_err){
				if (batch_result.length > 0) {
					runningBatch = batch_result[0].batch_id;
				}								
			}
			if (topic == "Device_Status") {
				const cleanData = {};
				cleanData.device_name = dataObj.D[1];
				cleanData.lan_id = getLeanID(dataObj.D[0]);
				cleanData.rssi = dataObj.R;
				cleanData.device_uptime = dataObj.U;
				queryStr = `UPDATE devices SET rssi='${cleanData.rssi}', device_uptime='${cleanData.device_uptime}' WHERE lan_id=${cleanData.lan_id} and device_name='${cleanData.device_name}'`;
				con.query(queryStr, function (err, result) {
					showQueryError(err);
				});
			} else if (topic == "L1_PC") {
				const cleanData = {};
				cleanData.device_name = dataObj.D[1];
				cleanData.lan_id = getLeanID(dataObj.D[0]);
				const mCount = [];
				Object.keys(dataObj).map(key => {
					if (key.startsWith("C_")) {
						mCount.push({
							count: dataObj[key],
							machine: machineId[key.replace("C_", "")],
						})
					}
				})
				queryStr = `SELECT * FROM devices WHERE lan_id=${cleanData.lan_id} and device_name='${cleanData.device_name}'`;
				con.query(queryStr, function (err, result) {
					showQueryError(err);
					if (result.length > 0) {
						mCount.map(item => {
							queryStr = `INSERT INTO production_count (machine_index, count, device_id, batch_id) VALUES (${item.machine}, ${item.count}, ${result[0].device_id}, ${runningBatch})`;
							con.query(queryStr, function (err, result) {
								showQueryError(err);
							});
						})
					}
				});
			} else if (topic == "L1_DT") {
				const cleanData = {};
				cleanData.device_name = dataObj.D[1];
				cleanData.lan_id = getLeanID(dataObj.D[0]);

				queryStr = `SELECT * FROM devices WHERE lan_id=${cleanData.lan_id} and device_name='${cleanData.device_name}'`;
				con.query(queryStr, function (err, result) {
					showQueryError(err);
					if (result.length > 0) {
						queryStr = `INSERT INTO down_time (duration,machine_index,device_id, end_time) VALUES (${dataObj.DR}, ${machineId[dataObj.M]},${result[0].device_id},'${dataObj.ET}')`;
						con.query(queryStr, function (err, result) {
							showQueryError(err);
						});
					}
				});
			} else if (topic == "L1_DT_Alert") {
				const cleanData = {};
				cleanData.device_name = dataObj.D[1];
				cleanData.lan_id = getLeanID(dataObj.D[0]);

				queryStr = `SELECT * FROM devices WHERE lan_id=${cleanData.lan_id} and device_name='${cleanData.device_name}'`;
				con.query(queryStr, function (err, result) {
					showQueryError(err);
					if (result.length > 0) {
						queryStr = `INSERT INTO downtime_alert (machine_index,device_id,stop_reson) VALUES (${machineId[dataObj.M]},${result[0].device_id},'')`;
						con.query(queryStr, function (err, result) {
							showQueryError(err);
						});
					}
				});
			} else {
				console.log("________Invalid Topic Data Recived_", topic, message.toString());
			}
		});
	})
});