
	<legend>Daftar komentar masuk</legend>
	
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>index.php/manage/interaktif/add/', '_self')">Entri Baru</button>
	
	<br><br>
				
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="5%">No</th>
						<th width="5%">Keterangan</th>
						<th width="20%">Link</th>
						<th width="20%">Control</th>
					</tr>
					
					<?php 
					if (empty($komen)) {
						echo "<tr><td colspan='6' align='center'> Data not found </td></tr>";
					} else {
						$i = 0;
						foreach ($komen as $data) {
						$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td><?=$data->ket ?></td>
						<td><?=$data->link?></td>
						
						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>index.php/manage/interaktif/edit/<?php echo $data->id ?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>index.php/manage/interaktif/del/<?php echo $data->id?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->ket?>..?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						</td>
					</tr>	
					<?php  } 
					}
					?>
				</table>
