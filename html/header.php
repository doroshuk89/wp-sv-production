<?php
/*
Шаблон Шапки сайта
 */
//get contacts data in custom page
$contacts = get_option('contacts'); // это массив
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body>
<!--Start nav MENU -->
<nav  class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img class="img-brand" alt="logo" src="<?php get_url_logo(); ?>">
        </a>
        <a class="navbar-toggler">
            <div class="icon nav-icon-4">
                <span></span>
                <span></span>
                <span>
                </span>
            </div>
        </a>
        <?php get_template_part('template-parts/navigation-main');?>
    </div>
</nav>
<!-- END nav -->
<!-- Mobile OffCanvas Menu Start -->
<div>
    <aside class="offcanvas-navigation">
        <div class="offcanvas-navigation__inner">
            <!-- LOGO -->
            <div class="logo-cavnas" >
                <div>
                    <span class="namefirm">Ателье мебели СВ-Купе</span>
                </div>
            </div>
            <!-- button close -->
            <div class="close-button">
                <a href="" class="btn-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <span class="sr-only">Close Offcanvas Navigtion</span>
                </a>
            </div>
            <div class="offcanvas-navigation__top menu-clone"></div>
            <div class="off-con">
                <p class="namefirm">Связаться с нами</p>

                <ul class="offcanvas-menu " >
                    <li>
                        <div class="social-icon d-flex">
                            <div><a href="<?php echo $contacts['vk_link'];?>"><i class="fa fa-vk" aria-hidden="true"></i></a></div>
                            <div><a href="<?php echo $contacts['instagram_link'];?>"><i class="fa fa-instagram" aria-hidden="true"></i> </a></div>
                            <div><a href="<?php echo $contacts['telegram_link'];?>"><i class="fa fa-telegram" aria-hidden="true"></i></a></div>

                        </div>
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo clear_phone($contacts['mobile1']);?>"><?php echo $contacts['mobile1'];?></a>
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo clear_phone($contacts['mobile2']);?>"><?php echo $contacts['mobile2'];?></a>
                    </li>
                    <li>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:<?php echo $contacts['email'];?>"><?php echo $contacts['email'];?></a>
                    </li>
                </ul>

            </div>
        </div>
    </aside>
</div>
<!-- Mobile Menu End -->
