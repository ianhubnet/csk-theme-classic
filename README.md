# CSK Theme — Classic

The **default frontend theme** for [CiSkeleton (CSK)](https://github.com/ianhubnet).

**Classic** is a clean, minimal example of how CSK themes work.  
It’s intentionally simple — making it the perfect starting point for building your own custom themes.

---

## Quick links
- Demo: [`https://demos.ianhub.net/skeleton/`](https://demos.ianhub.net/skeleton/)
- Issues & feedback: `https://github.com/ianhubnet/csk-packages/issues`

---

## Overview

CSK themes only provide the **visual partials**:
- `header.php`
- `footer.php`
- Any extra layouts, partials, widgets, or view overrides

The global HTML structure (`<!DOCTYPE>`, `<html>`, `<head>`, `<body>`, scripts, etc.) is handled by CSK itself.

This makes themes lightweight, focused, and easy to maintain.

---

## Repository layout

```
├── assets/ # Public assets (css, js, images, fonts)
│ ├── css/
│ ├── js/
│ └── images/
├── src/ # Protected theme source (loaded by CSK)
│ ├── config/
│ │ ├── images.php # theme image sizes / thumbnails
│ │ └── menus.php # theme menu locations (key => lang)
│ ├── language/ # theme-specific translations
│ │ └── english.php
│ ├── views/
│ │ ├── layouts/ # layouts (default.php, auth.php, etc.)
│ │ ├── partials/ # header.php, footer.php, sidebar.php, ...
│ │ └── widgets/ # optional widget view files
│ ├── .htaccess # protection for src/ when deployed
│ ├── info.php # theme metadata (name, version, translations)
│ └── boot.php # theme bootstrapping (asset + partial queuing)
├── .editorconfig
├── .gitattributes
├── .gitignore
├── CITATION.cff
├── index.html # Directory access forbidden placeholder
├── LICENSE.md
├── README.md
└── screenshot.png|jpg|webp
```

---

## How CSK loads themes (essentials)

- CSK looks for `src/info.php` to read theme metadata (name, version, translations).
- `src/boot.php` is executed at theme load time — use it to:
  - queue assets (CSS/JS),
  - register partials,
  - add view filters or hooks.
- Partials that appear on every page live under `src/views/partials/` and are rendered by layouts (e.g. `header.php`, `footer.php`).
- Layouts should **not** include `<!DOCTYPE>` → CSK renders the global shell; themes only provide the body content partials and layout fragments.
- Use `src/config/menus.php` to declare menu **locations** (key => language string). Applications assign menus to locations.

---

## Theme config files (recommended content)

### `src/info.php`

Defines theme metadata. Example:

```php
return [
    // Info
    'name' => 'Classic',
    'theme_uri' => 'https://github.com/ianhubnet/csk-theme-default/',
    'description' => 'A multipurpose CiSkeleton theme built with Bootstrap 5.',
    'version' => '0.6.1b',
    'author' => 'Kader Bouyakoub',
    'author_uri' => 'https//www.ianhub.net/', // Optional
    'author_email' => 'kade@email.address', // Optional
    'tags' => 'codeigniter, skeleton, bkader, bootstrap',

    // Translations:
    'translations' => [
        // Arabic
        'arabic' => [
            'name' => 'كلاسيك',
            'description' => 'قالب سي سكلتون متعدد الأغراض مُصمم باستخدام بوتسترب 5.',
        ],
        // French
        'french' => [
            'name' => 'Classique',
            'description' => 'Un thème CiSkeleton polyvalent développé avec Bootstrap 5.',
        ]
];
```

### `src/config/images.php`

Define standard thumbnails used by the media library:

```php
$config['thumb'] = [
    'width' => 260,
    'height' => 180,
    'crop' => true,
];

$config['featured'] = [
    'width' => 850,
    'height' => 350,
    'crop' => true
];
```

### `src/config/menus.php`

Expose theme menu locations:

```php
return [
    'primary' => 'lang:menu_loc_main',
    'footer' => 'lang:menu_loc_footer',
    'sidebar' => 'lang:menu_loc_sidebar',
];
```

---

## Theming best practices

- **Keep logic out of views**. Views should be presentation-only; use `boot.php` for wiring.
- **Respect CSK partial contract**: themes should provide `header.php` and `footer.php` partials and layout overrides only — don’t duplicate the global HTML shell.
- **Translations**: add any theme-specific language lines under `src/language/<lang>.php`. Use `lang:...` keys in `info.php` and `config/menus.php`.
- **Menu locations**: declare them in `src/config/menus.php` — the application maps menus to these locations via the admin UI.
- **Assets**: put compiled/minified CSS & JS inside `assets/` and enqueue them from `src/boot.php`.

---

## Example `src/boot.php` snippet

```php
/**
 * Trigger on the front-end and handles queuing assets we need.
 *
 * @param CI_Controller $ci
 * @return void
 */
once_action('theme_setup', function ($ci) {
    // Queue default dashboard font 'Fira Sans':
    $ci->hub->assets->google_font('Fira+Sans', 'ital,wght@0,400;0,700;1,400;1,700');

    // Queue Arabic/Persian dashboard font 'Noto Kufi Arabic':
    if ($ci->lang->current === 'arabic' || $ci->lang->current === 'persian') {
        $ci->hub->assets->google_font('Noto Kufi Arabic', '100..900');
    }

    // Enqueue FontAwesome and Bootstrap.
    $ci->hub->assets->fontawesome()->bootstrap();

    // Assets we queue in production mode.
    $style_css = 'assets/css/style'.(CI_DEBUG ? '' : '.min').'.css';
    $ci->hub->assets->css($ci->url->theme($style_css), 'style', null, true);
});

/**
 * Enqueue partial view files.
 *
 * @param  CI_Controller $ci
 * @return void
 */
once_action('enqueue_partials', function ($ci) {
    // Default partials, queued no matter the section.
    $ci->hub->theme
        ->add_partial('header')
        ->add_partial('footer');

    // Nothing to had for blog module.
    if ($ci->router->module === 'blog') {
        return;
    }

    // Add default sidebar.
    $ci->hub->theme->add_partial('sidebar');
});
```

Please see `src/boot.php` for details and examples.

---

## How to create a child theme / fork Classic

1. Duplicate the repository and rename folder (e.g., `mytheme`).
2. Update `src/info.php` (`name`, `version`, `author`, translations).
3. Replace `screenshot.*` and edit CSS assets.
4. Drop your theme into `content/themes/<yourtheme>` or install via admin UI.
5. Activate the theme from **Extensions** → **Themes**.

---

## As a Starter Template

This theme is ideal as a **boilerplate** for:
- New themes
- Client projects
- Custom design systems
- Experiments and prototypes

Just duplicate the folder, rename it, and update `src/info.php`.

---

## For Developers

This repository is part of the CSK ecosystem and is automatically tracked inside:

- **[csk-packages](https://github.com/ianhubnet/csk-packages/tree/main/packages/themes) → packages/themes/classic**  
- Available for theme builders as a reference

---

## Accessibility & responsiveness

Classic is built on Bootstrap and follows responsive principles. Please:
- Use semantic HTML (headings, landmarks).
- Provide `alt` text for images.
- Keep color contrast high for readable text.

---

## License & attribution

See `LICENSE.md`for license details.
If you reuse parts of Classic, keep author attribution in `src/info.php`.

---

## Contributing & Questions

This repo is public to demonstrate CSK theme structure and to serve as a starter kit.

If you have suggestions for the theme structure or documentation, open an issue in the appropriate public repo ([`csk-packages`](https://github.com/ianhubnet/csk-packages) or [`csk-theme-classic`](https://github.com/ianhubnet/csk-theme-classic)) or contact the maintainer.

---

## Screenshot

`screenshot.webp` is the theme preview used by the admin themes list — update it when you change the look.
