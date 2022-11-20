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

function custom_form_control($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
}

function add_validation_order($result, $tag) {
    if (str_contains($_SERVER['HTTP_REFERER'], '/commander/')) {
        if (!$_POST['strawberry'] && !$_POST['grapefruit'] && !$_POST['raspberry'] && !$_POST['lemon']) {
            $result->invalidate($tag, 'Aucun produit !');
        }
    }

    return $result;
}

function remove_admin_menus() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
}

function remove_admin_bar($wp_admin_bar) {
	$wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
}


add_filter('get_custom_logo', 'custom_logo_class');
add_filter('show_admin_bar', '__return_false');
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', 'custom_form_control');
add_filter('wpcf7_validate_number','add_validation_order', 5, 2);
add_filter('image_send_to_editor', 'custom_image_template', 1, 8);

add_action('after_setup_theme', 'custom_logo_setup');
add_action('admin_menu', 'remove_admin_menus');
add_action('admin_bar_menu', 'remove_admin_bar', 71);
