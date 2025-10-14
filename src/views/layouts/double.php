<?= $this->hub->theme->partial('header') ?>

<main class="wrapper pt-3 pb-5" role="main">
	<div class="container">
		<div class="row">

			<section class="col-lg-9">
				<?= $this->hub->ui->alerts() ?>
				<?= $this->hub->theme->content() ?>
			</section>

			<aside class="col-lg-3 mt-3 mt-lg-0 d-flex flex-column gap-3" role="complementary">
				<?= $this->hub->theme->partial('sidebar') ?>
			</aside>

		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/#wrapper-->

<?= $this->hub->theme->partial('footer') ?>
