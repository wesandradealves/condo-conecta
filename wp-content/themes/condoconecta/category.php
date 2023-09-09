<?php get_header(); ?>
<?php 
    $paged = get_query_var('paged');
    $paged = ($paged) ? $paged : 1;

    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); 
    
        endwhile;

        $total_pages = $wp_query->max_num_pages;

        if ($total_pages > 1) :
            $current_page = max(1, get_query_var('paged')); 

            echo paginate_links(array(
                'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
                'current' => max(1, get_query_var('paged')),
                'format' => 'page/%#%',
                'total' => $wp_query->max_num_pages,
                'add_args' => array(
                    's' => get_query_var('s'),
                    'post_type' => get_query_var('post_type'),
                ),
                'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>
                '),
                'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>
                '),
            ));        
            wp_reset_query();
            wp_reset_postdata();                         
        endif;
    endif;
?>
<?php get_footer(); ?>