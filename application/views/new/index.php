<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo base_url(); ?>new/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>new/css/style.css" rel="stylesheet">
<style type="text/css">
	#header-wrapper.header-slider {
	background: #444 url('<?php echo base_url(); ?>assets/uploads/files/<?php echo $gambardepan; ?>') no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>
<link href="<?php echo base_url(); ?>new/color/default.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>new/img/favicon.ico">
<!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
======================================================= -->
</head>
<body>
<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<h1 class="brand"><a href="index.html">Maxim</a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">
					<li><a title="team" href="#about">Tentang Kami</a></li>
					<li><a title="services" href="#services">Visi & Misi</a></li>
					<li><a title="works" href="#works">Gallery</a></li>
					<li><a title="blog" href="#blog">Website</a></li>
					<li><a title="contact" href="#contact">Kontak Kami</a></li>
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Header area -->
<div id="header-wrapper" class="header-slider">
	<header class="clearfix">
	<div class="logo">
		<img src="<?php echo base_url(); ?>new/img/logo-image.png" alt="" />
	</div>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div id="main-flexslider" class="flexslider">
					<ul class="slides">
						<li>
						<p class="home-slide-content">
							<strong>Selamat Datang</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
						    <strong>di Pondok Pesantren</strong>
						</p>
						</li>
						<li>
						<p class="home-slide-content">
							<strong>Darul Salam Amtsilati</strong>
						</p>
						</li>
					</ul>
				</div>
				<!-- end slider -->
			</div>
		</div>
	</div>
	</header>
</div>
<section id="about" class="section">
<div class="container">
	<h4>Tentang Kami</h4>
	<div class="row">
		<div class="span4 offset1">
			<div>
				<h2>Pondok Pesantren Darul Salam Amtsilati</h2>
				<p>
					<?php echo $who; ?>
				</p>
			</div>
		</div>
		<div class="span6">
			<div class="aligncenter">
				<img src="<?php echo base_url(); ?>new/img/icons/creativity.png" alt="" />
			</div>
		</div>
	</div>
	<div class="row">
	<?php  
	$data=$this->db->get("aktor");
	$data=$data->result();
	$x=1;
	foreach ($data as $key) {
		?>
		<div class="span2 <?php echo $x==1?'offset1':''; ?> flyIn">
			<div class="people">
				<img class="team-thumb img-circle" src="<?php echo base_url(); ?>assets/uploads/files/<?php echo $key->foto; ?>" alt="" />
				<h3><?php echo $key->nama; ?></h3>
				<p>
					<?php echo $key->sebagai; ?>
				</p>
			</div>
		</div>
		<?php
	$x++;
	}
	?>
	</div>


</div>
<!-- /.container -->
</section>
<!-- end section: team -->
<!-- section: services -->
<section id="services" class="section orange">
<div class="container">
	<h4>Visi & Misi</h4>
	<!-- Four columns -->
	<div class="row">
	<?php  
	$data=$this->db->get("carousel");
	$data=$data->result();
	foreach ($data as $key) {
		?>
		<div class="span3 animated-fast flyIn">
			<div class="service-box">
				<img src="<?php echo base_url(); ?>upload/karosel/<?php echo $key->foto; ?>" alt="" />
				<h2><?php echo $key->judul; ?></h2>
				<p>
					<?php echo $key->ket; ?>
				</p>
			</div>
		</div>
		<?php
	}
	?>
	</div>
</div>
</section>
<!-- end section: services -->
<!-- section: works -->
<section id="works" class="section">
<div class="container clearfix">
	<h4>Gallery Foto</h4>
	<!-- portfolio filter -->
	<div class="row">
		<div id="filters" class="span12">
			<ul class="clearfix">
				<li><a href="#" data-filter="*" class="active">
				<h5>Semua</h5>
				</a></li>
				<?php  
				$data=$this->db->get("kategori_galery");
				$data=$data->result();
				foreach ($data as $key) {
					?>
					<li><a href="#" data-filter=".<?php echo $key->id; ?>hh"><h5><?php echo $key->kategori_galery; ?></h5></a></li>	
					<?php
				}
				?>
			</ul>
		</div>
		<!-- END PORTFOLIO FILTERING -->
	</div>
	<div class="row">
		<div class="span12">
			<div id="portfolio-wrap">
				<!-- portfolio item -->
				<?php  
				$data=$this->db->get("galery");
				$data=$data->result();
				foreach ($data as $key) {
					?>
				<div class="portfolio-item <?php echo $key->id; ?>hh">
					<div class="portfolio">
						<a href="<?php echo base_url(); ?>assets/uploads/files/<?php echo $key->foto; ?>" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="<?php echo base_url(); ?>assets/uploads/files/<?php echo $key->foto; ?>" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5><?php echo $key->nama; ?></h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
					</div>
				</div>		
					<?php
				}
				?>
				<!-- end portfolio item -->
			</div>
		</div>
	</div>
</div>
</section>
<!-- spacer section -->
<section class="spacer bg3">
<div class="container">
	<div class="row">
		<div class="span12 aligncenter flyLeft">
			<blockquote class="large">
				 <?php echo $katamutiara; ?>
			</blockquote>
		</div>
		<div class="span12 aligncenter flyRight">
			<i class="icon-rocket icon-10x"></i>
		</div>
	</div>
</div>
</section>
<!-- end spacer section -->
<!-- section: blog -->
<section id="blog" class="section">
<div class="container">
	<h4>Our Blog</h4>
	<!-- Three columns -->
	<div class="row">
<?php  
$data=$this->db->get("blog");
$data=$data->result();
foreach ($data as $key) {
	?>
	<div class="span3">
			<div class="home-post">
				<div class="post-image">
					<img class="max-img" src="<?php echo base_url(); ?>assets/uploads/files/<?php echo $key->foto; ?>" alt="" />
				</div>
				<div class="post-meta">
					<i class="icon-file icon-2x"></i>
					<span class="date">
						<?php  
							$date=date_create($key->release_date);
							echo date_format($date,"d M Y");
						?>
					</span>
					<span class="tags"><a href="#"><?php echo $key->kategori_website; ?></a></span>
				</div>
				<div class="entry-content">
					<h5><strong><a href="#"><?php echo $key->nama_website; ?></a></strong></h5>
					<p>
					<?php echo $key->ket; ?>
					</p>
					<a href="#" class="more">Read more</a>
				</div>
			</div>
		</div>
	<?php
}
?>
		
	</div>
	<div class="blankdivider30"></div>
	<div class="aligncenter">
		<a href="#" class="btn btn-large btn-theme">More blog post</a>
	</div>
</div>
</section>

<!-- end spacer section -->
<!-- section: contact -->
<section id="contact" class="section green">
<div class="container">
	<h4>Kontak Kami</h4>
	<p>
		 <?php echo $kontak; ?>
	</p>
	<div class="blankdivider30">
	</div>
	<div class="row">
		<div class="span12">
			<div class="cform" id="contact-form">
				<div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
				<form action="" method="post" role="form" class="contactForm">
					<div class="row">
						<div class="span6">
							<div class="field your-name form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
							</div>
							<div class="field your-email form-group">
								<input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
							</div>
							<div class="field subject form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
							</div>
						</div>
						<div class="span6">
							<div class="field message form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
							</div>
							<input type="submit" value="Send message" class="btn btn-theme pull-left">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ./span12 -->
	</div>
</div>
</section>
<footer>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<ul class="social-networks">
				<li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
				<li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
			</ul>
			<p class="copyright">
				&copy; Maxim Theme. All rights reserved.
                <div class="credits">
                    <!-- 
                        All the links in the footer should remain intact. 
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
                    -->
                    <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a> by BootstrapMade.com
                </div>
			</p>
		</div>
	</div>
</div>
<!-- ./container -->
</footer>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="<?php echo base_url(); ?>new/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>new/js/jquery.scrollTo.js"></script>
<script src="<?php echo base_url(); ?>new/js/jquery.nav.js"></script>
<script src="<?php echo base_url(); ?>new/js/jquery.localscroll-1.2.7-min.js"></script>
<script src="<?php echo base_url(); ?>new/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>new/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url(); ?>new/js/isotope.js"></script>
<script src="<?php echo base_url(); ?>new/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>new/js/inview.js"></script>
<script src="<?php echo base_url(); ?>new/js/animate.js"></script>
<script src="<?php echo base_url(); ?>new/js/validate.js"></script>
<script src="<?php echo base_url(); ?>new/js/custom.js"></script>
<script src="<?php echo base_url(); ?>new/contactform/contactform.js"></script>

</body>
</html>