<table class="table table-bordered table-striped" width="100%">
    <thead>
        <tr class="bg-info">
            <th>No</th>
            <th>Pelanggan</th>
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
        <td><?php echo $header_transaksi->nama_pelanggan ?>
        	<br><small>
        		Telepon : <?php echo $header_transaksi->telepon ?>
        		<br>Email : <?php echo $header_transaksi->email ?>
        		<br> Alamat Pengiriman : <br> <?php echo nl2br($header_transaksi->alamat )?>
        	</small>
        </td>
        <td><?php echo $header_transaksi->kode_transaksi ?></td>
        <td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
        <td>Rp.<?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
        <td><?php echo $header_transaksi->total_item ?></td>
        <td><?php echo $header_transaksi->status_bayar ?></td>
        <td>
            <div class="ml-4">
            <a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="ion-ios-eye"></i> Detail</a>

            <a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-success btn-sm"><i class="ion-ios-cloud-upload"></i> Cetak</a>

            <a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="ion-ios-checkmark"></i> Update Status</a>
            </div>

            <br>
             <div class="ml-4">
            <a href="<?php echo base_url('admin/transaksi/pdf/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Unduh PDF </a>

            <a href="<?php echo base_url('admin/transaksi/kirim/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Pengiriman</a>

            
            </div>

        </td>
        
    </tr>
    <?php $i++; } ?>
</tbody>
</table>