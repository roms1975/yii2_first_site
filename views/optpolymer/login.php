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
        <div class="col-sm-6 col-sm-offset-3">
        <!--div class="site-login"-->
            <h1>Вход для зарегистрированных пользователей</h1>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
                    'labelOptions' => ['class' => 'control-label'],
                ],
            ]); ?>
                
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

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
