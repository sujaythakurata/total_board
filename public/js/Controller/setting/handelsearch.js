
function updatebatchtable(data, status, xhr) {
	console.log(data);
	$("#batch_row").siblings().empty();
	const len = data.length;
	for(let i = len-1;i>-1;i--){
		let dom = "<tr>"+
		"<td>"+data[i]['batch_no']+"</td>"+
		"<td>"+data[i]['batch_qty']+"</td>"+
		"<td>"+data[i]['batch_carton']+"</td>"+
		"<td>"+data[i]['product_name']+"</td>"+
		"<td>"+data[i]['no_of_bottle']+"B"+data[i]['liters']+"L"+"</td>"+
		"<td>"+data[i]['created_time']+"</td>";

		if(data[i]['batch_start_time']){
			dom = dom +"<td>"+data[i]['batch_start_time']+"</td>";
		}else{
			dom = dom +"<td>"+"Batch is not started yet"+"</td>";
		}
		if(data[i]['batch_status']== 0){
			dom = dom + '<td><button type="button" data-id="data" class="bttn st btn-green start" onclick="batchstart('+data[i]['batch_no']+')">Start</button></td>';

		}
		else if(data[i]['batch_status']==1){

			dom = dom + '<td><button type="button" data-id="data" class="bttn st btn-red start" onclick="batchend('+data[i]['batch_no']+')">Start</button></td>';

		}else{
			dom = dom + "<td>"+data[i]['last_edited']+"</td>";
		}

		dom = dom + "</tr>";
		$("#batch_row").after(dom);

	}
}

function search(element) {
	const date = $("#batchStartDate").val();
	$.ajax({
		url:batch,
		type:'POST',
		data:{'date':date},
		success:updatebatchtable
	});
}