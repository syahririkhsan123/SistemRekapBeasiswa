<!doctype html>
<html>
    
    <body>
        <h2 style="margin-top:0px">Beasiswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('beasiswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('beasiswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('beasiswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Beasiswa</th>
		<th>Pemberi Beasiswa</th>
		<th>Action</th>
            </tr><?php
            foreach ($beasiswa_data as $beasiswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $beasiswa->nama_beasiswa ?></td>
			<td><?php echo $beasiswa->pemberi_beasiswa ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('beasiswa/read/'.$beasiswa->id_beasiswa),'Read'); 
				echo ' | '; 
				echo anchor(site_url('beasiswa/update/'.$beasiswa->id_beasiswa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('beasiswa/delete/'.$beasiswa->id_beasiswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('beasiswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('beasiswa/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>