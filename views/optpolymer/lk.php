<?php

/* @var $this yii\web\View */use yii\helpers\Html;

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
    </div>
</div>