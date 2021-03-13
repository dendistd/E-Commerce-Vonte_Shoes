<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">

    	<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>'; 
		}?>

		<p class="alert alert-primary">Registrasi Berhasil Dilakukan. Untuk melakukan checkout silahkan login terlebih dahulu<a href="<?php echo base_url('masuk') ?>" class="btn btn-warning btn-sm" >Login Disini</a>. 
      
          
    </div>
  </div>
</section> <!-- .section -->