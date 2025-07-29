<footer class="navbar fixed-bottom bg-body-secondary" role="contentinfo">
	<div class="container justify-content-center">
		<p class="navbar-text p-0 m-1"><?= anchor('', $site_name) ?>. &copy; <?= line('all_rights_reserved') ?> <?= date('Y') ?>.<?php if (ENVIRONMENT !== 'production' && $this->hub->auth->is_admin()): ?> <abbr title="Render Time">RT</abbr>: <strong>{elapsed_time}</strong>. <abbr title="Theme Render Time">TT</abbr>: <strong>{theme_time}</strong>.<?php endif; ?> <?= $this->lang->sline('powered_by_url', Platform::LABEL, Platform::SITE_URL) ?></p>

<?php
if ($this->hub->has_menu('footer-menu')) {
	echo $this->menus->build_menu(array(
		'location' => 'footer-menu',
		'menu_attr' => array('class' => 'nav navbar-nav navbar-right'),
		'container' => false,
	));
}
		?>
	</div>
</footer>
