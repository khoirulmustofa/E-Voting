<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

<script>
    <?php
    $kandidat_osis_tb = $this->Hitung_cepat_model->get_kandidat('OSIS', 'L')->result();
    $nama_osis_tb = array();
    $count_osis_tb = array();
    foreach ($kandidat_osis_tb as $kan_osis_tb) {
        $nama_osis_tb[] = "'" . $kan_osis_tb->kandidat_nama . "'";
        $count_osis_tb[] = $this->Hitung_cepat_model->count_vote_osis($kan_osis_tb->kandidat_id);
    }
    ?>
    var ctx_scout = document.getElementById('chart_osis_tb');
    var myChart = new Chart(ctx_scout, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_osis_tb); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_osis_tb); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4'

                ],
                borderColor: [
                    '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart OSIS Tholib'
            }
        }
    });

    <?php
    $kandidat_osis_tbh = $this->Hitung_cepat_model->get_kandidat('OSIS', 'P')->result();
    $nama_osis_tbh = array();
    $count_osis_tbh = array();
    foreach ($kandidat_osis_tbh as $kan_osis_tbh) {
        $nama_osis_tbh[] = "'" . $kan_osis_tbh->kandidat_nama . "'";
        $count_osis_tbh[] = $this->Hitung_cepat_model->count_vote_osis($kan_osis_tbh->kandidat_id);
    }
    ?>
    var ctx_scout = document.getElementById('chart_osis_tbh');
    var myChart = new Chart(ctx_scout, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_osis_tbh); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_osis_tbh); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4'

                ],
                borderColor: [
                    '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart OSIS Tholibah'
            }
        }
    });

    <?php
    $kandidat_scout_tb = $this->Hitung_cepat_model->get_kandidat('SCOUT', 'L')->result();
    $nama_scout_tb = array();
    $count_scout_tb = array();
    foreach ($kandidat_scout_tb as $kan_scout_tb) {
        $nama_scout_tb[] = "'" . $kan_scout_tb->kandidat_nama . "'";
        $count_scout_tb[] = $this->Hitung_cepat_model->count_vote_scout($kan_scout_tb->kandidat_id);
    }
    ?>
    var ctx_scout = document.getElementById('chart_scout_tb');
    var myChart = new Chart(ctx_scout, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_scout_tb); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_scout_tb); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4', '#dc3545'

                ],
                borderColor: [
                    '#000', '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart SCOUT Tholib'
            }
        }
    });

    <?php
    $kandidat_scout_tbh = $this->Hitung_cepat_model->get_kandidat('SCOUT', 'P')->result();
    $nama_scout_tbh = array();
    $count_scout_tbh = array();
    foreach ($kandidat_scout_tbh as $kan_scout_tbh) {
        $nama_scout_tbh[] = "'" . $kan_scout_tbh->kandidat_nama . "'";
        $count_scout_tbh[] = $this->Hitung_cepat_model->count_vote_scout($kan_scout_tbh->kandidat_id);
    }
    ?>
    var ctx_scout = document.getElementById('chart_scout_tbh');
    var myChart = new Chart(ctx_scout, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_scout_tbh); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_scout_tbh); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4', '#dc3545'

                ],
                borderColor: [
                    '#000', '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart SCOUT Tholibah'
            }
        }
    });

    <?php
    $kandidat_saintek_tb = $this->Hitung_cepat_model->get_kandidat('SAINTEK', 'L')->result();
    $nama_saintek_tb = array();
    $count_saintek_tb = array();
    foreach ($kandidat_saintek_tb as $kan_saintek_tb) {
        $nama_saintek_tb[] = "'" . $kan_saintek_tb->kandidat_nama . "'";
        $count_saintek_tb[] = $this->Hitung_cepat_model->count_vote_saintek($kan_saintek_tb->kandidat_id);
    }
    ?>
    var ctx_saintek = document.getElementById('chart_saintek_tb');
    var myChart = new Chart(ctx_saintek, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_saintek_tb); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_saintek_tb); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4', '#dc3545'

                ],
                borderColor: [
                    '#000', '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart SAINTEK Tholib'
            }
        }
    });

    <?php
    $kandidat_saintek_tbh = $this->Hitung_cepat_model->get_kandidat('SAINTEK', 'P')->result();
    $nama_saintek_tbh = array();
    $count_saintek_tbh = array();
    foreach ($kandidat_saintek_tbh as $kan_saintek_tbh) {
        $nama_saintek_tbh[] = "'" . $kan_saintek_tbh->kandidat_nama . "'";
        $count_saintek_tbh[] = $this->Hitung_cepat_model->count_vote_saintek($kan_saintek_tbh->kandidat_id);
    }
    ?>
    var ctx_saintek = document.getElementById('chart_saintek_tbh');
    var myChart = new Chart(ctx_saintek, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_saintek_tbh); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_saintek_tbh); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4', '#dc3545'

                ],
                borderColor: [
                    '#000', '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart SAINTEK Tholibah'
            }
        }
    });

    <?php
    $kandidat_sport_tb = $this->Hitung_cepat_model->get_kandidat('SPORT', 'L')->result();
    $nama_sport_tb = array();
    $count_sport_tb = array();
    foreach ($kandidat_sport_tb as $kan_sport_tb) {
        $nama_sport_tb[] = "'" . $kan_sport_tb->kandidat_nama . "'";
        $count_sport_tb[] = $this->Hitung_cepat_model->count_vote_sport($kan_sport_tb->kandidat_id);
    }
    ?>
    var ctx_sport = document.getElementById('chart_sport_tb');
    var myChart = new Chart(ctx_sport, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_sport_tb); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_sport_tb); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4', '#dc3545'

                ],
                borderColor: [
                    '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart SPORT Tholib'
            }
        }
    });

    <?php
    $kandidat_sport_tbh = $this->Hitung_cepat_model->get_kandidat('SPORT', 'P')->result();
    $nama_sport_tbh = array();
    $count_sport_tbh = array();
    foreach ($kandidat_sport_tbh as $kan_sport_tbh) {
        $nama_sport_tbh[] = "'" . $kan_sport_tbh->kandidat_nama . "'";
        $count_sport_tbh[] = $this->Hitung_cepat_model->count_vote_sport($kan_sport_tbh->kandidat_id);
    }
    ?>
    var ctx_sport = document.getElementById('chart_sport_tbh');
    var myChart = new Chart(ctx_sport, {
        type: 'doughnut',
        data: {
            labels: [<?php echo implode(',', $nama_sport_tbh); ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php echo implode(',', $count_sport_tbh); ?>],
                backgroundColor: [
                    '#e8e502', '#0491f4', '#dc3545'

                ],
                borderColor: [
                    '#000', '#000'
                ],
                borderWidth: 5
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart SPORT Tholibah'
            }
        }
    });
</script>