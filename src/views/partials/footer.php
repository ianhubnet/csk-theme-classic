<footer class="navbar fixed-bottom bg-body-secondary" role="contentinfo">
	<div class="container justify-content-center">
		<p class="navbar-text p-0 m-1"><?= anchor('', $site_name) ?>. &copy; <?= line('all_rights_reserved') ?> <?= date('Y') ?>.<?php if (!CI_LIVE && $this->hub->auth->is_admin()): ?> <abbr title="Render Time">RT</abbr>: <strong>{elapsed_time}</strong>. <abbr title="Theme Render Time">TT</abbr>: <strong>{theme_time}</strong>.<?php endif; ?> <?= sline('powered_by_url', Platform::LABEL, Platform::SITE_URL) ?></p>

<?= $this->hub->menus->render('footer', [
	'menu_attrs' => ['class' => 'nav nav-pills nav-underline ms-2'],
	'item_attr' => ['class' => 'nav-item'],
	'link_attr' => ['class' => 'nav-link'],
]) ?>
	</div>
</footer>
