	<?php 
	//get contacts data in custom page
$contacts = get_option('contacts'); // это массив
?>

	<!--БЛОК FEEDBACK для PAGE описания услуг -->
	        <div class="ftco-bg-dark p-3 ftco-animate">
	              	<div class="container ">
	              		<div class="row justify-content-center p-3">
	              			<div class="col-md-8 text-center ftco-animate">
	              				<h3>Остались вопросы?</h3>
	              			</div>
	              		</div>
	              	</div>
	            <div class="row justify-content-center text-center align-items-center ftco-animate p-3">
	              	<div class="col-md-6 p-2">	              			
	              		<a href="#" data-toggle="modal" data-target="#feedBackForm" class="btn btn-primary">Задать вопрос</a>
	              	</div>
	              	
	              	<div class="col-md-6 p-2">
	              		<p>
	              			<i class="icon-phone-square"></i>
	              			<a href="tel:<?php echo clear_phone($contacts['mobile1']);?>"><?php echo $contacts['mobile1'];?></a>
	              		</p>
	              		<p>
	              			<i class="icon-phone-square"></i>
	              			<a href="tel:<?php echo clear_phone($contacts['mobile2']);?>"><?php echo $contacts['mobile2'];?></a>
	              		</p>
	              		<p>
	              			<i class="icon-phone-square"></i>
	              			<a href="tel:<?php echo clear_phone($contacts['phone_city']);?>"><?php echo $contacts['phone_city'];?></a>
	              		</p>
	              	</div>
	            </div>
	        </div>	            
	        <!--END page КЛИЕНТЫ -->
	            	