<div class="error-outer">
	<div class="error-middle">
		<div class="error-inner">
			<div class="error-circle">
				<i class="fa fa-fw fa-home"></i>
				<span>404</span>
			</div>
			<span class="error-status"><?= $heading ?></span>
			<span class="error-detail"><?= $message ?></span>
			<div class="d-grid d-md-flex gap-3 justify-content-center mt-3">
				<?php
				echo anchor('', line('return_home'), 'class="btn btn-primary"');
				if ($this->module->enabled('contact')) {
					echo anchor('contact', line('contact_us'), 'class="btn btn-light"');
				}
				?>
			</div>
		</div>
	</div>
</div>
