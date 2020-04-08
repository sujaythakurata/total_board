
function update(data, status, xhr) {
	if(data !=0){
		updatetime(data);///update batch start time and shfit down time
		updateheader(data);///update header data
		updateproduceqty(data);//update batch details
		shiftwiseprod(data);//update shift wise prod data
		renderProductionOfBatch(data);//update completion graph
	}
}

function error(error, data, status) {
	console.log('error', error, data, status);
}

function masterupdate() {
	$.ajax({
		url: masterurl,
		type: 'GET',
		headers:{
			'Content-Type':'json',
			'Cache-Control': 'No-Store',
		},
		success: update,
		error: error,
		complete: ()=>{setTimeout(()=>{masterupdate();}, 1000);}
	});

}

window.onload = ()=>{setTimeout(()=>{masterupdate();}, 1000);}