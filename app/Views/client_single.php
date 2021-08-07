<?= $this->extend('layouts/main') ?>
<?= $this->section('content')?>
		<div class="box">
			<div class="box box-body">
				<h1><?= $client_name ?></h1>
				<a href="/client/delete/<?= $post['client_id'] ?>" class="btn btn-danger" >Delete</a>
				<a href="/client/edit/<?= $post['client_id'] ?>" class="btn btn-danger" >Edit</a>
			</div>
		</div>
<?= $this->endSection() ?>