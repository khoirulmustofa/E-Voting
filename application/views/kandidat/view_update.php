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
            echo form_open('kandidat/update_action', $attribute);

            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Candidat Name : <?php echo form_error('kandidat_nama') ?></label>
                    <input type="text" name="kandidat_nama" value="<?php echo $kandidat_nama ?>" class="form-control" placeholder="Insert Candidat Name . . .">
                </div>
            </div>
            <div class="form-group">
                <label>Vision : <?php echo form_error('kandidat_visi') ?></label>
                <textarea name="kandidat_visi" id="kandidat_visi" placeholder="Insert Vision . . ." class="form-control"><?php echo $kandidat_visi ?></textarea>
            </div>
            <div class="form-group">
                <label>Mission : <?php echo form_error('kandidat_misi') ?></label>
                <textarea name="kandidat_misi" id="kandidat_misi" placeholder="Insert Mission . . ." class="form-control"><?php echo $kandidat_misi ?></textarea>
            </div>
            <div class="form-group">
                <label>Program : <?php echo form_error('kandidat_program') ?></label>
                <textarea name="kandidat_program" id="kandidat_program" placeholder="Insert Program . . ." class="form-control"><?php echo $kandidat_program ?></textarea>
            </div>
            <div class="form-group">
                <label>Other : <?php echo form_error('kandidat_lain') ?></label>
                <textarea name="kandidat_lain" id="kandidat_lain" placeholder="Insert Other Info . . ." class="form-control"><?php echo $kandidat_lain ?></textarea>
            </div>
            <div class="form-group">
                <label>Video : <?php echo form_error('kandidat_video') ?></label>
                <input type="text" name="kandidat_video" value="<?php echo $kandidat_video ?>" class="form-control">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Order : <?php echo form_error('kandidat_urutan') ?></label>
                    <input type="number" name="kandidat_urutan" value="<?php echo $kandidat_urutan ?>" class="form-control" placeholder="Insert Order . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Vote Category : <?php echo form_error('kategori_pilihan') ?></label>
                    <select name="kategori_pilihan" class="form-control fill">
                        <option value="">--Choose Vote Category-- </option>
                        <option value="OSIS" <?php echo $kategori_pilihan == 'OSIS' ? 'selected' : '' ?>>OSIS</option>                        
                        <option value="SCOUT" <?php echo $kategori_pilihan == 'SCOUT' ? 'selected' : '' ?>>SCOUT</option>                       
                        <option value="SAINTEK" <?php echo $kategori_pilihan == 'SAINTEK' ? 'selected' : '' ?>>SAINTEK</option>
                        <option value="SPORT" <?php echo $kategori_pilihan == 'SPORT' ? 'selected' : '' ?>>SPORT</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Gender Voter : <?php echo form_error('jenis_kelamin_pemilih') ?></label>
                    <select name="jenis_kelamin_pemilih" class="form-control">
                        <option value="">--Choose Gender Voter-- </option>
                        <option value="L" <?php echo $jenis_kelamin_pemilih == 'L' ? 'selected' : '' ?>>Male</option>
                        <option value="P" <?php echo $jenis_kelamin_pemilih == 'P' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Candidat Status : <?php echo form_error('kandidat_status') ?></label>
                    <select name="kandidat_status" class="form-control">
                        <option value="">--Choose Candidat Status-- </option>
                        <option value="Y" <?php echo $kandidat_status == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $kandidat_status == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="kandidat_id" value="<?php echo $kandidat_id ?>" />
            <a href="<?php echo base_url('kandidat') ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>