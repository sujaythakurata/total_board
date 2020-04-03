



function updateall(data,status,xhr){
	try{

		if(batch_id != data[0]["batch_id"]){
			updateheader();
		}
		produceqty();
	}catch(exception){
		batch_id = 0;
	}
}

function showerrorall(xhr,status,error){
	console.log(status,error);
}

function checkstatus() {
	$.ajax({
		url: STATUSURL,
		type: 'GET',
		success: updateall,
		error:showerrorall,
	});
	setTimeout(()=>{checkstatus();},1000);
}


//$(document).ready(checkstatus());
window.onload = ()=>{
	setInterval(updateheader, 3000);
	setInterval(produceqty, 3000);
	setInterval(shiftqty,3000);

}

