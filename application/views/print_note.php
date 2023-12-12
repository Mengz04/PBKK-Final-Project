<h2>Transaction Note</h2>
Transaction No. : <?=$transaction->transaction_code?><br>
Payment : <?=$transaction->user_code?><br>
Customer : <?=$transaction->buyer_name?><br>
Date : <?=$transaction->tgl?>

<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>No</th>
		<th>Movie Title</th>
		<th>Price</th>
		<th>Amount</th>
		<th>Subtotal</th>
	</tr>
	<?php $no=0; foreach ($this->trans->detail_transaction($transaction->transaction_code) as $movie): $no++; ?>
	<tr>
		<th><?=$no?></th>
		<th><?=$movie->movie_title?></th>
		<th><?= number_format($movie->price)?></th>
		<th><?=$movie->amount?></th>
		<th><?= number_format(($movie->price*$movie->amount))?></th>
	</tr>
	<?php endforeach ?>
	<tr>
		<th colspan="4">Total</th>
		<th><?= number_format($transaction->total)?></th>
	</tr>
</table>

<script type="text/javascript">
	window.print();
	setTimeout(() => {
		location.href="<?=base_url('index.php/transaction/clearcart')?>";
	}, 2500);
</script>
