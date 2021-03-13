<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <h3>Checkout Berhasil</h3>
    </div>

    	<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>'; 
		}?>

		<p class="alert alert-success"> Terimakasih, Pesanan Anda Akan Segera Kami Proses</p>
          
    </div>
  </div>
</section> <!-- .section -->