<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
<div class="row">
	<div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
		<div class="container">
			<?php if(session()->get('success')){  ?>
				<div class="alert alert-success" role ="alert">
					<?= session()->get('success') ?>
				</div>
			<?php } ?>	
			<form  method="post" action="expense">
				<div class="mb-3">
					<label for="heading" class="form-label">Expense Heading</label>
				</div>
				<div class="mb-3">
					<input type="text" class="form-control" name="exp_heading" >

				</div>

				<div class="mb-3"">
					<label for="amount" class="form-label" > Expense Amount</label>
				</div>
				<div class="mb-3">
				
					<input type="number" step="0.01" name="amount" class="form-control" >

				</div>

				<div class="mb-3" class="form-label" >
					<label for="date"> Date</label>
				</div>
				<div class="mb-3">
					<input type="date" name="date" class="form-control">

				</div>

				<div class="form-label">
				<button class="btn btn-success">Submit</button>
				</div>
			</form>
	    </div>
    </div>
</div>
<?= $this->endSection() ?>