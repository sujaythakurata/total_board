
function wkwisedowntime(data) {
    const downtimeChart = new Chart('downtimeCauses', {
                type: "bar",
                data: {
                    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    datasets: [{
                            label: 'Shift 1',
                            backgroundColor: "#bdfba3",
                            data: data[0]['weekwise_down_time'][0]
                        },
                        {
                            label: 'Shift 2',
                            backgroundColor: "#c6d9f1",
                            data: data[0]['weekwise_down_time'][1]
                        },
                        {
                            label: 'Shift 3',
                            backgroundColor: "#fed68d",
                            data: data[0]['weekwise_down_time'][2]
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Downtime(Hrs)',
                                labels: {
                                    fontColor: '#cccbcb'
                                }
                            },
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Shift Wise: Downtime',
                                labels: {
                                    fontColor: '#cccbcb'
                                }
                            },
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }]
                    }
                }
            });
}