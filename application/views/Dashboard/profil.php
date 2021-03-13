<section class="ftco-section bg-light">
<div class="container">
	<div class="row">
		<div class="col-md-3 col-lg-2 sidebar">
	<div class="sidebar-box-2">
		
        <!--  -->
        <?php include('menu.php') ?>
	</div>
	</div>

	<div class="col-md-8">

	<!-- Ini tadinya Div class alert  -->
    <div>
     <!--  -->

        <h2> <?php echo $title ?></h2><hr>
       <?php
         // Notif 
           if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-warning">';
            echo $this->session->flashdata('sukses');
            echo '</div>'; 
            }
            
         //Display error
         echo validation_errors('<div class="alert alert-warning">','</div>');

         //Form Open
          echo form_open(base_url('dashboard/profil')); ?>
        
         <div class="row align-items-end">  
            <div class="col-md-12" > 
                <label>Nama Lengkap</label>
                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
            </div>

            <div class="col-md-12" > 
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly>
            </div>

            <div class="col-md-12" > 
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                 <span class="text-danger">Ketik Minimal 6 Karakter untuk mengganti password baru atau biarkan saja kosong</span>
            </div>

            <div class="col-md-12" > 
                <label>No Telepon/Handphone</label>
                <input type="text" name="telepon" class="form-control" placeholder="telepon" value="<?php echo $pelanggan->telepon ?>" required>

            </div>

            <div class="col-md-12" > 
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" placeholder="Alamat" ><?php echo $pelanggan->alamat ?></textarea>
            </div>

            <div class="col-md-12 " align="center">

            <button class="btn btn-warning mt-4 ml-3 mr-3" type="submit"><span style="color: black">Update Profil</span></button>

            <button class="btn btn-danger mt-4 ml-3 mr-3" type="reset"><span style="color: black">Reset</span></button>

             </div>

          </div>
       <?php echo form_close(); ?>
  
</div>
</div>
</div>
</div>
</section>
