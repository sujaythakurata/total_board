

function updateheader(data){
	if(data !=0){
		$('#batchno').text(data[0]['batch_no']);
		$('#pdname').text(data[0]['product_name']);
		$('#tgb').text(data[0]['batch_qty']);
		$('#tgc').text(data[0]['batch_carton']);
		$('#targetcarton').text(data[0]['batch_carton']);
	}else{
		$('#batchno').text(0);
		$('#pdname').text(0);
		$('#tgb').text(0);
		$('#tgc').text(0);
		$('#targetcarton').text(0);
	}
}

