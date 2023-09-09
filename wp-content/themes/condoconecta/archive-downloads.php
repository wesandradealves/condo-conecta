<?php 
    get_header(); 
?>
<?php get_template_part('template_parts/_page-header', null, array()); ?>
<section class="section results">
    <div class="container">
        <?php 
            echo do_shortcode('[prefix_alphabetic_posts]');
        ?>
    </div>
</section>
<?php get_footer(); ?>