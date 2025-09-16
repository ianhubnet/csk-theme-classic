<div class="row">
	<div class="col-12 col-md-9 order-md-2">
		<div class="card">
			<div class="card-header bg-body-secondary py-3">
				<h1 class="card-title h4 mb-0"><?= $this->page_title ?></h1>
			</div><!--/.card-header-->

			<div class="card-body">
				<?= form_open_multipart('', 'role="form" id="update-avatar"', $hidden) ?>
					<!-- Avatar field. -->
					<div class="row mb-3">
						<label for="avatar" class="col-sm-3 col-form-label"><?= line('avatar'); ?></label>
						<div class="col-sm-9">
							<div class="d-flex">
								<div class="flex-shrink-0">
									<?= $this->user->avatar(50, 'class="rounded"'); ?>
								</div>
								<div class="flex-grow-1 ms-3">
									<label for="avatar" class="btn btn-outline-secondary btn-sm"><?= line('upload') ?></label>
									<?= form_upload('avatar', [
										'id' => 'avatar',
										'class' => error_class('avatar', 'hidden'),
										'hidden' => 'hidden',
										'style' => 'display:none'
									]) ?>
									<?= form_error('avatar') ?>
								</div>
							</div>
						</div>
					</div>

					<!-- Use Gravatar checkbox -->
				<?php if (! empty($this->user->icon_hash)): ?>
					<div class="row justify-content-end mb-3">
						<div class="col-sm-9">
							<div class="form-check mb-0">
								<input type="checkbox"name="delete" id="delete" class="form-check-input border-danger" value="1">
								<label for="delete" class="form-check-label ms-1 text-danger"><?= line('delete') ?></label>
							</div>
						</div>
					</div>
				<?php endif; ?>

					<div class="row justify-content-end">
						<div class="col-sm-9 d-grid">
							<button type="submit" class="btn btn-primary btn-sm"><?= line('update') ?></button>
						</div>
					</div>

				<?= form_close() ?>
			</div><!--/.card-body-->
		</div><!--/.card-->
	</div><!--/.col-->

	<div class="col-12 col-md-3 order-md-1 mt-3 mt-md-0">
		<?= $this->hub->theme->widget('navbar') ?>
	</div><!--/.col-->
</div>
