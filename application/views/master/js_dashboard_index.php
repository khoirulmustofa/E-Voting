<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

<script>
    var ctx = document.getElementById('chart_data_masuk_perkelas');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['7A', '7B', '7C', '7D', '7E'],
            datasets: [{
                label: '# of Votes',
                data: [50, 70, 85, 80, 60],
                barPercentage: 0.9,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display: true
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 100,
                        stacked: true,
                        display: true
                    }
                }]
            },
            tooltips: {
                enabled: true
            }
        }
    });

    var ctx1 = document.getElementById('chart_total_data_masuk');
    var myChart = new Chart(ctx1, {
        type: 'horizontalBar',
        data: {
            labels: ['Total Data Masuk'],
            datasets: [{
                label: '# of Votes',
                barPercentage: 0.5,
                data: [85],
                backgroundColor: [
                    '#0491f4'
                ],
                borderColor: [
                    '#0491f4'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{

                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 100
                    }
                }]
            }
        }
    });

    var ctx_scout = document.getElementById('chart_data_masuk_scout');
    var myChart = new Chart(ctx_scout, {
        type: 'doughnut',
        data: {
            labels: [
                'Red',
                'Yellow',
                'Blue'
            ],
            datasets: [{
                label: '# of Votes',
                data: [30, 45, 25],
                backgroundColor: [
                    '#0491f4',
                    '#e8e502',
                    '#e80202'
                ],
                borderColor: [
                    '#0491f4'
                ],
                borderWidth: 1
            }]
        }
    });

    // chart_data_masuk_sanitek
    var ctx_sanitek = document.getElementById('chart_data_masuk_sanitek');
    var myChart = new Chart(ctx_sanitek, {
        type: 'doughnut',
        data: {
            labels: [
                'Red',
                'Yellow',
                'Blue'
            ],
            datasets: [{
                label: '# of Votes',
                data: [20, 45, 30],
                backgroundColor: [
                    '#0491f4',
                    '#e8e502',
                    '#e80202'
                ],
                borderColor: [
                    '#0491f4'
                ],
                borderWidth: 1
            }]
        }
    });
</script>