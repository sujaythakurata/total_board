
function update(data, status, xhr) {
	if(data !=0){
		updateheader(data);
		updateproduceqty(data);
		shiftwiseprod(data);
		updatetime(data);
	}
}

function error(error, data, status) {
	console.log('error', error, data, status);
}

function masterupdate() {
	$.ajax({
		url: masterurl,
		type: 'GET',
		success: update,
		error: error,
	});
}

window.onload = ()=>{ setInterval(masterupdate, 1000);}