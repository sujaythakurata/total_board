
function wkwisedowntime(data, staus, xhr) {

        //set the labels
        downtimeChart.data.labels = data[1];
        for(let i = 0;i<data[0].length; i++){
        downtimeChart.data.datasets[i].data = data[0][i];
        }
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

