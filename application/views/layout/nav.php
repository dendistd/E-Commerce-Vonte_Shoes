<?php 
//Ambil data Menu Konfigurasi
$nav_produk = $this->konfigurasi_model->nav_produk();
 ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container" >
	      <a class="navbar-brand" href="<?php echo base_url ('home') ?>"><img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?> "width="50px;" al="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>" >Vonte Shoes</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse " id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?php echo base_url('home') ?>" class="nav-link">Home</a></li>
	          
	          <li class="nav-item dropdown">
              	<a class="nav-link dropdown-toggle" href="<?php echo base_url('produk') ?>" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
              		<div class="dropdown-menu" aria-labelledby="dropdown04">
              		<?php foreach($nav_produk as $nav_produk) { ?>
              	
              	<a class="dropdown-item" href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>"> 
              		<?php echo $nav_produk->nama_kategori ?></a>
             		 <?php } ?>
             		 </div>
            	</li>

              <li class="nav-item"><a href="<?php echo base_url('produk') ?>" class="nav-link">Products</a></li>

	          <li class="nav-item ">
	          <!-- Jika user sudah login maka muncul nama dan mengarah ke dasbo -->
	          <?php if($this->session->userdata('email')) { ?>
	          <a href="<?php echo base_url('dashboard') ?>" class="nav-link"> <span class="icon-user"></span>
	          </a>

	          	<?php }else { ?>
	          	<a href="<?php echo base_url('registrasi') ?>" class="nav-link">Registrasi <span class="icon-user"></span></a> 


	      		<?php } ?>
	  			</li>

	          <li class="nav-item dropdown">
	          	 <?php 
	          // Cek data belanja ada atau tidak
	          $keranjang = $this->cart->contents();
	           ?>

	          	<a href="cart.html" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Keranjang <span class="icon-shopping_cart"></span>[<?php echo count($keranjang) ?>]</a>

	          	<div class="dropdown-menu ">
	          		<div class="scroll " style="overflow: scroll;height: 300px">
	          		
	          		<ul class="dropdown-item">
	          			<?php 
	          			// kalau gak ada databelanjaan 
	          			if(empty($keranjang)) { ?>
	          			<li class="nav-item">
	          				<p class="alert alert-success">Keranjang Belanja Kosong</p>
	          			</li>
	          			<?php 
	          			// Kalau ada 
	          			}else { 
	          			// Total belanja
	          				$total_belanja = 'Rp.'.number_format($this->cart->total(),'0',',','.');
	          			// Tampilkan data belanja
	          				foreach($keranjang as $keranjang) { 
	          					$id_produk = $keranjang['id'];
	          					//Ambil data produk 
	          					$produknya = $this->produk_model->detail($id_produk);
	          					?>
	          			
	          			<li class="nav-item">
	          				<div class="row">
	  
	          					<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="nav-item dropdown-item">
	          						<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" width="40px"> <?php echo $keranjang['name'] ?> <br>

	          						<span class="nav-item"><?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?> <br>Sub-total =  Rp. <?php echo number_format($keranjang['subtotal'],'0',',','.') ?> </span>
	          					</a>

	          					
	          				</div>

	          			</li>

			          		<?php 
			          		} //Tutup foreach keranjang

			          		} // tutup if
			          		?>
			          		<div class="mt-2">
			          			<span> Total : <?php if(!empty($keranjang)) { echo $total_belanja;} ?></span>
			          		</div>

			          		<button class="btn-sm btn-success"><a href="<?php echo base_url('belanja') ?>"><span>View Cart</span></a></button>

			          		<button class="btn-sm btn-primary"><a href="<?php echo base_url('belanja/checkout') ?>"><span>checkout</span> </a></button>
			          	</div>
	          			</ul>
	          		</div>

	          		</div>
	          	</li>
	          		</ul>
	          	</div>

	          </li>

	        </ul>

	      </div>
	    </div>	    
	  </nav>
    <!-- END nav -->
    
		