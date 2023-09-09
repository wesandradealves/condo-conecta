<?php if(get_field('logo', 'option')) : ?>
    <span class="logo <?php echo isset($args['classes']) ? $args['classes'] : ''; ?>">
        <a title="<?php echo get_bloginfo('title'); ?>" href="<?php echo site_url(); ?>">
            <img loading="lazy" class="img-fluid" src="<?php echo get_field('logo', 'option'); ?>" alt="<?php echo get_bloginfo('title'); ?>">
        </a>
    </span>
<?php endif; ?>