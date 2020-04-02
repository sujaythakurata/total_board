


function updateproduceqty(data,status,xhr){
	try{
		if (data != 0){
			$('#producedQty').text(data[0]['carton_produced']);
			$('#completecarton').text(data[0]['carton_produced']);
			$('#producedQtyB').text(data[0]['Bottles_produced']);
		}

	}catch(exception){
		//display the exception
	}
}

function showerror(xhr,status,error){
	console.log(status,error);
}


function produceqty() {
	$.ajax({
		url: ProdQtyurl,
		type: 'GET',
		success: updateproduceqty,
		error:showerror,
	});
}