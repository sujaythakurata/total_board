
function updatereason(data, status, xhr) {
	
	if(data != 0){
		$('#topReasons').empty();
		const len = data.length;
		let row = new Array();
		for(let i = 0;i<len;i++){
			row.push("<tr>" + "<td>"+data[i]['stop_reason']+"</td>"+"</tr>");
		}
		$('#topReasons').append(row);


	}else{

	}

}

function getreason() {
	
	$.ajax({

		url: reason,
		type:'GET',
		success: updatereason,
		complete:()=>{setTimeout(getreason, 5000);}
	});

}

