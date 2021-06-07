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
                        <span class="text">Add Choice Category</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
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
                                <td><?php echo $kategori_pilihan->kategori_pilihan_gender == 'L' ? '<span class="badge bg-success">Laki-laki</span>' : '<span class="badge bg-warning">Perempuan</span>' ?></td>
                                <td><?php echo $kategori_pilihan->kategori_pilihan_urutan ?></td>
                                <td><?php echo $kategori_pilihan->kategori_pilihan_status ?></td>
                                <td>
                                    <a href="<?php echo site_url('master/kategori_pilihan_update/' . $kategori_pilihan->kategori_pilihan_id) ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?php echo site_url('') ?>" class="btn btn-danger btn-sm">Delete</a>
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