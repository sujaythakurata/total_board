

function shiftqty() {
	const date = new Date();
	let offset_time = date.getTimezoneOffset();
	offset_time = offset_time == 0?0: -offset_time;
	shiftqtyurl  = shiftqtyurl + '?q=' + offset_time;
	console.log(offset_time);
	console.log(shiftqtyurl);
	$.ajax({
		url: shiftqtyurl,
		type: 'GET',
		success: (data,status,xhr)=>{console.log(data);
			console.log("yoyo")},
		error: (xhr,status,error)=>{console.log(data);}
	});
}
window.onload = ()=>{
	shiftqty();
}