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
        <?php
        $attribute = array('method' => 'post');
        echo form_open('dpt/give_permit_vote', $attribute);
        ?>
        <div class="card-body">
        <?php echo $this->session->userdata('msg') ?>
            <div class="table-responsive p-0">
                <table class="table table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>FULL NAME</th>
                            <th>CLASS</th>
                            <th>PERMIT VOTE</th>
                            <th>VOTED</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dpt_result as $dpt) {
                            if ($dpt->who_vote_osis == '' || $dpt->who_vote_scout == '' || $dpt->who_vote_saintek == '') {
                                $voted = '<label class="label label-danger">NOT YET</label>';
                            } else {
                                $voted = '<label class="label label-success">DONE</label>';
                            }
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $dpt->nama_lengkap ?></td>
                                <td><?php echo $dpt->kelas ?></td>
                                <td>
                                    <input name="data_voting_id[]" value="<?php echo $dpt->data_voting_id ?>" class="form-check-input" type="checkbox">
                                </td>
                                <td><?php echo $voted ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-sm waves-effect float-right waves-light btn-info">Give Permit Vote</button>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>