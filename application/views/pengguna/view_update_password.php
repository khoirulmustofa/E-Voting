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
            echo form_open('update_password/update_password_action', $attribute);
            ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>New Password : <?php echo form_error('password') ?></label>
                    <input type="password" name="password"  class="form-control" placeholder="Insert Password . . .">
                </div>
                <div class="form-group col-md-12">
                    <label>Confirmation New Password : <?php echo form_error('password_confirm') ?></label>
                    <input type="password" name="password_confirm" class="form-control" placeholder="Insert Confirmation New Password . . .">
                </div>                               
            </div>
            <input type="hidden" name="pengguna_id" value="<?php echo $pengguna_row->pengguna_id ?>">            
            <button type="submit" class="btn btn-success float-right">Save</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>