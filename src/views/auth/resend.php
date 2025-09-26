<h1 class="text-center h4 mb-2"><?= line('resend_activation_link') ?></h1>

<div class="card">
	<?= form_open('resend-link', 'role="form" id="resend-link" class="card-body"', $hidden) ?>

		<p class="mb-3"><?= line('resend_activation_link_tip') ?></p>

		<!-- username/email address -->
		<div class="mb-3">
			<label for="identity" class="form-label mb-1 visually-hidden"><?= line('username_or_email') ?></label>
			<?= print_input($identity, ['class' => error_class('identity', 'form-control form-control-sm')]) ?>
			<?= form_error('identity') ?>
		</div>

	<?php if (isset($captcha_image)): ?>
		<!-- captcha -->
		<div class="d-flex gap-2 mb-2">
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
		<div class="mb-2 text-center">
			<div class="<?= error_class('g-recaptcha-response', '') ?>"><?= $captcha ?></div>
			<?= form_error('g-recaptcha-response') ?>
		</div>
	<?php endif; ?>

		<div class="d-grid">
			<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('resend_link') ?></button>
		</div><!--/.d-grid-->

	<?= form_close() ?><!--/.card-body-->

	<div class="card-footer bg-body-secondary border-top-0">
		<div class="d-grid">
			<?= anchor('login', line('login'), 'class="btn btn-light btn-sm"') ?>
		</div><!--/.d-grid-->
	</div><!--/.card-footer-->

</div><!--/.card-->
