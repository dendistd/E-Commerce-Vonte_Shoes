<div class="hero-wrap hero-bread" style="background-image: url(<?php echo base_url() ?>assets/template/images/bg_6.jpg);">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
      	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('home') ?>">Home</a></span> <span><?php echo $title ?></span></p>
        <h1 class="mb-0 bread">Checkout</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 ftco-animate">
		
			<h3 class="mb-4 billing-heading">Billing Details</h3>
			<?php 
				echo form_open(base_url('belanja/checkout/'));
				$kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
				 ?>
				<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
				<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
				<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">


          	<div class="row align-items-end">
          		<div class="row align-items-end">	

          	<div class="col-md-12" > 
          		<label>Kode transaksi</label>
          		<input type="text" name="kode_transaksi" class="form-control" placeholder="Nama Lengkap" value="<?php echo $kode_transaksi ?>" readonly required >
          	</div>
          			
          	<div class="col-md-12" > 
          		<label>Nama Penerima</label>
          		<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
          	</div>

          	<div class="col-md-12" > 
          		<label>Email Penerima</label>
          		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required>
          	</div>

          	<div class="col-md-12" > 
          		<label>No Handphone Penerima </label>
          		<input type="text" name="telepon" class="form-control" placeholder="telepon" value="<?php echo $pelanggan->telepon ?>" required>
          	</div>

          	<div class="col-md-12" > 
          		<label>Alamat Pengiriman </label>
          		<textarea name="alamat" class="form-control" placeholder="Alamat"> <?php echo $pelanggan->alamat ?> </textarea>
          	</div>

      <div class="row mt-5 pt-3 d-flex">
  		<div class="col-md-6">
  		<div class="cart-detail bg-light p-3 p-md-4">
  			<h3 class="billing-heading mb-4 text-center">Info Pembayaran</h3> <hr>

  			<p>
  				<span><p>Lakukan Pembayaran Ke Rekening Dibawah Ini :</p></span>

				<div align="center" class="btn-warning btn-sm"><strong>BCA : 1263527362426261</strong></div>

				<p style="text-align: justify;">Perlu Di ingat Batas Pembayaran 1 x 24 jam, Setelah melakukan pembayaran mohon untuk mengupload bukti pembayaran pada form upload bukti pembayaran</p>
  			</p>

			</div>
      	</div>
          
      	<div class="col-md-6 d-flex">
      		<div class="cart-detail cart-total bg-light p-3 p-md-4">

      			<strong><h2 class="billing-heading mb-4 text-center" >Cart Total</h2></strong><hr>
      			<p class="d-flex total-price">
					<strong>Pesanan Anda : </strong>

					<?php  foreach($keranjang as $keranjang) {
			    	// Ambil data produk
			    	$id_produk 	= $keranjang['id'];
			    	$produk 	= $this->produk_model->detail($id_produk); ?>

			    	<ul>
						<li>
					
					<span><?php echo $keranjang['name'] ?> </span> <br>
					<span><?php echo $keranjang['qty'] ?>  x <?php echo number_format($keranjang['price'],'0',',','.') ?> = Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.') ?>  </span><br></li></ul>

				<?php } ?> <hr> 
				<!-- end Looping -->

					<strong>Total</strong>
					<strong>= RP. <?php echo number_format($this->cart->total(),'0',',','.')  ?></strong><hr>

					<button type="submit" class="btn btn-primary">Checkout</button>
				</p>
			</div>
      	</div>

         <?php echo form_close(); ?>

      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->