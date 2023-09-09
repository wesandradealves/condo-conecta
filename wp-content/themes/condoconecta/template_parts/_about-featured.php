<?php 
        $about = get_page_by_title( 'Sobre' );
        if(get_field('featured', $about)) :
    ?>
        <section class="section about-featured d-flex flex-column justify-content-end overflow-hidden">
            <div class="container m-0 col-12 col-md-11 col-xl-7 overflow-hidden">
                <?php if(get_field('featured_title', $about)) : ?>
                    <div class="title d-block">
                        <?php echo get_field('featured_title', $about); ?>
                    </div>
                <?php endif; ?>
                <?php if(get_field('featured_text', $about)) : ?>
                    <div class="text d-block">
                        <?php echo get_field('featured_text', $about); ?>
                    </div>                    
                <?php endif; ?>     
                <?php if(get_field('featured_cta', $about) && get_field('featured_cta_label', $about)) : ?>
                    <a class="d-inline-block btn secondary" href="<?php echo get_field('featured_cta_link', $about); ?>">
                        <?php echo get_field('featured_cta_label', $about); ?>
                    </a>
                <?php endif; ?>                           
            </div>
            <picture class="bg">
                <source srcset="<?php echo get_field('featured', $about)['image']; ?>" media="(min-width: 568px)" >
                <img loading="lazy" src="<?php echo get_field('featured', $about)['image_mobile']; ?>" />
            </picture>              
        </section>
    <?php endif; ?>