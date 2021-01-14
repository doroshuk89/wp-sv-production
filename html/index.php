<?php
/*
== Главная страница ==
*/
get_header();
//get contacts data in custom page
$contacts = get_option('contacts'); // это массив


?>

<!-- Header Slide Parallax-->
<section>
    <div class="hero-wrap js-fullheight parallax parallaxie" style="background-image: url('<?php bloginfo('template_url');?>/assets/images/2.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true" >
                <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="mb-3 namefirm" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <i class="icon-quote-left"></i>
                                Ателье мебели СВ-Купе
                        <i class="icon-quote-right"></i>
                    </p>
                    <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Изготовление корпусной мебели под заказ </h1>
                    <p>
                        <a href="<?php  echo link_catalog(); ?>" class="btn btn-primary px-4 py-3">Каталог проектов</a>
                    </p>
                </div>
                <div class="col-md-6 d-none d-md-flex d-xl-flex d-lg-flex justify-content-center ftco-animate block-feedback">
                    <div>
                        <a data-toggle="modal" data-target="#feedBackForm" class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-mail_outline"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="ftco-intro block-contact">
            <div class="container-wrap">
                <div class="wrap d-md-flex align-items-end">
                    <div class="info">
                        <div class="row no-gutters">

                            <div class="col-md-4 d-flex ftco-animate">
                                <div class="icon"><span class="icon-phone"></span></div>
                                <div class="text">
                                    <h3><?php echo $contacts['mobile1'];?></h3>
                                    <h3><?php echo $contacts['mobile2'];?></h3>
                                    <p>Консультация: <?php echo $contacts['time_advice'];?></p>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex ftco-animate">
                                <div class="icon"><span class="icon-my_location"></span></div>
                                <div class="text">
                                    <h3><?php echo $contacts['address'];?></h3>
                                    <p><?php echo $contacts['address_details'];?></p>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex ftco-animate">
                                <div class="icon"><span class="icon-clock-o"></span></div>
                                <div class="text">
                                    <h3>Открыты <?php echo $contacts['day_work'];?></h3>
                                    <p><?php echo $contacts['time_work'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social pl-md-5 p-4">
                        <ul class="social-icon">
                            <li class="ftco-animate">
                                <a href="<?php echo $contacts['vk_link'];?>"><span class="fa fa-vk" aria-hidden="true"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="<?php echo $contacts['instagram_link'];?>"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="<?php echo $contacts['telegram_link'];?>"><span class="fa fa-telegram" aria-hidden="true"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#" data-toggle="modal" data-target="#callBack">
                                    <span class="fa fa-phone-square" aria-hidden="true"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Header Slide Parallax -->
<!-- Каталог -->
<section class="ftco-gallery">
    <div class="container">
        <div class="row  justify-content-center">

            <div class="col-md-10 heading-section ftco-animate text-center mb-5 pb-3">
                <h2 class="mb-4">Каталог проектов</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                <p class="mt-5">Современный дизайн, надежные материалы и качество - залог нашего успеха</p>
            </div>

        </div>
    </div>

    <div class="container-wrap">
        <div class="row no-gutters justify-content-center align-items-center">
            <div class="col-6 col-md-3 ftco-animate items">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive"  alt="kuhni" src="img/1.jpg">
                        <div class="fadeText">
                            <h3>кухни</h3>
                        </div>
                    </a>
                </div>




            </div>

            <div class="col-6 col-md-3 ftco-animate items ">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" alt="mdf" src="img/1.jpg">
                        <div class="fadeText">
                            <h3>Крашенный МДФ</h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-3 ftco-animate items ">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" alt="dsp" src="img/1.jpg">
                        <div class="fadeText">
                            <h3>Крашенный ДСП</h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-3 ftco-animate items">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" alt="garderobnyi" src="img/2.jpg">
                        <div class="fadeText">
                            <h3>гардеробные</h3>

                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-3 ftco-animate items">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" alt="loft" src="img/2.jpg">
                        <div class="fadeText">
                            <h3>Лофт</h3>

                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-3  ftco-animate items">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" alt ="shkaf" src="img/2.jpg">
                        <div class="fadeText">
                            <h3>ШКАФЫ</h3>
                            <p>
                                <span></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-md-3  ftco-animate items">
                <div class="item">
                    <a href="#">
                        <img class="img-responsive"  alt="komod" src="img/11.jpg">
                        <div class="fadeText">
                            <h3>КОМОДЫ</h3>
                            <p>
                                <span></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3  ftco-animate items">
                <div class="item">
                    <a href="#" class="">
                        <img class="img-responsive"  alt="komod" src="img/11.jpg">
                        <div class="fadeText">
                            <h3>КОМОДЫ</h3>
                            <p>
                                <span></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>




        </div>
    </div>
</section>
<!-- Выполненые проекты мебели-->
<section class="ftco-section ftco-bg-dark">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Последние выполненные проекты мебели</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col-md-3 ftco-animate">
                <div class="product-entry text-center">
                    <div class="nord">
                        <a href="#">
                            <img src="img/1.jpg" class="img-fluid" alt="Colorlib Template">
                        </a>
                    </div>
                    <div class="text">
                        <h3><a href="#">Кухня -1 </a></h3>
                        <span class="price mb-4">$150</span>
                        <p><a href="#" class="btn btn-primary">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="product-entry text-center">
                    <div class="nord">
                        <a href="#"><img src="img/2.jpg" class="img-fluid" alt="Colorlib Template"></a>
                    </div>
                    <div class="text">

                        <h3><a href="#">Комод</a></h3>
                        <span class="price mb-4">$150</span>
                        <p><a href="#" class="btn btn-primary">Подробнее</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="product-entry text-center">
                    <div class="nord">
                        <a href="#"><img src="img/3.jpg" class="img-fluid" alt="Colorlib Template"></a></div>
                    <div class="text">

                        <h3><a href="#">Шкаф yjvth 2</a></h3>
                        <span class="price mb-4">$150</span>
                        <p><a href="#" class="btn btn-primary">Add to cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="product-entry text-center">
                    <div class="nord">
                        <a href="#"><img src="img/4.jpg" class="img-fluid" alt="Colorlib Template"></a></div>
                    <div class="text">

                        <h3>
                            <a href="#">Гардеробная Гардеробная</a>
                        </h3>
                        <span class="price mb-4">$150</span>
                        <p><a href="#" class="btn btn-primary">Add to cart</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Дополнительные услуги -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Дополнительные услуги</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                <p class="mt-5">
                    <span class="namefirm">СВ-КУПЕ</span> оказывает дополнительные услуги связаные с  производством корпусной мебели.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="fa fa-sun-o" aria-hidden="true"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Распил ДСП, МДФ, ДВП</h3>
                        <p> Форматно-раскроечный станок Altendorf</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="fa fa-minus" aria-hidden="true"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Оклейка кромкой ПВХ</h3>
                        <p>Облицовка кромкой ПВХ производится с предварительной прифуговкой детали, повышая качество оклейки</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="icon-wrench"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Замена элементов мебели</h3>
                        <p>Замена фасадов, фурнитуры, столешниц</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="icon-newspaper-o"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">3D проект мебели</h3>
                        <p>Компьютерное моделирование мебели</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ftco-animate">
            <p>
                <a href="#" class="btn btn-primary btn-lg">Подробнее</a>
            </p>
        </div>
    </div>
</section>
<!-- Оффер ЛОФТ -->
<section class="ftco-section parallaxie parallax" style="background-image: url('template/img/loft.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-7 text-center discount align-items-center small" >
                <h3>Современное направление</h3>
                <h2 class="mb-4">Мебель в стиле ЛОФТ</h2>
                <p class="mb-4">Основные материалы дизайна – металл, дерево и стекло.</p>
                <p>
                    <a href="#" class="btn btn-primary px-4 py-3">Подробнее</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- END offer -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-10 heading-section ftco-animate text-center">
                <h2 class="mb-4"><span class="namefirm">СВ-КУПЕ</span></h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            </div>
        </div>
        <div class="row justify-content-center parent-one">
            <div class="col-md-6  ftco-animate about-jobs text-center">
                <h3>О нас</h3>
                <p>Более 20 лет <span class="namefirm"><i class="icon-quote-left"></i> Ателье мебели СВ-КУПЕ <i class="icon-quote-right"></i></span> занимается изготовление корпусной мебели. <br> Для изготовления и сборки вашей мебели используется современное оборудование немецкого и итальянского производства. <br>Наша фирма обладает огромным опытом <br>Мы постоянно развиваемся, улучшаем оборудование и повышает уровень наших работников.
                    Следим за новыми тенденциями в мебели и всегда в курсе лучших мебельных направлений.
                </p>
            </div>

            <div class="col-md-6  ftco-animate about-jobs text-center">
                <h3>Виды мебели</h3>
                <ul >
                    <li><i class="icon-cog"></i> Кухни</li>
                    <li><i class="icon-cog"></i>  Шкафы-купе</li>
                    <li><i class="icon-cog"></i>  Прихожие</li>
                    <li><i class="icon-cog"></i>  Гостиные</li>
                    <li><i class="icon-cog"></i>  Комоды</li>
                    <li><i class="icon-cog"></i>  Мебель в ванну</li>
                    <li><i class="icon-cog"></i>  Мебель для детской комнаты</li>
                    <li><i class="icon-cog"></i>  Офисная мебель</li>
                    <li><i class="icon-cog"></i>  Мебель в стиле лофт</li>
                    <li><i class="icon-cog"></i>  Мебель из крашенного мдф</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ДОСТИЖЕНИЯ -->
<section class="ftco-counter ftco-bg-dark img parallaxie" id="section-counter" style="background-image: url(img/sv7.jpeg);">
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Достижения</h2>
                <p class="flip">
                    <span class="deg1"></span>
                    <span class="deg2"></span>
                    <span class="deg3"></span>
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="icon-star-o"></span></div>
                                <strong class="number" data-number="705">0</strong>
                                <span>Кухни</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="icon-check"></span></div>
                                <strong class="number" data-number="1000">0</strong>
                                <span>Шкафы</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="icon-flag"></span></div>
                                <strong class="number" data-number="3000">0</strong>
                                <span>Офисная мебель</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="icon-smile-o"></span></div>
                                <strong class="number" data-number="900">0</strong>
                                <span>Счастливых клиентов</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ОТЗЫВЫ КЛИЕНТОВ -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Отзывы клиентов</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(img/person1.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Андрей</a></h3>

                        <div class="text">
                            <p>Заказывал прихожую. Приехали сделали замеры предложили много вариантов дали консультацию,
                                договорились что на электронную почту сбросят эскиз. Выполнили быстро, одобрил.
                                Заключили договор, выполнили заказ быстро и качественно. Привезли и смонтировали быстро, мастера за собой убрали.
                                Остался доволен.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(img/person2.jpeg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Дмитрий</a></h3>

                        <div class="text">
                            <p>Заказывал кухню. В этом деле полный дилетант. Все очень хорошо объяснили, показали готовые варианты, предложили большое количество фурнитур.
                                Ждал заказ не долго. Установили за 1 день.
                                Вообщем всем рекомендую.
                                Фирма делает хорошо и быстро и что самое главное не очень дорого.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(img/person1.jpeg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Ольга</a></h3>

                        <div class="text">
                            <p>Спасибо огромное за шикарную тумбу в ванную. Вы действительно профессионалы своего дела. Получилось лучше, чем мечтали.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4" style="background-image: url(img/person4.jpeg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Лариса</a></h3>
                        <div class="text">
                            <p>За время существования фирмы обращалась с индивидуальными заказами неоднократно. Заказывала и шкафы, и спальню, и кухню, и мебель в ванную.
                                Очень профессиональный подход, широкое предложение как дизайнерское, так и ценовое, на любой вкус.
                                Мебелью, качеством, сроками выполнения очень довольна!

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Оффер Исскуственный камень -->
<section class="ftco-section parallaxie parallax" style="background-image: url('template/img/iskus.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12 text-center discount align-items-center small">
                <h2 class="mb-4 h2-small">Искусственный камень</h2>
                <p class="mb-4">Изделия из искуссвенного камня на кухне и в интерьере</p>
                <p>
                    <a href="#" class="btn btn-primary px-4 py-3">Подробнее</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- END OFFER -->
<!-- ПОСЛЕДНИЕ НОВОСТИ -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Последние новости</h2>
                <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('template/img/6.jpg');">
                    </a>
                    <div class="text py-4 d-block">
                        <div class="meta">
                            <div><span>Sept 10, 2018</span></div>
                        </div>
                        <h3 class="heading mt-2"><a href="#">Мебель в стиле ЛОФТ</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('template/img/7.jpg');">
                    </a>
                    <div class="text py-4 d-block">
                        <div class="meta">
                            <div><span>Sept 10, 2018</span></div>
                        </div>
                        <h3 class="heading mt-2"><a href="#">Искусственный камень</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>




            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('template/img/8.jpg');">
                    </a>
                    <div class="text py-4 d-block">
                        <div class="meta">
                            <div><span>Sept 10, 2018</span></div>
                        </div>
                        <h3 class="heading mt-2"><a href="#">О компании BORTOLUZZI SISTEMI</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contacts -->
<section class="ftco-appointment">
    <div class="overlay"></div>
    <div class="container-wrap">
        <div class="row no-gutters d-md-flex align-items-center">
            <div class="col-md-6 appointment ftco-animate">
                <script  async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A32677ee5658625eeb925d5eb3705b99a4cd305b6dd2110a5b4b854ba25dd0363&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=false"></script>
            </div>

            <div class="col-md-6 appointment ftco-animate">
                <h3 class="mb-3">Связаться с нами</h3>
                <form class="appointment-form mainPage-form clear-form">
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Ваше имя">
                        </div>

                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group  ml-md-4">
                            <input type="text" name="phone" class="form-control phone" placeholder="Телефон">
                        </div>

                    </div>
                    <div class="form-group">
                        <textarea name="message" cols="30" rows="3" class="form-control" placeholder="Сообщение"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Отправить" class="btn btn-primary py-3 px-4">
                        <button type="button" class="btn btn-secondary clear py-3 px-4">Очистить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
