<h1 class="text-center h4 mb-2"><?= line('create_account') ?></h1>

<div class="card">
	<?= form_open('register', 'role="form" id="register" class="card-body"', $hidden) ?>

		<!-- first name -->
		<div class="mb-2">
			<label for="first_name" class="form-label mb-1 visually-hidden"><?= line('first_name') ?></label>
			<?= print_input($first_name, ['class' => error_class('first_name', 'form-control form-control-sm')]) ?>
			<?= form_error('first_name') ?>
		</div>

		<!-- last name -->
		<div class="mb-2">
			<label for="last_name" class="form-label mb-1 visually-hidden"><?= line('last_name') ?></label>
			<?= print_input($last_name, ['class' => error_class('last_name', 'form-control form-control-sm')]) ?>
			<?= form_error('last_name') ?>
		</div>

		<!-- email address -->
		<div class="mb-2">
			<label for="email" class="form-label mb-1 visually-hidden"><?= line('email_address') ?></label>
			<?= print_input($email, ['class' => error_class('email', 'form-control form-control-sm')]) ?>
			<?= form_error('email') ?>
		</div>

		<!-- username -->
		<div class="mb-2">
			<label for="username" class="form-label mb-1 visually-hidden"><?= line('username') ?></label>
			<?= print_input($username, ['class' => error_class('username', 'form-control form-control-sm')]) ?>
			<?= form_error('username') ?>
		</div>

		<!-- password -->
		<div class="mb-2">
			<label for="password" class="form-label mb-1 visually-hidden"><?= line('password') ?></label>
			<?= print_input($password, ['class' => error_class('password', 'form-control form-control-sm')]) ?>
			<?= form_error('password') ?>
		</div>

		<!-- confirm password -->
		<div class="mb-2">
			<label for="cpassword" class="form-label mb-1 visually-hidden"><?= line('confirm_password') ?></label>
			<?= print_input($cpassword, ['class' => error_class('cpassword', 'form-control form-control-sm')]) ?>
			<?= form_error('cpassword') ?>
		</div>

	<?php if (isset($captcha_image)): ?>
		<!-- captcha -->
		<div class="row row-cols-1 row-cols-md-2 mb-2">
			<div class="col" tabindex="-1">
				<?= $captcha_image ?>
			</div>
			<div class="col">
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
			<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('create_account') ?></button>
		</div><!--/.d-grid-->

	<?= form_close() ?><!--/.card-body-->

	<div class="card-footer bg-body-secondary border-top-0">
		<div class="d-grid">
			<?= anchor('login', line('login'), 'tabindex="-1" class="btn btn-light btn-sm flex-fill"') ?>
		</div><!--/.d-grid-->
	</div><!--/.card-footer-->
</div><!--/.card-->
