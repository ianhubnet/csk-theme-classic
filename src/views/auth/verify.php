<h1 class="text-center h4 mb-2"><?= line('two_factor_auth') ?></h1>

<div class="card">
	<?= form_open('login-2fa', 'role="form" id="login" class="card-body mb-0"', $hidden) ?>

		<!-- authentication code -->
		<div class="mb-3">
			<label for="tfa" class="form-label mb-1 visually-hidden"><?= line('auth_code') ?></label>
			<?= print_input($tfa, [
				'autofocus' => 'autofocus',
				'class' => error_class('tfa', 'form-control form-control-sm')
			]) ?>
			<?= form_error('tfa') ?>
		</div>

	<?php if (isset($captcha_image)): ?>
		<!-- captcha -->
		<div class="row row-cols-1 row-cols-md-2 mb-3">
			<div class="col" tabindex="-1">
				<?= $captcha_image ?>
			</div>
			<div class="col">
				<?= print_input($captcha, ['class' => error_class('captcha', 'form-control')]) ?>
				<?= form_error('captcha') ?>
			</div>
		</div>
	<?php elseif (isset($captcha)): ?>
		<!-- google recaptcha -->
		<div class="mb-3 text-center">
			<div class="<?= error_class('g-recaptcha-response', '') ?>"><?= $captcha ?></div>
			<?= form_error('g-recaptcha-response') ?>
		</div>
	<?php endif; ?>

		<div class="d-grid">
			<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('login') ?></button>
		</div><!--/.d-grid-->

	<?= form_close() ?><!--/.card-body -->
</div><!--/.card-->
