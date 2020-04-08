

function renderProductionOfBatch(data) {
		if(data!=0)
		{let carton_produced = data[0]['carton_produced'];
            let target_carton = data[0]['batch_carton'];
            let doneRatio = ((carton_produced* 100) / target_carton).toFixed(2);
            $("#production-rate-txt").text(doneRatio);
            todayProduction.data.datasets[0].data = new Array();
            todayProduction.data.datasets[0].data.push(carton_produced);
            todayProduction.data.datasets[0].data.push(target_carton-carton_produced);
            todayProduction.update();}
        else{
        	todayProduction.data.datasets[0].data = new Array();
        	todayProduction.update();
        	$("#production-rate-txt").text('0%');
        }
        }