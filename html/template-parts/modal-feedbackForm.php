<!-- Modal window feedback -->
<div class="modal fade" id="feedBackForm" tabindex="-1" role="dialog" aria-labelledby="feedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content callback">
            <div class="modal-header">
                <h5 class="modal-title" id="feedModalLabel">Оставить заявку..</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                
                <form class="contact-form feedBackForm-form clear-form" id='feedback-form'>
                    <input type="hidden" id="title-page" name="page-title" value="<?php echo $args['title'];?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="namefeedback" name = "name" placeholder="Имя ..">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="emailFeedback" name="email" placeholder="E-mail ..">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="Сообщение.."></textarea>
                    </div>
                    <div class="text-center pt-3 pb-3">
                        <button type="submit" id="exp" class="btn btn-primary">Заказать</button>
                        <button type="button"  class="clear btn btn-secondary">Очистить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- END feedback -->