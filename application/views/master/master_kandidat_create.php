<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?php echo $title ?></h6>
        </div>
        <div class="card-body">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Candidate Form</a>
                        </li>                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <?php
                            $attribute = array();
                            echo form_open_multipart('master/upload_photo_kandidat', $attribute);
                            ?>
                            <div class="form-group <?php set_validation_style('kandidat_photo') ?>">
                                <label>Photo <?php echo form_error('kandidat_photo') ?></label>
                                <br>
                                <input type="file" name="kandidat_photo" multiple accept="image/*">
                                <hr>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-send"></i> Simpan</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                            <?php
                            $attribute = array();
                            echo form_open('master/tambah_kandidat_action', $attribute);
                            ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group <?php set_validation_style('kandidat_nama') ?>">
                                        <label>Nama Kandidat <?php echo form_error('kandidat_nama') ?></label>
                                        <input name="kandidat_nama" type="text" value="<?php echo $kandidat_nama ?>" placeholder="Masukan Nama Kandidat  ..." class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kategori Pilihan <?php echo form_error('kategori_pilihan_id') ?></label>
                                        <select name="kategori_pilihan_id" class="form-control" style="width: 100%;">
                                            <option value="">--pilih Kategori Pilihan--</option>
                                            <?php foreach ($kategori_pilihan_result as $kategori_pilihan) { ?>
                                                <option value="<?php echo $kategori_pilihan->kategori_pilihan_id ?>" <?php echo $kategori_pilihan->kategori_pilihan_id == $kategori_pilihan_id ? 'selected' : '' ?>><?php echo $kategori_pilihan->kategori_pilihan_nama ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group <?php set_validation_style('kandidat_video') ?>">
                                        <label>Video <?php echo form_error('kandidat_video') ?></label>
                                        <input name="kandidat_video" type="text" value="<?php echo $kandidat_video ?>" placeholder="Masukan Video ..." class="form-control">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group <?php set_validation_style('kandidat_visi') ?>">
                                        <label>Visi <?php echo form_error('kandidat_visi') ?></label>
                                        <textarea name="kandidat_visi" id="kandidat_visi" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group <?php set_validation_style('kandidat_misi') ?>">
                                        <label>Misi <?php echo form_error('kandidat_misi') ?></label>
                                        <textarea name="kandidat_misi" id="kandidat_misi" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group <?php set_validation_style('kandidat_program') ?>">
                                        <label>Program <?php echo form_error('kandidat_program') ?></label>
                                        <textarea name="kandidat_program" id="kandidat_program" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group <?php set_validation_style('kandidat_lain') ?>">
                                        <label>Lain-lain <?php echo form_error('kandidat_lain') ?></label>
                                        <textarea name="kandidat_lain" id="kandidat_lain" class="form-control"></textarea>
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
    </div>
</div>