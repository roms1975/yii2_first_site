<?php

/* @var $this yii\web\View */

use yii\widgets\Menu;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Заказы';

?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
	<div class="col-md-3 col-sm-4">
		<?php
			echo Menu::widget([
				'items' => [
					['label' => 'Персональные данные', 'url' => ['optpolymer/showperson'] ],
					['label' => 'Заказы', 'url' => ['/orders']],
					['label' => 'Выход', 'url' => ['logout']],
				],
				'options' => [
					'class' => 'lk-menu',
				],
				'activeCssClass'=>'active',
			]);
		?>
	</div>
	<div class="col-md-9 col-sm-8">
		<?php
			if (!empty($orders))
				print_r($orders);
		?>
	</div>
    </div>
</div>