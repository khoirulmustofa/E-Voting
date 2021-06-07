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
            <div class="row">
                <?php echo $this->session->userdata('msg') ?>
                <?php if ($pengguna_row->akses_vote == 'Y') { ?>
                    <?php if ($pengguna_row->akses_vote_osis == 'Y') { ?>
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <?php if ($pengguna_row->who_vote_osis != '') { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Vote election OSIS is done </h5>
                                    </div>
                                <?php  } else { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0"><?php echo $pengguna_row->jenis_kelamin == 'L' ? 'OSIS THOLIB' : 'OSIS THOLIBAH' ?> </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $kandidat_osis = $this->Voting_model->get_kandidat_kategori_by_gender('OSIS', $pengguna_row->jenis_kelamin)->result();
                                            foreach ($kandidat_osis as $kan_osis) {  ?>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <div class="card text-center order-visitor-card">
                                                        <h3><?php echo $kan_osis->kandidat_nama ?></h3>
                                                        <img src="<?php echo base_url('public/kandidat/' . $kan_osis->kandidat_photo) ?>" class="img-fluid" alt="">
                                                        <a href="<?php echo base_url('voting/voting_osis/' . $kan_osis->kandidat_id) ?>" onclick="javasciprt: return confirm('Are you sure you chose this candidat?')" class="btn btn-block btn-success btn-lg">Vote</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($pengguna_row->akses_vote_scout == 'Y') { ?>
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <?php if ($pengguna_row->who_vote_scout != '') { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Vote election SCOUT is done </h5>
                                    </div>
                                <?php  } else { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0"><?php echo $pengguna_row->jenis_kelamin == 'L' ? 'SCOUT THOLIB' : 'SCOUT THOLIBAH' ?> </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $kandidat_2 = $this->Voting_model->get_kandidat_kategori_by_gender('SCOUT', $pengguna_row->jenis_kelamin)->result();
                                            foreach ($kandidat_2 as $kan_osis) {  ?>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <div class="card text-center order-visitor-card">
                                                        <h3><?php echo $kan_osis->kandidat_nama ?></h3>
                                                        <img src="<?php echo base_url('public/kandidat/' . $kan_osis->kandidat_photo) ?>" class="img-fluid" alt="">
                                                        <a href="<?php echo base_url('voting/voting_scout/' . $kan_osis->kandidat_id) ?>" onclick="javasciprt: return confirm('Are you sure you chose this candidat?')" class="btn btn-block btn-success btn-lg">Vote</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($pengguna_row->akses_vote_saintek == 'Y') { ?>
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <?php if ($pengguna_row->who_vote_saintek != '') { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Vote election SAINTEK is done </h5>
                                    </div>
                                <?php  } else { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0"><?php echo $pengguna_row->jenis_kelamin == 'L' ? 'SAINTEK THOLIB' : 'SAINTEK THOLIBAH' ?> </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $kandidat_3 = $this->Voting_model->get_kandidat_kategori_by_gender('SAINTEK', $pengguna_row->jenis_kelamin)->result();
                                            foreach ($kandidat_3 as $kan_osis) {  ?>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <div class="card text-center order-visitor-card">
                                                        <h3><?php echo $kan_osis->kandidat_nama ?></h3>
                                                        <img src="<?php echo base_url('public/kandidat/' . $kan_osis->kandidat_photo) ?>" class="img-fluid" alt="">
                                                        <a href="<?php echo base_url('voting/voting_saintek/' . $kan_osis->kandidat_id) ?>" onclick="javasciprt: return confirm('Are you sure you chose this candidat?')" class="btn btn-block btn-success btn-lg">Vote</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($pengguna_row->akses_vote_sport == 'Y') { ?>
                        <div class="col-lg-12">
                            <div class="card card-primary">
                                <?php if ($pengguna_row->who_vote_sport != '') { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Vote election SPORT is done </h5>
                                    </div>
                                <?php  } else { ?>
                                    <div class="card-header">
                                        <h5 class="card-title m-0"><?php echo $pengguna_row->jenis_kelamin == 'L' ? 'SPORT THOLIB' : 'SAINTEK THOLIBAH' ?> </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $kandidat_4 = $this->Voting_model->get_kandidat_kategori_by_gender('SPORT', $pengguna_row->jenis_kelamin)->result();
                                            foreach ($kandidat_4 as $kan_osis) {  ?>
                                                <div class="col-lg-6 d-flex align-items-stretch">
                                                    <div class="card text-center order-visitor-card">
                                                        <h3><?php echo $kan_osis->kandidat_nama ?></h3>
                                                        <img src="<?php echo base_url('public/kandidat/' . $kan_osis->kandidat_photo) ?>" class="img-fluid" alt="">
                                                        <a href="<?php echo base_url('voting/voting_saintek/' . $kan_osis->kandidat_id) ?>" onclick="javasciprt: return confirm('Are you sure you chose this candidat?')" class="btn btn-block btn-success btn-lg">Vote</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php  } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>