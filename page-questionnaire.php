<?php
/* Template name: Kwestionariusz pracodawcy */
?>
<?php acf_form_head(); ?>
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
					<h2>Dodaj ofertę pracy</h2>
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
					<div id="content">
						<?php
							 $currentlang = get_bloginfo('language');
							 if($currentlang=="en-GB"): ?>
								<script type="text/javascript" src="https://worskol.minicrm.pl/embedded.js?token=e6cd7f4012b90360b83795b7190abc72"></script>
							<?php elseif($currentlang=="uk"): ?>
								 <script type="text/javascript" src="https://worskol.minicrm.pl/embedded.js?token=e6cd7f4012b90360b83795b7190abc72"></script>
							 <?php elseif($currentlang=="ru_RU"): ?>
								 <script type="text/javascript" src="https://worskol.minicrm.pl/embedded.js?token=2ff77f8b7d534ebf8d8c8f36e432d9b3"></script>
							 <?php elseif($currentlang=="pl-PL"): ?>
								 <script type="text/javascript" src="https://worskol.minicrm.pl/embedded.js?token=d6caddff136d4fcb3079e64c87521afd"></script>
								 <?php elseif($currentlang=="de-DE"): ?>
									  <script type="text/javascript" src="https://worskol.minicrm.pl/embedded.js?token=e6cd7f4012b90360b83795b7190abc72"></script>
						 <?php endif; ?>
					</div>
				</div>
				<div class="col-md-3 sidebar job-sidebar-container">
				<?php
						$image_sidebar = get_field( 'image_sidebar' );
						$title_sidebar = get_field( 'title_sidebar' );
						$description_sidebar = get_field( 'description_sidebar' );
						$email_sidebar = get_field( 'email_sidebar' );
						 ?>
						 <div class="job-sidebar">
							 <div class="image-person">
							 		<img src="<?php echo $image_sidebar ?>" alt="person">
							 </div>
							<div class="title">
								<?php echo $title_sidebar ?>
							</div>
							<div class="description">
								<?php echo $description_sidebar ?>
							</div>
								<?php if( have_rows('tel_sidebar') ): ?>
								<div class="tel">
									<img src="<?php bloginfo('template_url'); ?>/images/icon-phone-page.png" alt="icon-phone">
								<?php while( have_rows('tel_sidebar') ): the_row();
									// vars
									$tel_single_sidebar = get_sub_field('tel_single_sidebar');
									?>
									<div class="tel-container">
										<a href="tel:<?php echo $tel_single_sidebar ?>"><?php echo $tel_single_sidebar ?></a>
									</div>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
							<div class="email">
								<img src="<?php bloginfo('template_url'); ?>/images/icon-mail-page.png" alt="icon-mail">
								<a href="mailto:<?php echo $email_sidebar ?>"><?php echo $email_sidebar ?></a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
