<div class="row">
	<div class="col-12 col-md-9 order-md-2">
		<div class="card">
			<div class="card-header bg-body-secondary py-3">
				<h1 class="card-title h4 mb-0"><?= $this->page_title ?></h1>
			</div><!--/.card-header-->

			<div class="card-body">
				<div class="d-flex gap-3">
					<div class="flex-fill">
						<form action="<?= site_url('disable-account') ?>" method="POST" data-confirm="<?= line('account_disable_confirm') ?>" class="d-grid">
							<button type="submit" class="btn btn-warning"><?= line('account_disable') ?></button>
						</form>
					</div>
					<div class="flex-fill">
						<form action="<?= site_url('delete-account') ?>" method="POST" data-confirm="<?= line('account_delete_confirm') ?>" class="d-grid">
							<button type="submit" class="btn btn-danger"><?= line('account_delete') ?></button>
						</form>
					</div>
				</div><!--/.d-flex-->
			</div><!--/.card-body-->

			<div class="card-footer bg-body-secondary border-top-0">
				<ul class="py-0 px-3 mb-0">
					<li><small><?= line('account_disable_notice') ?></small></li>
					<li><small><?= line('account_delete_notice') ?></small></li>
				</ul>
			</div><!--/.card-footer-->

			<?php if ($logs): ?>
			<div class="card-body border-top">
				<h2 class="h5 text-center"><?= line('session_history') ?></h2>
				<div class="table-responsive">
					<table class="table table-sm table-hover table-striped mb-0">
						<thead>
							<tr>
								<th><?= line('device') ?></th>
								<th class="text-center"><?= line('ip_address') ?></th>
								<th class="text-end"><?= line('date') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($logs as $log): ?>
							<tr>
								<td><?= $log['browser'].', '.$log['platform'] ?></td>
								<td class="text-center"><?= $log['ip_anchor'] ?? $log['ip_address'] ?></td>
								<td class="text-end"><?= date_formatter($log['created_at'], 'datetime') ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div><!--/.table-responsive-->
			</div><!--/.card-body-->
			<?php endif; ?>
		</div><!--/.card-->
	</div><!--/.col-->

	<div class="col-12 col-md-3 order-md-1 mt-3 mt-md-0">
		<?= $this->theme->widget('navbar') ?>
	</div><!--/.col-->
</div>
