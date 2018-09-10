<?php
$class = null;
if ( is_front_page() ) {
  $class = 'front-page-background';
}  else {
  $class = 'other-page-background';
}
?>
<div class="wrapper-contact-box <?php echo $class ?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php
        $title_footer = get_field( 'title_footer', 'option' );
        $title_first = get_field( 'title_first', 'option' );
        $desc_first = get_field( 'desc_first', 'option' );
        $icon_first = get_field( 'icon_first', 'option' );
        $title_two = get_field( 'title_two', 'option' );
        $desc_two = get_field( 'desc_two', 'option' );
        $icon_two = get_field( 'icon_two', 'option' );
        $title_three = get_field( 'title_three', 'option' );
        $icon_input_one = get_field( 'icon_input_one', 'option' );
        $icon_input_two = get_field( 'icon_input_two', 'option' );
        $icon_input_three = get_field( 'icon_input_three', 'option' );
        ?>
        <h4 data-aos="zoom-in" data-aos-once="true"><?php echo $title_footer ?></h4>
      </div>
      <?php
      $currentlang = get_bloginfo('language');
      $col = 4;
      $colDisplay = null;
      if ( $currentlang=="uk" ) {
        $col = 6;
        $colDisplay = 'displayOff';
        $className = 'ruClass';
      }
      ?>
      <div class="col-md-<?php echo $col ?> three-box">
        <div class="box-background">
          <div class="title">
            <?php echo $title_first ?>
          </div>
          <div class="description">
            <?php echo $desc_first ?>
          </div>
          <a class="folder" href="<?php echo pll__( get_page_link(98) ); ?>"><img src="<?php echo $icon_first ?>" alt="icon_first"><?php echo pll__( 'Przeglądaj oferty pracy' ); ?></a>
        </div>
      </div>
      <div class="col-md-<?php echo $col ?> three-box <?php echo $colDisplay ?>">
        <div class="box-background">
          <div class="title">
            <?php echo $title_two ?>
          </div>
          <div class="description">
            <?php echo $desc_two ?>
          </div>

          <a class="plus" href="<?php echo pll__( get_page_link(144) ); ?>"><img src="<?php echo $icon_two ?>" alt="icon_two"><?php echo pll__( 'Dodaj ofertę pracy' ); ?></a>
        </div>
      </div>
      <div class="col-md-<?php echo $col ?> three-box <?php echo $className ?>">
        <div class="box-background">
          <div class="title">
            <?php echo $title_three ?>
          </div>
          <div class="contact-input">
            <a class="face" href="#"><img src="<?php echo $icon_input_one ?>" alt="face"><?php echo pll__( 'Czat online' ); ?></a>
            <a class="tel" href="#" data-toggle="modal" data-target="#tel"><img src="<?php echo $icon_input_two ?>" alt="tel"><?php echo pll__( 'Zamów rozmowę' ); ?></a>
            <a class="person" href="<?php echo pll__( get_page_link(120) ); ?>"><img src="<?php echo $icon_input_three ?>" alt="person"><?php echo pll__( 'Kontakt bezpośredni' ); ?></a>
            <!-- Modal -->
            <div class="modal fade" id="tel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo pll__( 'Zamów rozmowę telefoniczną' ); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="337" title="Zamów rozmowę"]'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Zamów rozmowe modal  -->
<div class="wrapper-footer-menu">
  <div class="container">
    <div class="row">
      <div class="menu">
       <?php $defaults = array(
        'theme_location'  => 'primary-menu',
        'container'       => false,
        'menu_class'      => 'navigation',
        'menu_id'         => '',
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
      );
      wp_nav_menu( $defaults ); ?>
     </div>
    </div>

  </div>
</div>
<div class="wrapper-footer">
  <?php
  $logo_footer = get_field( 'logo_footer', 'option' );
  $text_input = get_field( 'text_input', 'option' );
  $facebook_ikona_footer = get_field( 'facebook_ikona_footer', 'option' );
  $facebook_link_footer = get_field( 'facebook_link_footer', 'option' );
  $vk_ikona_footer = get_field( 'vk_ikona_footer', 'option' );
  $vk_link_footer = get_field( 'vk_link_footer', 'option' );
  $twitter_ikona_footer = get_field( 'twitter_ikona_footer', 'option' );
  $twitter_link_footer = get_field( 'twitter_link_footer', 'option' );
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-lg-4 left-side">
         <a class="logo-footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo $logo_footer ?>" alt="">
      </a>
        <a target="_blank" href="<?php echo $facebook_link_footer ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-facebook-black.png" alt="fb"></a>
        <a target="_blank" href="<?php echo $vk_link_footer ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-vk-black.png" alt="vk"></a>
        <a target="_blank" href="<?php echo $twitter_link_footer ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-twitter-black.png" alt="twitter"></a>

      </div>
      <div class="col-md-7 col-lg-5 middle-side">
        <?php echo $text_input ?>
        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
          #mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
          /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
             We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="mc_embed_signup">
        <form action="//worksol.us16.list-manage.com/subscribe/post?u=0e6595fa77affe2fc7cf4273d&amp;id=7830e81957" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">

        <div class="mc-field-group">
          <input type="email" value="" placeholder="<?php echo pll__( 'Twój e-mail' ); ?>" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0e6595fa77affe2fc7cf4273d_7830e81957" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="<?php echo pll__( 'Zapisz się' ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='BIRTHDAY';ftypes[3]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->
      </div>
      <div class="col-md-12 col-lg-3 right-side">
        <p><?php echo pll__( 'Projekt serwisu:' ); ?></p>
      <a target="_blank" href="http://www.weblider.eu">  <img src="<?php bloginfo('template_url'); ?>/images/weblider.png" alt="weblider"></a>
      <a href="<?php echo get_page_link(1642); ?>" style="font-size: 15px; color: #717171; font-weight: 300; display: block;"><?php echo get_the_title( 1642 );?></a>
      </div>

    </div>

  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
