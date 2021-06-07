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
            <div class="table-responsive p-0">
                <table class="table table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>FULL NAME</th>
                            <th>CLASS</th>
                            <th>VOTE OSIS</th>
                            <th>VOTE SCOUT</th>
                            <th>VOTE SAINTEK</th>
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
                                <td><?php echo $dpt->who_vote_osis == 'BLOCK' ? '<label class="label label-danger">NO</label>' : $dpt->nama_osis ?></td>
                                <td><?php echo $dpt->who_vote_scout == 'BLOCK' ? '<label class="label label-danger">NO</label>' : $dpt->nama_scout ?></td>
                                <td><?php echo $dpt->who_vote_saintek == 'BLOCK' ? '<label class="label label-danger">NO</label>' : $dpt->nama_sain ?></td>                                                              
                                <td><?php echo $voted ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>