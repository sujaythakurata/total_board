
//machine rate graph
const m_rate = new Chart('cartonComplCanvas', {
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

//machine production rate graph
const todayProduction = new Chart('todayProduction', {
    type: 'pie',
    data: {
        labels: ["Remaining", "Completed"],
        datasets: [{
            label: '',
            data: [],
            backgroundColor: [
                '#ffc107',
                '#66cb7d'
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
    }
});

//today shiftwise production
const shiftChart = new Chart("shiftChart", {
    type: 'bar',
    data: {
        labels: ["Shift 1", "Shift 2", "Shift 3"],
        datasets: [{
            label: 'Shift',
            backgroundColor: ["#bdfba3", "#c6d9f1", "#fed68d"],
            data: [],
        }],
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
        scales: {
            xAxes: [{
                stacked: true,
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
            yAxes: [{
                stacked: true,
                gridLines: {
                    display: true,
                    color: 'rgba(255, 255, 255, 0.2)',
                    zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                },
                ticks: {
                    beginAtZero: true,
                    fontColor: '#cccbcb'
                }
            }]
        },
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
            labels: {
                fontColor: '#cccbcb'
            }
        },
    }
});

//weekday label
week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

//weekwise shiftwise graph
const week_shift_prod = new Chart('shiftWiseDailyProduction', {
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
                    labelString: 'Quanities',
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
                    labelString: 'Shift Wise: Daily Production',
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
week_shift_prod.height = 200;


//weekwise shiftwise downtime graph
const week_shift_down = new Chart('downtimeChart', {
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
                    labelString: 'Downtime (in Hrs)',
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

//labels for oee
const label = [];
for(let i = 0;i<24;i++){
    label.push(i+1)
}

///oee machine wise graph
const oee = new Chart('oEEProductionLine', {
    type: 'line',
    data: {
        labels: label,
        datasets: [{
            label: 'Availability (%)',
            backgroundColor: "#34A853",
            borderColor: "#34A853",
            data: [],
            fill: false,
        }, {
            label: 'Performance (%)',
            fill: false,
            backgroundColor: "#FBBC05",
            borderColor: "#FBBC05",
            data: [],
        }, {
            label: 'Hourly (OEE)',
            fill: false,
            backgroundColor: "#EA4335",
            borderColor: "#EA4335",
            data: [],
        }]
    },
    options: {
        responsive: true,
        title: {
            display: false,
            text: ""
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Hourly',
                    labels: {
                        fontColor: '#cccbcb'
                    }
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                }
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'OEE(%)',
                    labels: {
                        fontColor: '#cccbcb'
                    }
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    min: 0,
                }
            }]
        }
    }
});
oee.height = 200;