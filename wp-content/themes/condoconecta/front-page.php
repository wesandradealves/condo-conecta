<?php 
    get_header(); 
    global $template;
    $template = str_replace('.php', '', basename($template)); 
?>
    <?php 
        get_template_part('template_parts/_banner', null, array( 
            'template' => $template
        )); 
    ?>
    <?php get_template_part('template_parts/_recent-events', null, array());  ?>
    <?php get_template_part('template_parts/_about-featured', null, array());  ?>
    <?php get_template_part('template_parts/_past-events', null, array());  ?>
    <?php get_template_part('template_parts/_testimonials', null, array());  ?>
<?php get_footer(); ?>