<div class="row">
	<div class="col-12 col-md-9 order-md-2">
		<div class="card">
			<div class="card-header bg-body-secondary py-3">
				<h1 class="card-title h4 mb-1"><?= line('personal_info') ?></h1>
				<p class="mb-0"><?= line('personal_info_notice', null, '<small>', '</small>') ?></p>
			</div><!--/.card-header-->

			<div class="card-body">
				<?= form_open('', 'role="form" id="update-profile"', $hidden) ?>

					<!-- First name and last name fields. -->
					<div class="row mb-3">
						<label class="col-sm-3 col-form-label"><?= line('full_name') ?></label>
						<div class="col-sm-9">
							<div class="row row-cols-1 row-cols-sm-2 g-3">
								<div class="col">
									<label for="first_name" class="form-label mb-1 visually-hidden"><?= line('first_name') ?></label>
									<?= print_input($first_name, [
										'class' => error_class('first_name', 'form-control form-control-sm')
									]) ?>
									<?= form_error('first_name') ?>
								</div>
								<div class="col">
									<label for="last_name" class="form-label mb-1 visually-hidden"><?= line('last_name') ?></label>
									<?= print_input($last_name, [
										'class' => error_class('last_name', 'form-control form-control-sm')
									]) ?>
									<?= form_error('last_name') ?>
								</div>
							</div>
						</div>
					</div>

					<!-- Company field -->
					<div class="row mb-3">
						<label for="company" class="col-sm-3 col-form-label"><?= line('company') ?></label>
						<div class="col-sm-9">
							<?= print_input($company, ['class' => error_class('company', 'form-control form-control-sm')]) ?>
							<?= form_error('company') ?>
						</div>
					</div>

					<!-- Phone field -->
					<div class="row mb-3">
						<label for="phone" class="col-sm-3 col-form-label"><?= line('phone_num') ?></label>
						<div class="col-sm-9">
							<?= print_input($phone, ['class' => error_class('phone', 'form-control form-control-sm')]) ?>
							<?= form_error('phone') ?>
						</div>
					</div>

					<!-- Address -->
					<div class="row mb-3">
						<label for="address" class="col-sm-3 col-form-label"><?= line('address') ?></label>
						<div class="col-sm-9">
							<div class="row g-3">
								<!-- Address -->
								<div class="col-12">
									<?= print_input($address, [
										'class' => error_class('address', 'form-control form-control-sm')
									]) ?>
									<?= form_error('address') ?>
								</div>
								<!-- City -->
								<div class="col-12 col-md-6">
									<label for="city" class="form-label mb-1"><?= line('city') ?></label>
									<?= print_input($city, [
										'class' => error_class('city', 'form-control form-control-sm')
									]) ?>
									<?= form_error('city') ?>
								</div>
								<!-- Zipcode -->
								<div class="col-12 col-md-6">
									<label for="zipcode" class="form-label mb-1"><?= line('zip_code') ?></label>
									<?= print_input($zipcode, [
										'class' => error_class('zipcode', 'form-control form-control-sm')
									]) ?>
									<?= form_error('zipcode') ?>
								</div>
							</div>
						</div>
					</div>

					<!-- State field -->
					<div class="row mb-3">
						<label for="state" class="col-sm-3 col-form-label"><?= line('state') ?></label>
						<div class="col-sm-9">
							<?= print_input($state, ['class' => error_class('state', 'form-control form-control-sm')]) ?>
							<?= form_error('state') ?>
						</div>
					</div>

					<!-- Country field -->
					<div class="row mb-3">
						<label for="country" class="col-sm-3 col-form-label"><?= line('country') ?></label>
						<div class="col-sm-9">
							<?= country_menu(
								$this->user->country,
								error_class('country', 'form-select select2'),
								'country',
								['aria-label' => line('country')]
							) ?>
							<?= form_error('country') ?>
						</div>
					</div>

					<!-- Timezone -->
					<div class="row mb-3">
						<label for="state" class="col-sm-3 col-form-label"><?= line('timezone') ?></label>
						<div class="col-sm-9">
							<?= print_input($timezone, ['class' => error_class('timezone', 'form-control form-control-sm')]) ?>
							<?= form_error('timezone') ?>
						</div>
					</div>

					<div class="row justify-content-end">
						<div class="col-sm-9 d-grid">
							<button role="button" type="submit" class="btn btn-primary btn-sm"><?= line('save_changes') ?></button>
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
