<div class="hero-wrap hero-bread" style="background-image: url(<?php echo base_url() ?>assets/template/images/bg_6.jpg);">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('home') ?>">Home</a></span> <span><?php echo $title ?></span></p>
            <h1 class="mb-0 bread"><?php echo $title ?></h1> 
          </div>
        </div>
      </div>
    </div>
<section class="ftco-section ftco-cart">
<div class="container">
<div class="row">
<div class="col-md-12 ftco-animate">
<div class="cart-list">

	<?php if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>'; 
		}?>
	
	<table class="table">

	    <thead class="thead-primary">
	      <tr class="text-center">
	        
	        <th>Gambar</th>
	        <th>Product</th>
	        <th>Harga</th>
	        <th>Jumlah</th>
	        <th>Sub-Total</th>
	        <th width="30%">Action</th>
	        
	      </tr>
	    </thead>
	    <?php 

	    // Looping data keranjang
	    foreach($keranjang as $keranjang) {
	    	// Ambil data produk
	    	$id_produk 	= $keranjang['id'];
	    	$produk 	= $this->produk_model->detail($id_produk);
	    	
	    	// Form Update
    		echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
	    	
	     ?>

	    <tbody>
	      <tr class="text-center">

	        <td class="image-prod"><div> <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>"></div></td>
	        
	        <td class="product-name">
	        	<h3><?php echo $keranjang['name'] ?></h3>
	        </td>
	        
	        <td class="price">RP. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
	        
	        <td class="quantity">
	        	<div class="input-group mb-3">
             	<input type="number" name="qty" class="num-product" value="<?php echo $keranjang['qty'] ?>" min="0"> 
          	</div>
          </td>
	        
	        <td class="total">RP. <?php  $sub_total = $keranjang['price'] * $keranjang['qty']; echo number_format($sub_total,'0',',','.') ?>
	        	
	        </td>

	        <td>
	        	
	        	<div>
	        	<button type="submit" name="update" class="btn btn-success btn-xs" style="width: 85px;"> <i class="ion-ios-create" style="color: white"></i><span style="color: white"> Update</span></button>
	        	<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="btn btn-danger"> <span style="color: white"><i class="ion-ios-trash" style="color: white" ></i> Delete</span></a>
	        </div>
	        </td>
	        
	      </tr><!-- END TR-->
	    </tbody>
	    <?php 
	     // Echo form close
	  		echo form_close();
	      // EndLooping Keranjang Belanja
	  		}
	  	 
	       ?>
	  </table>	
	  <div align="center" class="mt-2 mb-3 ml-4 mr-4">
	  	<a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger" > <i class="ion-ios-trash"></i> Hapus Keranjang Belanja</a>	
	  	</div>   			 
  </div>
</div>
</div>

<!-- card checkout dari template -->
<div class="row justify-content-center">
<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
<div class="cart-total mb-3">
	<h3>Cart Totals</h3>
	<p class="d-flex total-price">
		<span><strong>Total</strong></span>
		<span>= RP. <?php echo number_format($this->cart->total(),'0',',','.')  ?></span>
		<hr>
	</p>
</div>
<p class="text-center"><a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-primary py-3 px-4"> <strong>Proceed To Checkout  <i class="ion-ios-cart"></i> </strong> </a></p>
</div>
</div>
</div>
</section>