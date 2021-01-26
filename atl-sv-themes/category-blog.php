<?php
get_header();
?>
    <!-- Header Slide Parallax-->
        <?php get_template_part('template-parts/header-slider', 'category');?>
    <!-- End Header Slide Parallax -->

	    <section class="ftco-section">
	      <div class="container">
	        <div class="row d-flex">
	          	<?php 
	        		if( have_posts() ){
						// перебираем все имеющиеся посты и выводим их
						while( have_posts() ){
							the_post();
				?>
				<div class="col-md-4 d-flex ftco-animate">
		          	<div class="blog-entry align-self-stretch">
		              <a href="<?php the_permalink();?>" class="block-20" style="background-image: url('<?php the_post_thumbnail_custom('medium_large');?>');">
		              </a>
		              <div class="text py-4 d-block">
		              	<div class="meta">
		                  <div><?php echo get_the_date(); ?></div>
		                </div>
		                <h3 class="heading mt-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		                	<?php  the_excerpt();?>
		              </div>
		            </div>
	          	</div>
	          	<?php
					}
				} else { ?>
                        <div class="text-left">
							<span>
								<?php _e('There are no post in the selected category', 'svkupe-domain'); ?>
							</span>
                        </div>
                    <?php } ?>
	        </div>
	        <div class="row mt-5">
	          <div class="col text-center">
	            <div class="block-27">
	              <?php 
		            	echo paginate_links([
								'type' => 'list',
								'prev_text'    => '<',
								'next_text'    => '>',
		            		]);
	            	?>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

<?php get_footer();