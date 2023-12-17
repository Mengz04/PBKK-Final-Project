<header class="page-header palette-1" style="border-bottom: 2px rgba(255, 166, 0, 0.432) solid">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Ticket Transaction</h2>
  </div>
</header>
<br>
<div class="container-fluid">
	<div class="d-flex flex-column gap-2">
		<div class="row">
			<div class="card rounded-0 shadow w-100" >
				<div class="card-header d-flex align-items-center justify-content-between" style="border-bottom: 2px rgba(255, 166, 0, 0.432) solid; background: url(<?=base_url('assets/gambar/table-bg.jpg')?>) !important;">
					<div class="card-title mb-0 text-white text-center">List of Movies</div>
					<button class="btn-cust"><a href="#cart">My Cart</a></button>
				</div>
				<div class="card-body d-flex flex-column justify-content-center align-items-center" style="background: url(<?=base_url('assets/gambar/table-bg.jpg')?>) !important;">
					<?php $no=0; ?>
					<div class="row">
						<?php foreach ($get_movie as $movie): ?>
							<?php if ($no % 2 == 0 && $no > 0): ?>
								</div><div class="row">
							<?php endif; ?>
							<div class="col col-lg-6 col-sm-12 col-12">
								<div class="row p-2 m-3" style="background-color: rgba(0, 0, 0, 0.398); border-radius: 10px; border: 3px solid orange; width: 400px !important;">
									<div class="col col-lg-5 col-sm-12 col-12 text-center" style="border-radius: 10px 0 0 10px; overflow: hidden;">
										<img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" alt="" style="max-height: 200px;">
									</div>
									<div class="col col-lg-7 col-sm-12 col-12 d-flex justify-content-between gap-3 align-items-center p-3 flex-wrap" style="">
										<div class="">
											<h5 class="font-bold"><?=$movie->movie_title?></h5>
											<div class="inner-tiket d-flex flex-column " style="gap: 10px;">
												<p style="margin:0;">Genre : <?=$movie->genre_name?></p>
												<p style="margin:0;">Harga Tiket : $<?=$movie->price?></p>
												<p style="margin:0;">Sisa Tiket : <?=$movie->seat?></p>
												<button class="btn-cust b2"><a href="<?=base_url('index.php/transaction/addcart/'.$movie->movie_code)?>"><span class="fa fa-shopping-cart"> Add to cart</span></a></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $no++; ?>
						<?php endforeach; ?>
					</div>
						
				</div>
			</div>
		</div>
		<div class="row" id="cart">
			<div class="card rounded-0 shadow w-100">
				<div class="card-header" style="border-bottom: 2px rgba(255, 166, 0, 0.432) solid; background: url(<?=base_url('assets/gambar/table-bg.jpg')?>) !important;">
					<div class="card-title mb-0 text-white text-center">Cart List</div>
				</div>
				<div class="card-body" style="background: url(<?=base_url('assets/gambar/table-bg.jpg')?>) !important;">
					<form action="<?=base_url('index.php/transaction/save')?>" method="post" class="text-white">
						
						Payment : <select name="user_code" class="form-control">
						<option disabled selected>Select Here</option>
						
							<option class="text-dark" value="1">GOPAY</option>
							<option class="text-dark" value="2">OVO</option>
							<option class="text-dark" value="3">Mobile Banking</option>
							
						</select>
						

						Customer's Name : <input type="text" name="buyer_name" class="form-control"><br>

						
						<table class="table table-hover table-bordered table-dark" id="example" style="background-color: #eef9f0; border-radius: 10px; overflow: hidden;">
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
						<div class="text-center mt-3">
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
