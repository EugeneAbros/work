<?php
/* Template name: Życie i praca w Polsce */
?>
	<?php get_header(); ?>
	<div class="wrapper-news">
		<div class="container-search-job container-fluid">
			<div class="container">
				<div class="row">
					<h1><?php the_title(); ?></h1>
					<div id="category-list">
						<?php
							$tempArray = array();
							$args = array(
									'post_type' => 'dla_cudzoziemca'
							);
							$the_query = new WP_Query( $args ); 
						?>
							<?php if ( $the_query->have_posts() ) : ?>

								<ul id="list-category">
									<li class="active">
										<a href="#" rel="tag" id="">
											<?php echo pll__( 'Wszystkie' ) ?>
										</a>
									</li>

									<?php while ( $the_query->have_posts() ) : $the_query->the_post();  ?>

										<?php if(has_category()) : ?>
											<?php
												$category = get_the_category(get_the_ID());
												$category = $category[0];
												// var_dump( $category );
												if ( $category->cat_ID == 113 ) continue;
												if ( in_array( $category->term_id, $tempArray ) ) continue;
												$tempArray[] = $category->term_id;
												echo '<li>';
												echo '<a href="'.get_tag_link($category->term_id).'" rel="tag" id="'.$category->category_nicename.'">'.$category->name.'</a>';
												echo '</li>';
											?>
										<?php endif; ?>

									<?php endwhile; wp_reset_postdata(); ?>

								</ul>

							<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container list-sort">
			<div class="row">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
							bcn_display();
					}?>
				</div>
				<div class="sort-list">
					<div class="float-contaniner">
						<p>
							<?php echo pll__( 'Sortowanie:' ); ?>
						</p>
						<ul id="popular-list">
							<li class="active">
								<a date-order-by="date" date-order-date="DESC" href="#">
									<?php echo pll__( 'Od najnowszych' ); ?>
								</a>
							</li>
							<li>
								<a date-order-by="date" date-order-date="ASC" href="#">
									<?php echo pll__( 'Od najstarszych' ); ?>
								</a>
							</li>
							<li>
								<a date-order-by="title" date-order-date="DESC" href="#">
									<?php echo pll__( 'Od najpopularniejszych' ); ?>
								</a>
							</li>
							<li>
								<a date-order-by="modified" date-order-date="DESC" href="#">
									<?php echo pll__( 'Od modyfikacji' ); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="news-page col-md-9">
					<div class="row">
						<div id="ajax-job-post" data-page="0" data-tag="" data-category="" date-order-by="" date-order-date="">
							<div id="ajax-posts-container">
								<?php
								$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								$args = array(
										'post_type' => 'dla_cudzoziemca',
										'posts_per_page' => 6,
										'paged' => $paged,
										// "meta_key" => "post_views_count",
										"orderby" => "date",
										"order" => "desc"
								);
								$wp_query = new WP_Query( $args ); ?>
									<?php if ( $wp_query->have_posts() ) : ?>
									<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
									<div class="col-md-12 post" data-aos="zoom-in" data-aos-once="true">
										<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
										<?php
												if ( has_post_thumbnail() ) { ?>
											<div class="image-post" style="background-image:url(<?php echo $thumb['0'];?>)">

											</div>
											<?php }
												?>
											<div class="insert-content">
												<p class="date-post">
													<?php echo get_the_date(); ?>
												</p>
												<a class="title" href="<?php the_permalink(); ?>">
													<h2><?php the_title(); ?></h2>
												</a>
												<?php
													if ( has_excerpt( $post->ID ) ) {
															the_excerpt();
													} else {
													}
													?>
													<a href="<?php the_permalink(); ?>">
														<?php echo pll__( 'Czytaj dalej' ); ?>
													</a>
											</div>
									</div>
									<?php endwhile; ?>
									<?php endif; ?>
							</div>
							<a id="load-more-page" href="#" data-aos="zoom-in" data-aos-once="true">Czytaj więcej</a>
						</div>
					</div>
				</div>
				<div class="sidebar-news col-md-3">
					<div class="social-container post-filter">
						<div class="title-social">
							<h2><?php echo pll__( 'Wybierz interesujący Cię temat:' ); ?></h2>
							<ul id="tag-sort">
								<li class="active">
									<a href="#" rel="tag" id="">
										<?php echo pll__( 'Wszystkie' ) ?>
									</a>
								</li>
								<?php
									query_posts(array( 'post_type'=> 'dla_cudzoziemca' ));
									if ( have_posts() ) : while ( have_posts() ) : the_post();
											$custom_post_tags = get_the_tags();
									if ( $custom_post_tags ) {
											foreach( $custom_post_tags as $tag ) {
													$tags_arr[] = $tag -> name;
											}
									}
									endwhile; endif;
									if( $tags_arr ) {
											$uniq_tags_arr = array_unique( $tags_arr );
									 foreach( $uniq_tags_arr as $tag ) {
											 // LIST ALL THE TAGS FOR DESIRED POST TYPE
											 $sanitizeTag =  sanitize_title($tag);
											 $tag_link = get_term_by('name', $tag, 'post_tag');
											 echo '<li><a href="'. get_tag_link($tag_link->term_id).'" id="'.$tag_link->slug.'">' .$tag. '</a></li>';
											 }
									 }
							 ?>
							</ul>
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
								<p class="date-post">
									<?php echo get_the_date(); ?>
								</p>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
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
