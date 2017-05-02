<div class="span12">
		
		<div class="span12 wellwhite" style="margin-left: 0px">
		<legend style="margin-bottom: 10px">Slide Show</legend>
		<form action="<?=base_URL()?>index.php/manage/carousel/add" method="post" accept-charset="utf-8" enctype="multipart/form-data">	

			<legend>Tambah Slide Show</legend>
			<?php echo $this->session->flashdata("k");?>
			<label style="width: 150px; float: left">Judul</label><input class="span8" type="text" name="judul" placeholder="Isikan link" required><br>
			<label style="width: 150px; float: left">Keterangan</label><input type="text" class="span8" name="ket" placeholder="Isikan Keterangan" required><br>
			<label style="width: 150px; float: left">Gambar</label><input class="span8" type="file" name="file" required><br>	

			<label style="width: 150px; float: left"></label><button type="submit" class="btn btn-primary">Submit</button>
		</form>

		</div>
		<div class="span12 wellwhite" style="margin-left: 0px">
		<legend style="margin-bottom: 10px">Data Slide Show</legend>
		<table class="table table-border">
		<tr>
			<th>No</th>
			<th>Foto</th>
			<th>Judul</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
		<?php  
		$data=$this->db->get("carousel");
		$data=$data->result();
		$no=1;
		foreach ($data as $key) {
			?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><img src="<?php echo base_url(); ?>upload/karosel/<?php echo $key->foto; ?>" width="100" height="100"></td>
			<td><?php echo $key->judul; ?></td>
			<td><?php echo $key->ket; ?></td>
			<td><?php echo $key->id; ?></td>
		</tr>	
			<?php
		$no++;
		}
		?>
		</table>
		</div>