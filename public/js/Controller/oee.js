
function updateOEE(data, status, xhr){

	if(data!=0){

		const len = data.length;
		for(let i = 0 ;i<len;i++){
			const o = '#oee-'+(i+1);
			$(o).html(data[i]);
		}


	}else{

	}

}

function oee() {
	$.ajax({

		url:oee_url,
		type:'GET',
		success:updateOEE,
		complete:()=>{setTimeout(oee, 5000);}

	});
}