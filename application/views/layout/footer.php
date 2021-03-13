<?php 
//Load data konfigurasi website
$site = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();

 ?>
<footer class="ftco-footer bg-light ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><strong><?php echo $site->namaweb ?></strong></h2>
              <p><?php echo $site->deskripsi ?></p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://web.facebook.com/Vonte-Shoes-111580980630248"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://api.whatsapp.com/send?phone=+6285694479387&text=Hallo%20Min"><span class="icon-whatsapp"></span></a></li>
                <li class="ftco-animate"><a href="https://instagram.com/vonte.co?igshid=7dusajh9xogx"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Kategori</h2>
              <div class="d-flex">
              <ul class="list-unstyled mr-4">
                <?php foreach($nav_produk_footer as $nav_produk_footer) { ?>
                <li>
                  <a href="echo base_url('produk/kategori/'/$nav_produk_footer->slug_kategori)" class="py-2 d-block">
                    <?php echo $nav_produk_footer->nama_kategori ?>
                  </a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
           <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Menu</h2>
              <div class="d-flex">
                <ul class="list-unstyled mr-4">               
                 <li><a href="<?php echo base_url('produk') ?>" class="py-2 d-block"><strong>Products</strong></a></li>
              </ul>
            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Info</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo nl2br($site->alamat) ?></span></li> <br>
	                <li><a href="https://api.whatsapp.com/send?phone=+6285694479387&text=Hallo%20Min"><span class="icon icon-phone"></span><span class="text"><?php echo $site->telepon ?></span></a></li><br>
	                <li><a href="https://mail.google.com/mail/u/2/#inbox"><span class="icon icon-envelope"></span><span class="text"><?php echo $site->email ?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p> Copyright ©Vonte-Shoes 2020
						</p>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  <script src="<?php echo base_url() ?>assets/template/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/aos.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/scrollax.min.js"></script>
  <script src="<?php echo base_url() ?>assets/template/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url() ?>assets/template/js/google-map.js"></script>
  <script src="<?php echo base_url() ?>assets/template/js/main.js"></script>
    
  </body>
</html>