
function machinetodayprod(data){
	if(data!=0){
		var rate = 0.00;
		var prod = data['produced'];
		if(prod)
			 rate = (prod/data["target"]).toFixed(2);
		else{
			prod = 0;
		}
		$("#production-rate-txt").html(rate);
		if(data["target"]>0){
			todayProduction.data.datasets[0].data = [
				prod,
				data["target"]-prod
			]
		}else{
			todayProduction.data.datasets[0].data = [0,100];
		}
		todayProduction.update();

	}else{
		todayProduction.data.datasets[0].data = [
		0,100
		]
		todayProduction.update();
	}
}