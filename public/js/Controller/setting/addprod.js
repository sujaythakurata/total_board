function addprod() {
	$.ajax({
		url: prod,
		type:'POST',
		data:$('#product_add').serialize(),
		success:(data, status, xhr)=>{
			// alert('update done');
			// location.reload();
			console.log(data);
		}
	});
}