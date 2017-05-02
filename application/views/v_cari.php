 <div class="span9">
		<ul class="breadcrumb wellwhite">
			<li><a href="<?=base_URL()?>">Beranda</a> <span class="divider">/</span></li>
			<li>Hasil Pencarian</li>
		</ul>
        
		<div class="span12 wellwhite" style="margin-left: 0px">
		<legend>Pada Blogpost</legend>
		<?php
		if (empty($cari_berita)) {
			echo "Tidak ditemukan";
		} else {
			foreach ($cari_berita as $cb) { 
		?>
		 	<h5><?=$cb->judul?></h5>
			<p style="border-bottom: 1px dotted #808080; padding-bottom: 5px"><?=substr(strip_tags($cb->isi), 0, 200)." ... "?> <a href="<?=base_URL()?>index.php/tampil/blog/baca/<?=$cb->id?>/<?=getURLFriendly($cb->judul)?>">Read more</a></p>
		<?php
			}
		}
		?>
		  </div>		

		<div class="span12 wellwhite" style="margin-left: 0px">
		<legend>Pada Download</legend>
		<?php
		if (empty($cari_download)) {
			echo "Tidak ditemukan";
		} else {
			foreach ($cari_download as $cd) { 
		?>
		 	<h5><?=$cd->nama." ( ".$cd->ukuran." KB - Tipe file : ".strtoupper($cd->tipe).")"?></h5>
			<p><?=substr(strip_tags($cd->ket), 0, 200)." ... "?> <a href="<?=base_URL()?>index.php/tampil/download">View All</a></p>
		<?php
			}
		}
		?>
		</div>		

		<div class="span12 wellwhite" style="margin-left: 0px">
		<legend>Pada Portofolio</legend>
		<?php
		if (empty($cari_portofolio)) {
			echo "Tidak ditemukan";
		} else {
			foreach ($cari_portofolio as $cp) { 
		?>
		 	<h5><?=$cp->nama?></h5>
			<p><?=substr(strip_tags($cp->ket), 0, 200)." ... "?> <a href="<?=base_URL()?>index.php/tampil/portofolio">View All</a></p>
		<?php
			}
		}
		?>
		</div>		
