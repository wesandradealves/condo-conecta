<div class="page-header" <?php if(is_archive() && file_exists(__DIR__.'/../img/'.get_queried_object()->name.'.jpg')) : ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/<?php echo get_queried_object()->name; ?>.jpg)" <?php endif; ?>>
    <div class="container">
        <?php get_template_part('template_parts/_breadcrumbs', null, array()); ?>
        <h2 class="title"><?php
            if(!is_archive()) {
                echo get_the_title(); 
            } else {
                if(is_post_type_archive('downloads') ) {
                    echo 'Conexão Condoconecta';
                } else {
                    echo get_queried_object()->label;
                }                
            }
        ?></h2>

        <p class="text">
            <?php
                if(!is_archive()) {
                    echo get_the_excerpt();
                } elseif(is_post_type_archive('downloads') ) {
                    echo 'Baixe agora mesmo gratuitamente o conteúdo de<br/>qualidade da Condoconecta.';
                } elseif(is_post_type_archive('workshops') ) {
                    echo 'Confira todos os Workshops da Condoconecta.';
                }
            ?>
        </p>

        <?php 
            if(is_archive() && get_queried_object()->name === 'downloads') {
                get_template_part('template_parts/_searchbar', null, array());
            }
        ?>
    </div>
</div>