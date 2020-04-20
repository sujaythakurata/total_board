
function updatebatchtime(data, status, xhr) {

	///update the current time
	let curr_time = moment().format('HH:mm:ss');
    $('#currentTime').text(curr_time);
	if(data!=0)
	{let start = moment(data[0]['batch_start_time']);
		let end = moment(new Date());
		let ms = end.diff(start);
		let dur = moment.duration(ms);
		let batch_start_time = Math.floor(dur.asHours())+moment.utc(ms).format(":mm:ss");
		$('#batchStartTime').text(batch_start_time);
		$('#shiftDownTime').html(data[0]['shift_down_time']);}
	else{
		$('#batchStartTime').text('00:00:00');
		$('#shiftDownTime').html('00:00:00');
	}
}

function gettime() {
	$.ajax({
		url:time,
		type:'GET',
		success: updatebatchtime,
		complete:()=>{setTimeout(gettime, 1000);}
	})
}
$(document).ready(()=>{setTimeout(gettime, 1000);});