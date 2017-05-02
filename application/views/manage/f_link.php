<?php
$mode	= $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
	$act		= "act_edit";
	$idp		= $datpil->id;
	$nama		= $datpil->nama;
	$alamat		= $datpil->alamat;
} else {
	$act		= "act_add";
	$idp		= "";
	$nama		= "";
	$alamat		= "";
}
?>
<form action="<?=base_URL()?>manage/link/<?=$act?>" method="post">
<input type="hidden" name="idp" value="<?=$idp?>">
	<fieldset><legend>Form</legend>
	
	<br>
	<label style="width: 200px; float: left">Nama</label><input class="input-large" type="text" name="nama" placeholder="Isikan namanya" value="<?=$nama?>" required><br>	<label style="width: 200px; float: left">Alamat</label><input class="input-xxlarge" type="text" name="alamat" placeholder="Isikan Alamatnya" value="<?=$alamat?>" required><br>
	
	<label style="width: 200px; float: left"></label><button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>