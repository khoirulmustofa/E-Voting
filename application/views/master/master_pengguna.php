<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add Users</span>
                    </a>
                    <a href="<?php echo base_url('master/pengguna_upload') ?>" class="btn btn-info btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </span>
                        <span class="text">Upload Users</span>
                    </a>
                </div>
            </div>
        </div>
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
                            <th>CAN VOTE</th>
                            <th>LEVEL</th>
                            <th>UPDATED PASSWORD</th>
                            <th>STATUS USER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengguna_result as $pengguna) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $pengguna->username ?></td>
                                <td><?php echo $pengguna->nama_lengkap ?></td>
                                <td><?php echo $pengguna->kelas ?></td>
                                <td><?php echo $pengguna->jenis_kelamin == 'L' ? '<span class="btn btn-success btn-sm">Laki-laki</span>' : '<span class="btn btn-warning btn-sm">Perempuan</span>' ?></td>
                                <td><?php echo $pengguna->akses_vote == 'Y' ? '<span class="btn btn-success btn-sm">YES</span>' : '<span class="btn btn-danger btn-sm">NO</span>' ?></td>
                                <td><?php echo $pengguna->pengguna_level ?></td>
                                <td><?php echo $pengguna->password_update == 'Y' ? '<span class="btn btn-success btn-sm">YES</span>' : '<span class="btn btn-danger btn-sm">NO</span>' ?></td>
                                <td><?php echo $pengguna->status_pengguna == 'Y' ? '<span class="btn btn-success btn-sm">ACTIVE</span>' : '<span class="btn btn-danger btn-sm">NO ACTIVE</span>' ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>