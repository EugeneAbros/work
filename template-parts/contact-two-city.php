<div class="city clearfix">
  <div class="col-md-6 city-detail">
    <?php
    $city_2 = get_field( 'city_2' );
    $adress_2 = get_field( 'adress_2' );
    $time_open_2 = get_field( 'time_open_2' );
    ?>
    <h4><?php echo $city_2 ?></h4>
    <div class="city-content">
      <?php echo $adress_2 ?>
    </div>
    <div class="city-content">
      <?php echo $time_open_2 ?>
    </div>
  </div>
  <div class="col-md-6 contact-form">
    <?php
       $currentlang = get_bloginfo('language');
       if($currentlang=="en-GB"): ?>
         <?php echo do_shortcode('[contact-form-7 id="912" title="Formularz warszawa en"]'); ?>
      <?php elseif($currentlang=="uk"): ?>
          <?php echo do_shortcode('[contact-form-7 id="915" title="Formularz warszawa uk"]'); ?>
       <?php elseif($currentlang=="ru-RU"): ?>
          <?php echo do_shortcode('[contact-form-7 id="914" title="Formularz warszawa ru"]'); ?>
        <?php elseif($currentlang=="de-DE"): ?>
           <?php echo do_shortcode('[contact-form-7 id="913" title="Formularz warszawa de"]'); ?>
       <?php elseif($currentlang=="pl-PL"): ?>
            <?php echo do_shortcode('[contact-form-7 id="334" title="Formularz warszawa"]'); ?>
     <?php endif; ?>
  </div>
  <div class="clearfix">

  </div>
  <div class="col-sm-12 city-map">
      <div id="map2"></div>
  </div>
  <div class="person-container  match-height-1 clearfix">
    <?php if( have_rows('osoby_2') ): ?>

    <?php while( have_rows('osoby_2') ): the_row();
      $name_person_2 = get_sub_field('name_person_2');
      $person_detail_2 = get_sub_field('person_detail_2');
      $telefon_person_2 = get_sub_field('telefon_person_2');
      $skype_person_2 = get_sub_field('skype_person_2');
      $email_person_2 = get_sub_field('email_person_2');
      $telefon_person_4_viber = get_sub_field( 'telefon_person_4_viber' );
      $telefon_person_4_viber_2 = get_sub_field( 'telefon_person_4_viber_2' );
      ?>
      <div class="col-xs-6 col-md-4 col-md-4 person-content">
        <div class="person-background">
          <h4><?php echo $name_person_2 ?></h4>
          <div class="description-person">
            <?php echo $person_detail_2 ?>
          </div>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/phone.png" alt="phone">
            <?php
            if ( !empty( $telefon_person_2 ) ) { ?>
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_2  ) ); ?>"><?php echo $telefon_person_2 ?></a>
            <?php } else { ?>
              <p class="tel">+48 -/-</p>
            <?php }
            ?>
          </div>
           <?php 
            if ( !empty( $telefon_person_4_viber ) ) { ?>
          <div class="detail-person">
                <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-viber@2.png" alt="phone" style="width: 34px; height: 34px; margin-left: -8px;">
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_4_viber  ) ); ?>"><?php echo $telefon_person_4_viber ?></a>
          </div>
            <?php }
            ?>
            <?php 
            if ( !empty( $telefon_person_4_viber_2 ) ) { ?>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/phone.png" alt="phone">
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_4_viber_2  ) ); ?>"><?php echo $telefon_person_4_viber_2 ?></a>
          </div>
            <?php }
            ?>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/skype.png" alt="skype">
            <span>skype:</span>
            <?php
            if ( !empty( $skype_person_2 ) ) { ?>
              <p class="skype"><?php echo $skype_person_2 ?></p>
            <?php } else { ?>
              <p class="skype">-/-</p>
            <?php }
            ?>
          </div>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/mail.png" alt="mail">
            <span>mail:</span>
            <?php
            if ( !empty( $email_person_2 ) ) { ?>
              <a class="email" href="mailto:<?php echo $email_person_2 ?>"><?php echo $email_person_2 ?></a>
            <?php } else { ?>
              <p class="email">-/-</p>
            <?php }
            ?>
          </div>
          <?php if(get_the_author_meta('link', $user_info->ID) != ''): ?>
                 <div class="button-user">
                 <a href="<?php echo get_the_author_meta('link', $user_info->ID); ?>"><?php echo pll__( 'Więcej o mnie' ); ?></a>
           </div>
              <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  </div>
</div>
