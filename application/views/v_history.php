<header class="page-header palette-1" style="border-bottom: 2px rgba(255, 166, 0, 0.432) solid">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Transaction History</h2>
  </div>
</header>

<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-md-12">
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
				<thead style="background-color: orange; color:white;">
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