<?php 
//Исключаем из поиска все, кроме 
get_header();
?>
	<!-- Header Slide Parallax-->
 		<?php get_template_part('template-parts/header-slider','category');?>
    <!-- End Header Slide Parallax -->

	    <section class="ftco-section ftco-degree-bg">
			<div class="container">
				<div class="row ftco-animate">
					<div class="col-md-12 no-gutters mb-3 ftco-animate breadcrumbs-custom">
						<div class="pt-3 pb-3 ">
							<?php the_breadcrumbs(); ?>
						</div>
						<h3><?php _e('Search by','svkupe-domain'); echo ": ".$_GET['s'];?></h3>
					</div>
				</div>
			</div>
	      <div class="container">
	        <div class="row">
	          <div class="col-md-8">
	          	<div class="container-wrap">
	          		<div class="row justify-content-center">
			           	<?php 
	        		if( have_posts() ){
						// перебираем все имеющиеся посты и выводим их
						while( have_posts() ){
							the_post();
				?>
			           	<div class="col-6 col-md-6 mb-3  w-5">
			           		<div class="border-a ftco-animate items blog-entry">

								<div class="item-img text-center">
				           				<a href="<?php the_permalink();?>" >
				           					<img class="img-fluid" src="<?php the_post_thumbnail_custom();?>" alt="фото-проекта">
				           				</a>
								</div>

								<div class="col-md-12 cash-s ftco-animate">
									<p>Цена: <i class="icon-usd"></i>
										<?php echo get_post_meta(get_the_ID(), 'Cash_cash', true);?>
									</p>
								</div>

								<div class="col-md-12 text d-block" >
										<div class="meta " >
											<div><?php the_date();?></div>
										</div>
				           				<h2 class="heading mt-2">
											<a href="<?php the_permalink();?>"><?php the_title();?></a>
										</h2>
								</div>

				           	</div>
			           	</div>
					<?php
							}
					} else { ?> 
						<div class="text-left ftco-animate">
							<span> 
								<?php _e('Search not found. Try changing your search query', 'svkupe-domain'); ?>
							</span>
						</div> 
					<?php } ?>
	       			</div>
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
	          </div> <!-- .col-md-8 -->


	            <?php get_sidebar();?>

	        </div>
	      </div>
	    </section> <!-- .section -->


<?php get_footer();?>
