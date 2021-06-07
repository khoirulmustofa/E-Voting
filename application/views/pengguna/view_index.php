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
                    <a href="<?php echo base_url('pengguna/create') ?>" class="btn btn-sm waves-effect waves-light btn-success">
                        Add User
                    </a>
                    <a href="<?php echo base_url('pengguna/upload') ?>" class="btn btn-sm waves-effect waves-light btn-info">
                        Upload Users
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
                            <th>STATUS USER</th>
                            <th>ACTION</th>
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
                                <td><?php echo $pengguna->jenis_kelamin == 'L' ? '<label class="label label-success">Laki-laki</label>' : '<label class="label label-danger">Perempuan</label>' ?></td>
                                <td><?php echo $pengguna->akses_vote == 'Y' ? '<label class="label label-success">YES</label>' : '<label class="label label-danger">NO</label>' ?></td>
                                <td><?php echo $pengguna->pengguna_level ?></td>
                                <td><?php echo $pengguna->status_pengguna == 'Y' ? '<label class="label label-success">Active</label>' : '<label class="label label-danger">No Active</label>' ?></td>
                                <td>
                                    <a href="<?php echo base_url('pengguna/update/' . $pengguna->pengguna_id) ?>" class="btn btn-warning btn-sm waves-effect waves-light">Edit</a>
                                    <!-- <a href="<?php echo site_url('pengguna/delete/' . $pengguna->pengguna_id) ?>" onclick="javasciprt: return confirm('Are you sure you want to delete this data?')" class="btn btn-sm waves-effect waves-light btn-danger">Delete</a> -->
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>