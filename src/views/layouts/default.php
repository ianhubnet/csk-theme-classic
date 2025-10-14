<?= $this->hub->theme->partial('header') ?>

<main class="wrapper pt-3 pb-5" role="main">
	<div class="container">
		<?php
		// Display the alert.
		echo $this->hub->ui->alerts();

		// Fires at the top of page content.
		$this->hooks->trigger('page_header');

		// Display the page content.
		echo $this->hub->theme->content();

		// Fires at the bottom of page content.
		$this->hooks->trigger('page_footer');
		?>
	</div><!--/.container-->
</main><!--/#wrapper-->

<?= $this->hub->theme->partial('footer') ?>
