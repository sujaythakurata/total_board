
function updateoee(data, status, xhr) {
	if(data !=0){
		const len = data.length;
		oee.data.datasets[0].data = new Array();
		oee.data.datasets[1].data = new Array();
		oee.data.datasets[2].data = new Array();
		for(let i = 0;i < len; i++){
			oee.data.datasets[0].data.push(data[i][0]['availability']);
			oee.data.datasets[1].data.push(data[i][0]['performance']);
			oee.data.datasets[2].data.push(Number(data[i][0]['oee']));
		}
		oee.update();
	}
}

function getoee() {
	$.ajax({
		url:oeeurl,
		type:'GET',
		success:updateoee,
		complete:()=>{setTimeout(getoee,5000)}
	});
}
$(document).ready(()=>{setTimeout(getoee, 1000);});