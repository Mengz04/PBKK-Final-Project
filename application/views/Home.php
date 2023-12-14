<header class="page-header palette-1" style="border-bottom: 2px rgba(175, 237, 255, 0.432) solid">
	<div class="container-fluid">
	  	<h2 class="panel-title">Dashboard</h2>
	</div>
</header> 
<div class="main-content">
	<?php 
        if ($this->session->userdata('level') == 'admin') { ?>
	<section class="dashboard-counts no-padding-bottom">
	    <div class="container-fluid">
	      <div class="row py-1 text-dark">
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded shadow">
					<div class="card-body">
						<div class="item d-flex align-items-center">
							<div class="icon bg-violet"><i class="fa fa-book"></i></div>
							<a href="<?php echo base_url('index.php/movie') ?>" class="text-secondary">
							<div class="title"><span>Movie Database</span></div>
							</a>
							<span class="number"><?php echo $jml_movie->jml_movie; ?></span>
						</div>
					</div>
				</div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded shadow">
					<div class="card-body">
						<div class="item d-flex align-items-center">
							<div class="icon bg-green"><i class="fa fa-dollar"></i></div>
							<a href="<?php echo base_url('index.php/history') ?>" class="text-secondary">
							<div class="title"><span>Sales Profit</span></div>
							</a>
							<span class="number"><?php echo '$'.$jml_transaction->jml_transaction; ?></span>
						</div>
					</div>
				</div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded shadow">
					<div class="card-body">
						<div class="item d-flex align-items-center">
							<div class="icon bg-red"><i class="fa fa-exchange"></i></div>
							<a href="<?php echo base_url('index.php/history') ?>" class="text-secondary">
							<div class="title"><span>Total Transaction</span></div>
							</a>
							<span class="number"><?php echo $jml_pengguna->jml_pengguna; ?></span>
						</div>
					</div>
				</div>
	        </div>
		  </div>

		  <div class="row py-1 text-dark">
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded shadow">
					<div class="card-body">
						<div class="item d-flex align-items-center">
							<div class="icon bg-warning"><i class="fa fa-bookmark" style="color: white;"></i></div>
							<a href="<?php echo base_url('index.php/category') ?>" class="text-secondary">
							<div class="title"><span>Categories</span></div>
							</a>
							<span class="number"><?php echo $movie_cat->movie_cat; ?></span>
						</div>
					</div>
				</div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded shadow">
					<div class="card-body">
						<div class="item d-flex align-items-center">
							<div class="icon bg-gray"><i class="fa fa-user-secret"></i></div>
							<a href="<?php echo base_url('index.php/user') ?>" class="text-secondary">
							<div class="title"><span>System Users</span></div>
							</a>
							<span class="number"><?php echo $sys_user->sys_user; ?></span>
						</div>
					</div>
				</div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded shadow">
					<div class="card-body">
						<div class="item d-flex align-items-center">
							<div class="icon bg-info"><i class="fa fa-th-large" style="color: white;"></i></div>
							<a href="<?php echo base_url('index.php/movie') ?>" class="text-secondary">
								<div class="title"><span>Available seats</span></div>
							</a>
							<span class="number"><?php echo $movie_seat->movie_seat; ?></span>
						</div>
					</div>
				</div>
			  </div>
		  </div>

		  <div class="row py-1">
	        
	        <!--
	        <div class="col-xl-4 col-sm-4">
				<div class="card rounded-0 shadow">
					<div class="card-body">
						<div class="d-flex align-items-center">
							<div class="icon bg-green"><i class="fa fa-hourglass"></i></div>
							<a href="<?php echo base_url('index.php/history') ?>" class="text-secondary">
							<div class="title"><span>Sales (24hrs)</span></div>
							</a>
							<span class="number"><?php echo '$'.$sales_p->sales_p; ?></span>
						</div>
					</div>
				</div>
	        </div> -->
	        
		  </div>
		</div>
	</section>
		<?php } elseif (($this->session->userdata('level') == 'Customer')) {?>
			<div class="d-flex flex-wrap justify-content-center">
				<div class="px-5 pt-5">
					<div class="text-center font-weight-bold">Educational</div>
					<div class="px-5 py-3 d-flex flex-row" style="gap: 25px;">
						
						<tbody style="background-color: white;">
							<?php $no=0; foreach ($get_movie as $movie): if ($no == 4) break; if($movie->genre_name != "Educational") continue; $no++;?>
								<div class="card text-white bg-dark p-1" style="width: 15rem;">
									<img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" class="card-img-top" alt="..." style="height: 320px;">
									<div class="h-100"></div>
										<div class="card-body">
										<h5 class="card-title"><?=$movie->movie_title?></h5>
										<p class="card-text" style="font-size: smaller; color: lightgray;"><span class="font-weight-bold">Ticket Price:</span> $<?=$movie->price?></p>
										<p class="card-text" style="font-size: smaller; color: lightgray;">Seat Left: <?=$movie->seat?></p>	
										<div style=" display: flex; justify-content: space-between; align-items: center !important;">
											<p style="height: 10px !important;">⭐ 5.0</p>
											<a href="<?=base_url('index.php/transaction/addcart/'.$movie->movie_code)?>"><button class="btn btn-outline-primary rounded-0 btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</tbody>
					
					</div>
					
				</div>
				<div class="px-5 py-3">
					<div class="text-center font-weight-bold">Fiction</div>
					<div class="px-5 py-3 d-flex flex-row" style="gap: 25px;">
						
						<tbody style="background-color: white;">
								<?php $no=0; foreach ($get_movie as $movie): if ($no == 4) break; if($movie->genre_name != "Fiction") continue; $no++;?>
									<div class="card text-white bg-dark p-1" style="width: 15rem;">
										<img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" class="card-img-top" alt="..." style="height: 320px;">
										<div class="h-100"></div>
											<div class="card-body">
											<h5 class="card-title"><?=$movie->movie_title?></h5>
											<p class="card-text" style="font-size: smaller; color: lightgray;"><span class="font-weight-bold">Ticket Price:</span> $<?=$movie->price?></p>
											<p class="card-text" style="font-size: smaller; color: lightgray;">Seat Left: <?=$movie->seat?></p>	
											<div style=" display: flex; justify-content: space-between; align-items: center !important;">
												<p style="height: 10px !important;">⭐ 5.0</p>
												<a href="<?=base_url('index.php/transaction/addcart/'.$movie->movie_code)?>"><button class="btn btn-outline-primary rounded-0 btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</tbody>
					
					</div>
					
				</div>
				<div class="px-5 py-3">
					<div class="text-center font-weight-bold">Fantasy</div>
					<div class="px-5 py-3 d-flex flex-row" style="gap: 25px;">
						
						<tbody style="background-color: white;">
								<?php $no=0; foreach ($get_movie as $movie): if ($no == 4) break; if($movie->genre_name != "Fantasy") continue; $no++;?>
									<div class="card text-white bg-dark p-1" style="width: 15rem;">
										<img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" class="card-img-top" alt="..." style="height: 320px;">
										<div class="h-100"></div>
											<div class="card-body">
											<h5 class="card-title"><?=$movie->movie_title?></h5>
											<p class="card-text" style="font-size: smaller; color: lightgray;"><span class="font-weight-bold">Ticket Price:</span> $<?=$movie->price?></p>
											<p class="card-text" style="font-size: smaller; color: lightgray;">Seat Left: <?=$movie->seat?></p>	
											<div style=" display: flex; justify-content: space-between; align-items: center !important;">
												<p style="height: 10px !important;">⭐ 5.0</p>
												<a href="<?=base_url('index.php/transaction/addcart/'.$movie->movie_code)?>"><button class="btn btn-outline-primary rounded-0 btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</tbody>
					
					</div>
					
				</div>
				<div class="px-5 py-3">
					<div class="text-center font-weight-bold">Horror</div>
					<div class="px-5 py-3 d-flex flex-row" style="gap: 25px;">
						
						<tbody style="background-color: white;">
								<?php $no=0; foreach ($get_movie as $movie): if ($no == 4) break; if($movie->genre_name != "Horror") continue; $no++;?>
									<div class="card text-white bg-dark p-1" style="width: 15rem;">
										<img src="<?=base_url('assets/gambar/'.$movie->movie_img)?>" class="card-img-top" alt="..." style="height: 320px;">
										<div class="h-100"></div>
											<div class="card-body">
											<h5 class="card-title"><?=$movie->movie_title?></h5>
											<p class="card-text" style="font-size: smaller; color: lightgray;"><span class="font-weight-bold">Ticket Price:</span> $<?=$movie->price?></p>
											<p class="card-text" style="font-size: smaller; color: lightgray;">Seat Left: <?=$movie->seat?></p>	
											<div style=" display: flex; justify-content: space-between; align-items: center !important;">
												<p style="height: 10px !important;">⭐ 5.0</p>
												<a href="<?=base_url('index.php/transaction/addcart/'.$movie->movie_code)?>"><button class="btn btn-outline-primary rounded-0 btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</tbody>
					
					</div>
					
				</div>
			</div>
			
		<?php }?>
	
</div>
