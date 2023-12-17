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
		<div class="card rounded-2 mt-3" style="background-color : black; border: 2px solid orange; border-radius : 15px; overflow:hidden; ">
			<div class="card-header" style="background-color : black;">
					<a href="#add" data-toggle="modal" class="btn btn-warning btn-sm rounded-3 pull-right p-2" style="border: none; color: white;"><i class="fa fa-plus"></i> Add New genre</a>
			</div>
			<div class="card-body">
			<div class="d-flex flex-column w-100" style="gap: 25px; background: url(<?=base_url('assets/gambar/bg-avenger.jpg')?>); border-radius: 10px;">
				<div class="gradient py-3 d-flex flex-column" style="gap: 25px;">
				<?php $no=0; foreach ($get_genre as $kat) : $no++;?>
					
						<div class=" p-3 px-4 d-flex align-items-center justify-content-between" style="background-color:rgba(30, 30, 30, 0.712); border-radius: 10px; color:white;">
							<h2 class="m-0 px-2" style="border-left:5px solid orange"><?=$kat->genre_name?></h2>
							<div>
								<a href="#edit" onclick="edit('<?=$kat->genre_code?>')" class="btn btn-primary  btn-sm rounded-0" data-toggle="modal">Edit</a>
								<a href="<?=base_url('index.php/category/hapus/'.$kat->genre_code)?>" onclick="return confirm('Are you sure you want to delete this genre?')" class="btn btn-danger btn-sm rounded-0">Delete</a>
							</div>
						</div>
					
				<?php endforeach ?>
				</div>
			</div>
				
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
				<div class="modal-body" style="color:black;">
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

