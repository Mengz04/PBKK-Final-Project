<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Sales Transaction</h2>
  </div>
</header>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="card rouded-0 shadow">
				<div class="card-header">
					<div class="card-title mb-0">List of movies</div>
				</div>
				<div class="card-body">
				<table class="table table-hover table-bordered" id="example" style="background-color: #eef9f0; border-radius: 10px; overflow: hidden;">
						<thead style="background-color: orange; color:white;">
							<tr>
								<th>#</th>
								<th>movie Title</th>
								<th>movie Cover</th>
								<td>Genre</td>
								<th>Price</th>
								<th>seat</th>
								<th>Act.</th>
							</tr>

						</thead>
						<tbody style="background-color: white;">
							<?php $no=0; foreach ($get_movie as $movie): $no++; ?>
								<tr>

									<td><?=$no?></td>
									<td><?=$movie->movie_title?></td>
									<td><img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" style="width:40px"></td>
									<td><?=$movie->genre_name?></td>
									<td class="text-right">$<?=$movie->price?></td>
									<td class="text-right"><?=$movie->seat?></td>
									<td class="text-center"><a href="<?=base_url('index.php/transaction/addcart/'.$movie->movie_code)?>"><button class="btn btn-outline-primary rounded-0 btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card rounded-0 shadow">
				<div class="card-header">
					<div class="card-title mb-0">Cart List</div>
				</div>
				<div class="card-body">
					<form action="<?=base_url('index.php/transaction/save')?>" method="post">
						
						Payment : <select name="user_code" class="form-control">
						<option disabled selected>Select Here</option>
						
							<option class="text-dark" value="1">GOPAY</option>
							<option class="text-dark" value="2">OVO</option>
							<option class="text-dark" value="3">Mobile Banking</option>
							
						</select>
						

						Customer's Name : <input type="text" name="buyer_name" class="form-control"><br>

						
						<table class="table table-hover table-bordered" id="example" style="background-color: #eef9f0; border-radius: 10px; overflow: hidden;">
						<thead style="background-color: orange; color:white;">
						<tr>
							<td>#</td>
							<td>Title</td>
							<td>Qty</td>
							<td>Price</td>
							<td>Subtotal</td>
							<td>Action</td>
						</tr>
						</thead>
						<?php $no=0; foreach ($this->cart->contents() as $items): $no++; ?>
						<input type="hidden" name="movie_code[]" value="<?=$items['id']?>">
						<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">

				
						<tr>
							<td><?=$no?></td>
							<td><?=$items['name']?></td>
							<td width="1"><input type="text" name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding:4px;"></td>
							<td class="text-right">$<?=number_format($items['price'])?></td>
							<td class="text-right">$<?=number_format($items['subtotal'])?></td>
							<td><a href="<?=base_url('index.php/transaction/delete_cart/'.$items['rowid'])?>" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
						</tr>
						<input type="hidden" name="moviename" value="<?=$items['name']?>">
						<input type="hidden" name="movie_qty" value="<?=$items['qty']?>">
						<?php endforeach  ?>
							<input type="hidden" name="total" value="<?=$this->cart->total()?>">
							
							<th colspan="4">Total Amount</th>
							<th class="text-right">$<?=number_format($this->cart->total())?></th>
							<th></th>
								
							</tr>
						</table>
						<div class="text-center">
						<input type="submit" name="update" value="Update Quantity" class="btn btn-primary rounded-0 btn-sm"> 
						<input type="submit" name="pay" onclick="return confirm('Are you sure?')" class="btn btn-success rounded-0 btn-sm" value="Pay">
						<a class="btn btn-danger rounded-0 btn-sm" href="<?=base_url('index.php/transaction/clearcart')?>">Clear Cart</a>
						</div>
					</form>
					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('message');?>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
							</button> 
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
			$('#example').DataTable();
		}
	);
</script>
