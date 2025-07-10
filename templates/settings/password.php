<div class="row">
	<div class="col-12 col-md-9 order-md-2">
		<div class="card">
			<div class="card-header bg-body-secondary py-3">
				<h1 class="card-title h4 mb-0"><?= $this->page_title ?></h1>
			</div><!--/.card-header-->

			<div class="card-body">
				<?= form_open('', 'role="form" id="change-password"', $hidden) ?>

					<!-- New password field -->
					<div class="row mb-3">
						<label for="npassword" class="col-sm-4 col-form-label"><?= line('new_password') ?></label>
						<div class="col-sm-8">
							<?= print_input($npassword, ['class' => error_class('npassword', 'form-control form-control-sm')]) ?>
							<?= form_error('npassword') ?>
						</div>
					</div>

					<!-- Confirm password field -->
					<div class="row mb-3">
						<label for="cpassword" class="col-sm-4 col-form-label"><?= line('confirm_password') ?></label>
						<div class="col-sm-8">
							<?= print_input($cpassword, ['class' => error_class('cpassword', 'form-control form-control-sm')]) ?>
							<?= form_error('cpassword') ?>
						</div>
					</div>

				<?php if (empty($this->user->password)): ?>
					<div class="row mb-3 justify-content-end">
						<div class="col-sm-8">
							<div class="alert alert-warning m-0 p-2">
								<i class="fa fa-fw fa-exclamation-circle me-1 text-danger"></i>
								<?= line('password_missing_notice') ?>
							</div>
						</div>
					</div>
				<?php else: ?>
					<!-- Current password field -->
					<div class="row mb-3">
						<label for="opassword" class="col-sm-4 col-form-label"><?= line('current_password') ?></label>
						<div class="col-sm-8">
							<?= print_input($opassword, ['class' => error_class('opassword', 'form-control form-control-sm')]) ?>
							<?= form_error('opassword') ?>
						</div>
					</div>

					<!-- Two-factor authentication -->
					<div class="row justify-content-end mb-3">
						<div class="col-sm-8">
							<div class="form-check mb-0">
								<?= form_checkbox('two_factor_auth', '1', $this->user->two_factor_auth, 'id="two_factor_auth" class="form-check-input"') ?>
								<label class="form-check-label ml-2" for="two_factor_auth"><?= line('two_factor_auth') ?></label>
								<p class="form-text mb-0"><?= line('two_factor_auth_tip') ?></p>
							</div>
						</div>
					</div>
				<?php endif; ?>

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
		<?= $this->theme->widget('navbar') ?>
	</div><!--/.col-->
</div>
