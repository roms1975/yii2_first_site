<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Оформление заказа';
$order = isset($_COOKIE['order']) ? $_COOKIE['order'] : "";
$offers = json_decode($order, true);
?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
	<div class="col-md-3 col-sm-4">
		<?= $this->render("/optpolymer/lk_menu"); ?>
	</div>
	<div class="col-md-9 col-sm-8">
		<?php 
		
			$list = "<tr><th>Ид товара</th><th>количество</th><tr>";
			foreach ($offers as $key => $offer) {
				$list .= "<tr><td>" . $key . "</td><td>" . $offer['count'] . "</td></tr>";
			}
			
			echo "<table class='offers'>" . $list . "</table>";
		?>
	</div>
    </div>
</div>
