
function wkwisedowntime(data, staus, xhr) {
    downtimeChart.data.datasets[0].data = data[0];
    downtimeChart.data.datasets[1].data = data[1];
    downtimeChart.data.datasets[2].data = data[2];
    downtimeChart.update();
}

function updatedowntime() {

        $.ajax({
        url: dturl,
        type: 'GET',
        success: wkwisedowntime,
        complete:()=>{setTimeout(()=>{updatedowntime();}, 3000);}
    });


}

$(document).ready(()=>{
        setTimeout(()=>{updatedowntime();}, 3000);
});