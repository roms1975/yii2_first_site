<?php

/* @var $this yii\web\View */use yii\helpers\Html;
$this->title = 'Личный кабинет партнера';

?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
		<div class="col-md-3 col-sm-4">
			<?= $this->render("lk_menu"); ?>
		</div>
    </div>
</div>