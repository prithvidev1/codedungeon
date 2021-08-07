<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
		<form  method="post">
			<div>
				<label for="name"> Name</label>
			</div>

			<div>
				<input type="text" name="client_name" value="<?= $post['client_name'] ?>">
			</div>

			<div>
				<label for="email"> Email</label>
			</div>

			<div>
			<input type="text" name="email" value="<?= $post['email']?>">
			</div>

			<div>
			<button class="btn btn-success">Submit</button>
			</div>
		</form>
<?= $this->endSection() ?>