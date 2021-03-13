<section class="ftco-section bg-light">
<div class="container">
	<div class="row">
		<div class="col-md-3 col-lg-2 sidebar">
	<div class="sidebar-box-2">
		
        <!--  -->
        <?php include('menu.php') ?>
	</div>
	</div>

	<div class="col-md-4">
	<!-- Ini tadinya Div class alert  -->
    <div>
     <!--  -->
        <h2> <?php echo $title ?></h2><br>

        <?php 
        // Kalau ada transaksi, Tampilkan tabel
        if($header_transaksi) { ?>    

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>: <?php echo $header_transaksi->kode_transaksi ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                </tr>

                <tr>
                    <td>Jumlah Total</td>
                    <td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                </tr>

                <tr>
                    <td>Status Bayar</td>
                    <td>: <?php echo $header_transaksi->status_bayar ?></td>
                </tr>

                <tr>
                    <td>Bukti Bayar</td>
                    <td>: <?php if($header_transaksi->bukti_bayar !="") { ?> 
                        <img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200" >
                    <?php }else{ echo 'Bukti Bayar Belum Ada'; } ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>

        <?php 
        // Error upload
        if(isset($error)) {
            echo 'p class="alert alert-danger">'.$error.'</p>';

             }
             // Notifikasi error
             echo validation_errors('p class="alert alert-danger">','</p>');

             // Form Open
             echo form_open_multipart(base_url('dashboard/konfirmasi/'.$header_transaksi->kode_transaksi));
         
            ?>
        
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Pembayaran Ke Rekening</td>
                    <td>
                        <select name="id_rekening" class="form-control">
                            <?php foreach($rekening as $rekening) { ?>
                            <option value="<?php echo $rekening->id_rekening ?>" <?php if($header_transaksi->id_rekening==$rekening->id_rekening) { echo "selected"; } ?> >
                                <?php echo $rekening->nama_bank ?> (NO. Rekening : <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
                            </option>
                             <?php } ?>
                        </select>
                    </td>
                </tr>
           
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>
                        <input type="text" name="tanggal_bayar" class="form-control" placeholder="dd/mm/yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif ($header_transaksi->tanggal_bayar!="") { echo $header_transaksi->tanggal_bayar; } else{ echo date('d-m-Y'); } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Pembayaran</td>
                    <td>
                        <input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); }elseif($header_transaksi->jumlah_bayar!="") { echo $header_transaksi->jumlah_bayar;} else { echo $header_transaksi->jumlah_transaksi; } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Dari Bank</td>
                    <td>
                        <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $header_transaksi->nama_bank ?>">
                        <small>Misal : Bank BCA</small>
                    </td>
                </tr>
                <tr>
                    <td>Dari Nomor Rekening</td>
                    <td>
                        <input type="text" name="rekening_pembayaran" class="form-control" placeholder="Nomor Rekening " value="<?php echo $header_transaksi->rekening_pembayaran ?>">
                        <small>Misal : 242514251</small>
                    </td>
                </tr>
                <tr>
                    <td>Nama Pemilik Rekening</td>
                    <td>
                        <input type="text" name="rekening_pelanggan" class="form-control" placeholder="Nama Pemilik Rekening " value="<?php echo $header_transaksi->rekening_pelanggan ?>">
                        <small>Misal : Budi</small>
                    </td>
                </tr>

                <tr>
                    <td>Upload Bukti Bayar</td>
                    <td>
                        <input type="file" name="bukti_bayar" class="form-control" placeholder="Upload Bukti Pembayaran" >
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="ml-4 ">
                            <button class="btn btn-info " type="submit" name="submit"><i class="ion-ios-send"></i> Submit</button>

                             <button class="btn btn-danger" type="reset" name="reset"><i class="ion-ios-time"></i> Reset</button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php 
        // FORM CLOSE
        echo form_close();
        // Kalau gak tampilkan notifikasi
        }else { ?>
            <p class="alert alert-success"> 
                <i class="fa fa-warning"></i> Belum Ada Data Transaksi 
            </p>
        <?php } ?>
  
</div>
</div>
</div>
</div>
</section>
