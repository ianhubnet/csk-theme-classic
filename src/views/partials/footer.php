<footer class="navbar fixed-bottom bg-body-secondary" role="contentinfo">
	<div class="container d-flex flex-column flex-md-row justify-content-center gap-1 gap-md-3">
		<p class="navbar-text text-center text-md-start m-0 p-0">
			<?= anchor('', $site_name) ?>. &copy; <?= line('all_rights_reserved') ?> <?= date('Y') ?>.<?php if (!CI_LIVE && $this->hub->auth->is_admin()): ?> <abbr title="Render Time">RT</abbr>: <strong>{elapsed_time}</strong>. <abbr title="Theme Render Time">TT</abbr>: <strong>{theme_time}</strong>.<?php endif; ?> <?= sline('powered_by_url', Platform::LABEL, Platform::SITE_URL) ?>
		</p>
		<?= $this->hub->menus->render('footer', [
			'menu_attrs' => ['class' => 'nav flex-row gap-2'],
			'item_attr' => ['class' => 'nav-item'],
			'link_attr' => ['class' => 'nav-link'],
		]) ?>
	</div><!--/.container-->
</footer>
