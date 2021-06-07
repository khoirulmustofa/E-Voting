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
            <?php echo $this->session->userdata('msg') ?>
            <?php
            $attribute = array();
            echo form_open_multipart('pengguna/upload_action', $attribute);
            ?>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <label>File Excel</label>
                    <br>
                    <input type="file" name="upload_file" value="<?php echo $upload_file ?>" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i> Upload</button>
                </div>

            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>