<section id="searchbar" class="d-block w-100">
    <div class="pt-5 container d-flex flex-wrap flex-column flex-lg-row align-items-lg-center justify-content-lg-between">
        <?php get_search_form(); ?>
        
        <?php get_template_part('template_parts/_pagination', null, array(
            "classes" => "d-none d-lg-flex"
        )); ?>
    </div>
</section>