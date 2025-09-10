<div class="row justify-content-center">
	<div class="col-12 col-md-8 col-lg-6 col-xl-4">
		<h1 class="text-center h4 mb-2"><?= line('restore_account') ?></h1>

		<div class="card">
			<?= form_open('restore-account', 'role="form" id="restore-account" class="card-body"', $hidden) ?>

				<p class="mb-3"><?= line('restore_account_tip') ?></p>

				<!-- username/email address -->
				<div class="mb-3">
					<label for="identity" class="form-label mb-1 visually-hidden"><?= line('username_or_email') ?></label>
					<?= print_input($identity, ['class' => error_class('identity', 'form-control form-control-sm')]) ?>
					<?= form_error('identity') ?>
				</div>

			<?php if (isset($captcha)): if ($this->config->item('use_recaptcha')): ?>
				<!-- google recaptcha -->
				<div class="mb-2 text-center">
					<?= $captcha ?>
					<?= form_error('g-recaptcha-response'); ?>
				</div>

			<?php else: ?>
				<!-- captcha -->
				<div class="row row-cols-1 row-cols-md-2 mb-2">
					<div class="col" tabindex="-1">
						<?= $captcha_image ?>
					</div>
					<div class="col">
						<?= print_input($captcha, ['class' => error_class('captcha', 'form-control')]) ?>
						<?= form_error('captcha') ?>
					</div>
				</div>
			<?php endif; endif; ?>

				<!-- submit button -->
				<div class="d-grid">
					<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('restore_account') ?></button>
				</div><!--/d-grid-->

			<?= form_close() ?><!--/.card-body-->

			<div class="card-footer bg-body-secondary border-top-0">
				<div class="d-grid">
					<?= anchor('login', line('login'), 'class="btn btn-light btn-sm"') ?>
				</div><!--/.d-grid-->
			</div><!--/.card-footer-->
		</div><!--/.card-->
	</div><!--/.col-->
</div><!--/.row-->
