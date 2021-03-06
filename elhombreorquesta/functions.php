<?php

// Register Custom Navigation Walker
function wp_bootstrap_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( '<span class="fa fa-angle-left"></span>', 'text-domain' ),
        'next_string'     => __( '<span class="fa fa-angle-right"></span>', 'text-domain' ),
        'before_output'   => '<nav><ul class="pagination">',
        'after_output'    => '</ul></nav>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) )
        $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( '<span class="fa fa-angle-double-left"></span>', 'text-domain' ) . '</a></li>';

    if ( $previous && (1 != $page) )
        $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    
    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage ) {
        $echo .= '<li class="next"><a href="' . $lastpage . '">' . __( '<span class="fa fa-angle-double-right"></span>', 'text-domain' ) . '</a></li>';
    }

    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}

function wp_add_vendors() {
    // Wordpress Handles OpenSans font and jQuery:
    wp_enqueue_style("open-sans");
    wp_enqueue_script("jquery");

    // Prettify
    wp_enqueue_style("prettify", get_template_directory_uri() . '/vendor/code-prettify/prettify/prettify.css');
    wp_enqueue_script("prettify-script", get_template_directory_uri() . '/vendor/code-prettify/prettify/prettify.js');

    // Font-Awesome
    wp_enqueue_style("font-awesome", get_template_directory_uri() . '/vendor/fortawesome/font-awesome/css/font-awesome.min.css');

    // Bootstrap
    wp_enqueue_style("bootstrap", get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/css/bootstrap.css');
    wp_enqueue_script("bootstrap-script", get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.js');

    // elHombreOrquesta custom styles:
    wp_enqueue_style("eho-style",  get_template_directory_uri() . '/style.css');

    // elHombreOrquesta custom scripts:
    wp_enqueue_script("eho-script", get_template_directory_uri() . '/functions.js', array(), false, true);

}

add_action( 'wp_enqueue_scripts', 'wp_add_vendors' );

?>
