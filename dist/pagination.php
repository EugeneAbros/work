<?php

/*

@package weblider

	========================
		PAGINACJE
	========================
*/

function taco_pagination( $html_id='' ) {
    if( is_singular() )
        return;

    global $wp_query;

    /* Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /* Add current page to the array */
    if( $paged >= 1 )
        $links[] = $paged;

    /* Add the pages around the current page to the array */
    if( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul class="pagination">';

    /* Previous Post Link */
    if( $paged == 1 )
        echo '<li class="prev-page disable"><span class="nospan">' . __('', 'taco') . '</span></li>';
    else
        echo '<li class="prev-page">' . get_previous_posts_link( __('', 'taco') ) . '</li>';

    /* Link to first page, plus ellipses if necessary */
    if( !in_array( 1, $links ) ) {

        if( $paged == 1 ) {
            echo '<li class="number-page" ><span>1</span></li>';
        } else {
            echo '<li class="number-page" ><a href="' . get_pagenum_link(1) . '">1</a></li>';
        }

        if( !in_array( 2, $links ) )
            echo '<li class="number-page" ><span class="nospan">…</span></li>';
    }

    /* Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        if( $paged == $link ) {
            echo '<li class="pagi-curr number-page"><span>' . $link . '</span></li>';
        } else {
            echo '<li class="number-page" ><a href="' . get_pagenum_link($link) . '">' . $link . '</a></li>';
        }
    }

    /* Link to last page, plus ellipses if necessary */
    if( ! in_array( $max, $links ) ) {
        if( ! in_array( $max - 1, $links ) )
            echo '<li class="number-page" ><span class="nospan">…</span></li>';

        if( $paged == $max ) {
            echo '<li class="number-page" ><span>' . $max . '</span></li>';
        } else {
            echo '<li class="number-page" ><a  href="' . get_pagenum_link($max) . '">' . $max . '</a></li>';
        }
    }

    /* Next Post Link */
    if( $paged == $max )
        echo '<li class="next-page disable"><span class="nospan">' . __('', 'taco') . '</span></li>';
    else
        echo '<li class="next-page">' . get_next_posts_link( __('', 'taco') ) . '</li>';

    echo '</ul>';

}
