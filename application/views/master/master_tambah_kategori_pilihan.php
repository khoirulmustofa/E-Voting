<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Form Tambah Kategory Pilihan
                </div>
                <div class="panel-body">
                    <?php
                    $attribute = array();
                    echo form_open('master/tambah_kategori_pilihan_action', $attribute);
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group <?php set_validation_style('kategori_pilihan_nama') ?>">
                                <label>Nama Kategori Pilihan <?php echo form_error('kategori_pilihan_nama') ?></label>
                                <input name="kategori_pilihan_nama" type="text" value="<?php echo $kategori_pilihan_nama ?>" placeholder="Masukan Nama Kategori  ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Keterangan Kategori Pilihan <?php echo form_error('kategori_pilihan_keterangan') ?></label>
                                <input name="kategori_pilihan_keterangan" type="text" value="<?php echo $kategori_pilihan_keterangan ?>" placeholder="Masukan Keterangan Kategori ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status <?php echo form_error('kategori_pilihan_status') ?></label>
                                <select name="kategori_pilihan_status" class="form-control">
                                    <option value="Y" <?php echo $kategori_pilihan_status == 'Y' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="N" <?php echo $kategori_pilihan_status == 'N' ? 'selected' : '' ?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group <?php set_validation_style('kategori_pilihan_nama') ?>">
                                <label>Urutan Kategori <?php echo form_error('kategori_pilihan_urutan') ?></label>
                                <input name="kategori_pilihan_urutan" type="number" value="<?php echo $kategori_pilihan_urutan ?>" placeholder="Masukan Urutan Kategori ..." class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12">
                        <a href="<?php echo site_url('master/kategori_pilihan') ?>" class="btn btn-default"><i class="fa fa-fw fa-refresh"></i> Back</a>
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-fw fa-send"></i> Simpan</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>