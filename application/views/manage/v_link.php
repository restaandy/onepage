<legend>Daftar </legend>
	
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>manage/link/add/', '_self')">Data Baru</button>
	
	<br><br>
			
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="5%">No</th>
						<th width="35%">Nama</th>
						<th width="35%">Alamat</th>
						<th width="25%">Control</th>
					</tr>
					
					<?php $i = 0 ?>
					<?php foreach ($data as $b):
					$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td><?=$b->nama?></td>
						<td style="text-align: center"><?=$b->alamat?></td>

						<td style="text-align: center">
						<a href="<?=$b->alamat?>" target="_blank">Test Link</a>  
						<a href="<?php echo base_URL(); ?>manage/link/edit/<?=$b->id?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>manage/link/del/<?=$b->id ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->nama?>..?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
