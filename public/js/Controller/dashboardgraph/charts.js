

///production completion graph
const todayProduction = new Chart('todayProduction', {
                type: 'pie',
                data: {
                    labels: ["Completed", "Remaining"],
                    datasets: [{
                        label: '',
                        data: [],
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


///downtime week wise chart
const downtimeChart = new Chart('downtimeCauses', {
                type: "bar",
                data: {
                    labels: [],
                    datasets: [{
                            label: 'Shift 1',
                            backgroundColor: "#bdfba3",
                            data: []
                        },
                        {
                            label: 'Shift 2',
                            backgroundColor: "#c6d9f1",
                            data: []
                        },
                        {
                            label: 'Shift 3',
                            backgroundColor: "#fed68d",
                            data: []
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        displayColors: true,
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

///oee graph hourwise
const cartonComplCanvas = new Chart('cartonComplCanvas', {
                type: 'pie',
                data: {
                    labels: ["", ""],
                    datasets: [{
                        label: '',
                        data: [],
                        backgroundColor: [
                            '#66cb7d',
                            '#17a2b8'
                        ],
                        borderColor: [
                            '#66cb7d',
                            '#17a2b8'
                        ],
                        borderWidth: 1
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 70,
                    tooltips: false,
                    legend: {
                        position: 'bottom',
                        labels: false
                    },
                }
});