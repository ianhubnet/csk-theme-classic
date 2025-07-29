<?= $this->theme->partial('navbar') ?>
<div class="container">
	<?= $this->ui->alerts() ?>
	<?= $this->theme->content() ?>
</div>
<?php
echo $this->theme->partial('cookies');
echo $this->theme->partial('footer');
