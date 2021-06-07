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
            echo form_open('pengguna/update_action', $attribute);
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username : <?php echo form_error('username') ?></label>
                    <input type="text" name="username" value="<?php echo $username ?>" class="form-control" placeholder="Insert Username . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Password : <?php echo form_error('password') ?></label>
                    <input type="password" name="password" value="<?php echo $password ?>" class="form-control" placeholder="Insert Password . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Full Name : <?php echo form_error('nama_lengkap') ?></label>
                    <input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap ?>" class="form-control" placeholder="Insert Full Name . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Class : <?php echo form_error('kelas') ?></label>
                    <input type="text" name="kelas" value="<?php echo $kelas ?>" class="form-control" placeholder="Insert Kelas . . .">
                </div>
                <div class="form-group col-md-6">
                    <label>Gender : <?php echo form_error('jenis_kelamin') ?></label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">--Choose Gender-- </option>
                        <option value="L" <?php echo $jenis_kelamin == 'L' ? 'selected' : '' ?>>Male</option>
                        <option value="P" <?php echo $jenis_kelamin == 'P' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Access Vote : <?php echo form_error('akses_vote') ?></label>
                    <select name="akses_vote" class="form-control">
                        <option value="">--Choose Access Vote-- </option>
                        <option value="Y" <?php echo $akses_vote == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $akses_vote == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Access Vote OSIS : <?php echo form_error('akses_vote_osis') ?></label>
                    <select name="akses_vote_osis" class="form-control">
                        <option value="">--Choose Access Vote OSIS-- </option>
                        <option value="Y" <?php echo $akses_vote_osis == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $akses_vote_osis == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Access Vote SCOUT : <?php echo form_error('akses_vote_scout') ?></label>
                    <select name="akses_vote_scout" class="form-control">
                        <option value="">--Choose Access Vote SCOUT-- </option>
                        <option value="Y" <?php echo $akses_vote_scout == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $akses_vote_scout == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Access Vote SAINTEK : <?php echo form_error('akses_vote_saintek') ?></label>
                    <select name="akses_vote_saintek" class="form-control">
                        <option value="">--Choose Access Vote SAINTEK-- </option>
                        <option value="Y" <?php echo $akses_vote_saintek == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $akses_vote_saintek == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Access Vote SPORT : <?php echo form_error('akses_vote_sport') ?></label>
                    <select name="akses_vote_sport" class="form-control">
                        <option value="">--Choose Access Vote SPORT-- </option>
                        <option value="Y" <?php echo $akses_vote_sport == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $akses_vote_sport == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Level User : <?php echo form_error('pengguna_level') ?></label>
                    <select name="pengguna_level" class="form-control">
                        <option value="">--Choose Level User-- </option>
                        <option value="User" <?php echo $pengguna_level == 'User' ? 'selected' : '' ?>>User</option>
                        <option value="Candidat" <?php echo $pengguna_level == 'Candidat' ? 'selected' : '' ?>>Candidat</option>
                        <option value="Administrator" <?php echo $pengguna_level == 'Administrator' ? 'selected' : '' ?>>Administrator</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Status User : <?php echo form_error('status_pengguna') ?></label>
                    <select name="status_pengguna" class="form-control">
                        <option value="">--Choose Status User-- </option>
                        <option value="Y" <?php echo $status_pengguna == 'Y' ? 'selected' : '' ?>>Active</option>
                        <option value="N" <?php echo $status_pengguna == 'N' ? 'selected' : '' ?>>Non Active</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="pengguna_id" value="<?php echo $pengguna_id ?>">
            <a href="<?php echo base_url('pengguna') ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success float-right">Save</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>