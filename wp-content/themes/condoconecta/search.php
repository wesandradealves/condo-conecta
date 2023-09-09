<?php 
    get_header(); 
?>
<?php get_template_part('template_parts/_page-header', null, array()); ?>
<?php 
    if(get_queried_object()->name !== 'downloads') {
        get_template_part('template_parts/_searchbar', null, array()); 
    }
?>
<section class="section results">
    <div class="container">
        <?php if(get_queried_object()->name === 'downloads') : ?>
            <div class="download-list mt-5 d-flex flex-wrap align-items-stretch">
                <?php 
                    if ( have_posts() ) {
                        while ( have_posts() ) : 
                            the_post();  
                        ?>
                        <div class="download-item p-2 col-12 col-sm-6 col-lg-3">
                            <div class="download-item-inner p-4 d-flex flex-column flex-wrap">
                                <p class="text"><?php echo get_the_excerpt(); ?></p>
                                
                                <a class="d-flex pt-4 mt-auto w-100 justify-content-between align-items-center" download title="<?php echo get_field('file')['filename']; ?>" href="<?php echo get_field('file')['url']; ?>">
                                    <span class="pe-2"><?php echo get_the_title().' ('.size_format(get_field('file')['filesize']).')'; ?></span>
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </div>
                        <?php 
                        endwhile;
                    } else {
                        ?>
                        <p class="d-block text-center w-100">Nenhum resultado encontrado.</p>
                        <?php 
                    }
                    wp_reset_query();
                    wp_reset_postdata();                    
                ?>
            </div>
        <?php else : ?>
            <div class="grid d-flex flex-wrap align-items-stretch">
                <?php 
                    if ( have_posts() ) {
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <?php get_template_part('template_parts/_card', null, array(
                                "classes" => "d-block col-12 col-md-6 col-lg-4"
                            )); ?>
                            <?php  
                        endwhile;
                    } else {
                        ?>
                        <p class="d-block text-center w-100">Nenhum resultado encontrado.</p>
                        <?php 
                    }
                ?>
            </div>            
        <?php endif; ?>
    </div>
</section>
<?php if(get_queried_object()->name !== 'downloads') : ?>
    <section class="filter">
        <div class="container d-flex justify-content-center justify-content-lg-between">
            <?php get_template_part('template_parts/_pagination', null, array(
                "classes" => "ms-lg-auto"
            )); ?>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>