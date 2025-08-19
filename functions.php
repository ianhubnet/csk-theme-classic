<?php

defined('BASEPATH') || exit('A moment of silence for your attempt.');

/**
 * Default theme functions.php file.
 *
 * This file is an example of how to use functions.php for your themes.
 * You can use a class or simply a list of functions to add your hooks.
 *
 * @package     CiSkeleton\Themes
 * @subpackage  Default\Functions
 * @author      Kader Bouyakoub <bkader[at]mail[dot]com>
 * @link        http://bit.ly/KaderGhb
 * @copyright   Copyright (c) 2024, Kader Bouyakoub (http://bit.ly/KaderGhb)
 */

final class CI_Theme_Default
{
	protected $ci;
	protected $path;
	public $active = false;

	public function __construct()
	{
		$this->ci = app();
		$this->path = $this->ci->config->theme_path();

		// Bail early for dashboard, but set the path to theme language files.
		if (CI_ADMIN) {
			$this->ci->hooks->once('theme_translation', [$this, '_theme_translations']);
			return;
		}

		// Mark theme as active.
		$this->active = true;

		// Register filters for theme layout, partial, widget, and view files.
		$this->ci->hooks->once('theme_layouts_path', [$this, '_layouts_path']);
		$this->ci->hooks->once('theme_partials_path', [$this, '_partials_path']);
		$this->ci->hooks->once('theme_widgets_path', [$this, '_widgets_path']);
		$this->ci->hooks->once('theme_views_path', [$this, '_views_path']);

		// Enable these hooks if you wish to remove CiSkeleton copyright and generator.
		$this->ci->hooks->once('skeleton_copyright', [$this, '_copyright']);
		$this->ci->hooks->once('skeleton_generator', [$this, '_generator']);

		// Enqueue assets we need for the theme.
		$this->ci->hooks->once('after_theme_setup', [$this, '_theme_setup']);
		$this->ci->hooks->once('extra_head', [$this, '_extra_head']);

		// Enqueue theme partials.
		$this->ci->hooks->once('enqueue_partials', [$this, '_enqueue_partials']);

		// Theme layout manager.
		$this->ci->hooks->once('theme_layout', [$this, '_set_layout']);

		// Configure pagination.
		$this->ci->hooks->once('pagination', [$this, '_set_pagination']);

		// CAPTCHA filters.
		$this->ci->hooks->once('captcha_img_height', [$this, '_captcha_img_height']);
		$this->ci->hooks->once('captcha_border_color', [$this, '_captcha_border_color']);
		$this->ci->hooks->once('captcha_text_color', [$this, '_captcha_text_color']);
		$this->ci->hooks->once('captcha_grid_color', [$this, '_captcha_grid_color']);
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the path to the theme's language folder.
	 *
	 * @return string
	 */
	public function _theme_translations()
	{
		return $this->path.'language/';
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the path to theme's layouts folder.
	 *
	 * @return string
	 */
	public function _layouts_path()
	{
		return $this->path.'templates/layouts/';
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the path to theme's partials folder.
	 *
	 * @return string
	 */
	public function _partials_path()
	{
		return $this->path.'templates/partials/';
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the path to theme's widgets folder.
	 *
	 * @return string
	 */
	public function _widgets_path()
	{
		return $this->path.'templates/widgets/';
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the path to theme's views folder.
	 *
	 * @return string
	 */
	public function _views_path()
	{
		return $this->path.'templates/';
	}

	// --------------------------------------------------------------------

	/**
	 * This method is triggered after theme was installed.
	 *
	 * @return void
	 */
	public function _theme_setup()
	{
		// Queue default dashboard font 'Fira Sans':
		$this->ci->hub->assets->google_font('Fira+Sans', 'ital,wght@0,400;0,700;1,400;1,700');

		// Queue Arabic/Persian dashboard font 'Noto Kufi Arabic':
		if ($this->ci->lang->current === 'arabic' || $this->ci->lang->current === 'persian') {
			$this->ci->hub->assets->google_font('Noto Kufi Arabic', '100..900');
		}

		// Enqueue FontAwesome and Bootstrap.
		$this->ci->hub->assets->fontawesome()->bootstrap();

		// Assets we queue in production mode.
		if (CI_LIVE) {
			$this->ci->hub->theme->add_meta('dns-prefetch', '//fonts.googleapis.com/', 'rel');
			$this->ci->hub->assets->css($this->ci->url->theme('style.min.css'), 'style', null, true);
		} else {
			$this->ci->hub->assets->css($this->ci->url->theme('style.css'), 'style', null, true);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Adds IE8 support.
	 *
	 * @param  string $content
	 * @return string
	 */
	public function _extra_head($content)
	{
		// We add support for old browsers.
		add_ie9_support($output, CI_LIVE);
		return $output;
	}

	// --------------------------------------------------------------------

	/**
	 * Enqueues partial files.
	 *
	 * @return void
	 */
	public function _enqueue_partials()
	{
		// Default partials, queued no matter the section.
		$this->ci->hub->theme
			->add_partial('header')
			->add_partial('footer');

		// Nothing to had for blog module.
		if ($this->ci->router->module === 'blog') {
			return;
		}

		// Add default sidebar.
		$this->ci->hub->theme->add_partial('sidebar');
	}

	// --------------------------------------------------------------------

	/**
	 * Handles setting current layout to use.
	 *
	 * @param  string $layout  Layout being filtered.
	 * @return string
	 */
	public function _set_layout($layout) {
		// Use `clean` layout for authentication (`Auth.php` controller).
		if ($this->ci->router->is_class('auth')) {
			return 'clean';
		}

		// Use `full` layout for blog module.
		if ($this->ci->router->is_module('pages')) {
			return 'default';
		}

		// Return what was passed as-is.
		return $layout;
	}

	// --------------------------------------------------------------------

	/**
	 * Configure CiSkeleton pagination.
	 *
	 * @param  array $config
	 * @return array
	 */
	public function _set_pagination($config)
	{
		$config['full_tag_open'] = '<div class="text-center"><ul class="pagination pagination-sm pagination-centered mb-0">';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_links'] = 5;
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '<i class="fa fa-fw fa-backward"></i>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '<i class="fa fa-fw fa-forward"></i>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '<i class="fa fa-fw fa-fast-backward"></i>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '<i class="fa fa-fw fa-fast-forward"></i>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

		return $config;
	}

	// --------------------------------------------------------------------

	/**
	 * CiSkeleton comes with a copyright added to your final HTML output.
	 * We really appreciate the fact that you keep it, it is a way to say
	 * `Oh yeah, another person is using my project.`.
	 *
	 * If you want to remove it, and have the right to do it, this filter shows
	 * you how do it.
	 *
	 * @param  string $content
	 * @return string
	 */
	public function _copyright($content)
	{
		// Change it or return an empty string.
		return $content;
	}

	// --------------------------------------------------------------------

	/**
	 * Just like CiSkeleton copyright, if you wish to remove the `generator`
	 * meta tag, feel free to return an empty string or replace it with yours.
	 *
	 * @param  string $generator
	 * @return string
	 */
	public function _generator($generator)
	{
		return $generator;
	}

	// --------------------------------------------------------------------

	/**
	 * Changes CAPTCHA image height.
	 *
	 * @param  int $height
	 * @return int
	 */
	public function _captcha_img_height($height)
	{
		return 38;
	}

	// --------------------------------------------------------------------

	/**
	 * Changes CAPTCHA border color.
	 *
	 * @param  array $rgb
	 * @return array
	 */
	public function _captcha_border_color($rgb)
	{
		return [204, 204, 204];
	}

	// --------------------------------------------------------------------

	/**
	 * Changes CAPTCHA text color.
	 *
	 * @param  array $rgb
	 * @return array
	 */
	public function _captcha_text_color($rgb)
	{
		return [40, 96, 144];
	}

	// --------------------------------------------------------------------

	/**
	 * Changes CAPTCHA image grid color.
	 *
	 * @param  array $rgb
	 * @return array
	 */
	public function _captcha_grid_color($rgb)
	{
		return [101, 173, 233];
	}

}

$theme = new CI_Theme_Default();
unset($theme);
