<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/rekening/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama bank</label>
  <div class="col-md-5">
    <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo set_value('nama_bank') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nomor Rekening</label>
  <div class="col-md-5">
    <input type="number" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?php echo set_value('nomor_rekening') ?>" min="0" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Pemilik Rekening</label>
  <div class="col-md-5">
    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik Rekening" value="<?php echo set_value('nama_pemilik') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success" name="submit" type="submit">
      <i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info" name="reset" type="reset">
      <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>