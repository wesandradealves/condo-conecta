<?php

function slugify($text, string $divider = '-'){
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
  
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
  
    // trim
    $text = trim($text, $divider);
  
    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);
  
    // lowercase
    $text = strtolower($text);
  
    if (empty($text)) {
      return 'n-a';
    }
  
    return $text;
  }  

function wp_before_admin_bar_render() {

    echo '

        <style type="text/css">

            #acf-group_64a3f3903b6fa {

                display: none !important;

            }

        </style>

    ';

}

function remove_menus()
{
    global $post;

    remove_menu_page("index.php"); //Dashboard

    remove_menu_page("jetpack"); //Jetpack*

    // remove_menu_page("edit.php"); //Posts;

    // remove_menu_page( 'upload.php' );                 //Media

    // remove_menu_page( 'edit.php?post_type=page' );    //Pages

    // remove_menu_page( 'edit-comments.php' );          //Comments

    //remove_menu_page( 'themes.php' );                 //Appearance

    // remove_menu_page( 'plugins.php' );                //Plugins

    // remove_menu_page( 'users.php' );                  //Users

    // remove_menu_page( 'tools.php' );                  //Tools

    // remove_menu_page( 'options-general.php' );        //Settings
}

function prefix_add_footer_styles()
{
    wp_enqueue_style( 'overwrites', get_template_directory_uri().'/css/overwrites.css', array(), filemtime( get_template_directory().'/css/overwrites.css' ) );    
}
function regScripts()
{
    wp_deregister_script("jquery");
    wp_enqueue_script(
        "jquery",
        "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js",
        [],
        false,
        true
    );
    wp_enqueue_script(
        "slick",
        "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js",
        [],
        false,
        true
    );   
    wp_enqueue_script(
        "malihu",
        "https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js",
        [],
        false,
        true
    );   
    wp_enqueue_script(
        "jqueryyu2fvl",
        get_template_directory_uri() . "/js/jquery.yu2fvl.min.js",
        [],
        false,
        true
    );    
    wp_enqueue_script(
        "lightbox",
        get_template_directory_uri() . "/js/simple-lightbox.min.js",
        [],
        false,
        true
    );       
    wp_enqueue_script('commons', get_template_directory_uri()."/js/main.js", array(), filemtime( get_template_directory().'/js/main.js' ), true);
    wp_enqueue_style(
        "bootstrap-grid",
        "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap-grid.min.css",
        [],
        null,
        "all"
    );
    wp_enqueue_style(
        "bootstrap-reboot",
        "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap-reboot.min.css",
        [],
        null,
        "all"
    );
    wp_enqueue_style(
        "bootstrap-utilities",
        "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap-utilities.min.css",
        [],
        null,
        "all"
    );
    wp_enqueue_style(
        "fontawesome",
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css",
        [],
        null,
        "all"
    );
    wp_enqueue_style(
        "hamburgers",
        get_stylesheet_directory_uri() . "/css/hamburgers.min.css",
        [],
        null,
        "all"
    );
    wp_enqueue_style(
        "jqueryyu2fvl",
        get_stylesheet_directory_uri() . "/css/jquery.yu2fvl.css",
        [],
        null,
        "all"
    );    
    wp_enqueue_style(
        "malihu",
        "https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css",
        [],
        null,
        "all"
    );    
    wp_enqueue_style(
        "lightbox",
        get_stylesheet_directory_uri() . "/css/simple-lightbox.css",
        [],
        null,
        "all"
    );  
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', array(), filemtime( get_template_directory().'/style.css' ) );    
}

function disable_default_dashboard_widgets()
{
    remove_meta_box("dashboard_right_now", "dashboard", "core");

    remove_meta_box("dashboard_recent_comments", "dashboard", "core");

    remove_meta_box("dashboard_incoming_links", "dashboard", "core");

    remove_meta_box("dashboard_plugins", "dashboard", "core");

    remove_meta_box("dashboard_quick_press", "dashboard", "core");

    remove_meta_box("dashboard_recent_drafts", "dashboard", "core");

    remove_meta_box("dashboard_primary", "dashboard", "core");

    remove_meta_box("dashboard_secondary", "dashboard", "core");
}

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "Theme General Settings",
        "menu_title" => "Theme Settings",
        "menu_slug" => "theme-general-settings",
        "capability" => "edit_posts",
        "redirect" => true,
    ]);
}

function wpb_custom_new_menu()
{
    register_nav_menu("main", __("Main"));
    register_nav_menu("footer", __("Footer"));
}

function atg_menu_classes($classes, $item, $args)
{
    // if($args->theme_location == 'main') {
    //     $classes[] = 'nav-item p-0 ps-5';
    // } elseif($args->theme_location == 'footer') {
    //     $classes[] = 'nav-item nav-col col-6 mb-5 mb-lg-0 pe-5';
    // }
    $classes[] = "nav-item";
    return $classes;
}

function add_menu_link_class($atts, $item, $args)
{
    $atts["class"] = "nav-link";
    return $atts;
}

// function qirolab_posts_where($where, &$wp_query)
// {
//     global $wpdb;
//     if ($title = $wp_query->get("search_title")) {
//         $where .=
//             " AND " .
//             $wpdb->posts .
//             ".post_title LIKE '" .
//             esc_sql($wpdb->esc_like($title)) .
//             "%'";
//     }
//     return $where;
// }

function my_mce4_options($init)
{
    $custom_colours = '
        "FFFFFF", "white",
        "000000", "black",
    ';

    // build colour grid default+custom colors
    $init["textcolor_map"] = "[" . $custom_colours . "]";

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init["textcolor_rows"] = 1;

    return $init;
}

function mycustom_wp_redirect()
{
    ?>
    <script type="text/javascript">
       document.addEventListener( 'wpcf7mailsent', function( event ) {
           event.preventDefault();
           
        //    var phone = event.detail.inputs[4].value;
        //    var text = event.detail.inputs[5].value;
   
           setTimeout(function() { 
               console.log(event.detail.inputs);
               // window.location.href = `https://api.whatsapp.com/send/?phone=${phone}&text=${text}`;
           }, 1000);
      
       }, false );
    </script>
   <?php
}

class Walker_Nav_Primary extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n<ul class=\"submenu flex-fill\">\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "</ul></div></div></div>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        $class_names = $class_names ? ' '.(! empty( get_field('item_media', $item) )        ? ' data-img="'   . esc_attr( get_field('item_media', $item) ) .'"' : '').' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $term_name = slugify($item->title);
        $term = get_term_by('slug', $term_name, 'categoria');

        $output .= $indent . '';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->classes ) ? ' class="nav-link '  . esc_attr( implode(' ', $item->classes) ) .'" ' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ! empty( get_field('item_media', $item) )        ? ' data-img="'   . esc_attr( get_field('item_media', $item) ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<li'. $class_names .' '.(! empty( $term )        ? ' data-img="'   . esc_attr( get_field('thumbnail', $term) ) .'"' : '').'>';
        
        if($item->menu_item_parent) {
            $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
        } else {
            $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
        }

        $item_output .= '<div data-depth="'.$depth.'" class="submenu-wrapper id-'.$item->ID.'"><div class="submenu-inner"><div class="container '.($item->post_name === 'servicos' ? ' d-flex flex-wrap align-items-stretch' : '').'">';
            
            if(get_field('item_media', $item)) {
                $item_output .= '<div class="d-block col-lg-3 pe-lg-5">';
                    $item_output .= '<img loading="lazy" width="280" height="240" class="thumbnail menu-thumbnail img-fluid" src="'.get_field('item_media', $item).'" />';
                    if(get_post_type_archive_link('servicos')) {
                        $item_output .= '<a class="btn primary d-block mt-4" href="'.get_post_type_archive_link('servicos').'">Ver todos os serviços</a>';
                    }
                $item_output .= '</div>';
            }
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }


    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "\n".( get_field('item_media', $item) ? "<input type='hidden' value='".get_field('item_media', $item)."' name='default_thumbnail' />" : "");
    }
}

if (function_exists("register_sidebar")) {
    register_sidebar([
        "id" => "contact",
        "name" => __("Contato"),
        "before_widget" => '<aside id="%1$s" class="widget %2$s">',
        "after_widget" => "</aside>",
        "before_title" => "",
        "after_title" => "",
    ]);
}

/**
 * Change posts per page by post type
 */
function bb_change_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }
    if ( is_post_type_archive( 'workshops' ) ) {
        $query->set( 'posts_per_page', 9 );
    }
    if ( is_search() ) {
        $query->set( 'posts_per_page', 9 );
        if($_GET['date_query']) {
            $query->set(
                'date_query',
                array(
                    'relation' => 'OR',
                    array('year' => $_GET['date_query'])                    
                    // array(
                    //     'column'    => 'post_date_gmt',
                    //     'after'     => 'May 1st, 2021',
                    //     'inclusive' => true,
                    // ),
                )
            );            
        }
    }
}

function my_search_form($form)
{

    global $wpdb;

    $form = '<form id="search" action="' .
        home_url("/") .
        '" method="GET">
        <div class="searchbar d-flex flex-wrap flex-row align-items-center pe-lg-4">
            <div class="field-group flex-fill pe-3 overflow-hidden">
                <div class="inner  d-flex flex-wrap align-items-center">
                    <i class="d-flex flex-column justify-content-center align-items-center pe-3 fa-solid fa-magnifying-glass"></i>
                    <input type="hidden" name="post_type" value="'.get_queried_object()->name.'" />
                    <input class="d-block input flex-fill" placeholder="'.(get_queried_object()->name === 'workshops' ? 'Buscar eventos...' : 'Faça sua busca aqui...').'" id="s" name="s" type="text" value="' . get_search_query() . '" />
                    <button class="submit d-block">Buscar</button>
                </div>
            </div>';
            
            if(get_queried_object()->name === 'workshops') {
                $form .= '<select class="select" name="date_query" value="' . $_GET['date_query'] . '">';
                    $years = $wpdb->get_col(
                        "SELECT DISTINCT YEAR(post_date) 
                        FROM $wpdb->posts 
                        WHERE post_status = 'publish' 
                        AND post_type = 'workshops' 
                        ORDER BY post_date DESC"
                    );

                    // global $wpdb;

                    // $query_prepare = $wpdb->prepare("SELECT YEAR(post_date) FROM ($wpdb->posts) WHERE post_status = 'publish' AND post_type = %s GROUP BY YEAR(post_date) DESC", 'workshops');
                
                    // $years = $wpdb->get_results($query_prepare);

                    if ( is_array( $years ) && count( $years ) ) {
                        foreach ( $years as $year ) {
                            // $result[] = json_decode(json_encode($year), true);
                            $form .= '<option '.( isset($_GET['date_query']) && $_GET['date_query'] === $year ? 'selected' : '').' value="'.$year.'">Em '.$year.'</option>';
                        }
                    }      
                        
                $form .= '</select>';
            }
        $form .= ' </div>
    </form>';

    return $form;
}

function save_my_form_data_to_my_cpt($contact_form)
{
    if ($contact_form->id === 430) {
        $submission = WPCF7_Submission::get_instance();
        if (!$submission) {
            return;
        }
        $posted_data = $submission->get_posted_data();
        //The Sent Fields are now in an array
        //Let's say you got 4 Fields in your Contact Form
        //my-email, my-name, my-subject and my-message
        //you can now access them with $posted_data['my-email']
        //Do whatever you want like:
        $new_post = [];
        if (isset($posted_data["email"]) && !empty($posted_data["email"])) {
            $new_post["post_title"] = $posted_data["email"];
        }
        $new_post["post_type"] = "newsletter"; //insert here your CPT
        $new_post["post_status"] = "publish";
        //you can also build your post_content from all of the fields of the form, or you can save them into some meta fields
        // if(isset($posted_data['my-email']) && !empty($posted_data['my-email'])){
        //     $new_post['meta_input']['sender_email_address'] = $posted_data['my-email'];
        // }
        // if(isset($posted_data['my-name']) && !empty($posted_data['my-name'])){
        //     $new_post['meta_input']['sender_name'] = $posted_data['my-name'];
        // }
        //When everything is prepared, insert the post into your Wordpress Database
        if ($post_id = wp_insert_post($new_post)) {
            //Everything worked, you can stop here or do whatever
        } else {
            //The post was not inserted correctly, do something (or don't ;) )
        }
    }
    return;
}

/**
* Get posts group by alphabets.
*
* @todo Change the `prefix_` and with your own unique prefix.
*
* @since 1.0.0
*/
if( ! function_exists( 'prefix_get_posts_group_by_alphabet' ) ) :
    function prefix_get_posts_group_by_alphabet() {
        $result = array();
        $query_args = array(
            'post_type' => 'downloads',
            // Query performance optimization.
            'no_found_rows' => true,
            'posts_per_page' => 100,
        );
        $query = new WP_Query( $query_args );
        if ( $query->posts ) {
            foreach ( $query->posts as $key => $post ) {
                $first_letter = substr($post->post_title,0,1);
                if( ! empty( $first_letter ) ) {
                    $result[$first_letter][] = array(
                        'ID' => $post->ID,
                        'title' => $post->post_title,
                        'excerpt' => $post->post_excerpt,
                        'file' => get_field('file', $post->ID)
                    );
                }
            }
        }
        if( ! empty( $result ) ) {
            ksort( $result );
        }
        return $result;
    }
endif;

add_shortcode( 'prefix_alphabetic_posts', 'prefix_alphabetic_posts' );
function prefix_alphabetic_posts() {
    ob_start();
    $result = prefix_get_posts_group_by_alphabet();
    if( $result ) { ?>
        <div class="downloads-grid">
            <?php $letters = array_keys($result); ?>
            <?php if( $letters ) { ?>
                <ul class="downloads-grid-pagination d-flex align-items-center justify-content-center flex-wrap">
                    <li class="downloads-grid-pagination--item">
                        <a href="javascript:void(0)" data-letter="#">#</a>
                    </li>                    
                    <?php foreach( $letters as $key => $letter ) { ?>
                        <li class="downloads-grid-pagination--item" data-letter="<?php echo $letter; ?>">
                            <a href="javascript:void(0)" data-letter="<?php echo $letter; ?>"><?php echo $letter; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <div class="downloads-grid-results mt-5 d-flex align-items-stretch justify-content-start flex-wrap">
                <?php foreach( $result as $letter => $posts ) { ?>
                    <div data-letter="<?php echo $letter; ?>" id="goto-letter-<?php echo $letter; ?>" class="downloads-grid-results--item col-3 p-2 mb-5 overflow-hidden">
                        <h3 class="d-block pb-2 mb-3 list-results-header"><?php echo $letter; ?></h3>
                        <ul class="list-results d-block">
                            <?php foreach( $posts as $key => $post ) { ?>
                                <li class="list-results--item d-block mb-2">
                                    <a download title="<?php echo $post['title']; ?>" href="<?php echo $post['file']['url']; ?>">
                                        <?php echo $post['title'].' ('.size_format($post['file']['filesize']).')'; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
    return ob_get_clean();
}

add_post_type_support( 'page', 'excerpt' );
add_theme_support("post-thumbnails");
add_action("wpcf7_mail_sent", "save_my_form_data_to_my_cpt");
add_action("wpcf7_mail_failed", "save_my_form_data_to_my_cpt");
add_filter("get_search_form", "my_search_form");
add_filter( 'pre_get_posts', 'bb_change_posts_per_page' );
add_filter("tiny_mce_before_init", "my_mce4_options");
// add_filter("posts_where", "qirolab_posts_where", 10, 2);
add_filter("nav_menu_link_attributes", "add_menu_link_class", 1, 3);
add_filter("nav_menu_css_class", "atg_menu_classes", 1, 3);
add_action("get_footer", "prefix_add_footer_styles");
add_action("init", "wpb_custom_new_menu");
add_action("wp_enqueue_scripts", "regScripts");
add_action("admin_menu", "remove_menus");
add_action("admin_menu", "disable_default_dashboard_widgets");
add_action("wp_footer", "mycustom_wp_redirect");
add_action('wp_before_admin_bar_render', 'wp_before_admin_bar_render');