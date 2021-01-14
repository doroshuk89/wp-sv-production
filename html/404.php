<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>

<!-- Header Slide Parallax-->
<div class="hero-wrap js-fullheight parallax parallaxie" style="background-image: url('<?php bloginfo('template_url');?>/assets/images/404.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <?php esc_html_e('404 Error', 'svkupe-domain');?><br/>
                        <?php esc_html_e('Page not Found', 'svkupe-domain');?>
                    </h1>
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <?php
                                if ( function_exists('the_breadcrumbs') ) {
                                    the_breadcrumbs();
                                }
                        ?>
                    </p>
                </div>
            </div>
        </div>
</div>
<!-- End Header Slide Parallax -->

<?php
get_footer();
