<!doctype html>
<html>

    <body>
        <h2 style="margin-top:0px">Beasiswa_siswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <!-- <div class="form-group">
            <label for="int">Id Siswa <?php echo form_error('id_siswa') ?></label>
            <input type="text" class="form-control" name="id_siswa" id="id_siswa" placeholder="Id Siswa" value="<?php echo $id_siswa; ?>" />
        </div> -->
        <div class="form-group ">
            <label for="int">Siswa <?php echo form_error('id_siswa') ?></label>
            <select name="id_siswa[]" class="form-control select2" multiple="multiple" data-placeholder="Pilih Siswa" >
            <?php foreach ($siswa_data as $siswa) { ?>
                <option value="<?php echo $siswa->id_siswa ?>"><?php echo $siswa->nama ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group ">
            <label for="int">Beasiswa <?php echo form_error('id_beasiswa') ?></label>
            <select name="id_beasiswa" class="form-control">
            <?php foreach ($beasiswa_data as $beasiswa) { ?>
                <option value="<?php echo $beasiswa->id_beasiswa ?>"><?php echo $beasiswa->nama_beasiswa ?></option>
            <?php } ?>
            </select>
        </div>
	    <!-- <div class="form-group">
            <label for="int">Id Beasiswa <?php echo form_error('id_beasiswa') ?></label>
            <input type="text" class="form-control" name="id_beasiswa" id="id_beasiswa" placeholder="Id Beasiswa" value="<?php echo $id_beasiswa; ?>" />
        </div> -->
        <div class="form-group ">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>
        </div>
	    <!-- <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div> -->
	    <input type="hidden" name="id_beasiswa_siswa" value="<?php echo $id_beasiswa_siswa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('beasiswa_siswa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>