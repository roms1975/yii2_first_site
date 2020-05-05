<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row statiya">
        <div class="col-sm-6 col-sm-offset-3">
        <!--div class="site-login"-->
            <h1>Регистрация партнера</h1>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
                    'labelOptions' => ['class' => 'control-label'],
                ],
            ]); ?>
                
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'pass_retype')->passwordInput() ?>

                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'reg-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
