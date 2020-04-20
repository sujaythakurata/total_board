
function weekshiftdown(data) {
	if(data != 0){

		const down = data['shift_wise_downtime'];
		const len = down.length;
		for(let i = 0 ;i<len; i++){
			week_shift_down.data.datasets[i].data = down[i]
		}
		week_shift_down.update();
	}else{

		
	}
}