<?php 
    $content = get_field('banner');

    if($args['template'] && $args['template'] === 'front-page') {
        $content = get_field('frontpage_banner', 'option');
    } elseif(is_single()) {
        $about = get_page_by_title( 'Sobre' );
        $content = get_field('banner', $about);
    }
?>

<?php if( $content ) : ?>
    <section id="banner">
        <div class="single-carousel m-0 p-0">
            <?php 
                foreach ($content as $banner) {
                    ?>
                    <div class="banner" style="background-image: url(<?php echo $banner['image']; ?>)">
                        <div class="container col-12 <?php if($args['template'] && $args['template'] === 'front-page') : ?> col-lg-10 <?php endif; ?>">
                            <div class="banner-inner col-12 <?php if($args['template'] && $args['template'] === 'front-page') : ?> col-xl-8 <?php else : ?> col-xl-5 pe-xl-5 <?php endif; ?>">
                                <?php if($banner['title'] || $banner['subtitle']) : ?>
                                    <div class="d-block title">
                                        <?php if($banner['subtitle']) : ?>
                                            <small class="d-block subtitle">
                                                <?php echo $banner['subtitle']; ?>
                                            </small>
                                        <?php endif; ?>                                          
                                        <?php if($banner['title']) : ?>
                                            <?php echo $banner['title']; ?>
                                        <?php endif; ?>  
                                    </div>
                                <?php endif; ?>
                                <?php if($banner['text']) : ?>
                                    <div class="d-block text">
                                        <?php echo $banner['text']; ?>
                                    </div>   
                                <?php endif; ?>     
                                <?php if($banner['cta'] && $banner['cta']['label']) : ?>
                                    <?php if(get_queried_object(  )->post_title !== 'Sobre') : ?>
                                        <a class="d-inline-block btn <?php if(is_single()): ?> primary <?php else : ?> secondary <?php endif; ?>" href="<?php echo $banner['cta']['link']; ?>">
                                            <?php echo $banner['cta']['label']; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            ?>
        </div>
        <?php if(is_home() || is_front_page()) : ?>
        <div class="banner-nav d-none d-lg-block">
            <div class="container d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="slick-banner-prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)" class="slick-banner-next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a> 
            </div>
        </div>
        <?php endif; ?>
    </section>    
<?php endif; ?>
