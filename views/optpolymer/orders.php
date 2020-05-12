<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Заказы';

?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
	<div class="col-md-3 col-sm-4">
		<?= $this->render("lk_menu"); ?>
	</div>
	<div class="col-md-9 col-sm-8">
		<?php 
			$list = "";
			foreach ($model as $row) {
				$created = $row->processed;
				$list .= (
					"<tr>" .
						"<td>" . $row->id . "</td>" .
						"<td>" . $row->created . "</td>" .
						"<td>" . (($row->processed == '0000-00-00 00:00:00') ? '' : $row->processed ) . "</td>" .
						"<td></td>" .
					"</tr>"
				);
			}
			
			echo (
				"<table class='orders'>" . 
					"<tr>" .
						"<th>Номер заказа</th>" .
						"<th>Дата создания</th>" .
						"<th>Дата проверки</th>" .
						"<th>Менеджер</th>" .
					"</tr>" .
					$list . 
				"</table>"
			);
		?>
	</div>
    </div>
</div>