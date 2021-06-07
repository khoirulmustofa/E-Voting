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
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->session->userdata('msg') ?>
                    <a href="<?php echo base_url('dpt/generate_dpt') ?>" class="btn btn-sm waves-effect waves-light btn-success">
                        Generate DPT
                    </a>
                    <a href="<?php echo base_url('dpt/delete_all_dpt') ?>" onclick="javasciprt: return confirm('Are you sure you want to delete all data DPT ?')" class="btn btn-sm waves-effect waves-light btn-danger">
                        Delete All DPT
                    </a>
                </div>
            </div>
        </div>
        <?php
        $attribute = array('method' => 'post');
        echo form_open('kegiatan/create_siswa_kegiatan_action', $attribute);
        ?>
        <div class="card-body">
            <div class="table-responsive p-0">
                <table class="table table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>FULL NAME</th>
                            <th>CLASS</th>
                            <th>CAN VOTE OSIS</th>
                            <th>CAN VOTE SCOUT</th>
                            <th>CAN VOTE SAINTEK</th>
                            <th>CAN VOTE SPORT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dpt_result as $dpt) {                          
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $dpt->nama_lengkap ?></td>
                                <td><?php echo $dpt->kelas ?></td>
                                <td><?php echo $dpt->akses_vote_osis == 'Y' ? '<label class="label label-success">YES</label>' : '<label class="label label-danger">NO</label>' ?></td>
                                <td><?php echo $dpt->akses_vote_scout == 'Y' ? '<label class="label label-success">YES</label>' : '<label class="label label-danger">NO</label>' ?></td>
                                <td><?php echo $dpt->akses_vote_saintek == 'Y' ? '<label class="label label-success">YES</label>' : '<label class="label label-danger">NO</label>' ?></td>
                                <td><?php echo $dpt->akses_vote_sport == 'Y' ? '<label class="label label-success">YES</label>' : '<label class="label label-danger">NO</label>' ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->session->userdata('msg') ?>
                    <a href="<?php echo base_url('dpt/generate_dpt') ?>" class="btn btn-sm waves-effect float-right waves-light btn-info">
                        Give Permit Vote
                    </a>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>