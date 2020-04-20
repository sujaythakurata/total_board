
function updatemaster(data, status, xhr) {
	if(data !=0){

		//heading
		$("#batchno").html(data['batch_no']);
		$('.enb').removeClass('active');
		$('.enb').eq(data["shift_id"]-1).addClass('active');
		$("#pdname").html(data["product_name"]);
		$('#name').html(data['m_full_name']);
		$('#product').html(data['product']);
		$('#target').html(data['target']);
		$('#producedQty').html(data['produced']);
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
		url: M_url,
		type:'GET',
		success:updatemaster,
		complete:()=>{setTimeout(Getmasterdata, 5000);}
	});
}

$(document).ready(()=>{setTimeout(Getmasterdata, 1000)});