<header class="page-header palette-1" style="border-bottom: 2px rgba(255, 166, 0, 0.432) solid">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Transaction History</h2>
  </div>
</header>

<div class="container-fluid">
	<br>
	<div class="row" style="background: url(https://wallpaperaccess.com/full/1788459.jpg);
  background-repeat: no-repeat;
  background-size: cover;">
		<div class="col-md-12">
			<div class="d-flex flex-wrap" style="gap: 5px; color:white; ">
				<?php $no=0; foreach ($get_history as $history) : $no++;?>
				<div class="row p-2 m-3 mx-5 w-100" style="background-color: rgba(0, 0, 0, 0.398); border-radius: 10px; border: 3px solid orange;">
					<div class="col col-lg-4 col-sm-12 col-12 text-center" style="background: url(<?=base_url('assets/gambar/ticket-bg-2.jpg')?>); background-size: contain; border-radius: 10px 0 0 10px; overflow: hidden;">
						<img src="<?=base_url('assets/gambar/ticket.png')?>" alt="" style="max-height: 200px;">
					</div>
					<div class="col col-lg-8 col-sm-12 col-12 d-flex justify-content-between gap-3 align-items-center p-3 flex-wrap" style="">
						<div class="">
							<h2>CINEMA</h2>
							<h2 style="font-weight:lighter;">TICKET</h2>
							<h5>Customer : <?=$history->buyer_name?></h5>
							<div class="inner-tiket">
							<p style="margin:0;">Tanggal : <?=$history->tgl?></p>
							<p style="margin:0;">Jumlah kursi : <?=$history->movie_qty?></p>
							<p style="margin:0;">Movie : <?=$history->moviename?></p>
							</div>
							<p> <?=$history->moviename?> | <?=$history->user_code?> | $<?=number_format($history->total)?></p>
							
						</div>
						<img src="<?=base_url('assets/gambar/qr-code.png')?>" alt="" style="max-height: 150px; background-color:white;">
					</div>
				</div>
					
				<?php endforeach ?>
			</div>
			
		</div>
	</div>
</div>