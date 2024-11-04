<?php 

function get_replacements() {
    return array(
        'Páginas'                => 'Landing Pages',
        'Adicionar nova página'  => 'Adicionar nova Landing Page',
        'Editar página'          => 'Editar Landing Page',
        'Todas as páginas'       => 'Todas as Landing Pages',
        'Pesquisar páginas'      => 'Pesquisar Landing Pages',
        'Página actualizada'     => 'Landing Page atualizada',
        'Ver Página'             => 'Ver Landing Page'
    );
}

function custom_replace_texts_in_admin( $translated_text, $text, $domain ) {
    $replacements = get_replacements();
    return isset( $replacements[ $translated_text ] ) ? $replacements[ $translated_text ] : $translated_text;
}
add_filter( 'gettext', 'custom_replace_texts_in_admin', 10, 3 );

function custom_replace_menu_items() {
    global $menu, $submenu;
    $menu_replacements = get_replacements();
    
    foreach ( $menu as &$item ) {
        if ( isset( $menu_replacements[ $item[0] ] ) ) {
            $item[0] = $menu_replacements[ $item[0] ];
        }
    }

    if ( isset( $submenu['edit.php?post_type=page'] ) ) {
        foreach ( $submenu['edit.php?post_type=page'] as &$submenu_item ) {
            if ( isset( $menu_replacements[ $submenu_item[0] ] ) ) {
                $submenu_item[0] = $menu_replacements[ $submenu_item[0] ];
            }
        }
    }
}
add_action( 'admin_menu', 'custom_replace_menu_items' );

function custom_replace_admin_title( $admin_title, $title ) {
    $replacements = get_replacements();
    foreach ( $replacements as $original => $replacement ) {
        $admin_title = str_replace( $original, $replacement, $admin_title );
        $title = str_replace( $original, $replacement, $title );
    }
    return $admin_title;
}
add_filter( 'admin_title', 'custom_replace_admin_title', 10, 2 );

function custom_replace_h1_title( $title ) {
    $replacements = get_replacements();
    foreach ( $replacements as $original => $replacement ) {
        $title = str_replace( $original, $replacement, $title );
    }
    return $title;
}
add_filter( 'get_admin_page_title', 'custom_replace_h1_title' );

function custom_h1_title() {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var h1 = document.querySelector("h1.wp-heading-inline");
            if (h1) {
                h1.innerText = "' . get_replacements()['Páginas'] . '";
            }
        });
    </script>';
}
add_action( 'admin_head', 'custom_h1_title' );



function clean_panel() {
    remove_menu_page('index.php');
    remove_menu_page('upload.php');
    remove_menu_page('edit-comments.php'); 
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'clean_panel');

function hide_editor() {
    if (is_admin()) {
        echo '<style>
            #postdivrich { display: none; }
        </style>';
    }
}
add_action('admin_head', 'hide_editor');