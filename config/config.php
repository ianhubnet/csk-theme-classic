<?php
defined('BASEPATH') || exit('A moment of silence for your attempt.');

/**
 * Default Theme Config
 *
 * File Description.
 *
 * @package    App\Config
 * @category   Themes
 * @author     Kader Bouyakoub <bkader[at]mail[dot]com>
 * @copyright  Copyright (c) 2025, Kader Bouyakoub
 */

$config['theme_images'] = [
	'thumb' => [
		'width' => 260,
		'height' => 180,
		'crop' => true,
	],
	'avatar' => [
		'width' => 100,
		'height' => 100,
		'crop' => true,
	],
];

$config['theme_menus'] = [
	'header-menu' => 'lang:main_menu',
	'footer-menu' => 'lang:footer_menu',
	'sidebar-menu' => 'lang:sidebar_menu',
];
