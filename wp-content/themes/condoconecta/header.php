<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta content="<?php echo get_bloginfo('blogdescription'); ?>" name="description">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php 
        wp_meta(); 
        wp_head();
    ?>
</head>

<body <?php body_class('d-none'); ?>>
    <div id="wrap">
        <a class="skip-link screen-reader-text" href="#content">
            <?php
            /* translators: Hidden accessibility text. */
            esc_html_e( 'Skip to content', 'twentytwentyone' );
            ?>
        </a>
        <header class="header">
            <div class="header-top">
                <div class="container d-flex flex-wrap align-items-center justify-content-between">
                    <?php get_template_part('template_parts/_logo'); ?>
                    <nav class="navigation flex-fill">
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'main', 
                                    'menu_class' => 'd-none d-lg-flex flex-wrap align-items-center justify-content-center',   
                                    'container' => false,
                                    // 'walker' => new Walker_Nav_Primary()
                                ) 
                            ); 
                        ?>        
                    </nav>
                    <?php if(get_post_type_archive_link('workshops')) : ?>
                        <a class="btn primary d-none d-lg-block" href="<?php echo get_post_type_archive_link('workshops'); ?>">Todos os eventos</a>
                    <?php endif; ?>                                 
                    <button class="hamburger hamburger--collapse p-0 m-0 d-lg-none" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button> 
                </div>
            </div>
            <nav class="navigation mobile">
                <?php 
                    wp_nav_menu( 
                        array( 
                            'theme_location' => 'main', 
                            'menu_class' => 'd-flex flex-column',   
                            'container' => false
                        ) 
                    ); 
                ?>   
                <div class="navigation-bottom d-flex align-items-center">
                    <?php if(get_post_type_archive_link('workshops')) : ?>
                        <a class="btn primary d-inline-block" href="<?php echo get_post_type_archive_link('workshops'); ?>">Todos os eventos</a>
                    <?php endif; ?>  
                </div>
            </nav>            
        </header>
        <main>