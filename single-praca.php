<?php get_header(); ?>
<?php
$class = null;
if ( is_single() ) {
  $class = 'job-search';
} else {
  $class = 'normal-search';
}
?>
<div class="content-wrap <?php echo $class ?>">
  <div class="container-search-job container-fluid">
    <div class="container">
      <div class="row">
        <h1><?php the_title(); ?></h1>
        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        	<div>
        			<input class="search-job" type="text" value="" name="s" id="s" placeholder="<?php echo pll__( 'Wpisz zawód, słowa kluczowe...' ); ?>" />
        			<input type="hidden" name="post_type" value="praca" />
        		 <button type="submit" id="searchsubmit" class="banner-text-btn"><img src="<?php bloginfo('template_url'); ?>/images/search-arrow.png" alt="search-arrow"></button>
        	</div>
        </form>
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
            <div class="page-content job-container col-lg-9">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                $google_map_link = get_field( 'google_map_link' );
                $city_field = get_field( 'city_field' );
                $city_place = get_field( 'city_place' );
                $price_low = get_field( 'price_low' );
                $price_hight = get_field( 'price_hight' );
                $vat_cost = get_field( 'vat_cost' );
                $number_wakat = get_field( 'number_wakat' );
                $kwalifikacje = get_field( 'kwalifikacje' );
                $detail_position = get_field( 'detail_position' );
                $image_job = get_field( 'image_job' );
                // Województwo
                $field = get_field_object('wojewodztwo');
                $value = $field['value'];
                $label = $field['choices'][ $value ];
                $fieldbrutto = get_field_object('vat_cost_select');
        				$valuebrutto = $fieldbrutto['value'];
        				$labelbrutto = $fieldbrutto['choices'][ $valuebrutto ];

                $cost_hours = get_field( 'cost_hours' );
                $hours_bn = get_field_object('cost_price');
                $valuebn = $hours_bn['value'];
                $labelbn = $hours_bn['choices'][ $valuebn ];
                ?>
                <div class="col-sm-12 single-job">

                  <div class="small-desc">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="the-date">
                      <span><?php echo pll__( 'Dodano' ); ?></span>
                      <span class="date-post"><?php echo get_the_date(); ?></span>
                      <span><?php echo pll__( 'Przez' ); ?></span>
                    <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author() ?></a></span>
                    </div>
                    <div class="sku-number">
                      <p><?php echo pll__( 'Nr. Referencyjny:' ); ?></p>
                      <span class="icon-date"><?php echo get_the_date('md'); ?> / <?php the_time('His'); ?></span>
                    </div>
                  </div>

                  <div class="description">
                    <div class="price">
                      <a class="print-button" href="javascript:window.print()"></a>
                      <span><?php echo $price_low ?> - </span>
                      <span><?php echo $price_hight ?> <?= $labelbn ?> </span>
                      <span><?php echo $labelbrutto ?></span>
                              <?php
        if ( !empty( $cost_hours ) ) { ?>
          <p style="color: #90969a; font-size: 20px;"><?php echo $cost_hours ?> <?php echo $labelbn ?> / h</p>
        <?php }
        ?>
                    </div>
                    <div class="button-container">
                      <?php if( get_field('form_crm') == 'E-mail' ): ?>
                         <a href="mailto:<?php the_author_meta( 'email' ); ?>?subject=Aplikacja na <?php the_title(); ?> Nr. Referencyjny: <?php echo get_the_date('md'); ?> / <?php the_time('His'); ?>&body=@Worksol Potwierdzasz aplikacje na <?php the_title(); ?> Nr. Referencyjny: <?php echo get_the_date('md'); ?> / <?php the_time('His'); ?> proszę o przesłanie danych personalnych lub przesłać CV. "><?php echo pll__( 'Aplikuj' ); ?></a>
                       <?php endif; ?>
                       <?php if( get_field('form_crm') == 'CRM' ): ?>
                         <a id="toggle-app" href="#"><?php echo pll__( 'Aplikuj' ); ?></a>
                     <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="toggle-job">
                  <div class="desc-job col-md-12">
                    <div class="detail-job">
                      <div class="city">
                        <?php
                          if ( !empty( $google_map_link ) ) {
                            $maplink = $google_map_link;

                          } else {
                            $maplink = "https://www.google.pl/maps/search/{$city_field}";
                           }
                        ?>
                        <img src="<?php bloginfo('template_url'); ?>/images/icon-location.png" alt="icon-loaction">
                        <a href="<?php echo $maplink ?>">
                          <p><?php echo $city_field ?>, <?php echo $label ?></p>
                        </a>
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
                  <div class="content-job-post col-md-12">
                      <div class="desc-post">
                        <?php echo $detail_position ?>
                      </div>
                      <?php
                      if ( !empty( $image_job ) ) { ?>
                        <div class="non-printable one-image" style="background-image: url(<?php echo $image_job ?>)">

                        </div>
                        <img class="printable" src="<?php echo $image_job ?>" alt="">
                      <?php  }  ?>
                        <?php
                   $currentlang = get_bloginfo('language');
                     if ( $currentlang=="uk" ) { ?>
                            <div class="responsibilities-container">
                              <h2><?php echo pll__( "Zakres obowiązków" ); ?></h2>
                              <div class="list-item">
                                <ul>
                                  <?php $responsibilities_text = get_field( 'responsibilities_text' );?>
                                <li><p><?php echo $responsibilities_text ?></p></li>
                                <?php while( have_rows('responsibilities') ): the_row();
                                  $responsibilities_text = get_sub_field('responsibilities_text');
                                  ?>
                                  <li><p><?php echo $responsibilities_text ?></p></li>
                                <?php endwhile; ?>
                              </ul>
                            </div>
                          </div><?php
                     }
                     else {
                          if( have_rows('responsibilities') ): ?>
                            <div class="responsibilities-container">
                              <h2><?php echo pll__( "Zakres obowiązków" ); ?></h2>
                              <div class="list-item">
                                <ul>
                                <?php while( have_rows('responsibilities') ): the_row();
                                  $responsibilities_text = get_sub_field('responsibilities_text');
                                  ?>
                                  <li><p><?php echo $responsibilities_text ?></p></li>
                                <?php endwhile; ?>
                              </ul>
                            </div>
                          </div>
                        <?php endif; 
                     }

                ?>
                    <?php if( have_rows('offer_repeater') ): ?>
                      <div class="responsibilities-container">
                        <h2><?php echo pll__( "Oferujemy" ); ?></h2>
                        <div class="list-item">
                          <ul>
                          <?php while( have_rows('offer_repeater') ): the_row();
                            $offer_text = get_sub_field('offer_text');
                            ?>
                            <li><p><?php echo $offer_text ?></p></li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                    </div>
                  <?php endif; ?>
                    <?php if( have_rows('information') ): ?>
                      <div class="responsibilities-container">
                        <h2><?php echo pll__( "Dodatkowe informacje" ); ?></h2>
                        <div class="list-item">
                          <ul>
                          <?php while( have_rows('information') ): the_row();
                            $information_text = get_sub_field('information_text');
                            ?>
                            <li><p><?php echo $information_text ?></p></li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                    </div>
                  <?php endif; ?>

                    <?php if( have_rows('gallery_job') ): ?>
                      <div class="gallery-container">
                        <div class="row">
                        <?php while( have_rows('gallery_job') ): the_row();
                          $image_job_gallery = get_sub_field('image_job_gallery');
                          ?>
                          <div class="gallery-single col-sm-6 col-md-3">
                            <div class="background non-printable" style="background-image: url(<?php echo $image_job_gallery ?>)">

                            </div>
                            <img class="printable" src="<?php echo $image_job_gallery ?>" alt="">
                          </div>
                        <?php endwhile; ?>
                        </div>
                    </div>
                  <?php endif; ?>
                  <div class="comment-container">
                    <div id="disqus_thread"></div>
                       <script>
                            <?php
                             global $wp;
                             $current_url = home_url(add_query_arg(array(),$wp->request));
                            ?>
                           var disqus_config = function () {
                               this.page.url = '<?php echo $current_url;?>';  // Replace PAGE_URL with your page's canonical URL variable
                               this.page.identifier = 'worksol<?php echo get_queried_object_id();?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                           };

                           (function() {  // DON'T EDIT BELOW THIS LINE
                               var d = document, s = d.createElement('script');

                               s.src = '//worksol.disqus.com/embed.js';

                               s.setAttribute('data-timestamp', +new Date());
                               (d.head || d.body).appendChild(s);
                           })();
                       </script>
                  </div>
                  </div>
                </div>
                <?php
                endwhile;
                else: ?>
                <p><?php echo esc_html('Brak wpisów.'); ?></p>
             <?php endif; ?>
             <div class="application-form">
                <?php
                $link_form = get_field( 'link_form' );
                ?>
                <?php
                if ( !empty( $link_form ) ) { ?>
                  <iframe src="<?php echo $link_form ?>" style="max-width: 100%; height: 100%"></iframe>
                <?php } ?>
                <p><?php echo pll__( 'Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji zgodnie z Ustawą z dn. 29.08.97 roku o Ochronie Danych Osobowych Dz. Ust. nr 133 poz.883.' ) ?></p>
             </div>
             <?php echo do_shortcode('[kodex_post_like_buttons]'); ?>
           </div>
           <div class="sidebar sidebar-single-job col-lg-3">
             <div class="author-box">
               <div class="contact-box">
                 <div class="image-user">
                   <?php echo get_wp_user_avatar( $user_info->ID ); ?>
                 </div>
                 <h2><?php echo pll__( 'Opiekun Oferty' ); ?></h2>
                                  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                  <h4><?php the_author(); ?></h4>
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
               <div class="button-user">
                 <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo pll__( 'Zobacz oferty opiekuna' ); ?></a>
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
