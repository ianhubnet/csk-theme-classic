<?= $this->hub->theme->partial('header') ?>
<main id="wrapper" role="main" class="pt-3 pb-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<?php
				// Display the alert.
				echo $this->hub->ui->alerts();

				// Display the page content.
				echo $this->hub->theme->content();
				?>
			</div><!--/.col-lg-6-->
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/#wrapper-->
<?= $this->hub->theme->partial('footer') ?>
