<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Page Title -->
		<title>Perolehan Suara</title>
		
		<!-- Page header -->
		<meta charset="utf-8"/>	
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="author" content=""/>
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<meta name="viewport" content="width=device-width"/>
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url('theme/css/bootstrap.min.css')?>"/>
		<link rel="stylesheet" href="<?php echo base_url('theme/css/style.css')?>"/>
		<link rel="stylesheet" href="<?php echo base_url('theme/css/padding-margin.css')?>"/>
		<link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>"/>
		<!-- Favicons -->		
		<link rel="shortcut icon" href="<?php echo base_url('theme/images/'.$icon);?>">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
		
	</head>
	<style>
		html {
  font-size: 20px;
}

	</style>
	<body class="content-animate">

		<!-- PRELOADER
		==================================================-->	
		<div class="page-loader">
			<div class="loader-area"></div>
			<div class="loader font-face1">loading...	
			</div>
		</div>   
		
		<!-- PAGE
		==================================================-->	
		<div id="top" class="page">
			
			<!-- Navigation panel
			================================================== -->		
			<?php echo $header;?>
				<!-- End Navigation panel -->
		
			<!-- Main Content
			==================================================-->		
			<main class="cd-main-content mt-100">

				
				
				<!-- SECTION ABOUT
				================================================== 	-->	
				<section class="page-section small-section">				
					<div class="container relative">
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<!-- SECTION BLOG ITEM
								================================================== -->
								<div class="blog-item clearfix">						
									
									
									<!--POST LEAVE COMMENT-->
									<div class="comments-heading text-center mb-30">
										<hgroup>
											<h2 class="font-face1 section-heading"><b>Perolehan Suara</b></h2></h2>
										</hgroup>									
									</div>
									<?php echo $this->session->flashdata('msg');?>
									<form method="post" action="<?php echo site_url('contact/send_suara');?>" role="form" class="form">
										<div class="form-group col-md-12 mx-auto">
											<label for="nama">Nama Relawan</label>
											<input type="text" class="form-control" required id="nama" name="nama" placeholder="Nama*">
										</div>
										<div class="form-group col-md-12 mx-auto mt-2">
											<label for="jabatan">Jabatan</label>
											<input type="text" class="form-control" required id="jabatan" name="jabatan" placeholder="Jabatan*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="alamat">Alamat</label>
											<input type="text" class="form-control" required id="alamat" name="alamat" autocomplete="off"  placeholder="Alamat*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="handphone">Nomor Handphone</label>
											<input type="number" class="form-control" required id="handphone" name="handphone"  placeholder="No Handphone*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="provinsi">Provinsi</label>
											<select class="form-control" id="provinsi" name="provinsi" onchange="get_kotaa(this.value)">
												<?php foreach ($provinsi as $pro): ?>
												<option value="<?= $pro[ 'id'] ?>" ><?= $pro['name'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="regencies">Kabupaten/Kota</label>
											<select class="form-control" id="regencies" name="regencies" onchange="get_kecamatann(this.value)">
											</select>
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="districts">Kecamatan</label>
											<select class="form-control" id="districts" name="districts" onchange="get_kelurahann(this.value)">
											</select>
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="villages">Kelurahan</label>
											<select class="form-control" id="villages" name="villages">
											</select>
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="desa">Desa</label>
											<input type="text" class="form-control" required  id="desa" name="desa"  placeholder="Desa*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="rw">Rw</label>
											<input type="text" class="form-control" required  id="rw" name="rw"  placeholder="Rw*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="rt">Rt</label>
											<input type="text" class="form-control" required  id="rt" name="rt"  placeholder="Rt*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="tps">Alamat TPS</label>
											<input type="text" class="form-control" required id="tps" name="tps" placeholder="Alamat TPS*">
										</div>
										<div class="form-group col-md-12 mx-auto">
											<label for="suara">Jumlah Suara</label>
											<input type="number" class="form-control" required id="suara" name="suara" placeholder="Jumlah suara*">
										</div>
										<div class="form-group col-md-6 mx-auto">
											<button type="submit" class="btn btn-primary ">Submit</button>
										</div>
									</form>
									<!--END POST LEAVE COMMENT-->
								</div>
							</div>
						</div>
					</div>					
				</section>								
				
				<!-- SECTION SUBSCRIBE
				================================================== -->
				<!-- <section  class="page-section subscribe-section small-section">
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">	
								<div class="form-subscribe mb-50 mb-sm-0">
									<div class="col-sm-6 mb-sm-40">
										<h2 class="heading5 mt-0 font-face1 white-color fw700 mb-0" >Newsletter.</h2>
									</div>
									<div class="col-sm-6">										
										<form class="form-inline" action="<?php echo site_url('subscribe');?>" method="post">
											<div class="form-group">
												<input type="hidden" name="url" value="<?php echo site_url('contact');?>" required>
												<input type="email" name="email" required placeholder="Your Email..." class="form-control">
												<button type="submit" class="btn btn-subscribe">Subscribe</button>
											</div>
										</form>										
									</div>
								</div>
								<div><?php echo $this->session->flashdata('message');?></div>									
							</div>
						</div>
					</div>
				</section> -->
				
				
				<hr class="nomargin nopadding"/>
				
				<!-- FOOTER
				================================================== -->	
				<?php echo $footer;?>
				
				</main>		
	
		</div>
			
		<!-- Modal Search-->
		<div class="modal fade" id="ModalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 10000;">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">	
		      	<form action="<?php echo site_url('search');?>" method="GET">
		        	<div class="input-group">
		              <input type="text" name="search_query" class="form-control input-search" style="height: 40px;" placeholder="Search..." required>
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit" style="height: 40px;background-color: #ccc;"><span class="fa fa-search"></span></button>
				      </span>
				    </div>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
		
		<!-- JAVASCRIPT
		==================================================-->
		<script src="<?php echo base_url('theme/js/jquery-2.2.4.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.easing.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/waypoints.min.js')?>"></script>		
		<script src="<?php echo base_url('theme/js/jquery.scrollTo.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.localScroll.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.viewport.mini.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.sticky.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.fitvids.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.parallax-1.1.3.js')?>"></script>
		<script src="<?php echo base_url('theme/js/isotope.pkgd.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/imagesloaded.pkgd.min.js')?>"></script> 
		<script src="<?php echo base_url('theme/js/masonry.pkgd.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.magnific-popup.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jquery.counterup.min.js')?>"></script>					
		<script src="<?php echo base_url('theme/js/slick.min.js')?>"></script>
		<script src="<?php echo base_url('theme/js/wow.min.js')?>"></script>		
		<script src="<?php echo base_url('theme/js/script.js')?>"></script>
		<script src="<?php echo base_url('theme/js/jssocials.min.js')?>"></script>	
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script>
			function get_kotaa(id) {
				$('#regencies').load(<?php base_url()?>'kota_show/'+id);
			}
			function get_kecamatann(id) {
				$('#districts').load(<?php base_url()?>'kecamatan_show/'+id);
				}
				function get_kelurahann(id) {
				$('#villages').load(<?php base_url()?>'kelurahan_show/'+id);
			}
		</script>
		
	</body>
</html>

