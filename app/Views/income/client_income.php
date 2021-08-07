<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
<div class="container">
	<div class="row">
		<div class="col-12 offset-sm-2">
			<h1>Your Income, <?= session()->get('client_name') ?> </h1>
			<div class="col-md-10 ">
				<table class="table table-striped" >
					<tr>
						<th>Income Heading</th>
						<th>Date</th>
						<th>Amount</th>
						
						<th>Edit/ Delete</th>
						
					</tr>
					
						<?php if($users){ $amt = 0;
							foreach($users as $user){ $amt= $amt+ $user['amount'];?>
								<tr>
									<td><?php echo $user['income_heading'] ?></td>
									<td><?php echo $user['date'] ?></td>
									<td><?php echo "Rs"." ".$user['amount'] ?></td>
									<td> <a href="income/delete/<?= $user['income_id'] ?>" class="btn btn-danger" >Delete</a>
										 <a href="/income/edit/<?= $user['income_id'] ?>" class="btn btn-danger" >Edit</a> 
									</td>
								</tr>
						<?php } ?>
						<tr>
							<td>Total Income</td>
							<td></td>
							<td><?="Rs"." ".$amt ?></td>
							<td></td>
							
						</tr> 
					<?php } ?>
					
				</table>
			</div>
		</div>
	</div>
	
	
</div>
		
<?= $this->endSection() ?>