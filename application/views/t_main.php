 <div class="span9">
		<?php echo $this->session->flashdata("k"); ?>
		 <div class="span12 wellwhite" style="margin-left: 0px">
		  <legend>Selamat datang di website saya</legend>
		  
		  <?=$haldep->isi?>

		</div>

		<div class="span12 wellwhite" style="margin-left: 0px">
		  <legend>Index Berita</legend>
		  
		<?php
			foreach ($berita as $b) {
		?>
		<i><b><a href="<?=base_URL()?>tampil/blog/baca/<?=$b->id?>/<?=getURLFriendly($b->judul)?>"><?=$b->judul?></a></b></i>
		<p style="margin-top: 0px; font-size: 11px">Posted by : <b><?=$b->oleh?></b>,  pada : <b><?=tgl_panjang($b->tglPost, "lm")?></b>,  Dibaca <b><?=$b->hits?></b> kali</p>
		
		<p align="justify"><?=substr(strip_tags($b->isi), 0, 300)." ... "?> <a href="<?=base_URL()?>tampil/blog/baca/<?=$b->id?>/<?=getURLFriendly($b->judul)?>">[ Read more ]</a>
		</p>
		
		<?php 
			}
		?>

		</div>