<section class="ftco-section bg-light">
<div class="container">
<div class="row justify-content-center mb-3 pb-3">
<div class="col-md-12 heading-section text-center ftco-animate">
<h2 class="mb-4"> Categories</h2>
</div>
</div>
</div>
<div class="container">
<div class="row">
<?php foreach

($kategori as $kategori) { ?>
<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
<div class="product">
<a href="<?php echo base_url('produk/kategori/'.$kategori->slug_kategori) ?>" class="img-prod"><img class="img-fluid" src="<?php echo base_url ('assets/upload/image/'.$kategori->gambar) ?>" alt="<?php echo $kategori->nama_kategori ?>">
<div class="overlay"></div>
</a>
<div class="text text-center py-3 px-3">
<h3><a href="<?php echo base_url('produk/kategori/'.$kategori->slug_kategori) ?>"><?php echo $kategori->nama_kategori; ?></a></li></h3>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</section>