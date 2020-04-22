function shiftupdate(id) {
	const start = $("."+id).eq(0).val();
	const end = $("."+id).eq(1).val();
	$.ajax({

		url: shift,
		type:'POST',
		data:{'id':id, "start":start, "end":end},
		success:(data, status, xhr)=>{
			alert('shift update done');
			location.reload();
		}
	});
}