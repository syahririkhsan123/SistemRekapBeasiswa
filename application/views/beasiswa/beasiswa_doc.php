<!doctype html>
<html>
 
    <body>
        <h2>Beasiswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Beasiswa</th>
		<th>Deskripsi</th>
		<th>Semester</th>
		<th>Tahun Beasiswa</th>
		<th>Pemberi Beasiswa</th>
		
            </tr><?php
            foreach ($beasiswa_data as $beasiswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $beasiswa->nama_beasiswa ?></td>
		      <td><?php echo $beasiswa->deskripsi ?></td>
		      <td><?php echo $beasiswa->semester ?></td>
		      <td><?php echo $beasiswa->tahun_beasiswa ?></td>
		      <td><?php echo $beasiswa->pemberi_beasiswa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>