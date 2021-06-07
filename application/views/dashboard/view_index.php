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
        <?php echo $this->session->userdata('msg') ?>
            <div class="row">                
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_all_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT OSIS Tholib</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_osis_tb_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT OSIS Tholibah</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_osis_tbh_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT SCOUT Tholib</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_scout_tb_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT SCOUT Tholibah</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_scout_tbh_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT SAINTEK Tholib</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_saintek_tb_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT SAINTEK Tholibah</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_saintek_tbh_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT SPORT Tholib</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_sport_tb_dpt; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center order-visitor-card">
                        <div class="card-block">
                            <h6 class="m-b-0">Total DPT SPORT Tholibah</h6>
                            <h4 class="m-t-15 m-b-15"><?php echo $count_sport_tbh_dpt; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="<?php echo base_url('public/bg_election_smp2.jpg') ?>" class="img-fluid" alt="Gambar Yoo">
                </div>
            </div>
        </div>
    </div>
</div>