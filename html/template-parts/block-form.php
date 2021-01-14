<div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
              <form class="contact-form contactPage-form" id='contactPage-form'>
                  <input type="hidden" id="title-page" name="page-title" value="<?php echo $args['title'];?>">
              	<div class="row">
              		<div class="col-md-12 mb-4">
		              				<h2 class="h4">Напишите нам</h2>
		            			</div>
              		<div class="col-md-12">
		                <div class="form-group">
		                  <input type="text" name="name" class="form-control" placeholder="Ваше имя">
		                </div>
	                </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Ваш Email">
                        </div>
                    </div>
                	<div class="col-md-6">
	                		<div class="form-group">
	                  			<input type="text" name="phone" class="form-control phone" placeholder="Номер телефона">
	                		</div>
                	</div>
                </div>
	                	<div class="form-group">
	                  		<textarea name="message"  cols="30" rows="7" class="form-control" placeholder="Сообщение"></textarea>
	            		</div>
                <div class="form-group">
                  <input type="submit" value="Отправить" class="btn btn-primary py-3 px-5">
                </div>
              </form>
            </div>