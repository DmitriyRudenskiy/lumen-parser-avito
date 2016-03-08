<?php $title = 'Вход на сайт'; ?>

<?php include '../resources/views/layout/top.php' ?>

<?php include '../resources/views/layout/_menu.php' ?>

<div class="row">
    <div class="col-md-12">
        <h4>Subheading</h4>
        <form class="form-horizontal" method="post" action="<?= route('order_insert') ?>">

            <div class="form-group">
                <label class="col-sm-4 control-label">Менеджер</label>
                <div class="col-sm-8">
                    <p class="form-control-static">--</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Дата заполнения заявки</label>
                <div class="col-sm-8">
                    <p class="form-control-static">--</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Заказчик</label>
                <div class="col-sm-8">
                    <select class="form-control" name="customer_id">
                        <option>-</option>
                        <?php foreach ($customer as $value) : ?>
                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Наименование заказа</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" placeholder="Ручка с логотипом">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Спецификация</label>
                <div class="col-sm-8">
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Количество</label>
                <div class="col-sm-4">
                    <input type="text" name="amount" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Цена (руб)</label>
                <div class="col-sm-4">
                    <input type="text" name="price" class="form-control" placeholder="Ручка с логотипом">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Итого</label>
                <div class="col-sm-8">
                    <input type="text" name="sum" class="form-control" placeholder="что это такое">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Дата получения тиража план</label>
                <div class="col-sm-8">
                    <input type="text" name="ready" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Где лежит файл</label>
                <div class="col-sm-8">
                    <input type="text" name="path" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-default">Создать</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include '../resources/views/layout/button.php'; ?>
