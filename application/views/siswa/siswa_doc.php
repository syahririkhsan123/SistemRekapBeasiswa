
        <h2>Siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Nama Orangtua</th>
		<th>Kip</th>
		<th>Kks</th>
		<th>Penghasilan Orangtua</th>
		<th>Kepemilikan Motor</th>
		<th>Jumlah Tanggungan</th>
		<th>Biaya Pbb</th>
		<th>Biaya Listrik</th>
		<th>Jarak Rumah</th>
		
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $siswa->nama ?></td>
		      <td><?php echo $siswa->username ?></td>
		      <td><?php echo $siswa->password ?></td>
		      <td><?php echo $siswa->tempat_lahir ?></td>
		      <td><?php echo $siswa->tanggal_lahir ?></td>
		      <td><?php echo $siswa->alamat ?></td>
		      <td><?php echo $siswa->nama_orangtua ?></td>
		      <td><?php echo $siswa->kip ?></td>
		      <td><?php echo $siswa->kks ?></td>
		      <td><?php echo $siswa->penghasilan_orangtua ?></td>
		      <td><?php echo $siswa->kepemilikan_motor ?></td>
		      <td><?php echo $siswa->jumlah_tanggungan ?></td>
		      <td><?php echo $siswa->biaya_pbb ?></td>
		      <td><?php echo $siswa->biaya_listrik ?></td>
		      <td><?php echo $siswa->jarak_rumah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
