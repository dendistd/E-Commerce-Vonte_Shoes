<section class="ftco-section bg-light">
<div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-2 sidebar">
	<div class="sidebar-box-2">
		
        <!--  -->
        <?php include('menu.php') ?>
	</div>
	</div>

	<div class="col-md-6">
	
  <div class="alert alert-info">
    <h4 >Welcome <i><strong><?php echo $this->session->userdata('nama_pelanggan'); ?></strong></i></h4>
    
  </div>

  <?php 
        // Kalau ada transaksi, Tampilkan tabel
        if($header_transaksi) { ?>    

        <table class="table table-bordered table-striped" width="100%">
            <thead>
                <tr class="bg-warning">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Jumlah Total</th>
                    <th>Jumlah Item</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $header_transaksi->kode_transaksi ?></td>
                <td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                <td>Rp.<?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                <td><?php echo $header_transaksi->total_item ?></td>
                <td><?php echo $header_transaksi->status_bayar ?></td>
                <td>
                    <div class="ml-4">
                    <a href="<?php echo base_url('dashboard/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="ion-ios-eye"></i> Detail</a>

                    <a href="<?php echo base_url('dashboard/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="ion-ios-cloud-upload"></i> Konfirmasi</a>
                    </div>
                </td>
                
            </tr>
            <?php $i++; } ?>
        </tbody>
        </table>
        <?php 
        // Kalau gak tampilkan notifikasi
        }else{ ?>
            <p class="alert alert-success"> 
                <i class="fa fa-warning"></i> Belum Ada Data Transaksi 
            </p>
        <?php } ?>

</div>
</div>
</div>
</section>
