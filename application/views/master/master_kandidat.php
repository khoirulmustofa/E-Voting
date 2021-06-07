<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url('master/kandidat_create') ?>" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add Candidates</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php echo $this->session->userdata('msg') ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA KANDIDAT</th>
                            <th>KATEGORI PILIHAN</th>
                            <th>NO URUT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kandidat_result as $kandidat) { ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $kandidat->kandidat_nama ?></td>
                                <td><?php echo $kandidat->kategori_pilihan_nama ?></td>
                                <td><?php echo $kandidat->kandidat_urutan ?></td>
                                <td>
                                    <a href="<?php echo site_url('master/edit_kandidat/' . $kandidat->kandidat_id) ?>" class="btn btn-info">Edit</a>
                                    <a href="<?php echo site_url('') ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>