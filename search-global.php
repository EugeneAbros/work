
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
										<div class="col-md-12 post">
												<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
												<?php
												if ( has_post_thumbnail() ) { ?>
														<div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">

														</div>
												<?php } else { ?>
														<div class="image-post" style="background-color: #DDD;">
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
                  <p><?php echo pll__( 'Sorry, no posts matched your criteria.' ); ?></p>
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
