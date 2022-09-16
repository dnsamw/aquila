<?php

/**
 * Theme header
 * 
 * @package Auila
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aquila | WordPress Theme</title>
    <?php wp_head() ?>
</head>

<body <?php body_class('test-class'); ?>>
    <header>Theme Header</header>