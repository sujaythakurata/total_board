
function updateoeehourwise(data) {
	cartonComplCanvas.data.datasets[0].data = new Array();
	cartonComplCanvas.data.datasets[0].data.push(data[0]['oee']);
	cartonComplCanvas.data.datasets[0].data.push(100-data[0]['oee']);
	cartonComplCanvas.update();
	$("#machine-rate-txt").html(data[0]['oee']);
}

function oeehourwise(argument) {
	$.ajax({

		url: oeehourwiseurl,
		type: 'GET',
		success: updateoeehourwise,
		complete:()=>{setTimeout(oeehourwise, 3000);}

	});
}
