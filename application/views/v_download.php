 <div class="span9">
		<ul class="breadcrumb wellwhite">
			<li><a href="<?=base_URL()?>">Beranda</a> <span class="divider">/</span></li>
			<li><a href="<?=base_URL()?>index.php/tampil/download">Download</a> </li>
		</ul>
			<div class="row-fluid">
            <ul class="thumbnails">
              <?php
			  foreach ($download as $data) {
			  ?>
			  <li class="span4" style="margin-left: 0px; margin-right: 9px">
                <div class="thumbnail" style="height: 450px">
                  <img src="<?=base_URL()?>upload/download/icon/<?=$data->tipe?>.png" alt="<?=$data->nama?>">
                  <div class="caption">
                    <h3><?=$data->nama?></h3>
                    <p><?=$data->ket."   <b>(".$data->ukuran." KB)</b>"?></p>
                    <p><a href="<?=base_URL()?>upload/download/<?=$data->file?>" class="btn btn-primary" target="_blank">Download</a></p>
                  </div>
                </div>
              </li>
			  <?php
			  }
			  ?>
              
            </ul>
          </div>
