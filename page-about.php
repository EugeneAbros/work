<?php
/* Template name: O Firmie */
?>
<?php get_header(); ?>
	<div class="wrapper-about">
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
					<?php
					$text_about = get_field( 'text_about' );
					?>
					<div class="description-about">
						<?php echo $text_about ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
