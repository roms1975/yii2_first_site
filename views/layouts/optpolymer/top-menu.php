<?php
    use yii\helpers\Html;
?>

<div class="top-menu">
    <div class="container">
        <div class="row">
            <ul class="top-memu-list">
                <li>
                    <a href="/">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li>
                      <a href="/about.html">О компании</a>
                </li>
                <li>
                      <a href="/#partner">Стать партнёром</a>
                </li>
                <li>
                      <a href="/#addr">Контакты</a>
                </li>
            </ul>
<?php            
        if (!Yii::$app->user->isGuest) {
                        

            echo(
                Html::beginForm(['/lk'], 'post', ['class' => 'log-out']) .
                '<a class="enter pull-right logout">' .
                    'Личный кабинет (' . Yii::$app->user->identity->username . ')' .
                '</a>' .
                Html::endForm()
            );
        } else {
            echo (
                '<a class="enter pull-right" href="/login" >' .
                    'Вход в личный кабинет: ' .
                    '<i class="fa fa-user-circle login" aria-hidden="true"></i>' .
                '</a>' 
            );
        }
?>

            <!--form id="login" method="post">
                <input type="text" class="form-control" name="name" placeholder="Логин:" />
                <input type="text" class="form-control" name="password" placeholder="Пароль:" />
                <div class="btn btn-info">Войти</div>
                <a>Регистрация</a>
                <a>Забыли пароль?</a>
            <form-->
        </div>
    </div>
</div>