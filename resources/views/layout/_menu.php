<!-- menu -->
<div class="row" style="margin-top: 24px">
    <div class="col-md-12">
        <nav class="navbar navbar-default" role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse" aria-expanded="false" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if (!empty($menu) && $menu == 'answer_create') : ?>
                        <li class="active"><a>Ответить на заявку</a></li>
                    <?php else : ?>
                        <li><a href="">Ответить на заявку</a></li>
                    <?php endif; ?>

                    <li><a href="#">Создать заказ</a></li>
                    <li><a href="#">График исполнения</a></li>
                    <li><a href="#">Пользователи</a></li>
                    <li><a href="#">Заказчики</a></li>

                    <li><a href="<?= route('user_logout') ?>">Выйти</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

