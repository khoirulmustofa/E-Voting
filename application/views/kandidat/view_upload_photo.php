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
            echo form_open_multipart('kandidat/upload_photo_action', $attribute);
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Photo Candidate : <?php echo form_error('kandidat_photo') ?></label>
                    <br>
                    <input type="file" name="kandidat_photo" value="<?php echo $kandidat_photo ?>" accept="image/*">
                </div>
                <div class="form-group col-md-6">
                    <label>Preview Photo</label>
                    <br>
                    <?php if ($kandidat_row->kandidat_photo != '') { ?>
                        <img src="<?php echo base_url('public/kandidat/' . $kandidat_row->kandidat_photo) ?>" class="img-fluid" alt="">
                    <?php } ?>

                </div>
            </div>

            <input type="hidden" name="kandidat_id" value="<?php echo $kandidat_row->kandidat_id ?>" />
            <input type="hidden" name="photo_lama" value="<?php echo $kandidat_row->kandidat_photo ?>" />
            <a href="<?php echo base_url('kandidat') ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Upload</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>