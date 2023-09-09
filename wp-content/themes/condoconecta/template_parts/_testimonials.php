<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <div class="container pt-0 pb-0">
                <h2 class="title d-flex align-items-sm-center justify-content-sm-between flex-row flex-wrap">
                    <span class="flex-fill">
                        <span>Quem adquire</span> conhecimento, <br/><span>também compartilha.</span>
                        <small class="d-block">
                            Veja os depoimentos dos nossos parceiros.
                        </small>
                    </span>
                    <div class="testimonials-nav slick-custom-nav d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-none d-lg-block">
                            <span class="testimonials-counter">1</span> de <span class="testimonials-total">0</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="javascript:void(0)" class="slick-testimonials-prev ms-2">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)" class="slick-testimonials-next ms-2">
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
                'post_type'     => 'testimonials',
            ) );  

            if($query) :
        ?>                
        <div class="multi-carousel-testimonials mt-5">
            <?php 
                if ($query->have_posts()) :
                    while ( $query->have_posts() ) : $query->the_post();
                        ?>
                        <div class="testimonials-item">
                            <div class="testimonials-item-inner">
                                <img class="d-block quotes" src="<?php echo get_template_directory_uri(); ?>/img/quotes.png" />
                                <p class="text"><?php echo get_the_content(); ?></p>
                                <div class="testimonials-item-inner--footer mt-4 d-flex align-items-center">
                                    <?php if(get_the_post_thumbnail_url()) : ?>
                                        <div class="avatar d-block me-3" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                                    <?php endif; ?>
                                    <div class="flex-fill">
                                        <h3 class="title"><?php echo get_the_title(); ?></h3>
                                        <p class="subtitle"><?php echo get_field('subtitle'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();                                                       
                endif;
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>
