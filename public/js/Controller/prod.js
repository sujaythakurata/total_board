
function updateprod(data, status, xhr){

	if(data!=0){
		const len = data.length;
		for(let i = 0 ;i<len;i++){
			const p = '#p-'+(i+1);
			const t = '#t-'+(i+1);
			const P = data[i]['production']==null?0:data[i]['production'];
			$(p).html(P);
			$(t).html(data[i]['target']);
		}


	}else{

	}

}

function prod() {
	$.ajax({

		url:prod_url,
		type:'GET',
		success:updateprod,
		complete:()=>{setTimeout(prod, 3000);}

	});
}