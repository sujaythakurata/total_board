
function weekshiftdown(data) {
	if(data != 0){


		//update the labels
		week_shift_down.data.labels = data[2];
		const down = data[1];
		const len = down.length;
		for(let i = 0 ;i<len; i++){
			week_shift_down.data.datasets[i].data = down[i];
		}
		week_shift_down.update();
	}else{

		
	}
}