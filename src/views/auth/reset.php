<h1 class="text-center h4 mb-2"><?= line('reset_password') ?></h1>

<div class="card">
	<?= form_open('', 'role="form" id="reset-password" class="card-body"', $hidden) ?>

		<!-- new password -->
		<div>
			<label for="npassword" class="form-label mb-1 visually-hidden"><?= line('new_password') ?></label>
			<?= print_input($npassword, ['class' => error_class('npassword', 'form-control form-control-sm')]) ?>
			<?= form_error('npassword') ?>
		</div>

		<!-- confirm password -->
		<div class="mt-2">
			<label for="cpassword" class="form-label mb-1 visually-hidden"><?= line('confirm_password') ?></label>
			<?= print_input($cpassword, ['class' => error_class('cpassword', 'form-control form-control-sm')]) ?>
			<?= form_error('cpassword') ?>
		</div>

	<?php if (isset($captcha_image)): ?>
		<!-- captcha -->
		<div class="d-flex gap-2 mt-2">
			<div class="flex-fill" tabindex="-1">
				<?= $captcha_image ?>
			</div>
			<div class="flex-fill">
				<?= print_input($captcha, ['class' => error_class('captcha', 'form-control form-control-sm')]) ?>
				<?= form_error('captcha') ?>
			</div>
		</div>
	<?php elseif (isset($captcha)): ?>
		<!-- google recaptcha -->
		<div class="mt-2 text-center">
			<div class="<?= error_class('g-recaptcha-response', '') ?>"><?= $captcha ?></div>
			<?= form_error('g-recaptcha-response') ?>
		</div>
	<?php endif; ?>

		<div class="d-grid mt-3">
			<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('reset_password') ?></button>
		</div><!--/.d-grid-->

	<?= form_close() ?><!--/.card-body-->

	<div class="card-footer bg-body-secondary border-top-0">
		<div class="d-grid">
			<?= anchor('login', line('login'), 'class="btn btn-light btn-sm"') ?>
		</div><!--/.d-grid-->
	</div><!--/.card-footer-->
</div><!--/.card-->
