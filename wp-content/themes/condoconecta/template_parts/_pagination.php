
<div class="pagination <?php echo $args['classes']; ?>">
    <?php 
        $paged = get_query_var('paged');
        $paged = ($paged) ? $paged : 1;
        $total_pages = $wp_query->max_num_pages;

        if ($total_pages > 1) :
            $current_page = max(1, get_query_var('paged')); 

            $args = array(
                'base' => preg_replace('/\?.*/', (is_search() ? '' : '/'), get_pagenum_link(1)) . '%_%',
                'current' => max(1, get_query_var('paged')),
                'format' => 'page/%#%',
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left" aria-hidden="true"></i>
                '),
                'next_text' => __('<i class="fa fa-angle-right" aria-hidden="true"></i>
                '),
            );

            if(is_search()) {
                $args['add_args'] = array(
                    's' => get_query_var('s'),
                    'date_query' => get_query_var('year'),
                    'post_type' => get_query_var('post_type'),
                );
            }

            echo paginate_links($args);        

            wp_reset_query();
            wp_reset_postdata();                         
        endif;
    ?>
</div>