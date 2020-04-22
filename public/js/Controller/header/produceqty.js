


function updateproduceqty(data){
	if(data!=0){
		if(data[0]['carton_produced'])
			$('#producedQty').text(data[0]['carton_produced']);
		else
			$('#producedQty').text(0);
		if(data[0]['carton_produced'])
			$('#completecarton').text(data[0]['carton_produced']);
		else
			$('#completecarton').text(0)
		$('#producedQtyB').text(data[0]['Bottles_produced']);
	}else{
		$('#producedQty').text(0);
		$('#completecarton').text(0);
		$('#producedQtyB').text(0);		
	}

}