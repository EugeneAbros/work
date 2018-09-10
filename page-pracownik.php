<?php
/* Template name: Jak zatrudnić pracownika z Ukrainy */
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
				<div class="background-darken helper-class col-md-9">
					<?php
					$image = get_field( 'image' );
					$text = get_field( 'text' );
					$image_step_1 = get_field( 'image_step_1' );
					$title_step_1 = get_field( 'title_step_1' );
					$text_step_1 = get_field( 'text_step_1' );
					$image_step_2 = get_field( 'image_step_2' );
					$title_step_2 = get_field( 'title_step_2' );
					$text_step_2 = get_field( 'text_step_2' );
					$image_step_3 = get_field( 'image_step_3' );
					$title_step_3 = get_field( 'title_step_3' );
					$text_step_3 = get_field( 'text_step_3' );
					$image_step_4 = get_field( 'image_step_4' );
					$title_step_4 = get_field( 'title_step_4' );
					$text_step_4 = get_field( 'text_step_4' );
					$text_editor = get_field( 'text_editor' );
					?>
					<div class="top">
						<div class="single-img">
							 <img src="<?php echo $image ?>" alt="top">
						</div>
						<div class="single-description">
							<?php echo $text ?>
						</div>
					</div>
					<div class="middle">
						<div class="image-container">
								<img src="<?php echo $image_step_1 ?>" alt="middle_1">
						</div>
						<div class="title-container">
								<h2><?php echo $title_step_1 ?></h2>
						</div>
						<div class="text">
							<?php echo $text_step_1 ?>
						</div>
					</div>
					<div class="middle">
						<div class="image-container">
							<img src="<?php echo $image_step_2 ?>" alt="middle_2">
						</div>
						<div class="title-container">
								<h2><?php echo $title_step_2 ?></h2>
						</div>
						<div class="text">
							<?php echo $text_step_2 ?>
						</div>
					</div>
					<div class="middle">
						<div class="image-container">
								<img src="<?php echo $image_step_3 ?>" alt="middle_3">
						</div>
						<div class="title-container">
								<h2><?php echo $title_step_3 ?></h2>
						</div>
						<div class="text">
							<?php echo $text_step_3 ?>
						</div>
					</div>
					<div class="middle">
						<div class="image-container">
							<img src="<?php echo $image_step_4 ?>" alt="middle_4">
						</div>
						<div class="title-container">
								<h2><?php echo $title_step_4 ?></h2>
						</div>
						<div class="text">
							<?php echo $text_step_4 ?>
						</div>
					</div>
					<div class="bottom">
						<?php echo $text_editor ?>
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
