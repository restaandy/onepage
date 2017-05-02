<?php
$mode	= $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
	$act		= "act_edit";
	$id_data	= $komen_pilih->id;
	$nama		= $komen_pilih->ket;
	$pesan		= $komen_pilih->link;

} else {
	$act		= "act_add";
	$id_data	= "";
	$id_post	= "";
	$nama		= "";
	$email		= "";
	$pesan		= "";
}
?>
<form action="<?=base_URL()?>index.php/manage/interaktif/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	

<input type="hidden" name="id_data" value="<?=$id_data?>">

	<legend>Form komentar</legend>
	<?php echo $this->session->flashdata("k");?>

	<label style="width: 150px; float: left">Keterangan</label><input class="span4" type="text" name="ket" placeholder="Isikan nama menunya" value="<?=$nama?>" required><br>
	<label style="width: 150px; float: left">Link</label><input class="span8" type="text" name="link" placeholder="Isikan link" value="<?=$pesan?>" required><br>

	<label style="width: 150px; float: left"></label><button type="submit" class="btn btn-primary">Submit</button>
</form>