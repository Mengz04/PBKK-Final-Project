<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Transaction History</h2>
  </div>
</header>

<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex flex-wrap" style="gap: 5px; color:white;">
				<?php $no=0; foreach ($get_history as $history) : $no++;?>
				<div class="row p-2 m-3 mx-5 w-100" style="background-color: black; border-radius: 10px; border: 3px solid orange;">
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
							<p>⭐ 5.0</p>
						</div>
						<img src="./source/images/qr-code.png" alt="" style="max-height: 150px; background-color:white;">
					</div>
				</div>
					
				<?php endforeach ?>
			</div>
			<table class="table table-hover table-bordered" id="example" ui-options=ui-options="{
		        &quot;paging&quot;: {
		          &quot;enabled&quot;: true
		        },
		        &quot;filtering&quot;: {
		          &quot;enabled&quot;: true
		        },
		        &quot;sorting&quot;: {
		          &quot;enabled&quot;: true
		        }}">
				<thead style="background-color: #464b58; color:white;">
					<tr>
						<td>#</td>
						<td>Customer's Name</td>
						<td>Date</td>
						<td>movie</td>
						<td>Qty</td>
						<td>Amount</td>
						<td>Payment</td>
					</tr></thead>
					<tbody style="background-color: white;">
					<?php $no=0; foreach ($get_history as $history) : $no++;?>

					<tr>
						<td><?=$no?></td>
						<td><?=$history->buyer_name?></td>
						<td><?=$history->tgl?></td>
						<td><?=$history->moviename?></td>
						<td><?=$history->movie_qty?></td>
						<td>$<?=number_format($history->total)?></td>
						<td><?=$history->user_code?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>