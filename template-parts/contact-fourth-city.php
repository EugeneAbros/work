<div class="city clearfix">
  <div class="col-md-6 city-detail">
    <?php
    $city_4 = get_field( 'city_4' );
    $adress_4 = get_field( 'adress_4' );
    $time_open_4 = get_field( 'time_open_4' );
    ?>
    <h4><?php echo $city_4 ?></h4>
    <div class="city-content">
      <?php echo $adress_4 ?>
    </div>
    <div class="city-content">
      <?php echo $time_open_4 ?>
    </div>
  </div>
  <div class="col-md-6 contact-form">
    <?php
       $currentlang = get_bloginfo('language');
       if($currentlang=="en-GB"): ?>
         <?php echo do_shortcode('[contact-form-7 id="904" title="Formularz kijow en"]'); ?>
      <?php elseif($currentlang=="uk"): ?>
          <?php echo do_shortcode('[contact-form-7 id="907" title="Formularz kijow uk"]'); ?>
       <?php elseif($currentlang=="ru-RU"): ?>
          <?php echo do_shortcode('[contact-form-7 id="906" title="Formularz kijow ru"]'); ?>
        <?php elseif($currentlang=="de-DE"): ?>
           <?php echo do_shortcode('[contact-form-7 id="905" title="Formularz kijow de"]'); ?>
       <?php elseif($currentlang=="pl-PL"): ?>
            <?php echo do_shortcode('[contact-form-7 id="903" title="Formularz kijow"]'); ?>
     <?php endif; ?>
  </div>
  <div class="clearfix">

  </div>
  <div class="col-sm-12 city-map">
      <div id="map4"></div>
  </div>
  <div class="person-container  match-height-1 clearfix">
    <?php if( have_rows('osoby_4') ): ?>

    <?php while( have_rows('osoby_4') ): the_row();
      $name_person_4 = get_sub_field('name_person_4');
      $person_detail_4 = get_sub_field('person_detail_4');
      $telefon_person_4 = get_sub_field('telefon_person_4');
      $skype_person_4 = get_sub_field('skype_person_4');
      $email_person_4 = get_sub_field('email_person_4');
      $telefon_person_2_viber = get_sub_field( 'telefon_person_2_viber' );
      $telefon_person_2_viber_2 = get_sub_field( 'telefon_person_2_viber_2' );
      $link_person_4 = get_sub_field( 'link_person_4' );
      ?>
      <div class="col-xs-6 col-md-4 col-md-4 person-content">
        <div class="person-background">
          <h4><?php echo $name_person_4 ?></h4>
          <div class="description-person">
            <?php echo $person_detail_4 ?>
          </div>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/phone.png" alt="phone">
            <?php
            if ( !empty( $telefon_person_4 ) ) { ?>
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_4  ) ); ?>"><?php echo $telefon_person_4 ?></a>
            <?php } else { ?>
              <p class="tel">+48 -/-</p>
            <?php }
            ?>
          </div>
             <?php 
            if ( !empty( $telefon_person_2_viber ) ) { ?>
          <div class="detail-person">
                <img src="<?php bloginfo('template_url'); ?>/images/sidemenu-viber@2.png" alt="phone" style="width: 34px; height: 34px; margin-left: -8px;">
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_2_viber  ) ); ?>"><?php echo $telefon_person_2_viber ?></a>
          </div>
            <?php }
            ?>
            <?php 
            if ( !empty( $telefon_person_2_viber_2 ) ) { ?>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/phone.png" alt="phone">
              <a class="tel" href="tel:<?php echo esc_html(phone_to_link( $telefon_person_2_viber_2  ) ); ?>"><?php echo $telefon_person_2_viber_2 ?></a>
          </div>
            <?php }
            ?>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/skype.png" alt="skype">
            <span>skype:</span>
            <?php
            if ( !empty( $skype_person_4 ) ) { ?>
              <p class="skype"><?php echo $skype_person_4 ?></p>
            <?php } else { ?>
              <p class="skype">-/-</p>
            <?php }
            ?>
          </div>
          <div class="detail-person">
            <img src="<?php bloginfo('template_url'); ?>/images/mail.png" alt="mail">
            <span>mail:</span>
            <?php
            if ( !empty( $email_person_4 ) ) { ?>
              <a class="email" href="mailto:<?php echo $email_person_4 ?>"><?php echo $email_person_4 ?></a>
            <?php } else { ?>
              <p class="email">-/-</p>
            <?php }
            ?>
          </div>
          <?php if(!empty( $link_person_4 )): ?>
                 <div class="button-user">
                 <a href="<?php echo $link_person_4; ?>"><?php echo pll__( 'Więcej o mnie' ); ?></a>
           </div>
            <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  </div>
</div>
