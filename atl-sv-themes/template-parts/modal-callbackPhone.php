<!-- Modal window CallBack -->
<div class="modal fade" id="callBack" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content callback">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заказать звонок</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body ">
                <form class="contact-form callBack-form" id='callback-form'>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameCallBack" name="name" placeholder="Имя ..">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control phone" name="phone" placeholder="Телефон..">
                    </div>

                    <div class="text-center pt-3 pb-3">
                        <button type="submit" id="#exp" class="btn btn-primary">Заказать</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
            <div id="#response_order">
                <p></p>
            </div>

        </div>
    </div>
</div>
<!-- END CallBack -->