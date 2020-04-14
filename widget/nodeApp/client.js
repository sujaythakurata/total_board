const mqtt = require('mqtt');
const express = require('express');
const db = require('./modules/dbconfig');
const dvname = require('./modules/getdvname');

let a= 0;


///make the express obj

app = express();

//broker url
const url = 'mqtt://172.105.50.239';
///broker credential
const opt = {	
	username: 'total',
	password: 'total@!@#$'
};

//connect with the db
const con = db.connect();

///topics list
const topics = [
'Device_Status',
'L1_PC',
'L1_DT',
'L1_DT_Alert'
];

///connect with the broker
const client = mqtt.connect(url, opt);

///connect listener trigger when client connected
client.on('connect', ()=>{
	console.log('connected properly');
	//subscribe the channles or topics
	if(client.connected == true){
		client.subscribe(topics, {qos:0}, (err, grn)=>{
			console.log("granted topics: ",grn);
			console.log('Error: '+err);
		});
	}
});

///error listenern trigger when client is raise some error
client.on('error', (err)=>{
	console.log("can not connect"+err);
});


client.on('message', (topic, msg, packet)=>{
	console.log(topic, ": ", msg.toString());
	if(topic == 'L1_DT_Alert'){
		let data = msg.toString();
		data = data.split(',');
		let m = data[0].split(':')[1];
		let temp = data[1].split(':')[1];
		temp = temp.split('_');
		let l = temp[0]+"'";
		let d = "'"+temp[1];
		console.log(m,l,d);
		let v = dvname.getfullname(m);
		console.log(v);
		a = {
			l_id: l,
			d_id: d,
			m_id: v[0],
			m_code: m,
			m_full_name: v[1]
		};
	if(topic == 'L1_DT'){
		a = 0;
	}

}


});///message listener


///do the route

app.get('/', (req, res)=>{
	res.json(a);
});


///run the server
app.listen(3000, () => {
 console.log("Server running on port 3000");
});