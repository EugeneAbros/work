<?php
/* Template name: Front-page */
?>
<?php get_header(); ?>
<?php
$background_front = get_field( 'background_front' );
?>
<div class="wrapper-top clearfix" style="background-image:url(<?php echo $background_front ?>)">

    <div class="container">
      <div class="row">
        <div class="col-md-7 top-text">
          <?php
          $title_top = get_field( 'title_top' );
          $desc_top = get_field( 'desc_top' );
          ?>
          <h1><?php echo $title_top ?></h1>
          <?php echo $desc_top ?>
          <?php
             $currentlang = get_bloginfo('language');
             $displayOff = null;
               if (  $currentlang=="uk" ) {
                  $displayOff = 'displayOff';
               }
               if ( $currentlang=="ru-RU" ) {
                 $displayOff = 'displayOff';
               }
          ?>


          <div class="news-container">
            <h3><?php echo pll__( 'Aktualności' ); ?></h3>
            <a href="<?php echo pll__( get_page_link(90) ); ?>"><?php echo pll__( 'Zobacz wszystkie aktualności' ); ?></a>
          </div>
          <?php
          $args = array(
              'post_type' => array('dla_cudzoziemca', 'dla_pracodawcy'),
              'posts_per_page' => '3'
          );
          $the_query = new WP_Query( $args ); ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <div class="news-container-post clearfix">
              <div class="swiper-pagination"></div>
              <div class="swiper-container">
                  <div class="swiper-wrapper">
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <div class="swiper-slide post">
                      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                      <?php
                      if ( has_post_thumbnail() ) { ?>
                        <a href="<?php the_permalink(); ?>">
                          <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">
                          </div>
                        </a>
                      <?php }
                      ?>
                      <p><?php echo get_the_date(); ?></p>
                      <h2><?php the_title(); ?></h2>
                      <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
                    </div>
                    <?php
                    endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                  </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <?php
        if (  $currentlang=="uk" ) {
           $displayUkRu = 'displayOff';
        }
        if ( $currentlang=="ru-RU" ) {
          $displayUkRu = 'displayOff';
        }
        ?>
        <div class="col-md-5 search-box">
          <?php
          $title_job_top = get_field( 'title_job_top' );
          $title_job_desc = get_field( 'title_job_desc' );
          $desc_job_down = get_field( 'desc_job_down' );
          ?>
          <div class="search-box-container">
            <div class="search-header <?php echo $displayUkRu ?>">
              <div class="title">
                  <?php echo $title_job_desc ?>
              </div>
              <div class="description">
                <?php echo $desc_job_down ?>
                    <a href="<?php echo pll__( get_page_link(144) ); ?>"><img alt="search-box" src="<?php bloginfo('template_url'); ?>/images/arrow1.png" alt="search-arrow"></a>
              </div>
            </div>

            <div class="search-body ">
              <?php
                 $currentlang = get_bloginfo('language');

                  if($currentlang=="uk"): ?>
                  <script>
                  function fwp_redirect() {
                      FWP.parse_facets();
                      FWP.set_hash();
                      var query = FWP.build_query_string();
                      window.location.href = '/aktualni-vakansji/?' + query;
                  }
                  </script>               
                 <?php elseif($currentlang=="pl-PL"): ?>
                   <script>
                   function fwp_redirect() {
                       FWP.parse_facets();
                       FWP.set_hash();
                       var query = FWP.build_query_string();
                       window.location.href = '/oferty-pracy/?' + query;
                   }
                   </script>
               <?php endif; ?>

                <div class="title">
                    <?php echo $title_job_top ?>
                    <div class="branza">
                      <p><?php echo pll__('Branża:') ?></p>
                      <?php echo do_shortcode("[facetwp facet='branza']"); ?>
                    </div>
                    <div class="wynagrodzenie">
        							<p><?php echo pll__('Wysokość wynagrodzenia:') ?></p>
        							<?php echo do_shortcode("[facetwp facet='test']"); ?>
        						</div>
                    <div class="kwalifikacje">
                      <p><?php echo pll__('Prace wymagające kwalifikacji:') ?></p>
                      <?php echo do_shortcode("[facetwp facet='kwalifikacje']"); ?>
                    </div>
                      <div style="display:none"><?php echo do_shortcode('[facetwp template="job_post"]'); ?></div>
                    <button onclick="fwp_redirect()"><?php echo pll__( 'Szukaj' ); ?></button>
                    <div class="clearfix">

                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
if (  $currentlang=="uk" ) {
   $displayUkRu = 'displayOff';
}
if ( $currentlang=="ru-RU" ) {
  $displayUkRu = 'displayOff';
}
?>
<div class="wrapper-employer <?php echo $displayUkRu?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 title" data-aos="fade-up" data-aos-offset="300" data-aos-once="true">
        <h2><?php echo pll__( 'Dla pracodawcy' ); ?></h2>
      </div>
      <div class="employer-container clearfix">
        <?php
  			$args = array(
  			    'post_type' => 'dla_pracodawcy',
            'posts_per_page' => '4',
            'order' => 'DESC'
  			);
  			$the_query = new WP_Query( $args ); ?>
  			<?php if ( $the_query->have_posts() ) : ?>
          <?php $i = 0; ?>
  			    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <?php
              if ( $i == 0 ) { ?>
                <div class="first-post">
                    <div class="background">
                      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                      <?php
                      if ( has_post_thumbnail() ) { ?>
                          <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)"></div>
                      <?php }
                      ?>
                      <div class="post-desc">
                        <p class="date-post" ><?php echo get_the_date(); ?></p>
                      <a class="title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                      <?php
                      if ( has_excerpt( $post->ID ) ) {
                          the_excerpt();
                      } else {
                      }
                      ?>
                      <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
                      </div>
                    </div>
                </div>
              <?php }
              ?>
              <?php
               if ( $i != 0 ) { ?>
                 <div class="secondary-post">
                    <div class="background">
                      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                    <?php
                    if ( has_post_thumbnail() ) { ?>
                        <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">
                        </div>
                    <?php }
                    ?>
                      <div class="post-desc">
                        <p><?php echo get_the_date(); ?></p>
                          <a class="title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
                      </div>

                    </div>
                 </div>
               <?php }
              ?>
  			    <?php
            $i++;
            endwhile; ?>
  			    <?php wp_reset_postdata(); ?>
  			<?php endif; ?>
        <div class="col-xs-12 more-button">
          <a data-aos="fade-up" data-aos-offset="300" data-aos-once="true" id="more-button-1" href="<?php echo pll__( get_page_link(507) ); ?>"><?php echo pll__( 'Więcej artykułów' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="wrapper-front-news">
  <?php
  $desc_post_front = get_field( 'desc_post_front' );
  $text_tag_post_front = get_field( 'text_tag_post_front' );
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="post-header">
          <?php echo $desc_post_front ?>
          <h2><?php echo $text_tag_post_front ?></h2>
          <div class="tag-post">
            <div class="title-social">
              <?php
              $args = array(
                  'post_type' => 'zatrudnienie_cudzo'
              );
              $the_query = new WP_Query( $args ); ?>
              <?php if ( $the_query->have_posts() ) : ?>
                <ul id="tag-sort" data-aos="zoom-in" data-aos-once="true">
                  <li class="active">
                    <a href="#"rel="tag" id=""><?php echo pll__( 'Wszystkie' ) ?></a>
                  </li>
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post();  ?>
                     <?php if(has_tag()) : ?>
                     <?php
                     $tags = get_the_tags(get_the_ID());
                       foreach($tags as $tag){
                         echo '<li>';
                         echo '<a href="'.get_tag_link($tag->term_id).'" rel="tag" id="'.$tag->slug.'">'.$tag->name.'</a>';
                         echo '</li>';
                     } ?>
                    <?php endif; ?>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 right-posts">
        <div class="row">
          <div id="ajax-content-post">
            <?php
            $args = array(
              'post_type' => 'zatrudnienie_cudzo',
              'posts_per_page' => 6,
              'order' => 'DESC'
            );
            $the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <div class="col-sm-4 col-md-6 single-post ">
                    <div class="border-post">
                      <p><?php echo get_the_date(); ?></p>
                      <a class="title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                      <a  href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
                    </div>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="wrapper-employer ">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 title" data-aos="fade-up" data-aos-offset="300" data-aos-once="true">
        <h3><?php echo pll__( 'Dla cudzoziemca' ); ?></h3>
      </div>
      <div class="employer-container flexgrid clearfix">
        <?php
        $args = array(
            'post_type' => 'dla_cudzoziemca',
            'posts_per_page' => '4',
            'order' => 'DESC'
        );
        $the_query = new WP_Query( $args ); ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php $i = 0; ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-md-6 post">
                    <div class="background">
                      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                      <?php
                      if ( has_post_thumbnail() ) { ?>
                          <div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)"></div>
                      <?php }
                      ?>
                      <div class="detail-post">
                        <p class="date-post"><?php echo get_the_date(); ?></p>
                        <a class="title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                        <?php
                        if ( has_excerpt( $post->ID ) ) {
                            the_excerpt();
                        } else {
                        }
                        ?>
                      <a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
                      </div>

                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <div class="col-xs-12 more-button">
          <a data-aos="fade-up" data-aos-offset="300" data-aos-once="true" id="more-button-2" href="<?php echo pll__( get_page_link(102) ); ?>"><?php echo pll__( 'Więcej artykułów' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="wrapper-three-job">
  <?php
    $title_three_job = get_field( 'title_three_job' );
  ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 text-job">
        <?php echo $title_three_job ?>
        <a data-aos="fade-up" data-aos-offset="300" data-aos-once="true" href="<?php echo pll__( get_page_link(98) ); ?>"><?php echo pll__( 'Przeglądaj wszystkie' ); ?></a>
      </div>
      <?php
      $args = array(
          'post_type' => 'praca',
          'posts_per_page' => '3',
          'order' => 'DESC'
      );
      $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php
            $city_field = get_field( 'city_field' );
            $price_low = get_field( 'price_low' );
            $price_hight = get_field( 'price_hight' );
            $vat_cost = get_field( 'vat_cost' );
            ?>
              <div class="col-sm-3 post-job">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <div class="the-date">
                  <span><?php echo pll__( 'Dodano' ); ?></span>
                  <span class="date-post"><?php echo get_the_date(); ?></span>
                  <span><?php echo pll__( 'Przez' ); ?></span>
                  <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author() ?></a></span>
                </div>
                <div class="desc-job">
                  <div class="city">
                    <img src="<?php bloginfo('template_url'); ?>/images/icon-location.png" alt="city">
                    <p><?php echo $city_field ?></p>
                  </div>
                  <div class="price">
                      <img src="<?php bloginfo('template_url'); ?>/images/icon-money.png" alt="price">
                    <span><?php echo $price_low ?> - </span>
                    <span><?php echo $price_hight ?> zł </span>
                    <span><?php echo $vat_cost ?></span>
                  </div>
                </div>
              </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
$helper_background = get_field( 'helper_background' );
$title_helper = get_field( 'title_helper' );
$title_helper_2 = get_field( 'title_helper_2' );
$number_satisfaction = get_field( 'number_satisfaction' );
$title_satisfaction = get_field( 'title_satisfaction' );
$desc_satisfaction = get_field( 'desc_satisfaction' );
?>
<div class="wrapper-helper" style="background-image:url(<?php echo $helper_background ?>)">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 title-helper">
        <p><?php echo $title_helper ?></p>
        <p class="number-current" data-count="<?php echo $number_satisfaction ?>">0</p>
        <p class="text-after-number"><?php echo $title_helper_2 ?></p>
      </div>
      <div class="left-side col-md-6">
        <div class="left-side-background">
          <?php if( have_rows('boxy') ): ?>
          	<?php while( have_rows('boxy') ): the_row();
          		$number_field = get_sub_field('number_field');
          		$text_field = get_sub_field('text_field');
          		$red_background = get_sub_field('red_background');
          		?>
              <div class="text-layout">
                <div class="number-container">
                  <span class="number"><?php echo $number_field ?></span>

                </div>
                <div class="text"><?php echo $text_field ?></div>
                <div class="border-background">
                    <div data-aos="fade-right" data-aos-offset="500" data-aos-once="true" class="border-red" style="width:<?php echo $red_background ?>%">
                    </div>
                </div>
              </div>
          	<?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="left-side-text">
          <h2><?php echo $title_satisfaction ?></h2>
          <?php echo $desc_satisfaction ?>
          <a data-aos="fade-up" data-aos-offset="300" data-aos-once="true" href="<?php echo pll__( get_page_link(122) ); ?>"><?php echo pll__( 'Więcej o Worksol' ); ?></a>
        </div>
      </div>
      <div class="right-side col-md-6" data-aos="zoom-in" data-aos-offset="300" data-aos-duration="1000" data-aos-once="true">
        <div class="right-side-background">
          <?php
          $percent_circle = get_field( 'percent_circle' );
          $percent_text_circle = get_field( 'percent_text_circle' );
          ?>
          <div class="card-chart">
          <div class="card-donut card-goalchart" data-size="260" data-thickness="28"></div>
          <div class="card-center">
            <span class="card-value"><?php echo $percent_circle ?></span>
            <div class="card-label"><?php echo $percent_text_circle ?></div>
          </div>
        </div>
        </div>
      </div>
        <?php
        $args = array(
            'post_type' => 'referencje',
            'order' => 'DESC'
        );
        $the_query = new WP_Query( $args ); ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <div class="col-sm-12 slider-reference ">
            <div class="swiper-container">
                <div class="swiper-wrapper">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <?php
              $logo_reference = get_field( 'logo_reference' );
              $desc_reference = get_field( 'desc_reference' );
              $image_reference = get_field( 'image_reference' );
              $author_reference = get_field( 'author_reference' );
              $place_reference = get_field( 'place_reference' );
              ?>
              <div class="reference-slider swiper-slide">
                <div class="image-logo">
                      <img src="<?php echo $logo_reference ?>" alt="image-logo">
                </div>

                <?php echo $desc_reference ?>
                <div class="person-post">
                	<?php 
                	if ( !empty( $image_reference ) ) { ?>
					<img src="<?php echo $image_reference ?>" alt="image">
                	<?php }
                	?>
                  
                  <div class="person-desc">
                    <h3><?php echo $author_reference ?></h3>
                    <p><?php echo $place_reference ?></p>
                  </div>
                </div>
              </div>
                  <?php
                  endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </div>
            </div>
              <div class="swiper-pagination"></div>
          </div>
        <?php endif; ?>
    </div>
  </div>
</div>
<script type="text/javascript">
(function($) {
  var number = new Waypoint({
    element: $( '.wrapper-helper' ),
    handler: function(direction) {
      $('.number-current').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({ countNum: $this.text()}).animate({
          countNum: countTo
        },
        {
          duration: 1500,
          easing:'linear',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
          }
        });
      });

    },
    offset: '50%'
  });

  var waypoint = new Waypoint({
    element: $( '.wrapper-helper' ),
    handler: function(direction) {
      $('.card-goalchart').circleProgress({
        startAngle: 1.5 * Math.PI,
        lineCap: 'square',
        value: .90,
        emptyFill: '#bf1108',
        fill: {
          'color': '#FFF'
        }
      });
    }
  });

})(jQuery);

</script>
<?php get_footer(); ?>
