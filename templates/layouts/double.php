<?= $this->theme->partial('header') ?>
<main role="main" class="wrapper pt-3 pb-5">
	<div class="container">
		<div class="row">
			<article class="col-lg-9">
				<?= $this->hub->ui->alerts() ?>
				<?= $this->hub->theme->content() ?>
			</article>
			<aside class="col-lg-3 mt-3 mt-lg-0">
				<?= $this->hub->theme->partial('sidebar') ?>
			</aside>
		</div><!--/.row-->
	</div><!--/.container-->
</main><!--/#wrapper-->
<?php
echo $this->hub->theme->partial('cookies');
echo $this->hub->theme->partial('footer');
