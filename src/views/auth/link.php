<h1 class="text-center h4 mb-2"><?= line('quick_login_request') ?></h1>

<div class="card">
	<?= form_open('quick-login', 'role="form" id="quick-login" class="card-body"', $hidden) ?>
		<p class="mb-3"><?= line('quick_login_tip') ?></p>

		<!-- username/email address -->
		<div class="mb-2">
			<label for="identity" class="form-label mb-1 visually-hidden"><?= line('username_or_email') ?></label>
			<?= print_input($identity, ['class' => error_class('identity', 'form-control form-control-sm')]) ?>
			<?= form_error('identity') ?>
		</div>

	<?php if (isset($captcha_image)): ?>
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
	<?php elseif (isset($captcha)): ?>
		<!-- google recaptcha -->
		<div class="mb-2 text-center">
			<div class="<?= error_class('g-recaptcha-response', '') ?>"><?= $captcha ?></div>
			<?= form_error('g-recaptcha-response') ?>
		</div>
	<?php endif; ?>

		<div class="d-grid">
			<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('send_link') ?></button>
		</div><!--/.d-grid-->

	<?= form_close() ?>

	<div class="card-footer bg-body-secondary border-top-0">
		<div class="d-grid">
			<?= anchor('login', line('login'), 'class="btn btn-light btn-sm"') ?>
		</div><!--/.d-grid-->
	</div><!--/.card-footer-->
</div><!--/.card-->
