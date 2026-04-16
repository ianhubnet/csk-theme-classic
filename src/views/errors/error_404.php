<div class="row">
	<div class="col">
		<div class="px-4 py-3">
			<h1 class="h2 fw-bold text-body-emphasis text-center"><?= $heading ?></h1>
			<p class="lead text-center mt-2 mb-0"><?= $message ?></p>
			<div class="d-grid d-md-flex gap-3 justify-content-center mt-3">
				<?php
				// Back to homepage.
				echo anchor('', line('return_home'), 'class="btn btn-primary"');

				if ($this->module->enabled('contact')) {
					echo anchor('contact', line('contact_us'), 'class="btn btn-light"');
				}
				?>
			</div>
		</div>
	</div><!--/.col-->
</div><!--/.row-->
