<?php

get_header(); 

?>
 <!-- Header Slide Parallax-->
    <div class="hero-wrap js-fullheight parallax parallaxie" style="background-image: url(<?php the_post_thumbnail_custom();?>);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
              <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php the_title();?></h1>
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                       <?php the_breadcrumbs(); ?>
                    </p>
              </div>
            </div>
          </div>
        </div>
    <!-- End Header Slide Parallax -->

	    <section class="ftco-section ftco-degree-bg">
			<div class="container">
				<div class="row ftco-animate">
					<div class="col-md-12 no-gutters mb-3 ftco-animate breadcrumbs-custom">
						<div class="pt-3 pb-3 ">
							<?php the_breadcrumbs(); ?>
						</div>
					</div>
				</div>
			</div>
	      <div class="container">
	        <div class="row">
                <div class="col-md-8 ftco-animate">
	          	  <div class="entry-content">
		            <h2 class="mb-3"><?php echo get_post_meta(get_the_ID(), 'Header_single', true);?></h2>
		            	<?php the_content();?>
                  </div>
		            <div class="tag-widget post-tag-container mb-5 mt-5">
		              <div class="tagcloud">
		                <a href="#" class="tag-cloud-link">Life</a>
		                <a href="#" class="tag-cloud-link">Sport</a>
		                <a href="#" class="tag-cloud-link">Tech</a>
		                <a href="#" class="tag-cloud-link">Travel</a>
		              </div>
		            </div>
		            <?php
		            	if(in_category('services')) {
	  						get_template_part('template-parts/block-feedback-singlePage');
		            	}else {
		            		get_template_part('template-parts/block-author');
		            	} ?>
	          </div> <!-- .col-md-8 -->
	          <?php get_sidebar();?>
	        </div>
	      </div>
	    </section> <!-- .section -->
<?php get_footer();?>