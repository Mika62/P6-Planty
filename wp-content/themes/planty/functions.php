<?php

require get_theme_root() . '/planty/SimpleMenuWalker.php';


function custom_logo_class($html) {
    $html = str_replace('custom-logo-link', 'header__logo', $html);
    $html = str_replace('custom-logo', 'logo', $html);

    return $html;
}

function custom_logo_setup() {
    $defaults = [
        'height' => 18,
        'width' => 200
    ];

	add_theme_support('custom-logo', $defaults);
}

function custom_image_template($html, $id, $caption, $title, $align, $url, $size, $alt) {
	$thumb = wp_get_attachment_image_src($id, $size);
	$image = '<img src="' . $thumb[0] . '" alt="' . $alt . '" />';

	return $image;
}


add_filter('get_custom_logo', 'custom_logo_class');
add_filter('show_admin_bar', '__return_false');
add_filter('image_send_to_editor', 'custom_image_template', 1, 8);
add_action('after_setup_theme', 'custom_logo_setup');
