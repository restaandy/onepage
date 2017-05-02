<?php
$mode	= $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
	$act		= "act_edit";
	$idp		= $datpil->id;
	$nama		= $datpil->nama;
	$nis		= $datpil->nis;
	$kelas		= $datpil->kelas;
	$jk			= $datpil->jk;
	$alamat		= $datpil->alamat;
} else {
	$act		= "act_add";
	$idp		= "";
	$nama		= "";
	$nis		= "";
	$kelas		= "";
	$jk			= "";
	$alamat		= "";
}
?>
<form action="<?=base_URL()?>manage/data_siswa/<?=$act?>" method="post">
<input type="hidden" name="idp" value="<?=$idp?>">
	<fieldset><legend>Form</legend>
	<br>
	<div class="alert alert-info">NIS otomatis akan menjadi password login siswa...!!</div>
	<?php echo $this->session->flashdata("k"); ?>
	<label style="width: 200px; float: left">Nama</label><input class="input-large" type="text" name="nama" placeholder="Isikan namanya" value="<?=$nama?>" required><br>
	<label style="width: 200px; float: left">NIS</label><input class="input-large" type="text" name="nis" placeholder="Isikan NISnya" value="<?=$nis?>" required><br>
	<label style="width: 200px; float: left">Kelas</label><select name="kelas" required><option value="">[Kelas]</option>
	<?php
	$d_kelas	= array("1", "2", "3", "4", "5", "6", "L");
	foreach($d_kelas as $dk) {
		if ($dk == $kelas) {
			echo "<option value='$dk' selected>$dk</option>";
		} else {
			echo "<option value='$dk'>$dk</option>";
		}
	}
	?>
	</select>
	<br>
	<label style="width: 200px; float: left">Jns Kelamin</label><select name="jk" required><option value="">[JK]</option>
	<?php
	$d_jk	= array("L", "P");
	foreach($d_jk as $dj) {
		if ($dj == $jk) {
			echo "<option value='$dj' selected>$dj</option>";
		} else {
			echo "<option value='$dj'>$dj</option>";
		}
	}
	?>
	</select>
	<br>
	<label style="width: 200px; float: left">Alamat</label><input class="input-xxlarge" type="text" name="alamat" placeholder="Isikan Alamatnya" value="<?=$alamat?>" required><br>
	
	<label style="width: 200px; float: left"></label><button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>