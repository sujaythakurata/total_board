
function updateshiftreason(data, status, xhr) {
	if(data != 0){
		$('#shiftReasons').empty();
		const len = data.length;
		let ele = new Array();
		for(let i = 0;i<len;i++){
			ele.push("<tr>" + "<td>"+data[i]['m_full_name']+" : "+data[i]['dt']+"%"+"</td>"+"</tr>");
		}
		$('#shiftReasons').append(ele);


	}else{

	}

}

function getshiftreason() {
	
	$.ajax({

		url: shiftreason,
		type:'GET',
		success: updateshiftreason,
		complete:()=>{setTimeout(getshiftreason, 5000);}
	});

}

