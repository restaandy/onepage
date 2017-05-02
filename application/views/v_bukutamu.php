<?php
/*
if ($this->uri->segment(3) == "edit" || $this->uri->segment(3) == "act_edit") {
	$id		= $det_pesan->id;
	$nama	= $det_pesan->nama;
	$email	= $det_pesan->email;
	$pesan	= $det_pesan->pesan;
	$act	= "act_edit";
} else {
	$id		= "";
	$nama	= "";
	$email	= "";
	$pesan	= "";
	$act	= "act_tambah";
}*/
?>
 <div class="span9">
		<ul class="breadcrumb wellwhite">
			<li><a href="<?=base_URL()?>">Beranda</a> <span class="divider">/</span></li>
			<li><a href="<?=base_URL()?>index.php/tampil/bukutamu">Contact Us</a> </li>
			
		</ul>

		<div class="span12 wellwhite" style="margin-left: 0px">
		  <div class="span5">
			<legend>Contact Us</legend>
			<ul>
				<li>Alamat : <b><br>Sumoroto, Sidoharjo, Samigaluh, Kulon Progo, Yogyakarta.</b></li>
				<li>Email : <b><a href="mailto:akhwan90@gmail.com">akhwan90@gmail.com</a></b></li>
				<li>YM : akhwan08@yahoo.com</li>
				<li>Whatsapp (no SMS) : <b>085292747190</b></li>
				<li>Blog : <b><a href="http://nur-akhwan.blogspot.com/">nur-akhwan.blogspot.com</a></b></li>
			</ul>
		  </div>

		  <div class="span1">
		  </div>

		  <div class="span6">
		  <legend style="margin-bottom: 10px">Tinggalkan pesan Anda disini</legend>
			<?php echo $this->session->flashdata("k");?>
            
			<!--
			<form method="post" id="f_bukutamu" action="<?=base_URL()?>index.php/tampil/bukutamu/simpan">
			<input type="hidden" name="id"  value="<?=$id?>">
			<table border="0">
				<tr><td width="30%">Nama</td><td><input type="text" name="nama" size="20" class="required" value="<?=$nama?>"></td></tr>
				<tr><td>Email</td><td><input type="text" name="email" size="20"  class="required" value="<?=$email?>"></td></tr>
				<tr><td>Pesan</td><td><input type="text" name="pesan" size="60" class="required" value="<?=$pesan?>"></td></tr>
				<tr><td></td><td><input type="submit" value="Kirim" id="tombol" class="btn btn-primary"></td></tr>
			</table>
			</form>
			-->
			
			<form method="post" id="f_bukutamu" action="<?=base_URL()?>index.php/tampil/bukutamu/simpan">
			<table border="0" width="100%">
				<tr><td width="15%">Nama</td><td><input type="text" name="nama" class="span8" required></td></tr>
				<tr><td>Email</td><td><input type="email" name="email"  class="span8" required></td></tr>
				<tr><td>Pesan</td><td><input type="text" name="pesan" class="span12" required></td></tr>
				<tr><td></td><td><input type="submit" value="Kirim" id="tombol" class="btn btn-primary"></td></tr>
			</table>
			</form>
			
			</div>
		</div>
		<!--
		<div class="span12 wellwhite" style="margin-left: 0px">
		  <legend style="margin-bottom: 10px">Daftar</legend>		
		  <?php
			$i = 1;
			foreach ($buku_tamu as $d) {
			if ($i % 2 == 0) { $b = "style='background: #efefef'"; } else { $b = ""; }
			?>
			<table border="0" width="90%" <?=$b?>>
				<tr><td width="30%">Nama</td><td>: <?=$d->nama?></td></tr>
				<tr><td>Email</td><td>: <?=$d->email?></td></tr>
				<tr><td>Pesan</td><td>: <?=$d->pesan?></td></tr>
				<tr><td>Tanggal</td><td>: <?=$d->tgl?></td></tr>
				<tr><td></td><td align="right"><a href="<?=base_URL()?>index.php/tampil/bukutamu/edit/<?=$d->id?>">Edit</a> | 
				<a href="<?=base_URL()?>index.php/tampil/bukutamu/hapus/<?=$d->id?>" onclick="return confirm('Anda yakin ingin menghapus pesan dari <?=$d->nama?> ..?');">Hapus</a></td></tr>
			</table>
			<?php 
			$i++;
			}
			?>			
        </div> <!-- /col-left -->



        