<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?php echo $title ?></h6>
        </div>

        <div class="card-body">
            <?php echo $this->session->userdata('msg') ?>
            <?php
            $attribute = array();
            echo form_open_multipart('master/pengguna_upload_action', $attribute);
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