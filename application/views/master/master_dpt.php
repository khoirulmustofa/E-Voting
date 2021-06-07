<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>USER NAME</th>
                            <th>FULL NAME</th>
                            <th>CLASS</th>
                            <th>GENDER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dpt_result as $dpt) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $dpt->username ?></td>
                                <td><?php echo $dpt->nama_lengkap ?></td>
                                <td><?php echo $dpt->kelas ?></td>
                                <td><?php echo $dpt->jenis_kelamin == 'L' ? '<span class="btn btn-success btn-sm">Laki-laki</span>' : '<span class="btn btn-warning btn-sm">Perempuan</span>' ?></td>                               
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>