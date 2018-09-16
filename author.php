
<?php get_header(); ?>
<div class="content-wrap wrapper-job">
  <div class="container-search-job container-fluid">
    <div class="container">
      <div class="row">
        <?php
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        ?>
            <h1 class="title-author-page"><?php echo pll__( 'Oferty pracy od' ); ?> <?php echo $curauth->nickname; ?> :</h1>
      </div>
    </div>
  </div>
  <div class="breadcrumbs container">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
  </div>
    <div class="content container">
      <div class="background-darken">
          <div class="row">
            <div class="col-md-9 job-container-post author-container">
              <div class="row">
              <?php
              if ( $author_id = get_query_var( 'author' ) ) { $author = get_user_by( 'id', $author_id ); }
              $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
              $author_id =  $author->ID;
              $args = array(
                  'author'=> $author_id,
                  'post_type' => 'praca'
              );
              $the_query = new WP_Query( $args ); ?>
              <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <?php
                  $city_field = get_field( 'city_field' );
                  $price_low = get_field( 'price_low' );
                  $price_hight = get_field( 'price_hight' );
                  $vat_cost = get_field( 'vat_cost' );
                  $number_wakat = get_field( 'number_wakat' );
                  $kwalifikacje = get_field( 'kwalifikacje' );
                                  // Województwo
                $field = get_field_object('wojewodztwo');
                $value = $field['value'];
                $label = $field['choices'][ $value ];
                // Brutto / netto
                $fieldbrutto = get_field_object('vat_cost_select');
                $valuebrutto = $fieldbrutto['value'];
                $labelbrutto = $fieldbrutto['choices'][ $valuebrutto ];

                $cost_hours = get_field( 'cost_hours' );
$hours_bn = get_field_object('cost_price');
$valuebn = $hours_bn['value'];
$labelbn = $hours_bn['choices'][ $valuebn ];
                  ?>
                    <div class="col-sm-12 post-job">


                      <div class="small-desc">
                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="the-date">
                          <span><?php echo pll__( 'Dodano' ); ?></span>
                          <span class="date-post"><?php echo get_the_date(); ?></span>
                          <span><?php echo pll__( 'Przez' ); ?></span>
                          <span class="author"><?php the_author() ?></span>
                        </div>
                        <div class="desc-job">
                          <div class="city">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon-location.png" alt="icon-loaction">
                            <p><?php echo $city_field ?>, <?php echo $label ?></p>
                          </div>
                          <div class="number-place">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon-quantity.png" alt="icon-quantity">
                          <?php 
                            if ( !empty( $number_wakat ) ) { ?>
                          <p><?php echo $number_wakat ?> <?php echo pll__( 'Кількість місць праці' )?></p>
                            <?php }
                          ?>
                          </div>
                          <div class="requirements">
                            <img src="<?php bloginfo('template_url'); ?>/images/icon-qualifications.png" alt="icon-qualifications">
                           <?php if( get_field('kwalifikacje') == 'Так' ): ?>
                            <p><?php echo pll__( 'Z kwalifikacja' ); ?></p>
                          <?php endif; ?>
                          <?php if( get_field('kwalifikacje') == 'Ні' ): ?>
                            <p><?php echo pll__( 'Bez kwalifikacji' ); ?></p>
                        <?php endif; ?>
                          </div>
                        </div>
                      </div>
                      <div class="description">
                        <div class="price">
                          <span><?php echo $price_low ?> - </span>
                          <span><?php echo $price_hight ?> zł </span>
                          <span><?php echo $labelbrutto ?></span>
                                  <?php
        if ( !empty( $cost_hours ) ) { ?>
          <p style="color: #90969a; font-size: 20px;"><?php echo $cost_hours ?> <?php echo $labelbn ?> / h</p>
        <?php }
        ?>
                        </div>
                        <?php
                        if ( has_excerpt( $post->ID ) ) {
                          the_excerpt();
                        } else {
                            // This post has no excerpt
                        }
                         ?>
                      </div>
                    </div>
                  <?php  endwhile; ?>
                  <?php wp_reset_postdata(); ?>
              <?php endif; ?>
           </div>
           </div>
           <div class="sidebar sidebar-single-job col-md-3">
             <div class="author-box">
               <div class="contact-box">
                 <div class="image-user">
                   <?php echo get_wp_user_avatar( $user_info->ID ); ?>
                 </div>
                 <h2><?php echo pll__( 'Opiekun Oferty' ); ?></h2>
                 <h4><?php the_author(); ?></h4>
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
                  <?php if(get_the_author_meta('skype', $user_info->ID) != ''): ?>
             <div class="tel">
               <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-skype@2.png" alt="tel">
               <a href="tel:<?php echo esc_html(phone_to_link( the_author_meta( 'skype', $user_info->ID )  ) ); ?>"><?php the_author_meta( 'skype', $user_info->ID ); ?></a>
             </div>
              <?php endif; ?>
                 <div class="email">
                   <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-mail@2.png" alt="email">
                    <a href="mailto:<?php the_author_meta( 'email' ); ?>"><?php the_author_meta( 'email' ); ?></a>
                 </div>
                  <?php if(get_the_author_meta('facebook', $user_info->ID) != ''): ?>
             <div class="tel">
               <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-facebook@2.png" alt="tel">
               <a target="_blank" href="<?php the_author_meta( 'facebook', $user_info->ID ); ?>"><?php the_author(); ?></a>
             </div>
              <?php endif; ?>
              </div>
                                                       <?php if(get_the_author_meta('link', $user_info->ID) != ''): ?>
                 <div class="button-user">
                 <a href="<?php echo get_the_author_meta('link', $user_info->ID); ?>"><?php echo pll__( 'Informacje o opiekunie' ); ?></a>
               </div>
                   <?php endif; ?>
             </div>
             <div class="social-container">
               <div class="title-social">
                 <h2><?php echo pll__( 'Udostępnij w social media:' ); ?></h2>
                  <?php echo do_shortcode("[Sassy_Social_Share]"); ?>

               </div>
             </div>

           </div>
          </div>
      </div>
    </div>
</div>
<?php get_footer();
