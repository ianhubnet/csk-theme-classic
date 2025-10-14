<?= $this->hub->theme->partial('header') ?>

<main id="wrapper" class="pt-3 pb-5" role="main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
				<?php
				// Display the alert.
				echo $this->hub->ui->alerts();

				// Display the page content.
				echo $this->hub->theme->content();
				?>
			</section><!--/.col-lg-6-->
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/#wrapper-->

<?= $this->hub->theme->partial('footer') ?>
