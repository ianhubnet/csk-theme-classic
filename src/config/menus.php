<?php

/**
 * Menu configuration
 *
 * Each menu is an array of items.
 * Items support localization, conditions, children, and attributes.
 */

// Primary menu.
$config['primary'] = [
	[
		'title' => 'lang:home',
		'href'  => '/',
	],

	[
		'title' => 'lang:blog',
		'href'  => 'blog',
		'show_if' => ['module' => 'blog'],
	],

	[
		'title' => 'lang:contact_us',
		'href'  => 'contact',
		'show_if' => ['module' => 'contact'],
	]
];

// Footer menu.
$config['footer'] = [
	// Ianhub website.
	[
		'title' => '<i class="fa fa-fw fa-globe"></i>',
		'href' => Platform::SITE_URL,
		'attrs' => ['rel' => 'external', 'target' => '_blank']
	],

	// Ianhub GitHub
	[
		'title' => '<i class="fab fa-fw fa-github"></i>',
		'href' => 'https://github.com/ianhubnet/',
		'attrs' => ['rel' => 'external', 'target' => '_blank']
	],

	// Ianhub LinkedIn
	[
		'title' => '<i class="fab fa-fw fa-linkedin"></i>',
		'href' => 'https://www.linkedin.com/company/ianhub/',
		'attrs' => ['rel' => 'external', 'target' => '_blank']
	]
];
