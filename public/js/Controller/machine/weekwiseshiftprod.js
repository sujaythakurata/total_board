	function weekshiftprod(data) {
	if(data != 0){

		//update the labels
		week_shift_prod.data.labels = data[2];
		const prod = data[0];
		const len = prod.length;
		for (let i = 0 ; i <len; i++) {
			week_shift_prod.data.datasets[i].data = prod[i];
		}
		week_shift_prod.update();
	}else{

		for (let i = 0 ; i <3; i++) {
			week_shift_prod.data.datasets[i].data = [0];
		}
		week_shift_prod.update();
	}
}