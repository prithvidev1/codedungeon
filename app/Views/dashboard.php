
<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
	<div class="container">
		<div class="row"> 
			<h2>Welcome to your Dashbaord, <?= session()->get('client_name') ?></h2>
		</div>
	</div>
<?= $this->endSection() ?>