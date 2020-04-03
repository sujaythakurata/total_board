

function updateheader(data){
	if(data !=0){
		$('#batchno').text(data[0]['batch_no']);
		$('#pdname').text(data[0]['product_name']);
		$('#tgb').text(data[0]['batch_qty']);
		$('#tgc').text(data[0]['batch_carton']);
		$('#targetcarton').text(data[0]['batch_carton']);
	}
}

