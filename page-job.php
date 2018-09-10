<?php
/* Template name: Oferty pracy */
?>
<?php get_header(); ?>
	<div class="wrapper-job">
		<div class="container-search-job container-fluid">
			<div class="container">
				<div class="row">
					<h1><?php the_title(); ?></h1>
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	        	<div>
	        			<input class="search-job" type="text" value="" name="s" id="s" placeholder="<?php echo pll__( 'Wpisz zawód, słowa kluczowe...' ); ?>" />
	        			<input type="hidden" name="post_type" value="praca" />
	        		 <button type="submit" id="searchsubmit" class="banner-text-btn"><img src="<?php bloginfo('template_url'); ?>/images/search-arrow.png" alt="search-arrow"></button>
	        	</div>
	        </form>
					<div class="search-content clearfix">
						<div class="city field-price">
							<p><?php echo pll__('Miasto:') ?></p>
							<?php echo do_shortcode("[facetwp facet='city']"); ?>
						</div>
						<div class="city-place field-price">
							<p><?php echo pll__('Województwo:') ?></p>
							<?php echo do_shortcode("[facetwp facet='wojewodztwo']"); ?>
						</div>
						<div class="branza field-price">

							<p><?php echo pll__('Branża:') ?></p>
							<?php echo do_shortcode("[facetwp facet='branza']"); ?>
						</div>
						<div class="opiekun field-price">
							<p><?php echo pll__('Opiekun oferty:') ?></p>
							<?php echo do_shortcode("[facetwp facet='opiekun']"); ?>
						</div>
						<div class="wynagrodzenie field-price">
							<p><?php echo pll__('Wynagrodzenie:') ?></p>
							<?php echo do_shortcode("[facetwp facet='wynagrodzenie']"); ?>
						</div>
						<div class="kwalifikacje field-price">
							<p><?php echo pll__('Kwalifikacje:') ?></p>
							<?php echo do_shortcode("[facetwp facet='kwalifikacje']"); ?>
						</div>
					</div>
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
				<?php 
				$text_alert = get_field( 'text_alert' );
				?>
				<?php 
				if( !empty( $text_alert ) ) { ?>
					<div class="alert_text col-sm-12">
						<div class="bg">
							<?php echo $text_alert ?>
						</div>
					</div>
				<?php }
				?>
				<div class="col-md-9 job-container-post">
					<div class="row">
						<?php echo do_shortcode('[facetwp template="job_post"]'); ?>
						<?php echo do_shortcode('[facetwp pager="true"]'); ?>
					</div>
				</div>
				<div class="sidebar-right col-md-3">
					<?php
					$title_right_box = get_field( 'title_right_box' );
					$desc_right_box = get_field( 'desc_right_box' );
					?>
					<div class="red-box-job">
						<div class="background-red">
							<h4><?php echo $title_right_box ?></h4>
							<?php echo $desc_right_box ?>
							<!-- Begin MailChimp Signup Form -->
							<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
							<style type="text/css">
								#mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
								/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
								   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
							</style>
							<div id="mc_embed_signup">
							<form action="//worksol.us16.list-manage.com/subscribe/post?u=0e6595fa77affe2fc7cf4273d&amp;id=7830e81957" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							    <div id="mc_embed_signup_scroll">

							<div class="mc-field-group">
								<input type="email" value="" placeholder="<?php echo pll__( 'Twój e-mail' ); ?>" name="EMAIL" class="required email" id="mce-EMAIL">
							</div>
								<div id="mce-responses" class="clear">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0e6595fa77affe2fc7cf4273d_7830e81957" tabindex="-1" value=""></div>
							    <div class="clear"><input type="submit" value="<?php echo pll__( 'Zapisz się' ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
							    </div>
							</form>
							</div>
							<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='BIRTHDAY';ftypes[3]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
							<!--End mc_embed_signup-->
						</div>
					</div>

					<div id="author-container">
						
					</div>
					<script>
						(function($) {
						    $(document).on('facetwp-refresh', function() {

						        if (FWP.loaded) { // after the initial pageload

						            if ( (FWP.facets.opiekun).length > 0 ) {

						            	 var id = FWP.facets.opiekun
						            	 var id = id.toString();
						            	$.ajax({
						            	  type: 'post',
						            	  url: ajax.url,
						            	  data: {
						            	    action: 'wczyt_opiekun',
						            	    opiekun: id
						            	  },
						            	  error: function() {
						            	    console.log('error');
						            	  },
						            	  success: function(response) {
						            	    $("#author-container").html(response);
						            	  }
						            	});

						            }
						          	if ( (FWP.facets.opiekun).length < 1 ) {
						           	$("#author-container").html('');
						           }
						        }
						     });
						})(jQuery);
					</script>

					<div class="social-sharing">
						<div class="background-white">
							<p><?php echo pll__( 'Udostępnij w social mediach:' ); ?></p>
							 <?php echo do_shortcode("[Sassy_Social_Share]"); ?>
						     <div class="money" style="padding-top:15px;">
							 	<a target="_blank" href="http://moneygram.pl/ukraine">
							 		<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/moneygram.png" />
							 	</a>
							 </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
