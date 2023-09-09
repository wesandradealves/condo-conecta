<?php /* Template Name: Obrigado */ ?>
<?php get_header(); ?>
<section class="section d-flex flex-column justify-content-center align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <?php the_content(); ?>
        <a title="Voltar para a página inicial" href="<?php echo site_url(); ?>" class="btn primary variation d-inline-block mt-4">Voltar para a página inicial</a>
    </div>
</section>
<?php get_footer(); ?>