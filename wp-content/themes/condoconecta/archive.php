<?php 
    get_header(); 
?>
<?php get_template_part('template_parts/_page-header', null, array()); ?>
<?php get_template_part('template_parts/_searchbar', null, array()); ?>
<section class="section results">
    <div class="container">
        <div class="grid d-flex flex-wrap align-items-stretch">
            <?php 
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <?php get_template_part('template_parts/_card', null, array(
                            "classes" => "d-block col-12 col-md-6 col-lg-4"
                        )); ?>
                        <?php  
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>
<section class="filter">
    <div class="container d-flex justify-content-center justify-content-lg-between">
        <?php get_template_part('template_parts/_pagination', null, array(
            "classes" => "ms-lg-auto"
        )); ?>
    </div>
</section>
<?php get_footer(); ?>