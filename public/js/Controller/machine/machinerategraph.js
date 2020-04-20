function machinerate(data) {
	if(data != 0){
		const rate = data["m_rate"];
		$("#machineRateCount").html(rate);
		$("#machine-rate-txt").html(rate);
		m_rate.data.datasets[0].data = [rate, 100-rate];
		m_rate.update();
	}else{
		$("#machineRateCount").html(0);
		$("#machine-rate-txt").html(0);
		m_rate.data.datasets[0].data = [0, 100-0];
		m_rate.update();
	}
}