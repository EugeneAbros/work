<?php
// FRONT-PAGE FILTER TAG
// Add Ajax Actions

add_action('wp_ajax_wczyt_opiekun', 'wczyt_opiekun');
add_action('wp_ajax_nopriv_wczyt_opiekun', 'wczyt_opiekun');
function wczyt_opiekun() {

  $opiekun = $_POST['opiekun'];
  $user_info = get_userdata( $opiekun );
  ?>

        <div class="content-wrap">
          <div class="content">
            <div class="background-darken">
              <div class="sidebar sidebar-single-job">
                       <div class="author-box">
                         <div class="contact-box">
                           <div class="image-user">
                             <?php echo get_wp_user_avatar( $user_info->ID ); ?>
                           </div>
                           <h2><?php echo pll__( 'Opiekun Oferty' ); ?></h2>
                                                      <a href="<?php echo get_author_posts_url($user_info->ID); ?>">
                             <h1><?php echo $user_info->display_name ?></h1>
                           </a>
                <div class="tel">
                   <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-viber@2.png" alt="tel">
                   <a href="tel:<?php echo esc_html(phone_to_link( the_author_meta( 'phone', $user_info->ID )  ) ); ?>"><?php the_author_meta( 'phone', $user_info->ID ); ?></a>
                 </div>
                           <?php if(get_the_author_meta('phone2', $user_info->ID) != ''): ?>
                           <div class="tel">
                             <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-telefon@2.png" alt="tel">
                             <a href="tel:<?php echo esc_html(phone_to_link( the_author_meta( 'phone2', $user_info->ID )  ) ); ?>"><?php the_author_meta( 'phone2', $user_info->ID ); ?></a>
                           </div>
                            <?php endif; ?>
                            <?php if(get_the_author_meta('phone3', $user_info->ID) != ''): ?>
                           <div class="tel">
                             <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-telefon@2.png" alt="tel">
                             <a href="tel:<?php echo esc_html(phone_to_link( the_author_meta( 'phone3', $user_info->ID )  ) ); ?>"><?php the_author_meta( 'phone3', $user_info->ID ); ?></a>
                           </div>
                            <?php endif; ?>
                            <div class="tel">
                             <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-telefon@2.png" alt="tel">
                             <a href="tel:<?php echo esc_html(phone_to_link( the_author_meta( 'phone', $user_info->ID )  ) ); ?>"><?php the_author_meta( 'phone', $user_info->ID ); ?></a>
                           </div>
                            <?php if(get_the_author_meta('skype', $user_info->ID) != ''): ?>
                       <div class="tel">
                         <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-skype@2.png" alt="tel">
                         <a href="tel:<?php echo esc_html(phone_to_link( the_author_meta( 'skype', $user_info->ID )  ) ); ?>"><?php the_author_meta( 'skype', $user_info->ID ); ?></a>
                       </div>
                        <?php endif; ?>
                           <div class="email">
                             <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-mail@2.png" alt="email">
                             <a href="mailto:<?php echo $user_info->user_email ?>"><?php echo $user_info->user_email ?></a>
                           </div>
                            <?php if(get_the_author_meta('facebook', $user_info->ID) != ''): ?>
                            <div class="tel">
				               <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-facebook@2.png" alt="tel">
				               <a target="_blank" href="<?php the_author_meta( 'facebook', $user_info->ID ); ?>"><?php echo $user_info->display_name ?></a>
				             </div>
                        <?php endif; ?>
                         </div>
                         <div class="button-user">
                           <a href="<?php echo get_author_posts_url( $user_info->ID ); ?>"><?php echo pll__( 'Zobacz oferty opiekuna' ); ?></a>
                         </div>
                                                                  <?php if(get_the_author_meta('link', $user_info->ID) != ''): ?>
                 <div class="button-user">
                 <a href="<?php echo get_the_author_meta('link', $user_info->ID); ?>"><?php echo pll__( 'Informacje o opiekunie' ); ?></a>
               </div>
                   <?php endif; ?>
                       </div>
                     </div>
                  </div>
                </div>
        </div>

  <?php

  die();

}


add_action('wp_ajax_front_page_tags', 'front_page_tags');
add_action('wp_ajax_nopriv_front_page_tags', 'front_page_tags');

// Front-page loop
function front_page_tags () {
  $currentCategory = $_POST[ 'tag' ];

  $args = array(
    'post_type' => 'zatrudnienie_cudzo',
    'posts_per_page' => 6,
    'tag'            => $currentCategory
  );
  $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="col-sm-4 col-md-6 single-post" data-aos="zoom-in" data-aos-once="true">
          <div class="border-post">
            <p><?php echo get_the_date(); ?></p>
              <a class="title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  <?php endif;
  die();
}


// Zycie i praca Ajax kategoria i tagi

add_action('wp_ajax_life_job_loop', 'life_job_loop');
add_action('wp_ajax_nopriv_life_job_loop', 'life_job_loop');

// Loop
function life_job_loop () {
  // Date atrybut
  $catDate = $_POST[ 'catDate' ];
  // $tagDate = $_POST[ 'tagDate' ];
  // Wartość
  $tag = $_POST[ 'tag' ];
  $categorylist = $_POST[ 'cat' ];
  // Lista najnowsze / Popularne
  $orderBy = $_POST[ 'orderBy' ];
  $orderDate = $_POST[ 'orderDate' ];

  $offset = $_POST[ 'offset' ];

  if ( isset( $catDate ) ) :
    $catVar = $catDate;
  endif;
  if ( isset( $tag ) ) :
    $tagVar = $tag;
  endif;
  if ( isset( $orderBy ) ) :
    $varorderBy = $orderBy;
  endif;
  if ( isset( $orderDate ) ) :
    $varorderDate = $orderDate;
  endif;


  $args = array(
      'post_type' => 'dla_cudzoziemca',
      'posts_per_page' => 6,
      'category_name' => $catVar,
      'tag' => $tagVar,
      // "meta_key" => "post_views_count",
      "orderby" => $varorderBy,
      "order" => $varorderDate,
      "offset" => $offset,

  );
  $the_query = new WP_Query( $args ); ?>
  <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="col-md-12 post" data-aos="zoom-in" data-aos-once="true">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
          <?php
          if ( has_post_thumbnail() ) { ?>
              <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">

              </div>
          <?php }
          ?>
          <div class="insert-content">
            <p class="date-post"><?php echo get_the_date(); ?></p>
            <a class="title" href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>
            </a>
            <?php
            if ( has_excerpt( $post->ID ) ) {
                the_excerpt();
            } else {
            }
            ?>
            <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
          </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
  <?php else : ?>
    <p class="text-center" style="clear:both" data-aos="zoom-in" data-aos-once="true"><?php echo pll__( "Brak więcej postów" ); ?></p>
    <style media="screen">
      #load-more-page {
        display: none !important;
      }
    </style>
  <?php endif;
  die();
}

// Zatrudnienie cudzoziemców
add_action('wp_ajax_job_filter', 'job_filter');
add_action('wp_ajax_nopriv_job_filter', 'job_filter');

function job_filter () {
  // Kategorie
  $job_cat      = $_POST[ 'tag_job' ];
  // czytaj więcej
  $postNumber   = $_POST[ 'load_more' ];
  $plus         = $postNumber;

  if ( isset( $job_cat ) ) :
    $job_var = $job_cat;
  endif;
  if ( isset( $plus ) ) :
    $numbervar = $plus;
  endif;

  $args = array(
    'post_type'       => 'zatrudnienie_cudzo',
    'posts_per_page'  => 6,
    'offset'          => $numbervar,
    'tag'             => $job_var
  );
  $wp_query = new WP_Query( $args ); ?>
  <?php if ( $wp_query->have_posts() ) : ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <div class="col-md-12 post" data-aos="zoom-in" data-aos-once="true">
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <?php
        if ( has_post_thumbnail() ) { ?>
        <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">
        </div>
        <?php }
        ?>
        <div class="insert-content">
          <p class="date-post"><?php echo get_the_date(); ?></p>
          <a class="title" href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a>
          <?php
          if ( has_excerpt( $post->ID ) ) {
            the_excerpt();
          } else {
          }
          ?>
          <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
        </div>
      </div>
    <?php endwhile; ?>
    <?php else : ?>
      <p class="text-center" style="clear:both" data-aos="zoom-in" data-aos-once="true"><?php echo pll__( "Brak więcej postów" ); ?></p>
      <style media="screen">
        #load-more {
          display: none !important;
        }
      </style>
  <?php endif; ?>
  <?php die(); ?>
  <?php
}


// Aktualności
add_action('wp_ajax_news_filter', 'news_filter');
add_action('wp_ajax_nopriv_news_filter', 'news_filter');

function news_filter () {
  // Tagi
  $tag_news = $_POST[ 'tag_single' ];
  // offset
  $offsetData = $_POST[ 'offset' ];


  if ( isset( $tag_news ) ) :
    $tagPost = $tag_news;
  endif;
  if ( isset( $offsetData ) ) :
    $offsetPost = $offsetData;
  endif;
  $args = array(
    "post_type" => array(
      "dla_cudzoziemca",
      "dla_pracodawcy",
      "zatrudnienie_cudzo"
      ),
    'offset'          => $offsetPost,
    'posts_per_page'  => 6,
    'tag'             => $tagPost
  );
  $wp_query = new WP_Query( $args ); ?>
  <?php if ( $wp_query->have_posts() ) : ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <div class="col-md-12 post" data-aos="zoom-in" data-aos-once="true">
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <?php
        if ( has_post_thumbnail() ) { ?>
            <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">

            </div>
        <?php }
        ?>
        <div class="insert-content">
          <p class="date-post"><?php echo get_the_date(); ?></p>
          <a class="title" href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a>
          <?php
          if ( has_excerpt( $post->ID ) ) {
              the_excerpt();
          } else {
          }
          ?>
          <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else : ?>
    <p class="text-center" style="clear:both" data-aos="zoom-in" data-aos-once="true"><?php echo pll__( "Brak więcej postów" ); ?></p>
    <style media="screen">
      #load-more-page {
        display: none !important;
      }
    </style>
  <?php endif; ?>
  <?php die(); ?>
  <?php
}

// Artykuły
add_action('wp_ajax_article', 'article');
add_action('wp_ajax_nopriv_article', 'article');

function article () {
  // Tagi
  $tag_article = $_POST[ 'article_news' ];
  // offset
  $offsetArticle = $_POST[ 'offset_article' ];


  if ( isset( $tag_article ) ) :
    $tagPost = $tag_article;
  endif;
  if ( isset( $offsetArticle ) ) :
    $offsetPost = $offsetArticle;
  endif;
  $args = array(
'post_type'			 => 'dla_pracodawcy',
    'offset'          => $offsetPost,
    'posts_per_page'  => 6,
    'tag'             => $tagPost
  );
  $wp_query = new WP_Query( $args ); ?>
  <?php if ( $wp_query->have_posts() ) : ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
      <div class="col-md-12 post" data-aos="zoom-in" data-aos-once="true">
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <?php
        if ( has_post_thumbnail() ) { ?>
            <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">

            </div>
        <?php }
        ?>
        <div class="insert-content">
          <p class="date-post"><?php echo get_the_date(); ?></p>
          <a class="title" href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a>
          <?php
          if ( has_excerpt( $post->ID ) ) {
              the_excerpt();
          } else {
          }
          ?>
          <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else : ?>
    <p class="text-center" style="clear:both" data-aos="zoom-in" data-aos-once="true"><?php echo pll__( "Brak więcej postów" ); ?></p>
    <style media="screen">
      #load-more-article {
        display: none !important;
      }
    </style>
  <?php endif; ?>
  <?php die(); ?>
  <?php
}



?>
