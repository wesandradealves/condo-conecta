<div class="event-card <?php echo $args['classes']; ?>">
    <div onclick="location.href = '<?php echo get_the_permalink(); ?>';" class="event-card-inner d-block">
        <div class="d-block thumbnail">
            <img class="img-fluid" loading="lazy" src="<?php echo get_field('thumbnail') ? get_field('thumbnail') : get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" height="270" width="360">
        </div>
        <h2 title="<?php echo get_the_title(); ?>" class="title mt-4 mb-4 d-block w-100">
            <?php echo get_the_title(); ?>
        </h2>
        <ul class="info d-flex flex-wrap w-100">
            <?php if(get_field('address') && !is_archive()) : ?>
            <li class="col-12 mb-3 address  d-none d-lg-block">
                <p class="d-flex align-items-center">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="flex-fill ps-2">
                        <?php echo get_field('address'); ?>
                    </span>
                </p>
            </li>
            <?php endif; ?>
            <?php if(is_archive()) : ?>
                <?php if(get_field('date')) : ?>
                    <li class="mb-3 mb-md-0 w-100">
                        <p class="d-flex align-items-center">
                            <i class="fa-regular fa-calendar"></i>
                            <span class="flex-fill ps-2">
                                <?php echo explode(' ', get_field('datetime'))[0]; ?>
                            </span>
                        </p>
                    </li>
                <?php endif; ?>
            <?php else : ?>
                <?php if(get_field('datetime')) : ?>
                    <li class="flex-fill mb-3 mb-md-0 d-none d-lg-block">
                        <p class="d-flex align-items-center">
                            <i class="fa-regular fa-calendar"></i>
                            <span class="flex-fill ps-2">
                                <?php echo explode(' ', get_field('datetime'))[0]; ?>
                            </span>
                        </p>
                    </li>
                    <li class="flex-fill mb-3 mb-md-0">
                        <p class="d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-clock"></i>
                            <span class="flex-fill ps-2">
                                <?php echo explode(' ', get_field('datetime'))[1]; ?>
                            </span>
                        </p>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('value') && !is_archive()) : ?>
            <li class="flex-fill">
                <p class="d-flex align-items-center">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <span class="flex-fill ps-2">
                        <?php echo get_field('value'); ?>
                    </span>
                </p>
            </li>  
            <?php endif; ?>     
        </ul>
        <?php if(is_archive()) : ?>
            <div class="d-flex flex-column justify-content-center align-items-center col-12 mt-auto">
                <a title="Veja como foi" href="<?php echo get_the_permalink(); ?>" class="primary btn">Veja como foi</a>
            </div>
        <?php endif; ?>
    </div>
</div>
