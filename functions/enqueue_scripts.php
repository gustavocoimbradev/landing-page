<?php 

function enqueue_assets() {
    $template = get_page_template_slug();
    $template_name = basename($template, '.php');

    foreach (glob(get_template_directory() . '/assets/css/*.css') as $file) {
        wp_enqueue_style(basename($file, '.css'), get_template_directory_uri() . '/assets/css/' . basename($file));
    }

    foreach (glob(get_template_directory() . '/assets/js/*.js') as $file) {
        wp_enqueue_script(basename($file, '.js'), get_template_directory_uri() . '/assets/js/' . basename($file), array(), null, true);
    }

    $page_css = get_template_directory_uri() . '/assets/css/landing-pages/' . $template_name . '.min.css';
    $page_js = get_template_directory_uri() . '/assets/js/landing-pages/' . $template_name . '.min.js';

    if (file_exists(get_template_directory() . '/assets/css/landing-pages/' . $template_name . '.min.css')) {
        wp_enqueue_style($template_name, $page_css);
    }

    if (file_exists(get_template_directory() . '/assets/js/landing-pages/' . $template_name . '.min.js')) {
        wp_enqueue_script($template_name, $page_js, array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_assets');
