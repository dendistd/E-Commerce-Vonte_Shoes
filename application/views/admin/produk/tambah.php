<?php
// error upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/produk/tambah'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nama Produk</label>
  <div class="col-md-8">
    <input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" value="<?php echo set_value('nama_produk') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kode produk</label>
  <div class="col-md-8">
    <input type="text" name="kode_produk" class="form-control" placeholder="Kode produk" value="<?php echo set_value('kode_produk') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Kategori produk</label>
  <div class="col-md-8">
    <select name="id_kategori" class="form-control">
      <!-- looping untuk nama-nama kategori -->
      <?php foreach ($kategori as $kategori) { ?>
        <option value="<?php echo $kategori->id_kategori ?>">
          <?php echo $kategori->nama_kategori ?>
        </option>
      <?php } ?>
      <!-- end looping --> 
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Harga</label>
  <div class="col-md-8">
    <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo set_value('harga') ?>"  min="0" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Stok</label>
  <div class="col-md-8">
    <input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo set_value('stok') ?>" min="0" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Ukuran</label>
  <div class="col-md-8">
    <select name="ukuran" class="form-control">
      <option value="37">Size 37</option>
      <option value="38">Size 38</option>
      <option value="39">Size 39</option>
      <option value="40">Size 40</option>
      <option value="41">Size 41</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Keterangan</label>
  <div class="col-md-8">
    <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo set_value('keterangan') ?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Keyword (untuk SEO Google)</label>
  <div class="col-md-8">
    <textarea name="keywords" class="form-control" placeholder="Keyword (untuk SEO Google)"><?php echo set_value('keywords') ?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Upload gambar produk</label>
  <div class="col-md-8">
    <input type="file" name="gambar" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Status produk</label>
  <div class="col-md-8">
    <select name="status_produk" class="form-control">
      <option value="Publish">Publikasikan</option>
      <option value="Draft">Simpan sebagai draft</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-primary mr-2" name="submit" type="submit"><i class="fa fa-save"></i> Save </button>
    <button class="btn btn-danger" name="reset" type="reset"><i class="fa fa-times"></i> Reset </button>
  </div>
</div>	

<?php echo form_close(); ?>