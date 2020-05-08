<?php

/* @var $this yii\web\View */use yii\helpers\Html;
use yii\widgets\Menu;
$this->title = 'Личный кабинет партнера';

?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
		<div class="col-md-3 col-sm-4">
			<?php
				echo Menu::widget([
					'items' => [
						['label' => 'Персональные данные', 'url' => ['optpolymer/showperson']],
						['label' => 'Заказы', 'url' => ['/']],
						['label' => 'Выход', 'url' => ['logout']],
					],
					'options' => ['class' => 'lk-menu'],
					'activeCssClass'=>'active',
				]);
			?>
		</div>
    </div>
</div>