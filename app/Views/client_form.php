
<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
	<div class="row">
		<div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
			<div class="container">
			<h3>Register</h3>
			<hr>
			<form class="form-control" action="register" method="post">
		<div class="row">
			

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="client_name" required="required" value="<?= set_value('client_name') ?>">
				</div>

				<div class="form-group">
					<label for="name">Address</label>
					<input type="text" class="form-control" name="address" required="required" value="<?= set_value('address') ?>">
				</div>

				<div class="form-group">
					<label for="name">Email</label>
					<input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" required="required" value="<?= set_value('username') ?>">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" required="required" >
				</div>

				<div class="form-group">
					<label for="password_confirm">Confirm Password</label>
					<input type="password" class="form-control" name="password_confirm" required="required" >
				</div>
				<?php if(isset($validation)){ ?>
				<div class="col-12">
					<div class="alert alert-danger" roles="alert">
						<?= $validation->listErrors() ?>
						
					</div>
				</div>

				<?php } ?>
			
		</div>

				<div class="row">
					<div class="col-12 col-sm-4">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
					
				</div>
				
			</form>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>