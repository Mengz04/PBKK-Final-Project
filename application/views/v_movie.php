<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Movie Details</h2>
  </div>
</header>

<div class="table-agile-info">
	<div class="container-fluid my-3">
		<?php if ($this->session->flashdata('message')!=null) {
		echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>"
			.$this->session->flashdata('message')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button> </div>";
		} ?>
		<br>
		<div class="card rounded-0 shadow">
			<div class="card-header">
				<a href="#add" data-toggle="modal" class="btn btn-warning btn-sm rounded-3 p-2 pull-right" style="border: none; color: white;"><i class="fa fa-plus"></i> Add New Movie</a>
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
							<td>Movie Title</td>
							<td>Cover</td>
							<td>Year</td>
							<td>Price</td>
							<td>genre</td>
							<td>Publisher</td>
							<td>director</td>
							<td>seat</td>
							<td>Action</td>
						</tr></thead>
						<tbody style="background-color: white;">
						<?php $no=0; foreach ($get_movie as $movie) : $no++;?>

						<tr>
							<td><?=$no?></td>
							<td><?=$movie->movie_title?></td>
							<td><img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" style="width:40px"></td>
							<td><?=$movie->year?></td>
							<td>$<?=number_format($movie->price)?></td>
							<td><?=$movie->genre_name?></td>
							<td><?=$movie->publisher?></td>
							<td><?=$movie->director?></td>
							<td><?=$movie->seat?></td>
							<td class="text-center">
								<a href="#edit" onclick="edit('<?=$movie->movie_code?>')" class="btn btn-primary btn-sm rounded-0" data-toggle="modal"><i class="fa fa-pencil"></i></a>
								<a href="<?=base_url('index.php/movie/hapus/'.$movie->movie_code)?>" onclick="return confirm('Are you sure to delete this movie?')" class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal" id="add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Add New Movie
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<form action="<?=base_url('index.php/movie/add')?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Movie Title</label></div>
							<div class="col-sm-7">
								<input type="text" name="movie_title" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Year</label></div>
							<div class="col-sm-7">
								<input type="number" name="year" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Price</label></div>
							<div class="col-sm-7">
								<input type="number" name="price" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>genre</label></div>
							<div class="col-sm-7">
								<select name="genre" required="form-control" class="form-control">
									<?php foreach ($genre as $kat): ?>
										<option value="<?=$kat->genre_code?>">
											<?=$kat->genre_name ?>
										</option> 
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Cover Photo</label></div>
							<div class="col-sm-7">
								<input type="file" name="gambar" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Publisher</label></div>
							<div class="col-sm-7">
								<input type="text" name="publisher" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>director</label></div>
							<div class="col-sm-7">
								<input type="text" name="director" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>seat</label></div>
							<div class="col-sm-7">
								<input type="number" name="seat" required="form-control" class="form-control">
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
					Update Movie
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<form action="<?=base_url('index.php/movie/movie_update')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="movie_code" id="movie_code">
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Movie Title</label></div>
							<div class="col-sm-7">
								<input type="text" name="movie_title" id="movie_title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Year</label></div>
							<div class="col-sm-7">
								<input type="number" name="year" id="year" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Price</label></div>
							<div class="col-sm-7">
								<input type="number" name="price" id="price" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>genre</label></div>
							<div class="col-sm-7">
								<select name="genre" id="genre" class="form-control">
									<?php foreach ($genre as $kat): ?>
										<option value="<?=$kat->genre_code?>">
											<?=$kat->genre_name ?>
										</option> <?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>CoverPhoto</label></div>
							<div class="col-sm-7">
								<input type="file" name="gambar" id="gambar" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Publisher</label></div>
							<div class="col-sm-7">
								<input type="text" name="publisher" id="publisher" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>director</label></div>
							<div class="col-sm-7">
								<input type="text" name="director" id="director" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>seat</label></div>
							<div class="col-sm-7">
								<input type="number" name="seat" id="seat" class="form-control">
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
</div>


<script type="text/javascript">
	$(document).ready(function(){
			$('#example').DataTable();
		}
	);
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/movie/edit_movie/"+a,
			dataType:"json",
			success:function(data){
				$("#movie_code").val(data.movie_code);
				$("#movie_title").val(data.movie_title);
				$("#year").val(data.year);
				$("#price").val(data.price);
				$("#genre").val(data.genre_code);
				$("#publisher").val(data.publisher);
				$("#director").val(data.director);
				$("#seat").val(data.seat);

			}
		});
	}
</script>
