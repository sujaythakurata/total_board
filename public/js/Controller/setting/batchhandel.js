
//when the batch is start
function batchstart(batch_no) {
	$.ajax({
		url:batchstart_url,
		type:'POST',
		data: {'batch_no':batch_no},
		success:(data, status, xhr)=>{
			if(data[0]["response"]==200){
				//alert('batch No. '+data[0]['batch_no']+" is start");
				location.reload();
			}else{
				alert('batch No. '+data[0]['batch_no']+" is already running");
			}
		}
	});
}


//when the batch is stop
function batchend(batch_no) {
	$.ajax({
		url:batchstop_url,
		type:'POST',
		data: {'batch_no':batch_no},
		success:(data, status, xhr)=>{
			if(data[0]["response"]==200){
				// alert('batch No. '+data[0]['batch_no']+" is stop");
				location.reload();
			}else{
				alert("No batch is running");
			}
		}
	});
}