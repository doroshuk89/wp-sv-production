<?php 

get_header();
//get contacts data in custom page
$contacts = get_option('contacts'); // это массив
?>
    <!-- Header Slide Parallax-->
            <?php get_template_part('template-parts/header-slider','page-single');?>
    <!-- End Header Slide Parallax -->
	    <section class="ftco-section contact-section">
        <div class="container mt-5">
          <div class="row block-9">
						<div class="col-md-4 contact-info ftco-animate">
							<div class="row">
								<div class="col-md-12 mb-4">
		              				<h2 class="h4">Контактная информация</h2>
		            			</div>
		            <div class="col-md-12 mb-3">
		              	<p><span>Адрес:</span><?php echo $contacts['address'];?></p>
		            </div>
		            <div class="col-md-12 mb-3">
		              	<p><span>Телефон:</span> <a href="tel:<?php echo clear_phone($contacts['mobile1']);?>"><?php echo $contacts['mobile1'];?></a></p>
		              	<p><span>Телефон:</span> <a href="tel:<?php echo clear_phone($contacts['mobile2']);?>"><?php echo $contacts['mobile2'];?></a></p>
		              	<p><span>Телефон:</span> <a href="tel:<?php echo clear_phone($contacts['phone_city']);?>"><?php echo $contacts['phone_city'];?></a></p>
		            </div>
		            <div class="col-md-12 mb-3">
		              	<p><span>Email:</span> <a href="mailto:sv-ceh@tut.by"><?php echo $contacts['email'];?></a></p>
		            </div>
		            <div class="col-md-12 mb-3">
		              	<p><span>Веб-ресурс:</span> <a href="https://<?php echo $contacts['site'];?>"><?php echo $contacts['site'];?></a></p>
		            </div>
				</div>
			</div>

				<?php get_template_part('template-parts/block-form','',['title' => get_the_title()]);?>
          </div>
        </div>
      </section>

      <div class="col-md-12">
      	<script async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A32677ee5658625eeb925d5eb3705b99a4cd305b6dd2110a5b4b854ba25dd0363&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=false"></script>
      </div>

<?php get_footer(); 
