<?php get_header(); ?>
<div class="content-wrap">
  <div class="breadcrumbs container">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
  </div>
    <div class="content container">
      <div class="background-darken">
          <div class="row">
            <div class="page-content col-md-9">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                   if(has_post_format('link')):
                   else : ?>
                   <?php
                    if ( has_post_thumbnail() ) {
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                        ?>
                        <div class="single-img" style="background-image: url('<?php echo $thumb['0'];?>')">
                            <div class="overlay">
                              <div class="text-single">
                                <p data-aos="zoom-in" data-aos-once="true"><?php the_date(); ?></p>
                                <h1 data-aos="zoom-in" data-aos-once="true"><?php the_title(); ?></h1>
                                <?php setPostViews(get_the_ID()); ?>
                              </div>
                              <div class="single-tag-container">
                                <?php
                                  $posttags = get_the_tags();
                                  if ($posttags) {
                                    foreach($posttags as $tag) { ?>
                                      <p class="tag-name"><?php echo $tag->name . ' '; ?></p>
                                    <?php }
                                  }
                                  ?>
                              </div>
                            </div>
                        </div>
                        <?php
                    }
                    else {
                      ?>
                      <div class="single-img" style="background-color: #DDD">
                        <div class="text-single">
                          <p><?php the_date(); ?></p>
                          <h1><?php the_title(); ?></h1>
                        </div>
                      </div>
                      <?php
                    }
                    ?>
                  <div class="single-description"><?php the_content(); ?></div>
                  <?php endif;
                  endwhile;
                  else: ?>
                  <p><?php echo esc_html('Brak wpisów.'); ?></p>
               <?php endif; ?>
               <div class="prev-post" data-aos="zoom-in" data-aos-once="true">
                 <div class="background">
                   <?php
                   // Prev

                   $prevPost = get_previous_post();
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($prevPost->ID ), 'full' );
                   $prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
                   $theTitle = get_the_title( $prevPost->ID  );
                   $theDate = get_the_date( 'j F Y', $prevPost->ID );
                   $thePermalink = get_the_permalink( $prevPost->ID );
                   $theExcerpt = get_the_excerpt( $prevPost->ID );
                   if ( !empty( $prevPost ) ) { ?>

                     <div class="background-image" style="background-image: url(<?php echo $thumb['0']; ?>)">

                     </div>
                     <div class="the_content">
                       <div class="the_date">
                         <p><?php echo $theDate; ?></p>
                       </div>
                       <div class="the_title">
                         <h2><?php echo $theTitle; ?></h2>
                       </div>
                       <div class="the_excerpt">
                         <p><?php echo $theExcerpt; ?></p>
                       </div>
                       <div class="the_button">
                         <a href="<?php echo $thePermalink ?>">Czytaj więcej</a>
                       </div>
                     </div>
                   <?php }
                   ?>
                 </div>
               </div>
           </div>

           <div class="sidebar col-md-3">
             <div class="social-container">
               <div class="title-social">
                 <h2><?php echo pll__( 'Udostępnij w social media:' ); ?></h2>
                  <?php echo do_shortcode("[Sassy_Social_Share]"); ?>
               </div>
             </div>
             <div class="news-container">
               <div class="title-news">
                 <h2><?php echo pll__( 'Aktualności:' ); ?></h2>
               </div>
               <?php
               $args = array(
								   'post_type' => array('dla_cudzoziemca', 'dla_pracodawcy', 'zatrudnienie_cudzo'),
                   'posts_per_page' => '4'
               );
               $the_query = new WP_Query( $args ); ?>
               <?php if ( $the_query->have_posts() ) : ?>
                   <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                       <div class="post">
                           <p class="date-post"><?php echo get_the_date(); ?></p>
                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
<?php get_footer();
