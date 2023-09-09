<section class="section past-events">
    <div class="container-fluid ps-0 pe-0">
        <div class="section-header">
            <div class="container pt-0 pb-0">
                <h2 class="title d-flex align-items-sm-center justify-content-sm-between flex-row flex-wrap">
                    <span class="flex-fill">
                        Qualificação profissional <span>e<br/>pessoal é sinônimo de satisfação.</span>
                        <small class="d-block">Confira fotos dos eventos da Condoconecta. </small>
                    </span>
                    <div class="past-events-nav slick-custom-nav d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-none d-lg-block">
                            <span class="past-events-counter">1</span> de <span class="past-events-total">0</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="javascript:void(0)" class="slick-past-events-prev ms-2">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)" class="slick-past-events-next ms-2">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a> 
                        </div>
                    </div>
                </h2>
            </div>            
        </div>
        <?php 
            $query = new WP_Query( array(
                'posts_per_page'   => -1,
                'order' => 'DESC',
                'post_type'     => 'workshops',
                'meta_key'      => 'past_event',
                'meta_value'    => TRUE
            ) );     

            if($query) :
        ?>          
        <div class="d-block container-fluid p-0">
            <div class="multi-carousel-4x mt-5">
                <?php 
                    if ($query->have_posts()) :
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <div class="past-events-item" onclick="location.href = '<?php echo get_the_permalink(); ?>';">
                                <div style="background: url(<?php echo get_field('gallery') ? end(get_field('gallery')) : get_the_post_thumbnail_url(); ?>) center center / cover no-repeat" class="past-events-item-inner d-flex flex-column justify-content-end p-4">
                                    <h3 class="title d-block"><?php echo get_the_title(); ?></h3>
                                    <p class="text d-block"><?php echo get_the_time('j \d\e F \d\e Y'); ?></p>
                                </div>
                            </div>
                            <?php 
                        endwhile;
                        wp_reset_query();
                        wp_reset_postdata();                                                       
                    endif;
                ?>
            </div>
        </div>      
        <?php endif; ?>
    </div>
</section>
