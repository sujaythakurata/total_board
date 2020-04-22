function updatemachine() {
	$.ajax({
		url:speedurl,
		type:'POST',
		data:$('#machine_design_speed').serialize(),
		success:(data,status, xhr)=>{
			alert("update done");
			location.reload();
		}

	});
}