
function machinetodayprod(data) {

	if(data!=0){

		const rate = (data['produced']/data["target"]).toFixed(2);
		$("#production-rate-txt").html(rate);
		todayProduction.data.datasets[0].data = [
			data['produced'],
			data["target"]-data['produced']
		]
		todayProduction.update();

	}else{

	}
}