
function updatemaster(data, status, xhr) {
	if(data !=0){

		//heading
		$("#batchno").html(data['batch_no']);
		$('.enb').removeClass('active');
		$('.enb').eq(data["shift_id"]-1).addClass('active');
		$("#pdname").html(data["product_name"]);
		$('#name').html(data['m_full_name']);
		$('#title').html(data['m_full_name']);
		$('#product').html(data['product']);
		$('#target').html(data['target']);
		if(data['produced'])
			$('#producedQty').html(data['produced']);
		else
			$('#producedQty').html(0);
		const prod = data['shift_prod']==null?0:data['shift_prod'];
		$('#shiftProduction').html(prod);
		$('#shiftDownTime').html(data['shift_dt']);
		machinerate(data);
		machinetodayprod(data);
	}else{

	}
}

function Getmasterdata() {
	$.ajax({
		cache:false,
		url: M_url,
		type:'GET',
		success:updatemaster,
		complete:()=>{setTimeout(Getmasterdata, 5000);}
	});
}

