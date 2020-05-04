<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row statiya">
        <div class="col-sm-12">
        <!--div class="site-login"-->
            <h1>Вход для зарегистрированных пользователей</h1>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>
                
                <label>Логин:</label>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <label>Пароль:</label>
                <?= $form->field($model, 'password')->passwordInput() ?>
				<a href="/register">Регистрация</a>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>
