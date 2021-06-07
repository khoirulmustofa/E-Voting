<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?php echo $title ?></h6>
        </div>
        
        <div class="card-body">
        <?php echo $this->session->userdata('msg')?>
            <?php
            $attribute = array();
            echo form_open_multipart('master/pengguna_upload_action', $attribute);
            ?>
            
            <?php echo form_close() ?>
        </div>
    </div>
</div>