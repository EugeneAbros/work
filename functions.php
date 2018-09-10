<?php
add_theme_support( 'post-thumbnails' );
// Active menu

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' )
        )
    );
}
// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) $content_width = 900;
// Stylesheet and Script
function style_script() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/css/main.min.css', '', time() );
    wp_enqueue_style( 'plugin', get_template_directory_uri() . '/dist/css/plugin.min.css' );
    wp_enqueue_style( 'css-new', get_template_directory_uri() . '/dist/css/css-new.css' );


  wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800' );

    // Scripts
    wp_deregister_script('jquery-script');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'onready', get_template_directory_uri() . '/js/onready.js', array(), '1.0', true );
    wp_enqueue_script( 'waypoints-scripts', get_template_directory_uri() . '/dist/js/jquery.waypoints.min.js', array('jquery'), null, false );
    wp_localize_script( 'onready', 'ajax', array(
        'url' => admin_url( 'admin-ajax.php' )
    ) );
    $jspath = array( 'template_url' => get_bloginfo('template_url') );
    wp_localize_script( 'onready', 'jspath', $jspath );
    wp_enqueue_script( 'plugin-script', get_template_directory_uri() . '/dist/js/plugin.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/js/scripts.js', array('jquery'), null, true );


}
add_action( 'wp_enqueue_scripts', 'style_script' );
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'menu_slug' 	=> 'header',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
		));
		acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
		));

}

register_sidebar( array (
'name' => __( 'Widget'),
'id' => 'lang-widget',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
) );
register_sidebar( array (
'name' => __( 'Polylang Mobile'),
'id' => 'polylang-mobile',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
) );

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
// Usuwanie spacji
function phone_to_link( $string ) {
    $string = str_replace( '+', '00', $string );
    $string = str_replace( '-', '', $string );
    $string = str_replace( ' ', '', $string );
    $string = str_replace( '.', '', $string );
    return $string;
}
function my_show_extra_profile_fields( $user ) { ?>
<h3>Dodatkowe dane</h3>
    <table class="form-table">
<tr>
            <th><label for="phone">Numer telefonu oraz viber</label></th>
            <td>
            <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>
<tr>
            <th><label for="phone">Drugi numer telefonu</label></th>
            <td>
            <input type="text" name="phone2" id="phone2" value="<?php echo esc_attr( get_the_author_meta( 'phone2', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>
<tr>
            <th><label for="phone">Trzeci numer telefonu</label></th>
            <td>
            <input type="text" name="phone3" id="phone3" value="<?php echo esc_attr( get_the_author_meta( 'phone3', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>
<tr>
            <th><label for="phone">E-mail</label></th>
            <td>
            <input type="text" name="email" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>
<tr>
            <th><label for="phone">Skype</label></th>
            <td>
            <input type="text" name="skype" id="skype" value="<?php echo esc_attr( get_the_author_meta( 'skype', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>
<tr>
            <th><label for="phone">Link do Facebooka</label></th>
            <td>
            <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>
<tr>
            <th><label for="phone">Link</label></th>
            <td>
            <input type="text" name="link" id="link" value="<?php echo esc_attr( get_the_author_meta( 'link', $user->ID ) ); ?>" class="regular-text" /><br />

            </td>
</tr>


</table>
<?php }
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) )
    return false;

update_usermeta( $user_id, 'phone', $_POST['phone'] );
update_usermeta( $user_id, 'phone2', $_POST['phone2'] );
update_usermeta( $user_id, 'phone3', $_POST['phone3'] );
update_usermeta( $user_id, 'email', $_POST['email'] );
update_usermeta( $user_id, 'skype', $_POST['skype'] );
update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
update_usermeta( $user_id, 'link', $_POST['link'] );
}

// Register new post
add_action('acf/save_post', 'my_save_post');

function my_save_post( $post_id ) {

	// bail early if not a contact_form post
	if( get_post_type($post_id) !== 'contact_form' ) {

		return;

	}


	// bail early if editing in admin
	if( is_admin() ) {

		return;

	}


	// vars
	$post = get_post( $post_id );


	// get custom fields (field group exists for content_form)
	$name = get_field('name', $post_id);
	$email = get_field('email', $post_id);


	// email data
	$to = 'contact@website.com';
	$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	$subject = $post->post_title;
	$body = $post->post_content;


	// send email
	wp_mail($to, $subject, $body, $headers );

}


function wpb_list_child_pages() {

global $post;

if ( is_page() && $post->post_parent )

    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

    $string = '<ul>' . $childpages . '</ul>';
}

return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

function custom_facetwp_pager( $output, $params ) {
    $output = '';
    $page = (int) $params['page'];
    $total_pages = (int) $params['total_pages'];
    // Only show pagination when > 1 page
    if ( 1 < $total_pages ) {
        if ( 1 < $page ) {
            $output .= '<button class="facetwp-page left-page" data-page="' . ( $page - 1 ) . '"><div class="prev"></div></button>';
        } else {
            $output .= '<button disabled class="facetwp-page left-page" data-page="' . ( $page - 1 ) . '"><div class="prev"></div></button>';
        }
        if ( 3 < $page ) {
            $output .= '<button class="facetwp-page first-page other-page" data-page="1">1</button>';
            $output .= ' <span class="dots">…</span> ';
        }
        for ( $i = 2; $i > 0; $i-- ) {
            if ( 0 < ( $page - $i ) ) {
                $output .= '<button class="facetwp-page other-page" data-page="' . ($page - $i) . '">' . ($page - $i) . '</button>';
            }
        }
        // Current page
        $output .= '<button class="facetwp-page active other-page" data-page="' . $page . '">' . $page . '</button>';
        for ( $i = 1; $i <= 2; $i++ ) {
            if ( $total_pages >= ( $page + $i ) ) {
                $output .= '<button class="facetwp-page other-page" data-page="' . ($page + $i) . '">' . ($page + $i) . '</button>';
            }
        }
        if ( $total_pages > ( $page + 2 ) ) {
            $output .= ' <span class="dots">…</span> ';
            $output .= '<button class="facetwp-page last-page other-page" data-page="' . $total_pages . '">' . $total_pages . '</button>';
        }
        if ( $page < $total_pages ) {
            $output .= '<button class="facetwp-page right-page" data-page="' . ( $page + 1 ) . '"><div class="next"></div></button>';
        } else {
            $output .= '<button  disabled class="facetwp-page right-page" data-page="' . ( $page + 1 ) . '"><div class="next"></div></button>';
        }

    }
    return $output;
}
add_filter( 'facetwp_pager_html', 'custom_facetwp_pager', 10, 2 );

require get_template_directory().'/dist/ajax.php';
require get_template_directory().'/dist/pagination.php';
//require get_template_directory().'/dist/acf-translate.php';


function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}





function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
