


function updateproduceqty(data){
		$('#producedQty').text(data[0]['carton_produced']);
		$('#completecarton').text(data[0]['carton_produced']);
		$('#producedQtyB').text(data[0]['Bottles_produced']);

}