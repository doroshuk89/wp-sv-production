<?php

get_header(); 

?>
    <!-- Header Slide Parallax-->
        <?php get_template_part('template-parts/header-slider','page-single');?>
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
		            	<?php the_content();?>
                  </div>
		            <div class="tag-widget post-tag-container mb-5 mt-5 ftco-animate">
                            <div class="ya-share2" data-curtain data-services="vkontakte,facebook,telegram,twitter,viber,whatsapp,skype,pocket"></div>
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