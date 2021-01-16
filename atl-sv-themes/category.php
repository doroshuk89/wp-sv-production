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

 <div class="ftco-section ftco-degree-bg">
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
	          <div class="col-md-8 ">
				<?php if( have_posts() ){
						// перебираем все имеющиеся посты и выводим их
						while( have_posts() ){
							the_post();
				?>
	           	<article class="ftco-animate">
					<div  class="post-profit">
		           		<div class="container">
	                		<div class="row  justify-content-center">
	                    		<div class="col-md-10 text-center ftco-animate">
	                        		<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	                    		</div>
	                		</div>
	            		</div>
	           			<div class="main-post-container">
			           		<div  class="row no-gutters justify-content-center" >
			           			<div class="col-md-4">
			           				<div class="post-img">
				           				<a href="<?php the_permalink();?>">
				           					<img src="<?php the_post_thumbnail_custom('medium');?>" alt="Миниатюра-<?php echo get_the_title();?>">
				           				</a>
			           				</div>
			           			</div>

			           			<div class="col-md-8">
			           				<div class="post-text">
			           				<div class="meta">
			                  			<div><?php echo get_the_date();?></div>	                  
			                		</div>
			                		<p><?php  the_excerpt();?></p>
			           			</div>
			           		</div>
		           		</div>
		           	</div>
	           	</div>
	           	</article>
	           <?php  }
				} else { ?>
                    <div class="text-left">
							<span>
								<?php _e('There are no post in the selected category', 'svkupe-domain'); ?>
							</span>
                    </div>
                <?php } ?>
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
	          </div> <!-- .col-md-8 -->
	         <?php get_sidebar();?>
	        </div>
	      </div>
	    </div> <!-- .section -->
<?php get_footer();