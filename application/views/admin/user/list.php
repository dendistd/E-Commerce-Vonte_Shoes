<p>
	
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary">
		
		<i class="fa fa-plus"></i> Tambah
	</a>
</p>

<?php 
//Notif
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
 ?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Username</th>
			<th>Level</th>
			<th>Aksi</th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1;
		foreach ($user as $user) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->email ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->akses_level ?></td>
			<td>
				
				<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
				<a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Yakin ingin Menghapus Data?')"><i class="fa fa-trash-o"></i> Delete</a>
			
			</td>
		</tr>
	<?php $no++;} ?>
	</tbody>
</table>