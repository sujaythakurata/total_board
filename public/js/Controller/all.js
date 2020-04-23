
function all() {
	setTimeout(masterupdate, 1000);
	setTimeout(getshiftreason, 1200);
	setTimeout(getreason, 1400);
	setTimeout(updatedowntime, 1600);
	setTimeout(oeehourwise, 1800);
	setTimeout(prod, 2000);
	setTimeout(dt, 2200);
	setTimeout(oee, 2400);
}

$(document).ready(()=>{all();});