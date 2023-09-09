<?php get_header(); ?>
<?php get_template_part('template_parts/_page-header', null, array()); ?>
<?php 
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); 
    
        endwhile; 
    endif;
?>
<?php get_footer(); ?>