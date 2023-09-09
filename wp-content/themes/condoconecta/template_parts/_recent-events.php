<section class="section recent-events">
    <div class="container">
        <div class="section-header">
            <h2 class="title d-flex align-items-sm-center justify-content-sm-between flex-column flex-sm-row flex-wrap">
                <span class="order-2 order-sm-1">
                    <span>Confira os</span> eventos recentes<br/><span>da Condoconecta</span>
                </span>
                <?php if(get_post_type_archive_link('workshops')) : ?>
                    <a title="Veja todos" href="<?php echo get_post_type_archive_link('workshops'); ?>" class="order-1 order-sm-2 d-flex flex-wrap align-items-center">
                        Veja todos
                        <span class="ps-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.756" height="8.654" viewBox="0 0 25.756 8.654">
                                <g data-name="Grupo 38" transform="translate(-1322.358 -715.532)">
                                    <path id="Caminho_11" data-name="Caminho 11" d="M3330.079,724.187a1,1,0,0,1-.707-1.707l2.62-2.62-2.62-2.62a1,1,0,0,1,1.414-1.414l3.327,3.327a1,1,0,0,1,0,1.414l-3.327,3.327A1,1,0,0,1,3330.079,724.187Z" transform="translate(-1986.292 0)" fill="#fa4616"/>
                                    <path id="Caminho_12" data-name="Caminho 12" d="M3335.3,720.4h-22.946a1,1,0,0,1,0-2H3335.3a1,1,0,0,1,0,2Z" transform="translate(-1989 0.464)" fill="#fa4616"/>
                                </g>
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            </h2>
            <?php 
                $query = new WP_Query( array(
                    'post_type' => 'workshops',
                    'posts_per_page' => -1,
                    'order'     => 'DESC',
                ) );    

                if($query) :
            ?>                
            <div class="multi-carousel mt-5">
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                ?>
                <?php get_template_part('template_parts/_card'); ?>
                <?php 
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();  
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>