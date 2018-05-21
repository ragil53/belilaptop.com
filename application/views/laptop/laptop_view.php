<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>belilaptop.com</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap4.css');?>">
</head>
<body>

	<div class="container">
		<h1>Belilaptop.com</h1>
		<h3>List Laptop</h3>
		<button class="btn btn-success" onclick="add_laptop()"><span class="glyphicon glyphicon-plus"></span>Add laptop</button>
		<br>
		<br>

		<table id="table_id" class="table table-stripped table-bordered">
			<thead>
				<th>ID Laptop</th>
				<th>Merek Laptop</th>
				<th>Type Laptop</th>
				<th>Stock</th>
				<th>Harga</th>
				<th>Action</th>
			</thead>

			<tbody>
			<?php
				foreach ($laptop as $laptop) {
			?>
				<tr>
					<td><?php echo $laptop->id_laptop ;?></td>
					<td><?php echo $laptop->merk ;?></td>
					<td><?php echo $laptop->type ;?></td>
					<td><?php echo $laptop->stok ;?></td>
					<td><?php echo $laptop->harga ;?></td>
					<td>
						<button type="button" class="btn btn-waring" onclick="edit_laptop(<?php echo $laptop->id_laptop; ?>)">Edit</button>
						<button class="btn btn-danger" onclick="delete_laptop(<?php echo $laptop->id_laptop; ?>)">Hapus</button>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap4.js');?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#table_id').dataTable();
		});

		var save_method;
		var table;

		function add_laptop(){
			save_method = 'add';
			$('#form')[0].reset();
			$('#modal_form').modal('show');
		}

		function save() {
			var url;

			if(save_method == 'add'){
				url = '<?php echo site_url('Laptop/laptop_add') ;?>';
			} else {
				url = '<?php echo site_url('Laptop/update_data') ;?>';
			}

			$.ajax({
				url: url,
				type: "POST",
				data: $('#form').serialize(),
				dataType: "JSON",
				success: function(data){
					$('#modal_form').modal('hide');
					location.reload();
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert('Error adding/ Update data');
				}
			});
		}

		function edit_laptop(id) {
			save_method = 'update';
			$('#form')[0].reset();

			$.ajax({
				url: "<?php echo site_url('laptop/edit_data/') ;?>/"+id,
				type: "GET",
				dataType: "JSON",
				success: function(data){
					$('[name="id_laptop"]').val(data.id_laptop);
					$('[name="merk"]').val(data.merk);
					$('[name="type"]').val(data.type);
					$('[name="stok"]').val(data.stok);
					$('[name="harga"]').val(data.harga);

					$('#modal_form').modal('show');
					$('.modal_title').text('Edit Laptop');
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert('Error Pengambilan Data Gagal');
				}
			});
		}

		function delete_laptop(id) {
			if(confirm('Are You Sure Delete This Data?')){

				$.ajax({
					url: "<?php echo site_url('Laptop/delete_laptop') ;?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						location.reload();
					},
					error: function(jqXHR, textStatus, errorThrown){
					alert('Error Gagal Delete Data');
					}
				});
			}
		}

	</script>

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title">Tambah Laptop</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body form">
      <form action="#" id="form" class="form-horizontal">
      	<input type="hidden" value="" name="id">

      	<div class="form-body">
      		<div class="form-group row">
      			<label class="col-md-3 col-form-label">Merk Laptop</label>
      			<div class="col-md-9">
      				<input type="text" name="merk" placeholder="Merk Laptop" class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group row">
      			<label class="col-md-3 col-form-label">Type Laptop</label>
      			<div class="col-md-9">
      				<input type="text" name="type" placeholder="Type Laptop" class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body">
      		<div class="form-group row">
      			<label class="col-md-3 col-form-label">Stock Laptop</label>
      			<div class="col-md-9">
      				<input type="text" name="stok" placeholder="Stock" class="form-control">
      			</div>
      		</div>
      	</div>

      	<div class="form-body ">
      		<div class="form-group row">
      			<label class="col-md-3 col-form-label">Harga</label>
      			<div class="col-md-9">
      				<input type="text" name="harga" placeholder="Harga" class="form-control">
      			</div>
      		</div>
      	</div>

      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" class="btn btn-primary">Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>