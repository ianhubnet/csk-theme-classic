<?= $this->hub->theme->partial('navbar') ?>
<div class="container wrapper">
	<div class="row">
		<div class="col-12 col-lg-9 mb-3 mb-lg-0">
			<?= $this->hub->ui->alerts() ?>
			<?= $this->hub->theme->content() ?>
		</div>
		<div class="col-12 col-lg-3"><?= $this->hub->theme->partial('sidebar') ?></div>
	</div>
</div>
<?php
echo $this->hub->theme->partial('cookies');
echo $this->hub->theme->partial('footer');
