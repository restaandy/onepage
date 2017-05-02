        </div><!--/span-->
		
			<div class="span12" style="margin-left: 5px">
				<div class="span6 wellwhite">
				<div class="span12">
				<legend>Galeri Foto</legend>
				<?php 
				$q_galeri_depan = $this->db->query("SELECT * FROM galeri ORDER BY id DESC LIMIT 8")->result();
				
				foreach($q_galeri_depan as $qg) {
					echo "<a class='fancybox' href='".base_URL()."upload/galeri/".$qg->file."' data-fancybox-group='gallery' title='Foto'><img class='span3 image-polaroid' src='".base_URL()."upload/galeri/small/S_".$qg->file."' style='height: 70px; margin: 0 8px 10px 0'></a>";
				}
				?>
				</div>
				
				</div>
				<div class="span3 wellwhite">
				<legend>Tautan</legend>
					<ul>	
						<?php 
						$q_link 	= $this->db->query("SELECT * FROM link LIMIT 5")->result();
						foreach ($q_link as $ql) {
						?>
							<li><a style="font-size: 12px" href="<?=$ql->alamat?>" target="blank"><?=$ql->nama?></a></li>
						<?php 
						}
						?>
						
					</ul>
				</div>
				<div class="span3 wellwhite">
				<legend>Statistik</legend>
					<ul>
						<li>IP Anda : <?php echo $this->input->ip_address(); ?></li>
						<li>Browser Anda : <?php echo $this->input->user_agent(); ?></li>
					</ul>
				</div>

			</div>

	
		
      </div><!--/row-->
		<hr>	

     <footer>
		
	</footer>



    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_URL()?>aset/js/jquery.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-transition.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-alert.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-modal.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tab.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-popover.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-button.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-collapse.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-carousel.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript" src="<?=base_URL()?>aset/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?=base_URL()?>aset/fancybox/jquery.mousewheel.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_URL()?>aset/fancybox/jquery.fancybox.css" media="screen" />


	<script type="text/javascript">

	$(document).ready(function() {
		var $= jQuery.noConflict();
		$(".fancybox").fancybox();
	});
	
	$('.carousel').carousel({
		interval: 3000
	});
	
	$(function () {
		$('#myTab a:first').tab('show');
	});
	</script>
  </body>
</html>