<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Личный кабинет партнера';

?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
	<div class="col-md-3 col-sm-4">
		<ul class="lk-menu">
			<li>Персональные данные</li>
			<li>Заказы</li>
		<?php
			echo(
				Html::beginForm(['/logout'], 'post', ['class' => 'log-out']) .
				'<li class="logout">Выход</li>' .
				Html::endForm()
			);
		?>
		</ul>
	</div>
	<div class="col-md-9 col-sm-8">
		<?php $form = ActiveForm::begin([
			'id' => 'person-form',
			'layout' => 'horizontal',
			'fieldConfig' => [
				'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
				'labelOptions' => ['class' => 'control-label'],
			],
		]); ?>

		<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

		<?= $form->field($model, 'surename')->textInput() ?>

		<?= $form->field($model, 'phone')->textInput() ?>

		<div class="form-group">
			<div>
				<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'reg-button']) ?>
			</div>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
    </div>
</div>