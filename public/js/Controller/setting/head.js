

function headdata() {
	$.ajax({
		url:head,
		type:'GET',
		success:(data,status,xhr)=>{
			$('#batchno').text(data[0]['batch_no']);
			$('#pdname').text(data[0]['product_name']);
		}
	});
}

$(document).ready(()=>{headdata()});