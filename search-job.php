
<?php get_header(); ?>
	<div class="wrapper-news">
		<div class="container">
			<div class="row">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
							bcn_display();
					}?>
				</div>
				<div class="news-page col-md-9">
					<div class="row">
						<?php
            if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
						<?php
						$google_map_link = get_field( 'google_map_link' );
						$city_field = get_field( 'city_field' );
						$price_low = get_field( 'price_low' );
						$price_hight = get_field( 'price_hight' );
						$vat_cost = get_field( 'vat_cost' );
						$number_wakat = get_field( 'number_wakat' );
						$kwalifikacje = get_field( 'kwalifikacje' );
						$city_place = get_field( 'city_place' );
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
									 <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author() ?></a></span>
								</div>
								<div class="desc-job">
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
							<?php echo do_shortcode('[kodex_post_like_buttons]'); ?>
						</div>
                  <?php endwhile; // End Loop
                  else: ?>
                  <p>Sorry, no posts matched your criteria.</p>
                  <?php endif; ?>
					</div>
				</div>
				<div class="sidebar-news col-md-3">
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

<?php get_footer(); ?>
