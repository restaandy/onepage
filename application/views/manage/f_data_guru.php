<?php
$mode	= $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
	$act		= "act_edit";
	$idp		= $datpil->id;
	$nama		= $datpil->nama;
	$nip		= $datpil->nip;
	$mapel		= $datpil->mapel;
	$jk			= $datpil->jk;
	$alamat		= $datpil->alamat;
} else {
	$act		= "act_add";
	$idp		= "";
	$nama		= "";
	$nip		= "";
	$mapel		= "";
	$jk			= "";
	$alamat		= "";
}
?>
<form action="<?=base_URL()?>manage/data_guru/<?=$act?>" method="post">
<input type="hidden" name="idp" value="<?=$idp?>">
	<fieldset><legend>Form</legend>
	
	<br>
	<label style="width: 200px; float: left">Nama</label><input class="input-large" type="text" name="nama" placeholder="Isikan namanya" value="<?=$nama?>" required><br>
	<label style="width: 200px; float: left">NIP</label><input class="input-large" type="text" name="nip" placeholder="Isikan NIPnya" value="<?=$nip?>" required><br>
	<label style="width: 200px; float: left">Mapel</label><input class="input-xlarge" type="text" name="mapel" placeholder="Isikan Mapelnya" value="<?=$mapel?>" required><br>
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