<?php

function get_asset($file) {
    $template_uri = get_template_directory_uri();
    $file = str_replace('scss/', 'css/', $file);
    if (preg_match('/\.js$/', $file) && !preg_match('/\.min\.js$/', $file)) {
        $file = preg_replace('/\.js$/', '.min.js', $file);
    } elseif (preg_match('/\.css$/', $file) && !preg_match('/\.min\.css$/', $file)) {
        $file = preg_replace('/\.css$/', '.min.css', $file);
    } elseif (preg_match('/\.scss$/', $file)) {
        $file = preg_replace('/\.scss$/', '.min.css', $file);
    } elseif (preg_match('/\.min\.scss$/', $file)) {
        $file = preg_replace('/\.min\.scss$/', '.min.css', $file);
    } elseif (preg_match('/\.(png|jpg|jpeg|gif|svg)$/', $file)) {
        $file = preg_replace('/\.(png|jpg|jpeg|gif|svg)$/', '.webp', $file);
    }
    return "$template_uri/assets/$file";
}
