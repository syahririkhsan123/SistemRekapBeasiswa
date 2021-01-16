
        <h2 style="margin-top:0px">Siswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php 
                if($_SESSION['jabatan'] == 'admin') {
                echo anchor(site_url('siswa/create'),'Create', 'class="btn btn-primary"');
                }
                ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <!-- <div class="col-md-3 text-right">
                <form action="<?php echo site_url('siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('siswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
        </div>
        <select name="" id="nilai_akhir">
                <option value="1">Mampu</option>
                <option value="0">Tidak Mampu</option>
            </select>
        <table id="example" class="table table-bordered display" style="margin-bottom: 10px">
        <thead>
            <tr>
                <th style="width:50px;" class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kip</th>
                <th class="text-center">Kks</th>
                <th class="text-center">Hasil Akhir</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
                            <?php
            // print_r($siswa_data);
            foreach ($siswa_data as $siswa)
            {
                if ($siswa->status==1) {
                    $action="tolak";
                    $action1="";
                    $class="btn-success";
                    $status=-1;
                }else{
                    $action="verifikasi";
                    $action1="tolak";
                    $class="btn-danger";
                    $status=1;
                }
            
                
                ?>
                
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $siswa->nama ?></td>
			<td><?php echo ($siswa->kip == 1) ? 'Memiliki' : 'Tidak Memiliki' ?></td>
			<td><?php echo $siswa->kks == 1 ? 'Memiliki' : 'Tidak Memiliki' ?></td>
            <!-- <td><?php //echo ($nc1*$xc1)+($nc2*$xc2)+($nc3*$xc3)+($nc4*$xc4)+($nc5*$xc5)+($nc6*$xc6)?></td> -->
            <td>
                <?php echo $siswa->nilai_akhir > 0.5 ? 'Layak' : 'Kurang Layak' ;  ?>
                <?php //echo $siswa->nilai_akhir;  ?>
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn <?php echo $class?>">
                        <?php if($siswa->status == 1){
                            echo 'Sudah Diverifikasi';
                        }else if($siswa->status == 0){
                            echo 'Belum Diverifikasi';
                        }else {
                            echo 'Di Tolak';
                        } ?>
                    </button>
                    <button type="button" class="btn <?php echo $class?> dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <?php if($siswa->status==0){ ?>
                        <li><a href="<?php echo site_url('siswa/update_status/'.$siswa->id_siswa.'/'.$status)?>"><?php echo $action?></a></li>
                        
                        <?php if ($action1!='') { ?>
                            <li><a href="<?php echo site_url('siswa/update_status/'.$siswa->id_siswa.'/-1')?>"><?php echo $action1?></a></li>
                        <?php } ?>

                        <?php } ?>
                    </ul>
                </div>
            </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('siswa/read/'.$siswa->id_siswa),'Read'); 
                if($_SESSION['jabatan'] == 'admin') {
                echo ' | ';
				echo anchor(site_url('siswa/update/'.$siswa->id_siswa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('siswa/delete/'.$siswa->id_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                }
                ?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
        <th style="width:50px;" class="text-center">No</th>
		<th class="text-center">Nama</th>
		<th class="text-center">Kip</th>
        <th class="text-center">Kks</th>
        <th class="text-center">nilai_akhir</th>
        <!-- <th style="width:50px;" class="text-center">Status</th>
		<th class="text-center">Action</th> -->
            </tr>
        </tfoot>
        </table>
        <div class="row">
            <div class="col-md-6">
		<?php echo anchor(site_url('siswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('siswa/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <script>
           $(document).ready(function() {
                $('#example').DataTable( {
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
            
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
            
                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                } );
            } );
        </script>

        <script>
            // $.fn.dataTable.ext.search.push(
            //     function( settings, data, dataIndex ) {
            //         var status = parseInt( $('#nilai_akhir').val(),10 );
            //         var nilai_akhir = parseFloat( data[4] ) || 0; // use data for the age column
            
            //         if (nilai_akhir=='1'){
            //             if (nilai_akhir > 0.5) {
            //                 return true;
            //             }return false;
            //         }elseif (nilai_akhir=='0'){
            //             if (nilai_akhir < 0.5) {
            //                 return true;
            //             }return false;
            //         }
                    
            //     }
            // );
            
            // $(document).ready(function() {
            //     var table = $('#example').DataTable();
                
            //     // Event listener to the two range filtering inputs to redraw on input
            //     $('#nilai_akhir').keyup( function() {
            //         table.draw();
            //     } );
            // } );
        </script>