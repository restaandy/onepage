
	<legend>Daftar Posting</legend>
	
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>index.php/manage/blog/add/', '_self')">Entri Baru</button>
	
	<br><br>
				
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="5%">No</th>
						<th width="45%">Judul</th>
						<th width="15%">Tgl. Posting</th>
						<th width="15%">Komentar</th>
						<th width="20%">Control</th>
					</tr>
					
					<?php $i = 0 ?>
					<?php foreach ($blog as $b):
					$j_komen	= $this->db->query("SELECT * FROM berita_komen WHERE id_berita = '".$b->id."'")->num_rows();
					
					$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td><?php echo $b->judul ?></td>
						<td><?=tgl_panjang($b->tglPost, "sm")?></td>
						<td style="text-align: center"><a href="<?php echo base_URL(); ?>index.php/manage/komentar_by_post/<?php echo $b->id ?>"><span class="icon-comment">&nbsp;&nbsp;&nbsp;&nbsp;(<?=$j_komen?>)</span></a></td>
						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>index.php/manage/blog/edit/<?php echo $b->id ?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>index.php/manage/blog/del/<?php echo $b->id ?>/<?php echo $b->gambar ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->judul?>..?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						<?php
						if ($b->publish == "0") {
						?>					
							<a href="<?php echo base_URL(); ?>index.php/manage/blog/pub/<?php echo $b->id ?>">Publish</a>
						<?php } else { ?>
							<a href="<?php echo base_URL(); ?>index.php/manage/blog/unpub/<?php echo $b->id ?>">Draft</a>
						<?php } ?>						
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
