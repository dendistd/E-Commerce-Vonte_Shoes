<div class="hero-wrap hero-bread" style="background-image: url(<?php echo base_url() ?>assets/template/images/bg_6.jpg);">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('home') ?>">Home</a></span> <span class="mr-2"><a href="<?php echo base_url('produk') ?>">Product</a></span> <span>Detail Produk</span></p>
            <h1 class="mb-0 bread"><?php echo $title ?></h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End div class Paling Atas -->

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
    	

      <div class="col-xl-8">
      	<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>'; 
		}?>
		<h3 class="mb-4 billing-heading"><?php echo $title ?></h3>
		<p class="alert alert-primary">Belum Punya Akun? Silakan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-warning btn-sm" >Registrasi Disini</a></p>
         
         <?php
         //Display error
         echo validation_errors('<div class="alert alert-warning">','</div>');

         // Display notifikasi error login 
         if($this->session->flashdata('warning')) {
          echo '<div class="alert alert-warning">';
          echo $this->session->flashdata('warning');
          echo '</div>';
         }

         //Form Open
          echo form_open(base_url('masuk')); ?>
        
         <div class="row align-items-end">	
          	

          	<div class="col-md-12 " > 
          		<label>Email (username) </label>
          		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
          	</div>

          	<div class="col-md-12" > 
          		<label>Password</label>
          		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
          	</div>

          	<div class="col-md-12 " align="center">

            <button class="btn btn-warning mt-4 ml-3 mr-3" type="submit"><span style="color: black">Login</span></button>

            <button class="btn btn-danger mt-4 ml-3 mr-3" type="reset"><span style="color: black">Reset</span></button>

       		 </div>

          </div>
       <?php echo form_close(); ?>

      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->