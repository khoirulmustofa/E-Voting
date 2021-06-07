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
                    <a href="<?php echo base_url('kandidat/create') ?>" class="btn btn-sm waves-effect waves-light btn-success">
                        Add Candidat
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
                            <th>CANDIDAT NAME</th>
                            <th>VOTE CATEGORY</th>
                            <th>GENDER VOTER</th>
                            <th>NO ORDER</th>
                            <th>UPLOAD PHOTO</th>
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
                                <td><?php echo $kandidat->kategori_pilihan ?></td>
                                <td><?php echo $kandidat->jenis_kelamin_pemilih == 'L' ? '<label class="label label-success">Male</label>' : '<label class="label label-danger">Female</label>' ?></td>
                                <td><?php echo $kandidat->kandidat_urutan ?></td>
                                <td><?php echo $kandidat->kandidat_photo==''?'<label class="badge badge-danger">Not Yet</label>':'<label class="badge badge-success">Uploaded</label>' ?></td>
                                <td>
                                <a href="<?php echo site_url('kandidat/upload_photo/' . $kandidat->kandidat_id) ?>" class="btn btn-primary waves-effect waves-light btn-sm">Upload Photo</a>
                                    <a href="<?php echo site_url('kandidat/update/' . $kandidat->kandidat_id) ?>" class="btn btn-sm btn-info waves-effect waves-light">Edit</a>
                                    <a href="<?php echo site_url('kandidat/delete/' . $kandidat->kandidat_id) ?>" onclick="javasciprt: return confirm('Are you sure you want to delete this data ?')" class="btn btn-sm btn-danger waves-effect waves-light">Delete</a>
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