<!doctype html>
<html>
  
    <body>
        <h2>Beasiswa_siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Siswa</th>
		<th>Id Beasiswa</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($beasiswa_siswa_data as $beasiswa_siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $beasiswa_siswa->id_siswa ?></td>
		      <td><?php echo $beasiswa_siswa->id_beasiswa ?></td>
		      <td><?php echo $beasiswa_siswa->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>