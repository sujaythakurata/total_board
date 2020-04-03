function updatetime(data) {
	let start = moment(data[0]['batch_start_time']);
	console.log(new Date());
	let end = moment(new Date());
	let ms = end.diff(start);
	let dur = moment.duration(ms);
	let batch_start_time = Math.floor(dur.asHours())+moment.utc(ms).format(":mm:ss");
	$('#batchStartTime').text(batch_start_time);

}