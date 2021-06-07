<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?php echo $title ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title m-0">Total data entered</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-block">
                            <?php $persen_data_masuk = ($data_voted_dpt * 100) / $data_total_dpt; ?>
                            <h5 class="m-b-30 f-w-700"><?php echo $data_voted_dpt. ' Voted of ' . $data_total_dpt.' DPT' ?><span class="text-c-green m-l-10"><?php echo round($persen_data_masuk, 2); ?>%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-c-green" style="width:<?php echo $persen_data_masuk ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-user text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5><?php echo $data_voted_dpt; ?> Voted</h5>
                                                <p class="text-muted m-b-0">DPT Voted</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-user text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5><?php echo $data_total_dpt; ?> DPT</h5>
                                                <p class="text-muted m-b-0">Total Voter</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title m-0">Total data entered By Class</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($kelas_result as $kelas) { ?>
                            <div class="card-block">
                                <h6>Class <?php echo $kelas->kelas ?></h6>
                                <?php
                                $total_dpt_kelas = $this->Hitung_cepat_model->get_total_dpt_perkelas($kelas->kelas);
                                $total_voted_kelas = $this->Hitung_cepat_model->get_total_voted_perkelas($kelas->kelas);
                                $persen = ($total_voted_kelas * 100) / $total_dpt_kelas;
                                ?>
                                <h5 class="m-b-30 f-w-700"><?php echo $total_voted_kelas . ' Voted of ' . $total_dpt_kelas.' DPT' ?> <span class="text-c-green m-l-10"><?php echo round($persen, 2) ?>%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-c-green" style="width:<?php echo $persen ?>%"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>