<?php
get_header();
the_post();
?>
<section  class="ftco-section">
    <div class="container">
        <div class="row ftco-animate">
            <div class="col-md-12 no-gutters mb-3 ftco-animate breadcrumbs-custom">
                <div class="pt-3 pb-3" style="" >
					<?php the_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row justify-content-center mb-4 no-gutters">
            <div class="col-md-10 heading-section ftco-animate text-center">
                <h2 class="mb-4">
                    <span class="namefirm"><?php the_title();?></span>
                </h2>
                <p class="flip">
                    <span class="deg1"></span>
                    <span class="deg2"></span>
                    <span class="deg3"></span>
                </p>
            </div>
        </div>
    </div>

    <div class="container-wrap">
        <div class="row no-gutters justify-content-center">
            <div class="col-md-6  ftco-animate">
               
                      <?php
                        //Get the images ids from the post_metadata
                        if(function_exists('acf_photo_gallery')) {
                            $images = acf_photo_gallery('Gallery', get_the_ID() );
                        }
                                //Check if return array has anything in it
                                if(isset($images) && !empty($images)){ ?>
                                <div class="fotorama p-3" data-allowfullscreen="true" data-nav="thumbs" data-autoplay="true"  data-transition="slide" data-loop="true" data-width="100%" data-minheight="300px" data-maxheight="500px">
                     <?php 

                                    foreach($images as $image){
                                      $caption= $image['caption']; //The caption
                                      $full_image_url= $image['full_image_url']; //Full size    
                                      echo '<img class="img-fluid" alt="Фото проекта '.the_title().'" src="' .  $full_image_url . '" 
                                      data-caption="'.$caption.'"  />';
                                    } ?>
                                    </div>     
                                <?php } else { ?>
                                    <div class="p-3 ">
                                         <img class="img-fluid" alt="фото проекта не найдены" src="<?php bloginfo('template_url');?>/assets/img/image-not-found.jpg"  />
                                    </div>
                                  
                                <?php } ?>
                
            </div>
            <div class="col-md-3 p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12  ftco-animate text-center">
                            <h4>Краткое описание</h4>
                        </div>
                        <div class="col-md-12 p-3 ftco-animate desc">
                            	<?php the_content();?>
                        </div>
                        <div class="col-md-12 pl-3 ftco-animate">
                        	<p>
                        		<span>Дата публикации: <?php the_date();?></span>
                        	</p>
                        </div>
                        <div class="col-md-12 cash-s ftco-animate">
                            <div>Цена: от</div>
                            <p>
                            	<?php echo get_post_meta(get_the_ID(), 'Cash_cash', true);?>
                                    <i class="">USD</i>
                            </p>
                            <?php if(function_exists('convert_currency')){ ?>
                                <p>
                                    <?php echo convert_currency(get_post_meta(get_the_ID(), 'Cash_cash', true)); ?>
                                                <i class="">BYN</i>
                                </p>
                           <?php } ?>
                        </div>
                        <div class="col-md-12  ftco-animate">
                            <div class="p-3 text-center">
                                <a href="#" data-toggle="modal" data-target="#feedBackForm" class="btn btn-primary">Оставить заявку</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ДРУГИЕ ПРОЕКТЫ -->
<section>
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Другие проекты</h2>
                <p class="flip">
                    <span class="deg1"></span>
                    <span class="deg2"></span>
                    <span class="deg3"></span>
                </p>

            </div>
        </div>

        <div class="row">
            <?php $posts = get_random_project();
            if($posts){
                foreach ($posts as $post){
                    setup_postdata($post); ?>
                         <div class="col-md-4 ftco-animate">
                                        <div class="blog-entry align-self-stretch">
                                                <a href="<?php the_permalink();?>" class="block-20" style="background-image: url('<?php the_post_thumbnail_custom();?>');"></a>
                                            <div class="col-md-12 cash-s ftco-animate">
                                                <p>Цена: от <i class="icon-usd"></i> <?php echo get_post_meta(get_the_ID(), 'Cash_cash', true);?></p>
                                            </div>
                                            <div class="text py-4 d-block">
                                                <div class="meta">
                                                    <div><span><?php echo get_the_date('Y-m-d');?></span></div>
                                                </div>
                                                <h3 class="heading mt-2"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                            </div>
                                        </div>
                                    </div>

                <?php }
                        wp_reset_postdata(); 
                } else { ?>
                        <div class="col-md-12 text-center">
                            <p>
                                <span><?php _e('Not found other projects...', 'svkupe-domain');?></span>
                            </p>
                        </div>
                    <?php } ?>
        </div>
    </div>
</section>

<section>
    <div class="container-wrap">
        <!--БЛОК FEEDBACK для PAGE описания услуг -->
        <?php get_template_part('template-parts/block-feedback-singleProject'); ?>
        <!--END page КЛИЕНТЫ -->
    </div>
</section>
<?php get_footer();?>
