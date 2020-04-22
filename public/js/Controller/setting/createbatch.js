

function postform() {
	$.ajax({
		url:batchform,
		type:'POST',
		data: {"data":"ok"},
		success:(data, s, x)=>{console.log(data);}
	})
}