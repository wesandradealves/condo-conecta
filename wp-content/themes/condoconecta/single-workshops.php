<?php 
    global $template;

    get_header(); 
    $template = str_replace('.php', '', basename($template)); 
?>

<?php if(get_the_post_thumbnail_url()) : ?>
    <img class="img-fluid d-block post-image" loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
<?php endif; ?>

<div id="primary" class="col-xl-8 col-xxl-6 m-auto">
    <section class="post-header">
        <div class="container">
            <ul class="info d-flex flex-wrap align-items-stretch flex-row w-100">
                <?php if(get_field('address')) : ?>
                    <li class="info-col col-6 col-sm-auto d-flex flex-column justify-content-center address">
                        <p class="d-flex align-items-center">
                            <i class="fa-solid fa-location-dot"></i>
                            <span class="ps-2">
                                <?php echo get_field('address'); ?>
                            </span>
                        </p>
                    </li>
                <?php endif; ?>

                <?php if(get_field('datetime')) : ?>
                    <li class="info-col col-6 col-sm-auto d-flex flex-column justify-content-center date">
                        <p class="d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-calendar"></i>
                            <span class="ps-2">
                                <?php echo explode(' ', get_field('datetime'))[0]; ?>
                            </span>
                        </p>
                    </li>
                    <li class="info-col col-6 col-sm-auto d-flex flex-column justify-content-center time">
                        <p class="d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-clock"></i>
                            <span class="ps-2">
                                <?php echo explode(' ', get_field('datetime'))[1]; ?>
                            </span>
                        </p>
                    </li>
                <?php endif; ?>

                <?php if(get_field('value')) : ?>
                    <li class="info-col col-6 col-sm-auto d-flex flex-column justify-content-center value">
                        <p class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-dollar-sign"></i>
                            <span class="ps-2">
                                <?php echo get_field('value'); ?>
                            </span>
                        </p>
                    </li>  
                <?php endif; ?>  
                
                <?php if(get_field('link')) : ?>
                    <li class="info-col d-flex flex-column justify-content-center align-items-end link">
                        <a target="_blank" title="Fazer inscrição" href="<?php echo get_field('link'); ?>" class="btn primary variation-2">Fazer inscrição</a>
                    </li>  
                <?php endif; ?>                  
            </ul>
        </div>
    </section>

    <?php get_template_part('template_parts/_breadcrumbs', null, array()); ?>

    <section class="content-area">
        <div class="container">
            <?php 
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post(); 
                        the_content();
                    endwhile; 
                endif;
            ?>
        </div>
    </section>

    <?php 
        // $query = new WP_Query( array(
        //     'posts_per_page'   => -1,
        //     'order' => 'DESC',
        //     'post_type'     => 'patrocinadores',
        // ) );  

        if(get_field('patrocinadores')) :
    ?>

    <section class="sponsors section">
        <div class="container">
            <div class="section-header">
                <p class="title d-block">Patrocinadores Condoconecta</p>
                <p class="text d-block mt-2">Conheça as empresas que fazem parte da plataforma Condoconecta</p>
            </div>
            <ul class="sponsors-list mt-4 d-flex flex-wrap">
                <?php 
                    foreach (get_field('patrocinadores') as $id) :
                    // if ($query->have_posts()) :
                    //     while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <li class="sponsors-item col-6 col-md-4 col-lg-2">
                                <div class="sponsors-inner">
                                    <div class="thumbnail d-block">
                                        <img class="d-block img-fluid" src="<?php echo get_the_post_thumbnail_url($id); ?>" height="120" width="120" alt="<?php echo get_the_title($id); ?>" />
                                    </div>
                                    <?php if( have_rows('social_networks', $id) ): ?>
                                        <nav class="social-networks mt-3">
                                            <ul class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                                                <?php $i = 0; while( have_rows('social_networks', $id) ) : $i++; the_row(); ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" target="_blank" href="<?php echo get_sub_field('url'); ?>">
                                                            <i class="<?php echo get_sub_field('icon'); ?>"></i>
                                                        </a>
                                                    </li>                                
                                                <?php endwhile; ?>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>  
                                </div>
                            </li>
                    <?php 
                        endforeach;
                    //     endwhile;
                    //     wp_reset_query();
                    //     wp_reset_postdata();                                                       
                    // endif;
                ?> 
            </ul>
        </div>
    </section>

    <?php endif; ?>
</div>

<?php get_template_part('template_parts/_banner', null, array('template' => $template)); ?>

<?php if( have_rows('gallery') ): ?>
    <section class="gallery section">
        <div class="container">
            <div class="section-header">
                <h2 class="title text-center">Veja como foi</h2>
            </div>
            <div class="gallery-list d-flex flex-wrap align-items-stretch justify-content-between mt-5">
                <?php $i = -1; while( have_rows('gallery') ) : $i++; the_row(); ?>
                    <?php if($i === 0) : ?>
                        <div class="pe-2 pb-2 ps-2 mb-2 mb-sm-0 ps-sm-0 gallery-item col-12 col-sm-6">
                            <a title="<?php echo get_the_title(); ?>" href="<?php echo get_field('gallery')[$i]; ?>">
                                <img alt="<?php echo get_the_title(); ?>" src="<?php echo get_field('gallery')[$i]; ?>" class="img-fluid d-block" loading="lazy" />
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 d-flex flex-wrap align-items-stretch">
                    <?php elseif($i === count(get_field('gallery'))) : ?>
                        </div>
                    <?php else : ?>
                        <div class="p-2 col-4 gallery-item">
                            <a title="<?php echo get_the_title(); ?>" href="<?php echo get_field('gallery')[$i]; ?>">
                                <img alt="<?php echo get_the_title(); ?>" src="<?php echo get_field('gallery')[$i]; ?>" class="img-fluid d-block" loading="lazy" />
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>  


<?php 
    $query = new WP_Query( array(
        'posts_per_page'   => -1,
        'order' => 'DESC',
        'post_type'     => 'downloads',
        'meta_query' => array(
            'relation' => 'AND',
            array(
            'key' => 'posts',
            'value' => get_the_id(),
            'compare' => 'LIKE'
            )
        )
    ) );  

if ($query->have_posts()) : ?>
    <section class="section downloads pt-0">
        <div class="container">
            <div class="section-header">
                <h2 class="title d-block">
                    Downloads
                </h2>
            </div>

            <ul class="download-list mt-5 d-flex flex-wrap align-items-stretch">
                <?php 
                    while ( $query->have_posts() ) : 
                        $query->the_post();    
                        ?>
                        <li class="download-item p-2 col-12 col-sm-6 col-lg-3">
                            <div class="download-item-inner p-4 d-flex flex-column flex-wrap">
                                <p class="text"><?php echo get_the_excerpt(); ?></p>
                                
                                <a class="d-flex pt-4 mt-auto w-100 justify-content-between align-items-center" download title="<?php echo get_field('file')['filename']; ?>" href="<?php echo get_field('file')['url']; ?>">
                                    <span class="pe-2"><?php echo get_field('file')['filename'].' ('.size_format(get_field('file')['filesize']).')'; ?></span>
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </li>
                        <?php 
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();                    
                ?>
            </ul>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>