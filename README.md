# Elementor FAQ Accordion

Custom [Elementor](https://elementor.com/) widget — a numbered FAQ accordion with smooth expand/collapse animation and full styling via the Elementor panel.

## Features

- Repeater for unlimited questions and answers
- WYSIWYG editor for answers (HTML, lists, links)
- "Open by default" option per item
- Automatic numbering (1., 2., 3. …)
- Smooth CSS expand animation (grid `0fr` → `1fr`)
- Full styling via Elementor Style tab: background, border radius, gaps, typography, icon, divider
- Accessibility: `aria-expanded`, `aria-controls`, `role="region"`, `focus-visible`
- Responsive styles for mobile

## Requirements

- WordPress 5.8+
- PHP 7.4+
- [Elementor](https://wordpress.org/plugins/elementor/) (free or Pro)

## Installation

### Option 1 — WordPress Admin

1. Upload the `elementor-faq-accordion` folder to `wp-content/plugins/`
2. Go to **Plugins → Installed Plugins** and activate **Elementor FAQ Accordion**
3. Make sure Elementor is also active

### Option 2 — ZIP archive

```bash
zip -r elementor-faq-accordion.zip elementor-faq-accordion/
```

Upload the ZIP via **Plugins → Add New → Upload Plugin**.

## Usage

1. Open a page in the Elementor editor
2. Find **FAQ Accordion** in the widget panel (category: *General*)
3. On the **Content** tab, add questions and answers
4. On the **Style** tab, customize colors, typography, and spacing

## Project structure

```
elementor-faq-accordion/
├── elementor-faq-accordion.php
├── includes/
│   └── class-faq-accordion-widget.php
├── assets/
│   ├── css/
│   │   └── faq-accordion.css
│   └── js/
│       └── faq-accordion.js
├── .gitignore
└── README.md
```

## Migration from child theme

If the widget was previously registered in your child theme's `functions.php`, remove these lines after activating the plugin to avoid double registration:

```php
add_action( 'wp_enqueue_scripts', 'welleats_enqueue_faq_assets' );
add_action( 'elementor/widgets/register', 'welleats_register_faq_widget' );
```

The widget slug (`welleats_faq_accordion`) is unchanged — existing pages will continue to work.

## Publish to GitHub

```bash
cd elementor-faq-accordion
git init
git add .
git commit -m "Initial release: Elementor FAQ Accordion widget v1.0.0"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/elementor-faq-accordion.git
git push -u origin main
```

## License

MIT
