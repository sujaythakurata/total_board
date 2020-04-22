
function updateweekwise(data, status, xhr) {
	weekshiftprod(data);
	weekshiftdown(data);
}

function weekwisedata() {
	$.ajax({
		cache: false,
		url: M_WSDD,
		type: 'GET',
		success:updateweekwise,
		complete:()=>{setTimeout(weekwisedata,5000);},
		error:(error, status, xhr)=>{console.log("error", error)}
	});
}

