if($('#myChart').length > 0) {

var myChart = document.getElementById('myChart').getContext('2d');
var myChart2 = document.getElementById('myChart2').getContext('2d');
var myChart3 = document.getElementById('myChart3').getContext('2d');
var myChart4 = document.getElementById('myChart4').getContext('2d');
var myChart5 = document.getElementById('myChart5').getContext('2d');
var myChart6 = document.getElementById('myChart6').getContext('2d');
var myChart7 = document.getElementById('myChart7').getContext('2d');
var myChart8 = document.getElementById('myChart8').getContext('2d');
var myChart9 = document.getElementById('myChart9').getContext('2d');
var myChart10 = document.getElementById('myChart10').getContext('2d');

var firstSem = $('#myChart').data('first'); 
var secondSem = $('#myChart').data('second');

var blue = '#4577da ';
var red = '#e9555f';

var test = new Chart(myChart, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Admissions\'s Office'
                }
            }
        }
    }
});

var firstSem = $('#myChart2').data('first'); 
var secondSem = $('#myChart2').data('second');

var test = new Chart(myChart2, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Registrar\'s Office'
                }
            }   
        }
    }
});

var firstSem = $('#myChart3').data('first'); 
var secondSem = $('#myChart3').data('second');

var test = new Chart(myChart3, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Office of Student Services'
                }
            }
        }
    }
});

firstSem = $('#myChart4').data('first'); 
secondSem = $('#myChart4').data('second');

    var test = new Chart(myChart4, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude', 'Adequacy of Library Resources'],
        datasets: [
            {
                label: '1st Sem',   
                data: [firstSem.qosp, firstSem.pa, firstSem.aolr],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa, secondSem.aolr],
                backgroundColor: red
            }
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Library Services'
                }
            }
        }
    }
});

var firstSem = $('#myChart5').data('first'); 
var secondSem = $('#myChart5').data('second');

var test = new Chart(myChart5, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Guidance Center'
                }
            }
        }
    }
});

var firstSem = $('#myChart6').data('first'); 
var secondSem = $('#myChart6').data('second');

var test = new Chart(myChart6, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Cashier\'s Office'
                }
            }
        }
    }
});

var firstSem = $('#myChart7').data('first'); 
var secondSem = $('#myChart7').data('second');

var test = new Chart(myChart7, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'School Canteen'
                }
            }
        }
    }
});

var firstSem = $('#myChart8').data('first'); 
var secondSem = $('#myChart8').data('second');

var test = new Chart(myChart8, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Medical and Dental Services'
                }
            }
        }
    }
});

var firstSem = $('#myChart9').data('first'); 
var secondSem = $('#myChart9').data('second');

var test = new Chart(myChart9, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Civil Security'
                }
            }
        }
    }
});

var firstSem = $('#myChart10').data('first'); 
var secondSem = $('#myChart10').data('second');

var test = new Chart(myChart10, {
    type: 'bar',
    data: {
        labels: ['Quality of Service Provided', 'Personal Attitude'],
        datasets: [
            {
                label: '1st Sem',
                data: [firstSem.qosp, firstSem.pa],
                backgroundColor: blue
            },
            {
                label: '2st Sem',
                data: [secondSem.qosp, secondSem.pa],
                backgroundColor: red
            },
        ]
    },
    options: {
        plugins: {
            legend: {
                title: {
                    display: true,
                    text: 'Infrastracture/Utilities'
                }
            }
        }
    }
});

}