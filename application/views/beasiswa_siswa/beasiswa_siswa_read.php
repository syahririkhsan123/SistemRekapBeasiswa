<!doctype html>
<html>
   
    <body>
        <h2 style="margin-top:0px">Beasiswa_siswa Read</h2>
        <table class="table">
	    <tr><td>Nama Siswa</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Nama Beasiswa</td><td><?php echo $nama_beasiswa; ?></td></tr>
	    <tr><td>Status</td><td><?php if($status == 1){
                            echo 'Sudah Diverifikasi';
                        }else if($status == 0){
                            echo 'Belum Diverifikasi';
                        }else {
                            echo 'Di Tolak';
                        } ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('beasiswa_siswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>