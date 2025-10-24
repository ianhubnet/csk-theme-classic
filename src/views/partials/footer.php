<footer class="footer" role="contentinfo">
	<div class="container">
		<div class="row align-items-center justify-content-between flex-column flex-sm-row gap-2">
			<div class="col text-center text-sm-start">
				<div class="d-flex flex-column flex-sm-row gap-1 gap-sm-2">
					<span>&copy; <?= date('Y') ?> <?= anchor('', $site_name) ?> &#10072; <?= line('all_rights_reserved') ?></span>
					<span class="d-none d-sm-inline">&#10072;</span>
					<span><?= sline('powered_by_url', Platform::LABEL, Platform::SITE_URL) ?></span>
				</div>
			</div><!--/.col-->
			<?= $this->hub->menus->render('footer', [
				'container' => 'div',
				'container_attrs' => ['class' => 'col'],
				'menu_attrs' => ['class' => 'nav'],
				'item_attrs' => ['class' => 'nav-item'],
				'link_attrs' => ['class' => 'nav-link'],
			]) ?>
		</div><!--/.row-->
	</div><!--/.container-->
</footer>
