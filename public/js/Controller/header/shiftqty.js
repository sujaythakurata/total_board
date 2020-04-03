
function shiftwiseprod(data){
	if(data[0]['shiftwise_bottle_produced']!=0){
		$('#shiftProduction').text(data[0]['shiftwise_carton_produced']);
		$('#shiftProductionB').text(data[0]['shiftwise_bottle_produced']);
		const id = data[0]['shift_id'];
		$('.enb').removeClass('active');
		$('.enb').eq(id-1).addClass('active');
	}else{
		const id = data[0]['shift_id'];
		$('.enb').removeClass('active');
		$('.enb').eq(id-1).addClass('active');
	}
}

