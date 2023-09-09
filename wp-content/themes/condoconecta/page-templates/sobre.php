<?php /* Template Name: Sobre */ ?>
<?php get_header(); ?>
<?php get_template_part('template_parts/_breadcrumbs', null, array()); ?>
<?php get_template_part('template_parts/_banner', null, array()); ?>
<section class="section team">
    <div class="container">
        <div class="section-header">
            <div class="container pt-0 pb-0">
                <h2 class="title d-flex align-items-sm-center justify-content-sm-between flex-row flex-wrap">
                    <span class="flex-fill">
                        <span>Quem faz</span> a Condoconecta acontecer.
                    </span>
                    <div class="team-nav slick-custom-nav d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-none d-lg-block">
                            <span class="team-counter">1</span> de <span class="team-total">0</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="javascript:void(0)" class="slick-team-prev ms-2">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)" class="slick-team-next ms-2">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a> 
                        </div>
                    </div>
                </h2>
            </div>            
        </div>
        <?php if( have_rows('team') ): ?>
            <div class="d-block container p-0">
                <div class="multi-carousel-team mt-5">
                    <?php while( have_rows('team') ) : the_row(); ?>
                        <div class="team-item">
                            <div class="team-item-inner d-flex flex-column justify-content-center align-items-center">
                                <?php if(get_sub_field('image')) : ?>
                                    <img width="360" height="270" loading="lazy" class="img-fluid d-block mb-5 thumbnail" src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('nome'); ?>">
                                <?php endif; ?>
                                <h3 class="title d-block"><?php echo get_sub_field('nome'); ?></h3>
                                <?php if( have_rows('social_networks') ): ?>
                                    <nav class="social-networks d-block mt-2">
                                        <ul class="d-flex flex-wrap align-items-center">
                                            <?php 
                                                while( have_rows('social_networks') ) : 
                                                    the_row(); 
                                                    ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" target="_blank" href="<?php echo get_sub_field('url'); ?>">
                                                            <i class="<?php echo get_sub_field('icon'); ?>"></i>
                                                        </a>
                                                    </li>                                                       
                                                    <?php 
                                                endwhile;     
                                            ?>
                                        </ul>
                                    </nav>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>      
        <?php endif; ?>
    </div>
</section>
<?php get_template_part('template_parts/_past-events', null, array());  ?>
<?php get_template_part('template_parts/_eventos-recentes', null, array()); ?>
<?php get_template_part('template_parts/_testimonials', null, array());  ?>
<?php get_template_part('template_parts/_recent-events', null, array());  ?>
<?php get_footer(); ?>