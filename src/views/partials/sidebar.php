<?= $this->hub->menus->render('sidebar', [
	'container' => 'nav',
	'container_attrs' => ['class' => 'navbar'],
	'menu_attrs' => ['class' => 'nav nav-pills nav-underline mb-2'],
	'item_attr' => ['class' => 'nav-item'],
	'link_attr' => ['class' => 'nav-link'],
]) ?>
<div class="card card-default">
	<div class="card-header bg-body-secondary">
		<h2 class="card-title h4 mb-0"><?= line('theme_sidebar_heading', 'default') ?></h2>
	</div>
	<div class="card-body">
		<p class="mb-0"><?= line('theme_sidebar_content', 'default') ?></p>
	</div>
</div>
