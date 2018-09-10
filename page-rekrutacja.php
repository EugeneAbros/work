<?php
/* Template name: Rekrutacja / Leasing */
?>
<?php get_header(); ?>
	<div class="wrapper-page">
		<div class="container-search-job container-fluid">
			<div class="container">
				<div class="row">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
							bcn_display();
					}?>
				</div>
				<div class="background-darken col-md-9 helper-class">
					<?php
					$text_recruitment = get_field( 'text_recruitment' );
					$image_recruitment = get_field( 'image_recruitment' );
					$text_recruitment_2 = get_field( 'text_recruitment_2' );
					?>
					<div class="single-description">
						<?php echo $text_recruitment ?>
					</div>
					<div class="single-img">
						 <img src="<?php echo $image_recruitment ?>" alt="single-image">
					</div>
				 <div class="single-description">
						<?php echo $text_recruitment_2 ?>
				 </div>
				</div>
				<div class="col-md-3 sidebar <?php echo $class ?>">
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
