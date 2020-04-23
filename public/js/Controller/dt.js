
function updatedt(data, status, xhr){

	if(data!=0){

		const len = data.length;
		for(let i = 0 ;i<len;i++){
			const ele = '#dt-'+(i+1);
			$(ele).html(data[i]);
		}


	}else{

	}

}

function dt() {
	$.ajax({

		url:dt_url,
		type:'GET',
		success:updatedt,
		complete:()=>{setTimeout(dt, 5000);}

	});
}