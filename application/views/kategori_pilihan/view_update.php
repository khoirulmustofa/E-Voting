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
            echo form_open('kategori_pilihan/update_action', $attribute);
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Category Name : <?php echo form_error('kategori_pilihan_nama') ?></label>
                    <input type="text" name="kategori_pilihan_nama" value="<?php echo $kategori_pilihan_nama ?>" class="form-control" placeholder="Insert Category Name . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Category For Gender : <?php echo form_error('kategori_pilihan_gender') ?></label>
                    <select name="kategori_pilihan_gender" class="form-control">
                        <option value="">--Choose Category For Gender-- </option>
                        <option value="L" <?php echo $kategori_pilihan_gender == 'L' ? 'selected' : '' ?>>Male</option>
                        <option value="P" <?php echo $kategori_pilihan_gender == 'P' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Category Info</label>
                <input type="text" value="<?php echo $kategori_pilihan_keterangan ?>" class="form-control" name="kategori_pilihan_keterangan" placeholder="Insert Category Info . . .">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Order : <?php echo form_error('kategori_pilihan_urutan') ?></label>
                    <input type="number" name="kategori_pilihan_urutan" value="<?php echo $kategori_pilihan_urutan ?>" class="form-control" placeholder="Insert Order . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Status Category : <?php echo form_error('kategori_pilihan_status') ?></label>
                    <select name="kategori_pilihan_status" class="form-control">
                        <option value="">--Choose Status Category-- </option>
                        <option value="Y" <?php echo $kategori_pilihan_status == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $kategori_pilihan_status == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="kategori_pilihan_id" value="<?php echo $kategori_pilihan_id ?>">
            <a href="<?php echo base_url('kategori_pilihan') ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>