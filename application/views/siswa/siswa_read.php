<?php
	if($status == 1){
		$status = 'Di Verifikasi';
	}elseif($status == -1){
		$status = 'Di Tolak';
	}else{
		$status = 'Belum Di Verifikasi';
	}
?>
        <h2 style="margin-top:0px">Detail Siswa</h2>
		<div><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_siswa; ?>" style="width:200px;height:250px;" /></div>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Nama Orangtua</td><td><?php echo $nama_orangtua; ?></td></tr>
	    <tr><td>Kip</td><td><?php echo $kip = 1 ? 'Memiliki' : 'Tidak Memiliki'; ?></td></tr>
	    <tr><td>Kks</td><td><?php echo $kks = 1 ? 'Memiliki' : 'Tidak Memiliki'; ?></td></tr>
	    <tr><td>Penghasilan Orangtua</td><td><?php echo $penghasilan_orangtua; ?></td></tr>
	    <tr><td>Jumlah Tanggungan</td><td><?php echo $jumlah_tanggungan; ?></td></tr>
	    <tr><td>Rata-rata Nilai Raport</td><td><?php echo $nilai_rapot; ?></td></tr>
	    <tr><td>Jumlah Sertifikat Prestasi</td><td><?php echo $sertifikat_prestasi; ?></td></tr>
		<tr><td>Poin Beasiswa</td><td><?php echo number_format($nilai_akhir,5); ?></td></tr>
		<tr><td>Status</td><td><?php echo $status; ?></td></tr>
		<tr><td>Foto KIP</td><td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_kip; ?>" style="width:200px;height:250px;" /></div>
		<tr><td>Foto KKS</td><td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_kks; ?>" style="width:200px;height:250px;" /></div>
		<tr><td>Foto Struk Gaji</td><td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_strukgaji; ?>" style="width:200px;height:250px;" /></div>
		<tr><td>Foto Kartu Keuarga</td><td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_kk; ?>" style="width:200px;height:250px;" /></div>
		<tr><td>Foto Nilai Raport</td><td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_rapot; ?>" style="width:200px;height:250px;" /></div>
		<tr><td>Foto Sertifikat</td><td><img src="<?php echo base_url(); ?>assets/upload/<?php echo $username.'/'.$foto_sertifikat; ?>" style="width:200px;height:250px;" /></div>
	    <tr><td></td><td><a href="#" onclick="window.history.go(-1); return false;" class="btn btn-default">Cancel</a></td></tr>
	</table>
    