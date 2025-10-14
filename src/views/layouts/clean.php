<?= $this->hub->theme->partial('header') ?>

<main class="container" role="main">
	<?= $this->hub->ui->alerts() ?>
	<?= $this->hub->theme->content() ?>
</main>

<?= $this->hub->theme->partial('footer') ?>
