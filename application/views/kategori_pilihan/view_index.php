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
                    <a href="<?php echo base_url('kategori_pilihan/create') ?>" class="btn btn-sm waves-effect waves-light btn-success">
                        Add Category
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
                            <th>CATEGORY NAME</th>
                            <th>CATEGORY GENDER</th>
                            <th>ORDER</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori_pilihan_result as $kategori_pilihan) { ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $kategori_pilihan->kategori_pilihan_nama ?></td>
                                <td><?php echo $kategori_pilihan->kategori_pilihan_gender == 'L' ? '<label class="label label-success">Male</label>' : '<label class="label label-warning">Female</label>' ?></td>                                
                                <td><?php echo $kategori_pilihan->kategori_pilihan_urutan ?></td>
                                <td><?php echo $kategori_pilihan->kategori_pilihan_status == 'Y' ? '<label class="label label-success">YES</label>' : '<label class="label label-danger">NO</label>' ?></td>
                                <td>
                                    <a href="<?php echo site_url('kategori_pilihan/update/' . $kategori_pilihan->kategori_pilihan_id) ?>" class="btn btn-sm waves-effect waves-light btn-info">Edit</a>
                                    <a href="<?php echo site_url('kategori_pilihan/delete/' . $kategori_pilihan->kategori_pilihan_id) ?>" onclick="javasciprt: return confirm('Are you sure you want to delete this data?')" class="btn btn-sm waves-effect waves-light btn-danger">Delete</a>
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