<div class="city clearfix">
  <div class="col-md-6 city-detail">
    <?php
    $city_1 = get_field( 'city_1' );
    $adress_1 = get_field( 'adress_1' );
    $time_open_1 = get_field( 'time_open_1' );
    ?>
    <h4><?php echo $city_1 ?></h4>
    <div class="city-content">
      <?php echo $adress_1 ?>
    </div>
    <div class="city-content">
      <?php echo $time_open_1 ?>
    </div>
  </div>
  <div class="col-md-6 contact-form">
    <?php
       $currentlang = get_bloginfo('language');
       if($currentlang=="en-GB"): ?>
         <?php echo do_shortcode('[contact-form-7 id="908" title="Formularz Kepno en"]'); ?>
      <?php elseif($currentlang=="uk"): ?>
          <?php echo do_shortcode('[contact-form-7 id="911" title="Formularz Kepno uk"]'); ?>
       <?php elseif($currentlang=="ru-RU"): ?>
          <?php echo do_shortcode('[contact-form-7 id="910" title="Formularz Kepno ru"]'); ?>
        <?php elseif($currentlang=="de-DE"): ?>
           <?php echo do_shortcode('[contact-form-7 id="909" title="Formularz Kepno de"]'); ?>
       <?php elseif($currentlang=="pl-PL"): ?>
            <?php echo do_shortcode('[contact-form-7 id="333" title="Formularz Kepno"]'); ?>
     <?php endif; ?>
  </div>
  <div class="clearfix">

  </div>
  <div class="col-sm-12 city-map">
      <div id="map1"></div>
  </div>
  <div class="person-container  match-height-1 clearfix">
    <?php if( have_rows('osoby') ): ?>

    <?php while( have_rows('osoby') ): the_row();
      $name_person_1 = get_sub_field('name_person_1');
      $person_detail_1 = get_sub_field('person_detail_1');
      $telefon_person_1 = get_sub_field('telefon_person_1');
      $skype_person_1 = get_sub_field('skype_person_1');
      $email_person_1 = get_sub_field('email_person_1');
      $telefon_person_1_viber = get_sub_field( 'telefon_person_1_viber' );
      $telefon_person_1_viber_1 = get_sub_field( 'telefon_person_1_viber_1' );
      $link_person_1 = get_sub_field( 'link_person_1' );
      ?>
      <div class="col-xs-6 col-md-4 person-content">
        <div class="person-background">
          <h4><?php echo $name_person_1 ?></h4>
          <div class="description-person">
            <?php echo $person_detail_1 ?>
          </div>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/phone.png" alt="phone">
            <?php
            if ( !empty( $telefon_person_1 ) ) { ?>
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_1  ) ); ?>"><?php echo $telefon_person_1 ?></a>

            <?php } else { ?>
              <p class="tel">+48 -/-</p>
            <?php }
            ?>
          </div>
             <?php 
            if ( !empty( $telefon_person_1_viber ) ) { ?>
          <div class="detail-person">
                <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-viber@2.png" alt="phone" style="width: 34px; height: 34px; margin-left: -8px;">
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_1_viber  ) ); ?>"><?php echo $telefon_person_1_viber ?></a>
          </div>
            <?php }
            ?>
            <?php 
            if ( !empty( $telefon_person_1_viber_1 ) ) { ?>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/phone.png" alt="phone">
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_1_viber_1  ) ); ?>"><?php echo $telefon_person_1_viber_1 ?></a>
          </div>
            <?php }
            ?>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/skype.png" alt="skype">
            <span>skype:</span>
            <?php
            if ( !empty( $skype_person_1 ) ) { ?>
              <p class="skype"><?php echo $skype_person_1 ?></p>
            <?php } else { ?>
              <p class="skype">-/-</p>
            <?php }
            ?>
          </div>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/mail.png" alt="mail">
            <span>mail:</span>
            <?php
            if ( !empty( $email_person_1 ) ) { ?>
              <a class="email" href="mailto:<?php echo $email_person_1 ?>"><?php echo $email_person_1 ?></a>
            <?php } else { ?>
              <p class="email">-/-</p>
            <?php }
            ?>
          </div>
          <?php if(!empty( $link_person_1 )): ?>
                 <div class="button-user">
                 <a href="<?php echo $link_person_1; ?>"><?php echo pll__( 'Więcej o mnie' ); ?></a>
           </div>
            <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  </div>
</div>
