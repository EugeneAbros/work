<?php
/* Template name: Aktualnośći */
?>
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

						if ( 'praca' == get_post_type() ) {

							if ( have_posts() ) : ?>

							<?php while ( have_posts() ) : the_post(); ?>
							<?php
							$city_field = get_field( 'city_field' );
							$price_low = get_field( 'price_low' );
							$price_hight = get_field( 'price_hight' );
							$vat_cost = get_field( 'vat_cost' );
							$number_wakat = get_field( 'number_wakat' );
							$kwalifikacje = get_field( 'kwalifikacje' );
							$city_place = get_field( 'city_place' );
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
											<img src="<?php bloginfo('template_url'); ?>/images/icon-location.png" alt="icon-loaction">
											<p><?php echo $city_field ?>, <span><?php echo $city_place ?></span></p>
										</div>
										<div class="number-place">
											<img src="<?php bloginfo('template_url'); ?>/images/icon-quantity.png" alt="icon-quantity">
												<p><?php echo $number_wakat ?></p>
										</div>
										<div class="requirements">
											<img src="<?php bloginfo('template_url'); ?>/images/icon-qualifications.png" alt="icon-qualifications">
											<?php if( get_field('kwalifikacje_radio') == 'Tak' ): ?>
												<p><?php echo pll__( 'Z kwalifikacja' ); ?></p>
											<?php endif; ?>
											<?php if( get_field('kwalifikacje_radio') == 'Nie' ): ?>
												<p><?php echo pll__( 'Bez kwalifikacji' ); ?></p>
											<?php endif; ?>													</div>
									</div>
								</div>
								<div class="description">
									<div class="price">
										<span><?php echo $price_low ?> - </span>
										<span><?php echo $price_hight ?> zł </span>
										<span><?php echo $vat_cost ?></span>
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
							<?php endwhile; // End Loop
							else: ?>
							<p>Sorry, no posts matched your criteria.</p>
							<?php endif;

						} elseif ( 'dla_cudzoziemca' == get_post_type() || 'dla_pracodawcy' == get_post_type() || 'zatrudnienie_cudzo' == get_post_type() ) {


							if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>
								<div class="col-md-12 post">
										<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
										<?php
										if ( has_post_thumbnail() ) { ?>
												<div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">

												</div>
										<?php }
										?>
										<div class="insert-content">
											<p class="date-post"><?php echo get_the_date(); ?></p>
											<h2><?php the_title(); ?></h2>
											<?php
											if ( has_excerpt( $post->ID ) ) {
													the_excerpt();
											} else {
											}
											?>
											<a href="<?php the_permalink(); ?>"><?php echo pll__( 'Czytaj dalej' ); ?></a>
										</div>
								</div>
							<?php endwhile; // End Loop
							else: ?>
							<p>Sorry, no posts matched your criteria.</p>
							<?php endif;
						}

						?>


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
