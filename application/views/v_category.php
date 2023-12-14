<header class="page-header palette-1" style="border-bottom: 2px rgba(255, 166, 0, 0.432) solid">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Movie Genres</h2>
  </div>
</header>
<div class="container-fluid">
<div class="table-agile-info">
		<?php if ($this->session->userdata('level')=="admin"): {
			
		}  ?>
			
			<?php if ($this->session->flashdata('message')!=null) {
			echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>"
			.$this->session->flashdata('message')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button> </div>";
		} ?>
			<?php elseif ($this->session->userdata('level')=="Customer"): {
				
			} ?>
		<?php endif  ?>
		<div class="card rounded-0 mt-3">
			<div class="card-header">
					<a href="#add" data-toggle="modal" class="btn btn-warning btn-sm rounded-3 pull-right p-2" style="border: none; color: white;"><i class="fa fa-plus"></i> Add New genre</a>
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="example" style="background-color: #eef9f0; border-radius: 10px; overflow: hidden;" ui-options=ui-options="{
						&quot;paging&quot;: {
						&quot;enabled&quot;: true
						},
						&quot;filtering&quot;: {
						&quot;enabled&quot;: true
						},
						&quot;sorting&quot;: {
						&quot;enabled&quot;: true
						}}">
					<thead style="background-color: orange; color:white;">
						<tr>
							<td>#</td>
							<td>Genre Code</td>
							<td>Genre Name</td>
							<td>Action</td>
						</tr></thead>
						<tbody style="background-color: white;">
						<?php $no=0; foreach ($get_genre as $kat) : $no++;?>

						<tr>
							<td><?=$no?></td>
							<td>#CA<?=$kat->genre_code?></td>
							<td><?=$kat->genre_name?></td>
							<td class="text-center">
								<a href="#edit" onclick="edit('<?=$kat->genre_code?>')" class="btn btn-primary  btn-sm rounded-0" data-toggle="modal">Edit</a>
								<a href="<?=base_url('index.php/category/hapus/'.$kat->genre_code)?>" onclick="return confirm('Are you sure you want to delete this genre?')" class="btn btn-danger btn-sm rounded-0">Delete</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

<div class="modal" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Add New genre
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?=base_url('index.php/category/add')?>" method="post">
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>genre Code</label></div>
						<div class="col-sm-7">
							<input type="number" name="genre_code" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>genre Name</label></div>
						<div class="col-sm-7">
							<input type="text" name="genre_name" required class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<input type="submit" name="save" value="Save" class="btn btn-primary btn-sm rounded-0">
					<button type="button" class="btn btn-default btn-sm border rounded-0" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Edit genre
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?=base_url('index.php/category/category_update')?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="genre_code_lama" id="genre_code_lama">
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>genre Code</label></div>
						<div class="col-sm-7">
							<input type="number" name="genre_code" id="genre_code" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>genre Name</label></div>
						<div class="col-sm-7">
							<input type="text" name="genre_name" id="genre_name" required class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
					<input type="submit" name="edit" value="Save" class="btn btn-primary btn-sm rounded-0">
					<button type="button" class="btn btn-default btn-sm border rounded-0" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#example').DataTable();
	}
	);
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/category/edit_category/"+a,
			dataType:"json",
			success:function(data){
				$("#genre_code").val(data.genre_code);
				$("#genre_name").val(data.genre_name);
				$("#genre_code_lama").val(data.genre_code);
			}
		});
	}
</script>

