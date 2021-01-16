<!doctype html>
<html>
   
    <body>
        <h2 style="margin-top:0px">Beasiswa_siswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            
            <div class="col-md-4">
            <?php 
            if ($_SESSION['level'] != 'siswa'){
            ?>
                <?php  echo anchor(site_url('beasiswa_siswa/create'),'Create', 'class="btn btn-primary"'); ?>
                <?php } ?>
            </div>
            
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('beasiswa_siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('beasiswa_siswa'); ?>" class="btn btn-default">Reset</a>
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
		<th>Siswa</th>
		<th>Beasiswa</th>
		<th>Status</th>
        <th>Uang</th>
		<th>Action</th>
            </tr><?php
            foreach ($beasiswa_siswa_data as $beasiswa_siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $beasiswa_siswa->nama ?></td>
			<td><?php echo $beasiswa_siswa->nama_beasiswa ?></td>
			<td><?php echo $beasiswa_siswa->status_beasiswa_siswa?></td>
            <td><?php echo $beasiswa_siswa->status_uang?></td>
			<td style="text-align:center" width="200px">
            <div class="btn-group">
                  <button type="button" class="btn btn-info"><i class="fa fa-fw fa-eye"></i></button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('siswa/read/'.$beasiswa_siswa->id_siswa)?>">Siswa</a></li>
                    <li><a href="<?php echo site_url('beasiswa/read/'.$beasiswa_siswa->id_beasiswa)?>">Beasiswa</a></li>
                  </ul>
            </div>
            <?php 
            if ($_SESSION['level'] != 'siswa'){
            ?>
            <button type="button" class="btn btn-danger"><a style="color: white;" onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="<?php echo site_url('beasiswa_siswa/delete/'.$beasiswa_siswa->id_beasiswa_siswa)?>"><i class="fa fa-fw fa-trash"></i></a></button>
            <button type="button" class="btn btn-warning"><a style="color: white;" onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="<?php echo site_url('beasiswa_siswa/setTidakAktif/'.$beasiswa_siswa->id_beasiswa_siswa)?>"><i class="fa fa-fw fa-times"></i></a></button>
                <?php if($beasiswa_siswa->status_uang == 'Belum Cair'){ ?>
                    <button type="button" class="btn btn-success"><a style="color: white;" onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="<?php echo site_url('beasiswa_siswa/setCair/'.$beasiswa_siswa->id_beasiswa_siswa)?>"><i class="fa fa-fw fa-check"></i> Cair</a></button>
            <?php 
                    }
                } 
            ?>
            	<?php 
				// echo anchor(site_url('siswa/read/'.$beasiswa_siswa->id_siswa),'Read'); 
				// echo ' | '; 
				// echo anchor(site_url('beasiswa_siswa/update/'.$beasiswa_siswa->id_beasiswa_siswa),'Update'); 
				// echo ' | '; 
				// echo anchor(site_url('beasiswa_siswa/delete/'.$beasiswa_siswa->id_beasiswa_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a> -->
		<?php echo anchor(site_url('beasiswa_siswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('beasiswa_siswa/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>