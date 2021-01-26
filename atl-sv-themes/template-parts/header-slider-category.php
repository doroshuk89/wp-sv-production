<div class="hero-wrap js-fullheight parallax parallaxie" style="background-image: url(<?php echo get_url_tax();?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php single_cat_title();?></h1>
                <p class="breadcrumbs pt-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <?php the_breadcrumbs(); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="link-bottom ftco-animate">
        <div class="row no-gutters justify-content-center align-items-center">
            <a class="icon scroll_down d-flex justify-content-center align-items-center">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
