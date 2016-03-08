<?php $title = 'Вход на сайт'; ?>

<?php include '../resources/views/layout/top.php' ?>

<div class="row">
    <form class="form-signin" method="post" action="<?= route('login_check') ?>">
        <h2 class="form-signin-heading">Вход</h2>
        <?php if (!empty($error)) :?>
            <p class="text-danger">Неправильный логин или пароль</p>
        <?php endif; ?>
        <input type="text" name="login" class="form-control" placeholder="Логин" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">войти на сайт</button>
    </form>
</div>

<?php include '../resources/views/layout/button.php'; ?>
