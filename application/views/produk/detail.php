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

<section class="ftco-section">
 <div class="container">
    <div class="row">
        <div class="col-lg-6 mb-5 ftco-animate">
            <a href="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="image-popup"><img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" class="img-fluid" alt="<?php echo $produk->nama_produk ?>"></a> 
        </div>
        <?php 
        if($gambar) {
        foreach($gambar as $gambar) { ?>
        <div class="col-lg-6 mb-5 ftco-animate mt-3">
        <a href="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" class="image-popup"><img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" class="img-fluid" alt="<?php echo $gambar->judul_gambar ?>"></a>
        </div>
    </div>
        <?php }} ?>
                
    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <span><h3 ><?php echo $title ?></h3> </span>
                
        <?php 
        // form untuk memproses belanja

        echo form_open(base_url('belanja/add'));
        // elemen yang dibawa
        echo form_hidden('id', $produk->id_produk);
        // echo form_hidden('qty', 1);
        echo form_hidden('price', $produk->harga);
        echo form_hidden('name', $produk->nama_produk);
        // Elemen Redirect
        echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
         ?>
        <p><?php echo $produk->keterangan ?></p>
        <div class="pricing">
          <strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($produk->harga,'0',',','.') ?></div></strong>
        </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="form-group d-flex">  </div>
        </div>
        <div class="w-100"></div>
            <div class="input-group col-md-6 d-flex mb-3">
                <input type="number" id="quantity" name="qty" class="form-control input-number" value="1" min="0" max="100"> 
            </div>
        <div class="col-md-12">
        <span > Stock : <?php 
                        if($produk->stok == "0"){
                            echo " Stock Tidak Tersedia";
                        }else {
                        echo $produk->stok; }?></span>
                          
        </div>
                         <?php 
                            if($produk->stok == "0") {
                              echo "<span class='btn btn-danger' disable> Stock Habis </span>";
                            } else {
                              echo  '<button type="submit" value="submit" name="submit" class="btn bg-light mt-3"> <span>Add to cart <i class="ion-ios-cart ml-1"></i></span></button>';
          
                            }

                             ?>
        </div>
      
        
</div>  
<?php 
// closing form
echo form_close();
?>
</div>
</section>

    <section class="ftco-section bg-light">
        <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Ralated Products</h2>
          </div>
        </div>          
        </div>
<div class="container">
    <div class="row">

<?php foreach ($produk_related as $produk_related) { ?>
<div class="col-sm col-md-6 col-lg ftco-animate">

<div class="product">
    <a href="#" class="img-prod"><img class="img-fluid" src="<?php echo base_url ('assets/upload/image/'.$produk_related->gambar) ?>" alt="<?php echo $produk_related->nama_produk ?>">
<div class="overlay"></div>
</a>
    <!-- Item pertama -->
         <?php 
    // form untuk memproses belanja

    echo form_open(base_url('belanja/add'));
    // elemen yang dibawa
    echo form_hidden('id', $produk_related->id_produk);
    echo form_hidden('qty', 1);
    echo form_hidden('price', $produk_related->harga);
    echo form_hidden('name', $produk_related->nama_produk);
    // Elemen Redirect
    echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
     ?>

<div class="text text-center py-3 px-3"> 
    <h3><a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>"><?php echo $produk_related->nama_produk ?></a></h3>
    <div class="d-flex">
        <div class="pricing">
            <strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($produk_related->harga,'0',',','.') ?></div></strong>
        </div>
        
    </div>
    <p class="bottom-area d-flex px-3">

        <a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="buy-now text-center py-2"><span>Detail <i class="ion-ios-eye ml-1"></i></span></a>
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
</div>
</section>
