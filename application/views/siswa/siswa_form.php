
        <h2 style="margin-top:0px">Siswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group col-lg-6">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group col-lg-6">
            <label for="varchar" class="alert-username">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control usn" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group col-lg-6">
            <label for="password" class="alert-password">Password <?php echo form_error('password') ?></label>
            <div class="input-group">
            <input type="password" class="form-control pwd" id="password" name="password" placeholder="Password">
            <span class="input-group-btn">
                <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
            </span>       
            </div>
        </div>
	    <div class="form-group col-lg-6">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group col-lg-6">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group col-lg-6">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group col-lg-6">
            <label for="varchar">Nama Orangtua <?php echo form_error('nama_orangtua') ?></label>
            <input type="text" class="form-control" name="nama_orangtua" id="nama_orangtua" placeholder="Nama Orangtua" value="<?php echo $nama_orangtua; ?>" />
        </div>
        <div class="form-group col-lg-6">
            <label for="int">Penghasilan Orangtua <?php echo form_error('penghasilan_orangtua') ?></label>
            <?php
                $options = array(
                    '1'         => '< Rp 2.000.000',
                    '0.75'      => 'Rp 2.000.000 - Rp 2.999.999',
                    '0.50'      => 'Rp 3.000.000 - Rp 4.000.000',
                    '0.25'      => '> Rp 4.000.000',
                );
                echo form_dropdown(
                    array(
                        'name' => 'penghasilan_orangtua',
                        'class' => 'form-control',
                        'id' => 'penghasilan_orangtua'
                    ), $options, $penghasilan_orangtua);
            ?>
        </div>
        <div class="form-group col-lg-6" style="height:70px;">
            <label for="varchar">Kks <?php echo form_error('kks') ?></label>
            <div class="input-group">
                <label class="radio-inline"><input type="radio" name="kks" value="1" checked>Ya</label>
                <label class="radio-inline"><input type="radio" name="kks" value="0">Tidak</label>
            </div>
        </div>

        <div class="form-group col-lg-6" style="height:70px;">
            <label for="varchar">Kip <?php echo form_error('kip') ?></label>
            <div class="input-group">
                <label class="radio-inline"><input type="radio" name="kip" value="1" checked>Ya</label>
                <label class="radio-inline"><input type="radio" name="kip" value="0">Tidak</label>
            </div>
        </div>
	    
	    <div class="form-group col-lg-6">
            <label for="int">Jumlah Tanggungan <?php echo form_error('jumlah_tanggungan') ?></label>
            <?php
                $options = array(
                    '1'         => '> 5',
                    '0.75'      => '4 - 5',
                    '0.50'      => '2 - 3',
                    '0.25'      => '1',
                );
                echo form_dropdown(
                    array(
                        'name' => 'jumlah_tanggungan',
                        'class' => 'form-control',
                        'id' => 'jumlah_tanggungan'
                    ), $options, $jumlah_tanggungan);
            ?>
        </div>

        <div class="form-group col-lg-6">
            <label for="int">Nilai Raport <?php echo form_error('nilai_rapot') ?></label>
            <?php
                $options = array(
                    '1'         => '≥ 8,5',
                    '0.75'      => '7,5 - 8,4',
                    '0.50'      => '6,5 - 7,4',
                    '0.25'      => '< 6,5',
                );
                echo form_dropdown(
                    array(
                        'name' => 'nilai_rapot',
                        'class' => 'form-control',
                        'id' => 'nilai_rapot'
                    ), $options, $nilai_rapot);
            ?>
        </div>
	    <div class="form-group col-lg-6">
            <label for="int">Sertifikat Prestasi <?php echo form_error('sertifikat_prestasi') ?></label>
            <?php
                $options = array(
                    '1'         => '≥ 1 Sertifikat Internasional atau ≥ 5 Sertifikat Nasional',
                    '0.75'      => '2 - 4 Sertifikat Nasional',
                    '0.50'      => '1 Sertifikat Nasional atau 3 - 5 Sertifikat Regional',
                    '0.25'      => '< 3 Sertifikat Regional',
                );
                echo form_dropdown(
                    array(
                        'name' => 'sertifikat_prestasi',
                        'class' => 'form-control',
                        'id' => 'sertifikat_prestasi'
                    ), $options, $sertifikat_prestasi);
            ?>
        </div>
	    
        <div class="row">
            <div class="form-group col-lg-3">
                <label for="int">Foto Siswa <?php echo form_error('foto_siswa') ?></label>
                <input type="file" class="form-control" name="foto_siswa" id="foto_siswa" />
                
            </div>
            <div class="form-group col-lg-3">
            <?php
                if (isset($foto->foto_siswa)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_siswa)?>" style="width:60%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
            } ?>
            </div>
        </div>
        
        <div class="form-group col-lg-3">
            <label for="int">Foto KIP <?php echo form_error('foto_kip') ?></label>
            <input type="file" class="form-control" name="foto_kip" id="foto_kip" />
        </div>
        <div class="form-group col-lg-3">
            <?php
                if (isset($foto->foto_kip)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_kip)?>" style="width:40%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
            } ?>
        </div>
        
        <div class="row">
        <div class="form-group col-lg-3">
            <label for="int">Foto KKS <?php echo form_error('foto_kks') ?></label>
            <input type="file" class="form-control" name="foto_kks" id="foto_kks" />
        </div>
        <div class="form-group col-lg-3">
        <?php
                if (isset($foto->foto_kks)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_kks)?>" style="width:40%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
                } ?>
        </div>
        </div>
        
        <div class="form-group col-lg-3">
            <label for="int">Foto Struk Gaji <?php echo form_error('foto_strukgaji') ?></label>
            <input type="file" class="form-control" name="foto_strukgaji" id="foto_strukgaji" />
        </div>
        <div class="form-group col-lg-3">
        <?php
                if (isset($foto->foto_strukgaji)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_strukgaji)?>" style="width:40%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
            } ?>
        </div>
        
        <div class="row">
        <div class="form-group col-lg-3">
            <label for="int">Foto KK <?php echo form_error('foto_kk') ?></label>
            <input type="file" class="form-control" name="foto_kk" id="foto_kk" />
        </div>
        <div class="form-group col-lg-3">
        <?php
                if (isset($foto->foto_kk)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_kk)?>" style="width:60%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
            } ?>
        </div>
        </div>
        
        <div class="form-group col-lg-3">
            <label for="int">Foto Nilai Raport <?php echo form_error('foto_rapot') ?></label>
            <input type="file" class="form-control" name="foto_rapot" id="foto_rapot" />
        </div>
        <div class="form-group col-lg-3">
        <?php
                if (isset($foto->foto_rapot)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_rapot)?>" style="width:40%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
            } ?>
        </div>
        
        
        <div class="form-group col-lg-3">
            <label for="int">Foto Sertifikat Prestasi <?php echo form_error('foto_sertifikat') ?></label>
            <input type="file" class="form-control" name="foto_sertifikat" id="foto_sertifikat" />
        </div>
        <div class="form-group col-lg-3">
        <?php
                if (isset($foto->foto_sertifikat)) {
            ?>
                <img src="<?php echo base_url('assets/upload/'.$username.'/'.$foto->foto_sertifikat)?>" style="width:40%;">
            <?php }else{
                    echo 'Foto Tidak Ada';
            } ?>
        </div>
        
       
       
        
        <div class="form-group col-lg-12 text-center">
            <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a onclick="goBack()" class="btn btn-default">Cancel</a>
        </div>
	</form>
    <script>
    function goBack() {
        window.history.back();
    }
</script>