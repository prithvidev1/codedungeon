<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
<div class="container">
	<div class="row">
		<div class="col-12 offset-sm-2">
			<h1>Your Income in Weekly Basis, <?= session()->get('client_name') ?> </h1>
			<div class="col-md-10 ">
				<table class="table table-striped">
					<tr>
						<th>Week</th>
						<th>TOtal Amount</th>
						
						
					</tr>
					
						<?php if($users){ 
							$a = count($users);
							
								for($i='0';$i<$a;$i++)
								{ ?>
									<tr>
									<td><?php echo "Week".$i+1; ?></td>
									<td><?php echo "Rs"." ".$users[$i]['amount'] ?></td>
							 
							
							
									
								</tr>
						<?php } } ?>
					
				</table>
			</div>
		</div>
	</div>
</div>
		
<?= $this->endSection() ?>