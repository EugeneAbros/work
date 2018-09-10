<?php
/* Template name: Jak zatrudnić pracownika z Ukrainy */
?>
<?php get_header(); ?>
	<div class="wrapper-download">
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
				<div class="background-darken">
					<h1 class="single-title"><?php the_title(); ?></h1>
					<hr>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							 if(has_post_format('link')):
							 else : ?>
							 <div class="single-img">
									<?php the_post_thumbnail(); ?>
							 </div>
							<div class="single-description">
								<?php the_content(); ?>
							</div>
							<?php endif;
							endwhile;
							else: ?>
							<p><?php echo esc_html('Brak wpisów.'); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
