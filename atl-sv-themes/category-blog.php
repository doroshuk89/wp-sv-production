<?php
get_header();
?>
<!-- Header Slide Parallax-->
    <div class="hero-wrap js-fullheight parallax parallaxie" style="background-image: url(<?php echo get_url_tax();?>);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
              <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php single_cat_title();?></h1>
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                         <?php the_breadcrumbs(); ?>
                    </p>
              </div>
            </div>
          </div>
        </div>
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