

function update(data,status,xhr){
	try{
		$('#batchno').text(data[0]['batch_no']);
		$('#pdname').text(data[0]['product_name']);
		$('#tgb').text(data[0]['batch_qty']);
		$('#tgc').text(data[0]['batch_carton']);
		$('#targetcarton').text(data[0]['batch_carton']);

	}catch(exception){
		//display the exception
	}
}

function showerror(xhr,status,error){
	console.log(status,error);
}


function updateheader() {
	$.ajax({
		url: URL,
		type: 'GET',
		success: update,
		error:showerror,
	});
}
