<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>


    <meta charset="utf-8">
   <?php
	if (empty($meta)) {
		echo "";
	} else {
		echo $meta;
	}
	?>

	<title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=base_URL()?>aset/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 10px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?=base_URL()?>aset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_URL()?>/favicon.ico">

  </head>
  
  <?php
		$l_val	= array("", "blog", "portofolio", "download", "bukutamu");
		$l_view	= array("Beranda", "Blog", "Portofolio", "Download", "Contact");
  ?>
  
  <body>  
	<div class="container well" style="width: 960px">
	
	<img src="<?=base_URL()?>aset/logo.gif" style="width: 70px; height: 70px; display: inline; margin: -5px 0 50px 0">
	<h3 style="margin: -120px 0 20px 90px; font-family: Georgia; font-size: 30px">Pondok Pesantren
Darul Falah Amtsilati</h3> <br>
	<small style="font-family: Times New Roman; font-size: 17px; margin: -40px 0 0 90px; display: inline; position: absolute">Alamat : </small>
	
	<div style="margin-top: -40px; font-family: tahoma" class="pull-right">
	<a href="<?=base_URL()?>tampil/bukutamu">Kontak Kami</a>  
	</div>
	
	
	<div class="navbar">
	  <div class="navbar-inner">
		<ul class="nav">
			<li><a href="<?=base_URL()?>tampil" class="depan">Beranda</a></li>
			<li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle depan">Profil &nbsp;&nbsp;<b class="caret"></b></a>		
				<ul class="dropdown-menu">
					<?php 
					$q_menu_profil = $this->db->query("SELECT id, judul FROM profil")->result();
					foreach ($q_menu_profil as $mp) {
					?>
					<li><a href="<?=base_URL()?>tampil/profil/<?=$mp->id?>/<?=getURLFriendly($mp->judul)?>"><?php echo $mp->judul?></a></li>
					<?php
					}
					?>
				</ul>
			</li>
			<li><a href="<?=base_URL()?>tampil/data_siswa" class="depan">Data Siswa</a></li>
			<li><a href="<?=base_URL()?>tampil/data_guru" class="depan">Data Guru</a></li>
			<li><a href="<?=base_URL()?>tampil/galeri" class="depan">Galeri</a></li>
		<?php
		/*
		for ($i = 0; $i < sizeof($l_val); $i++) {
			if ($this->uri->segment(2) == $l_val[$i]) {
				echo '<li class="active"><a href="'.base_URL().'tampil/'.$l_val[$i].'" rel="tooltip" data-placement="bottom" title="View '.$l_view[$i].'" id="tooltip'.($i).'">'.$l_view[$i].'</a></li>';
			} else {
				echo '<li><a href="'.base_URL().'tampil/'.$l_val[$i].'" rel="tooltip"  data-placement="bottom"  title="View '.$l_view[$i].'" id="tooltip'.($i).'">'.$l_view[$i].'</a></li>';
			}
		} */
		?>
		 
		</ul>
		<form class="navbar-form pull-right" method="post" action="<?php echo base_URL()?>index.php/tampil/cari">
		  <input type="text" class="span2" name="q" value="<?=$this->input->post('q')?>">
		  <button type="submit" class="btn">Cari</button>
		</form>
	  </div>
	  
	  
	</div>
	
	<div id="myCarousel" class="carousel slide" style="height: 250px">
               <div class="carousel-inner">
                <?php  
                $data=$this->db->get("carousel");
                $data=$data->result();
                $x=1;
                foreach ($data as $key) {
                	?>
                	<div class="item <?php echo $x==1?'active':''; ?>">
                    <img src="<?php echo base_URL()?>upload/karosel/<?php echo $key->foto; ?>" alt="" style="height: 250px">
                     <div class="carousel-caption">
                       <h4><?php echo $key->judul; ?></h4>
                       <p><?php echo $key->ket; ?></p>
                     </div>
                    </div>
                	<?php
                	$x++;
                }
                ?>
                </div>
                      
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>

			  
	
	

	<div class="row-fluid">
        <div class="span3">
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Interaktif Menu</li>
              <?php  
                $data=$this->db->query("select * from interaktif order by id asc");
                $data=$data->result();
                foreach ($data as $key) {
                	?>
                	<li><a href="<?php echo $key->link;?>"><?php echo $key->ket; ?></a></li>
                	<?php
                }
              ?>		 
			</ul>
          </div><!--/.well -->
		  
		  <?php 
		  if ($this->session->userdata('siswa_validated') != FALSE && $this->session->userdata('siswa_id') != "") {
		  ?>
			<div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
				<li class="nav-header" style="">Status Login Siswa</li>
				<li>Anda telah login, dengan username : "<b><?php echo $this->session->userdata('siswa_nis'); ?> (<?php echo $this->session->userdata('siswa_nama'); ?>)</b>"</li>
				<li><a href="<?php echo base_URL()?>tampil/logout_siswa">Logout</a></li>
			</ul>
          </div>
		  <?php 
		  } else {
		  ?>
		  <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Login Siswa</li>
				<form class="navbar-form" name="logsis" method="post" action="<?php echo base_URL()?>tampil/do_login_siswa">
				<input type="text" name="user_siswa" id="user_siswa" class="span12" placeholder="Username Siswa (NIS)" required>
				<input type="password" name="pass_siswa" class="span12" placeholder="Password Siswa  (NIS)" required>
				<input class="btn" type="submit" value="Login">
				</form>
				
			</ul>
          </div><!--/.well -->
		  <?php 
		  } 
		  ?>
		  
          <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Agenda Hari Ini</li>
				
				<?php
				$q_link	= $this->db->query("SELECT * FROM agenda WHERE MID(tgl, 6, 2) = MONTH(NOW())")->result();
				
				if (empty($q_link)) {
					echo "<p>Tidak ada agenda kegiatan di bulan ini</p>";
				} else {
					foreach($q_link as $ql) {
				?>
				
				<p><b><?=tgl_panjang($ql->tgl, "lm")?></b><br>
				<?=$ql->ket?> di <?=$ql->tempat?>
				</p>
		
				<?php 
					}
				}
				?>
						 
			</ul>
          </div><!--/.well -->
		  
		  <div class="wellwhite sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header" style="">Kalender</li>
				
				<?php echo $this->calendar->generate();?>
			</ul>
          </div><!--/.well -->
		  
		  
			 <div class="span12">
			  <ul id="myTab" class="nav nav-tabs">
			<li><a href="#poll" data-toggle="tab">Poll</a></li>
              <li class="active"><a href="#home" data-toggle="tab">Popular</a></li>
              <li><a href="#profile" data-toggle="tab">Tags</a></li>
            </ul>
			
            <div id="myTabContent" class="tab-content wellwhite" style="margin-top: -21px">
              <div class="tab-pane fade in active" id="home">
                <p>
				<ul class="nav-list" style="margin-left: 0px">
				<?php
					$q_berita_populer	= $this->db->query("SELECT * FROM berita ORDER BY hits DESC LIMIT 5")->result();
					
					foreach ($q_berita_populer as $d1) {
						echo "<li><a href='".base_URL()."index.php/tampil/blog/baca/".$d1->id."/".getURLFriendly($d1->judul)."'>".$d1->judul."</a></li>";
					
					}				
				?>
				</ul>				
				</p>
              </div>
              <div class="tab-pane fade" id="profile">
                <p>
				<ul class="nav-list" style="margin-left: 0px">
				<?php
					/*
					$q_berita_tag	= $this->db->query("SELECT K.id, K.nama AS nama, count(b.kategori) AS jml FROM berita b, kat K WHERE b.kategori=K.id ORDER BY jml DESC");
					$q_berita_tag=$q_berita_tag->result();
					print_r($q_berita_tag);
					die;
					foreach ($q_berita_tag as $d2) {
						echo "<li><a href='".base_URL()."index.php/tampil/kategori/".$d2->id."'>".$d2->nama." (".$d2->jml.")</a></li>";
					
					}
						*/		
				?>
				</ul>
				
				
				</p>
              </div>
			  <div class="tab-pane fade" id="poll">
                <p>
				<form action="<?php echo base_URL()?>index.php/tampil/post_poll" method="post">
				<?php 
				$poll = $this->db->query("SELECT * FROM poll ORDER BY id DESC LIMIT 1")->row();
				?>
				<h4 class="poll-title"><?php echo $poll->tanya;?></h4>
				<input type="hidden" name="id_poll" value="<?=$poll->id?>">
			
				<label><input type="radio" value="1" name="poll" id="satu" required> <?php echo $poll->op_1?></label>
				
				<label><input type="radio" value="2" name="poll" id="dua" required> <?php echo $poll->op_2?></label>
				
				<label><input type="radio" value="3" name="poll" id="tiga" required> <?php echo $poll->op_3?></label>
				
				<label><input type="radio" value="4" name="poll" id="empat" required> <?php echo $poll->op_4?></label>
				
				<input type="submit" class="btn btn-primary" value="Kirim"> &nbsp;&nbsp; <input type="button" value="Lihat Hasil" class="btn btn-primary" onclick="window.open('<?php echo base_URL()?>index.php/tampil/hasil_poll', '_self')">
				</form>
				
				</p>
              </div>
            </div>
			</div>
		  
        </div>

