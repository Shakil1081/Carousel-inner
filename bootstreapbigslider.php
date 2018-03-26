									
									
									<!-- Begin Carousel-->

<?php $meta_element_class = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true);
$args = array( 'category_nicename' =>$meta_element_class,'posts_per_page' => '4');
$the_query = new WP_Query ( $args );
?>
		<div id="carouselBlog" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">

					<!-- the Loop -->
					<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>	<li data-target="#carouselBlog"
						    data-slide-to="<?php echo $the_query->current_post; ?>"
						    class="<?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?> slide-button">
							
							<div class="slide-button">
							<span class="slider-name"><?php the_field('slider_name'); ?></span><br>
							<span class="description"><?php the_field('slider_captation'); ?></span>
							</div>
					</li>
					<?php endwhile; endif; ?>

				</ol>

				<!-- rewind loop back to zero without losing data-->
				<?php rewind_posts(); ?>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">

					<?php if ( have_posts() ) : while ( $the_query->have_posts() ) :
						$the_query->the_post(); ?>

						<?php
						$thumbnail_id   = get_post_thumbnail_id();
						$thumbnail_url  = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
						$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attatchment_image_alt', true );
						?>

						<div class="item <?php if ( $the_query->current_post == 0 ) : ?>active<?php endif; ?>">						
											 <?php if ( has_post_thumbnail() ) : ?>
												<a href="<?php the_field('linkforslider'); ?>" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail(full); ?>
												</a>
												<?php endif; ?>
												<div class="carousel-caption">	
                                                <div class="slide-content slide-content_2">	
												<?php the_title(); ?>
												</div>
												</div>
						</div>

					<?php endwhile;
					endif; ?>

				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carouselBlog" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carouselBlog" role="button" data-slide="next">
					<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>