function weekshiftprod(data) {
	if(data != 0){
		prod = data['shift_wise_production'];
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