<div class="row">
	<div class="col-12 col-md-9 order-md-2">
		<div class="card">
			<div class="card-header bg-body-secondary py-3">
				<h1 class="card-title h4 mb-0"><?= $this->page_title ?></h1>
			</div><!--/.card-header-->

			<div class="card-body">
				<?= form_open('', 'role="form" class="form-horizontal" id="change-email"', $hidden) ?>
					<div class="row mb-3">
						<label class="col-sm-4 col-form-label"><?= line('email_address'); ?></label>
						<div class="col-sm-8">
							<p class="form-control mb-0"><?= $this->user->email; ?></p>
						</div>
					</div>

					<!-- New email field -->
					<div class="row mb-3">
						<label for="nemail" class="col-sm-4 col-form-label"><?= line('new_email_address') ?></label>
						<div class="col-sm-8">
							<?= print_input($nemail, ['class' => error_class('nemail', 'form-control form-control-sm')]) ?>
							<?= form_error('nemail') ?>
						</div>
					</div>

					<!-- Current password field -->
					<div class="row mb-3">
						<label for="opassword" class="col-sm-4 col-form-label"><?= line('current_password') ?></label>
						<div class="col-sm-8">
							<?= print_input($opassword, ['class' => error_class('opassword', 'form-control form-control-sm')]) ?>
							<?= form_error('opassword') ?>
						</div>
					</div>

					<div class="row justify-content-end">
						<div class="col-sm-8 d-grid">
							<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('update') ?></button>
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
