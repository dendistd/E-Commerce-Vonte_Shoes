<!-- Header untuk banner produk -->
 <div class="hero-wrap hero-bread" style="background-image: url(<?php echo base_url() ?>assets/template/images/bg_6.jpg);">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-0 bread"><?php echo $title ?></h1>
            <h3><?php echo $site->namaweb ?> | <?php echo $site->tagline ?></h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Untuk Header Banner Produk -->

<section class="ftco-section bg-light">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-2 sidebar">
	<div class="sidebar-box-2">
		<h2 class="heading mb-4">Kategori</h2>
		<ul>
			<?php foreach($listing_kategori as $listing_kategori) { ?>
			<li><a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>"><?php echo $listing_kategori->nama_kategori; ?></a></li>
			<?php } ?>		
		</ul>
	</div>
	</div>
		
		<div class="col-md-6 col-lg-10 order-md-last">
			<div class="row">
				<?php foreach($produk as $produk) { ?>
    			<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
    				 <?php 
                // form untuk memproses belanja

                echo form_open(base_url('belanja/add'));
                // elemen yang dibawa
                echo form_hidden('id', $produk->id_produk);
                echo form_hidden('qty', 1);
                echo form_hidden('price', $produk->harga);
                echo form_hidden('name', $produk->nama_produk);
                // Elemen Redirect
                echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
                 ?>
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">
    						<div class="overlay"></div>
    					</a>
    					<div class="text text-center py-3 px-3">
    						<h3><a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>"><?php echo $produk->nama_produk ?></a></h3>
    						<div class="d-flex">
    							 <div class="text text-center py-3 px-3">
		    						<strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($produk->harga,'0',',','.') ?></div></strong>
		    					</div>
		    					
	    					</div>

                            <?php if($produk->stok == "0") {          
                                    echo "<span class='text-danger'> Stock Kosong <i class='ion-ios-close-circle'> </i> </span>";   
                                    } else { echo  '<button type="submit" value="submit" class="btn btn-primary mr-2" name="submit"> <span>Add to cart <i class="ion-ios-cart ml-1"></i></span></button>';
                                    }

                                    ?>  

	    					<p class="bottom-area d-flex px-3">

							<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="buy-now text-center py-2"><span>Detail <i class="ion-ios-eye ml-1"></i></span></a>
						</p>
    					</div>
    				</div>
    				<?php 
                // closing form
                echo form_close();
                 ?>
    			</div>
    		<?php } ?>
    			
    		</div>
	<div class="row mt-5">
  <div class="col text-center text-center">
    <div class="block-27 text-center">
      <?php echo $pagin ?>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>
