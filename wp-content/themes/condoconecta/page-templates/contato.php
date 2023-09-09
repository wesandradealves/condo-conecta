<?php /* Template Name: Contato */ ?>
<?php get_header(); ?>
<?php get_template_part('template_parts/_page-header', null, array()); ?>
<section class="section">
    <div class="container d-flex flex-column flex-lg-row flex-wrap justify-content-start align-items-start">
        <div class="flex-fill pe-lg-5 order-2 order-lg-1  mt-5 mt-lg-0">
            <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário de contato 1"]') ?>
        </div>
        <aside class="sidebar contact col-12 col-lg-4 p-4 order-1 order-lg-2">
            <ul class="contact-info">
                <?php if(get_field('contact_phone', 'option')) : ?>
                    <li class="contact-info--item mb-4 d-flex align-items-center flex-wrap">
                        <i class="fa-solid fa-envelope pe-1 mb-1"></i>
                        <p class="text flex-fill ps-lg-2 ">
                            <a title="<?php echo get_field('contact_phone', 'option'); ?>" href="tel:<?php echo str_replace([':', '\\', '/', '*', '-', ' '], '', get_field('contact_phone', 'option')); ?>"><?php echo get_field('contact_phone', 'option'); ?></a>
                        </p>
                    </li> 
                <?php endif; ?>                         
                <?php if(get_field('contact_contact', 'option')) : ?>
                    <li class="contact-info--item mb-4 d-flex align-items-center flex-wrap">
                        <i class="fa-solid fa-phone pe-1 mb-1"></i>
                        <p class="text flex-fill ps-lg-2 ">
                            <a title="<?php echo get_field('contact_contact', 'option'); ?>" href="mailto:<?php echo get_field('contact_contact', 'option'); ?>"><?php echo get_field('contact_contact', 'option'); ?></a>
                        </p>
                    </li>
                <?php endif; ?>
                <li class="contact-info--item mt-2">
                    <p class="text mb-2">Conheça nossas redes sociais: </p>
                    <?php get_template_part('template_parts/_social-networks'); ?>
                </li>
            </ul>
        </aside>
    </div>
</section>
<?php get_footer(); ?>