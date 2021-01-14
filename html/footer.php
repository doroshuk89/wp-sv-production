<?php
/*
Шаблон футера сайта
*/
//get contacts data in custom page
$contacts = get_option('contacts'); // это массив
$title = wp_get_document_title();
?>
<footer class="ftco-footer ftco-section img">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-2">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Меню</h2>
                    <?php get_template_part('template-parts/navigation-footer');?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Последние новости</h2>

                    <?php $posts = get_last_blog_posts('blog', 2);
                        if($posts) {
                            foreach ($posts as $post) {
                              setup_postdata($post); ?>
                           <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" href="<?php the_permalink();?>" style="background-image: url('<?php the_post_thumbnail_custom('thumbnail');?>');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <div class="meta">
                                        <div><?php echo get_the_date('Y-m-d');?></div>
                                    </div>
                                </div>
                            </div>


                          <?php  }
                        } else { ?>
                        <div class="col-md-12 text-center">
                            <p>
                                <span><?php _e('Not found news...', 'svkupe-domain');?></span>
                            </p>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">О нас</h2>
                    <p><?php echo $contacts['about_footer'];?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">У вас есть вопросы?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $contacts['address'];?></span></li>
                            <li>
                                <a href="tel:<?php echo clear_phone($contacts['mobile1']);?>"><span class="icon icon-phone"></span>
                                    <span class="text"><?php echo $contacts['mobile1'];?></span></a>
                                <a href="tel:<?php echo clear_phone($contacts['mobile2']);?>"><span class="icon icon-phone"></span>
                                    <span class="text"><?php echo $contacts['mobile2'];?></span></a>
                            </li>
                            <li><a href="mailto:<?php echo $contacts['email'];?>"><span class="icon icon-envelope"></span>
                                    <span class="text"><?php echo $contacts['email'];?></span></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="<?php echo $contacts['vk_link'];?>"><span class="icon-vk"></span></a></li>
                        <li class="ftco-animate"><a href="<?php echo $contacts['instagram_link'];?>"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center copyright-botton pb-3 pt-3 pr-1 pl-1">
        <p class="m-0">Copyright &copy; atlas&Co. Все права защищены</p>
    </div>
</footer>

<!--includes Modal Form-->
<?php get_template_part('template-parts/modal-callbackPhone','',['title' => $title]);?>
<?php get_template_part('template-parts/modal-feedbackForm','', ['title' => $title]);?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>

<!-- Global Overlay Start -->
<div class="global-overlay"></div>
<!-- Global Overlay -->
<!--Scroll to Top Start -->
<div  class = "scroll-to-top">
    <a href="#">
        <i class="icon-angle-double-up"></i>
    </a>
</div>
<!--Scroll to Top END -->
<?php wp_footer(); ?>
</body>
</html>
