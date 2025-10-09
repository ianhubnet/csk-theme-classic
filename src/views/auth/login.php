<h1 class="text-center h4 mb-2"><?= line('member_login') ?></h1>

<?php if (isset($locked_message)): ?>
<div class="card">
	<div class="card-body">
		<p class="alert alert-danger mb-0"><?= $locked_message ?></p>
	</div><!--/.card-body-->
</div><!--/.card-->
<?php else: ?>
<div class="card">
	<?= form_open('login', 'role="form" id="login" class="card-body"', $hidden) ?>

		<!-- username/email address -->
		<div>
			<label for="<?= $login_type ?>" class="form-label mb-1 visually-hidden"><?= _translate($login['placeholder']) ?></label>
			<?= print_input($login, ['class' => error_class($login_type, 'form-control form-control-sm')]) ?>
			<?= form_error($login_type) ?>
		</div>

		<!-- password -->
		<div class="mt-2">
			<label for="password" class="form-label mb-1 visually-hidden"><?= line('password') ?></label>
			<?= print_input($password, ['class' => error_class('password', 'form-control form-control-sm')]) ?>
			<?= form_error('password') ?>
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

	<?php if (isset($remember)): ?>
		<!-- remember me -->
		<div class="form-check form-switch mt-3">
			<?= print_input($remember, ['class' => 'form-check-input', 'role' => 'switch']) ?>
			<label for="remember" class="form-check-label"><?= line('remember_me') ?></label>
		</div>
	<?php endif; ?>

		<!-- login button -->
		<div class="d-grid d-lg-flex gap-2 mt-3">
			<button role="button" type="submit" class="btn btn-primary btn-sm flex-fill"><?= line('login') ?></button>
			<?php if ($this->config->item('allow_quick_login')): ?>
			<!-- quick-login button -->
				<?= anchor('quick-login', line('quick_login'), 'class="btn btn-outline-primary btn-sm" tabindex="-1"') ?>
			<?php endif; ?>
		</div>

	<?= form_close() ?><!--/.card-body-->

	<?php if (!CI_OFFLINE): ?>
	<div class="card-footer bg-body-secondary border-top-0">
		<div class="d-grid d-lg-flex gap-2">
			<!-- lost password button -->
			<?= anchor('lost-password', line('lost_password'), [
				'role' => 'button',
				'tabindex' => '-1',
				'class' => 'btn btn-light btn-sm flex-fill'
			]) ?>
		<?php if ($this->config->item('allow_registration')): ?>
			<!-- create account button -->
			<?= anchor('register', line('create_account'), 'class="btn btn-light btn-sm flex-fill"') ?>
		<?php endif; ?>
		</div>
	</div><!--/.card-footer-->
	<?php endif; ?>
</div><!--/.card-->

<?php if (!empty($this->oauth->providers)): ?>
<!-- extra buttons -->
<div class="mt-2">
	<div class="d-grid d-md-flex gap-2">
	<?php foreach ($this->oauth->providers as $name => $url): ?>
		<a href="<?= $url ?>" class="btn btn-light btn-sm flex-fill" tabindex="-1">
			<i class="fab fa-fw fa-<?= $name ?>"></i>
		</a>
	<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>

<?php endif; ?>
