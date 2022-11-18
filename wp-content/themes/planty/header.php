<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&display=swap" rel="stylesheet"> 

    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
     
    <!-- Header -->
    <header id="header" class="header">
        <!-- Logo -->
        <?= the_custom_logo() ?>

        <!-- Menu -->
        <?php wp_nav_menu([
            'theme_location' => 'main-menu',
            'walker' => new SimpleMenuWalker,
            'container' => '',
            'items_wrap' => '<nav class="header__menu menu">%3$s</nav>'
        ]) ?>
    </header>
    <!-- /Header -->

    <!-- Main -->
    <main id="main" class="main">