    </main>
    <footer class="footer mt-auto">
        <div class="footer-top">
            <div class="container d-flex align-items-center flex-wrap flex-column flex-lg-row justify-content-center justify-content-lg-between">
                <?php get_template_part('template_parts/_logo'); ?>
                <ul class="contact-info ms-lg-auto mt-5 mt-lg-0 d-flex align-items-center flex-wrap justify-content-center justify-content-lg-end flex-column flex-lg-row">
                    <li class="order-3 mt-4 mt-lg-0 order-lg-1 contact-info--item ms-lg-4 ms-xl-5 d-flex flex-column flex-lg-row align-items-center flex-wrap">
                        <p class="text pe-lg-2">Nas redes sociais: </p>
                        <?php get_template_part('template_parts/_social-networks'); ?>
                    </li>
                    <?php if(get_field('contact_phone', 'option')) : ?>
                        <li class="order-2 mt-4 mt-lg-0 order-lg-2 ms-lg-4 ms-xl-5 contact-info--item d-flex flex-column flex-lg-row flex-wrap align-items-center">
                            <i class="fa-solid fa-envelope mb-2 mb-lg-0"></i>
                            <p class="text flex-fill ps-lg-2 ">
                                <a title="<?php echo get_field('contact_phone', 'option'); ?>" href="tel:<?php echo str_replace([':', '\\', '/', '*', '-', ' ', '.'], '', get_field('contact_phone', 'option')); ?>"><?php echo get_field('contact_phone', 'option'); ?></a>
                            </p>
                        </li> 
                    <?php endif; ?>                         
                    <?php if(get_field('contact_contact', 'option')) : ?>
                        <li class="order-1 order-lg-3 ms-lg-4 ms-xl-5 contact-info--item d-flex flex-column flex-lg-row flex-wrap align-items-center">
                            <i class="fa-solid fa-phone mb-2 mb-lg-0"></i>
                            <p class="text flex-fill ps-lg-2 ">
                                <a title="<?php echo get_field('contact_contact', 'option'); ?>" href="mailto:<?php echo get_field('contact_contact', 'option'); ?>"><?php echo get_field('contact_contact', 'option'); ?></a>
                            </p>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <div class="container d-flex flex-wrap justify-content-center flex-column flex-lg-row justify-content-lg-between align-items-center">
                <p class="d-inline-block text">
                    <strong><?php echo get_bloginfo('name'); ?></strong> © Copyright <?php echo date('Y'); ?> - Todos os direitos reservados.
                </p>
                <p class="d-inline-block text">Desenvolvido a mão por <a href="https://904.ag/" target="_blank">Agência 9ZERO4</a></p>
            </div>
        </div>
    </footer>
    <?php get_template_part('template_parts/_whatsapp'); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>