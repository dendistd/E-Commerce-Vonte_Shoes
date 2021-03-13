
<?php 
// Error upload
if(isset($error)) {
	echo '<p class="alert alert-warning">'.$error.'</p>';
}

// Notif error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open_multipart(base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi));

 ?>

 <table class="table">
 	<tbody>
 		<tr>
 			<td>Status Pembayaran</td>
 			<td>
 				<select name="status_bayar" class="form-control">
 					
 			<option value="Diterima">Diterima</option>
                 <option value="Konfirmasi" <?php if($header_transaksi->status_bayar=="Konfirmasi"){ echo "selected"; } ?>>Konfirmasi</option>
                 <option value="Ditolak" <?php if($header_transaksi->status_bayar=="Ditolak"){ echo "selected"; } ?>>Ditolak</option>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td width="30%">Pembayaran via rekening</td>
 			<td>
 				<select name="id_rekening" class="form-control">
 					<?php foreach($rekening as $rekening) { ?>
 					<option value="<?php echo $rekening->id_rekening ?>" <?php if($header_transaksi->id_rekening==$rekening->id_rekening) { echo "selected"; } ?>>
 						<?php echo $rekening->nama_bank ?> (NO. Rekening: <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
 					</option>
 					<?php } ?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td>Tanggal Bayar</td>
 			<td>
 				<input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($header_transaksi->tanggal_bayar!="") { echo $header_transaksi->tanggal_bayar; }else{ echo date('d-m-Y'); } ?>">
 			</td>
 		</tr>
 		<tr>
 			<td>Jumlah Pembayaran</td>
 			<td>
 				<input type="number" name="jumlah_bayar" class="form-control-lg" placeholder="Jumlah pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); }elseif($header_transaksi->jumlah_bayar!="") { echo $header_transaksi->jumlah_bayar; }else{ echo $header_transaksi->jumlah_transaksi; } ?>">
 			</td>
 		</tr>
 		<tr>
 			<td>Dari Bank</td>
 			<td>
 				<input type="text" name="nama_bank" class="form-control" value="<?php echo$header_transaksi->nama_bank ?>" placeholder="Nama Bank">
 				<small>Misal: Bank Mandiri</small>
 			</td>
 		</tr>
 		<tr>
 			<td>Dari Nomor Rekening</td>
 			<td>
 				<input type="text" name="rekening_pembayaran" class="form-control" value="<?php echo $header_transaksi->rekening_pembayaran ?>" placeholder="Nomor Rekening">
 				<small>Misal: 43125678</small>
 			</td>
 		</tr>
 		<tr>
 			<td>Nama pemilik rekening</td>
 			<td>
 				<input type="text" name="rekening_pelanggan" class="form-control" value="<?php echo $header_transaksi->rekening_pelanggan ?>" placeholder="Nama pemilik Rekening">
 				<small>Misal: Arkan</small>
 			</td>
 		</tr>
 		<tr>
 			<td>Upload Bukti Bayar</td>
 			<td>
 				<input type="file" name="bukti_bayar" class="form-control"  placeholder="Upload Bukti Pembayaran">
 			</td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 				<div class="btn-group">
 					<button class="btn btn-success btn-lg" type="submit" name="submit"><i class="fa fa-upload"></i> Submit</button>
 					<button class="btn btn-info btn-lg" type="reset" name="reset"><i class="fa fa-times"></i> Reset</button>
 				</div>
 			</td>
 		</tr>
 	</tbody>
 </table>


<?php 
// FORM CLOSE
echo form_close();
?>
