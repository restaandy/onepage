<legend>Daftar </legend>
	
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>manage/data_siswa/add/', '_self')">Data Baru</button>
	
	<br><br>
			
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="5%">No</th>
						<th width="25%">Nama</th>
						<th width="10%">NIS</th>
						<th width="10%">Kelas</th>
						<th width="10%">JK</th>
						<th width="30%">Alamat</th>
						<th width="10%">Control</th>
					</tr>
					
					<?php $i = 0 ?>
					<?php foreach ($data as $b):
					$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td><?=$b->nama?></td>
						<td style="text-align: center"><?=$b->nis?></td>
						<td style="text-align: center"><?=$b->kelas?></td>
						<td style="text-align: center"><?=$b->jk?></td>
						<td><?=$b->alamat?></td>

						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>manage/data_siswa/edit/<?=$b->id?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>manage/data_siswa/del/<?=$b->id ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->nama?>..?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
