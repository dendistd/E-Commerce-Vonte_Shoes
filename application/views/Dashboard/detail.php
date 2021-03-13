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
        <h2> <?php echo $title ?></h2><br>
        <p>Riwayat Belanja Anda</p>

        <?php 
        // Kalau ada transaksi, Tampilkan tabel
        if($header_transaksi) { ?>    

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="20%">Kode Transaksi</th>
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
            </tbody>
        </table>

        <table class="table table-bordered table-striped" width="100%">
            <thead>
                <tr class="bg-warning">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub-Total</th>
                </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($transaksi as $transaksi) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $transaksi->kode_produk ?></td>
                <td><?php echo $transaksi->nama_produk ?></td>
                <td><?php echo number_format($transaksi->jumlah) ?></td>
                <td><?php echo number_format($transaksi->harga) ?></td>
                <td><?php echo number_format($transaksi->total_harga) ?></td>
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
</div>
</section>
