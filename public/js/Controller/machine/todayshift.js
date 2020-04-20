
function todayshift(data) {
	
	if(data != 0){
		shiftChart.data.datasets[0].data = data['shift_prod_day'];
		shiftChart.update();
	}else{

		shiftChart.data.datasets[0].data = [0,0,0];
		shiftChart.update();
	}
}