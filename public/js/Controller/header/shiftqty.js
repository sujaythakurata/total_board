
function shiftwiseprod(data){
	if(data!=0){
		let carton = data[0]['shiftwise_carton_produced'];
		carton = carton == null?0:carton;
		$('#shiftProduction').text(carton);
		$('#shiftProductionB').text(data[0]['shiftwise_bottle_produced']);
		const id = data[0]['shift_id'];
		$('.enb').removeClass('active');
		$('.enb').eq(id-1).addClass('active');
	}else{
		const id = data[0]['shift_id'];
		$('.enb').removeClass('active');
		$('.enb').eq(id-1).addClass('active');
		$('#shiftProduction').text(0);
		$('#shiftProductionB').text(0);
	}
}

