

function renderProductionOfBatch(data) {
            let carton_produced = data[0]['carton_produced'];
            let target_carton = data[0]['batch_carton'];
            let doneRatio = Math.floor((carton_produced* 100) / target_carton);
            $("#production-rate-txt").text(doneRatio);
            const todayProduction = new Chart('todayProduction', {
                type: 'pie',
                data: {
                    labels: ["Completed", "Remaining"],
                    datasets: [{
                        label: '',
                        data: [ carton_produced, target_carton-carton_produced],
                        backgroundColor: [
                            '#66cb7d',
                            '#ffc107'

                        ],
                        borderColor: [
                            '#ffc107',
                            '#66cb7d'
                        ],
                        borderWidth: 1
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 70,
                    tooltips: {
                        displayColors: true,
                        callbacks: {
                            mode: 'x',
                        },
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: '#cccbcb'
                        }
                    },
                    animation:false
                }
            });

        }