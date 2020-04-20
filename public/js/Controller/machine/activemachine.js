
function active(id) {
	$('.machine').eq(id-1).addClass('active');
}

$(document).ready(()=>{active(m_id);});