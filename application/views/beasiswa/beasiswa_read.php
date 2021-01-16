<!doctype html>
<html>
   
    <body>
        <h2 style="margin-top:0px">Beasiswa Read</h2>
        <table class="table">
	    <tr><td>Nama Beasiswa</td><td><?php echo $nama_beasiswa; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
	    <tr><td>Tahun Beasiswa</td><td><?php echo $tahun_beasiswa; ?></td></tr>
	    <tr><td>Pemberi Beasiswa</td><td><?php echo $pemberi_beasiswa; ?></td></tr>
	    <tr><td></td><td><a href="#" onclick="window.history.go(-1); return false;" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>