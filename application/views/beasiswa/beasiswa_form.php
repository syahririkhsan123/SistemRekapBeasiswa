<!doctype html>
<html>
    
    <body>
        <h2 style="margin-top:0px">Beasiswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Beasiswa <?php echo form_error('nama_beasiswa') ?></label>
            <input type="text" class="form-control" name="nama_beasiswa" id="nama_beasiswa" placeholder="Nama Beasiswa" value="<?php echo $nama_beasiswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Semester <?php echo form_error('semester') ?></label>
            <?php
                $options = array(
                    'Ganjil'         => 'Ganjil',
                    'Genap'      => 'Genap',
                );
                echo form_dropdown(
                    array(
                        'name' => 'semester',
                        'class' => 'form-control',
                        'id' => 'semester'
                    ), $options);
            ?>
        </div>
	    <div class="form-group">
            <label for="date">Tahun Beasiswa <?php echo form_error('tahun_beasiswa') ?></label>
            <input type="text" class="form-control" name="tahun_beasiswa" id="tahun_beasiswa" placeholder="Tahun Beasiswa" value="<?php echo $tahun_beasiswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pemberi Beasiswa <?php echo form_error('pemberi_beasiswa') ?></label>
            <?php
                $options = array(
                    'Sekolah'         => 'Sekolah',
                    'Pemerintah'      => 'Pemerintah',
                );
                echo form_dropdown(
                    array(
                        'name' => 'pemberi_beasiswa',
                        'class' => 'form-control',
                        'id' => 'pemberi_beasiswa'
                    ), $options);
            ?>
        </div>
	    <input type="hidden" name="id_beasiswa" value="<?php echo $id_beasiswa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('beasiswa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>