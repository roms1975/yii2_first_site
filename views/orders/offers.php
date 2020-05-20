<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Создать заказ';
$order = isset($_COOKIE['order']) ? $_COOKIE['order'] : "";
$offers = json_decode($order, true);
?>

<div class="container">
    <div class="row statiya">
        <h1><?= $this->title ?></h1>
	<div class="col-md-3 col-sm-4">
		<?= $this->render("/optpolymer/lk_menu"); ?>
		</div>
		<div class="col-md-9 col-sm-8 cat-list">
			<?php 

				foreach ($categories as $category) {
					$active_class = ($category->id == $current_cat_id) ? ' active' : '';
					$cat_name = empty($category->name) ? $category->{'1c_name'} : $category->name;
					echo(
						'<a class="btn btn-primary cat ' . $active_class . '" href="?id=' . $category->id . '">' . $cat_name . '</a>'
					);
				}
			
				$list = "";
				
				if (!empty($model)) {
					foreach ($model as $key => $row) {
						$list .= (
							"<tr data-id='" . $row->id . "'>" .
								"<td>" . ($key + 1) . "</td>" .
								"<td>" . $row->name . "</td>" .
								"<td class='max-count' data-count='" . $row->count  . "'>" . 
									(empty($offers[$row->id]['count']) ? $row->count : $row->count - $offers[$row->id]['count'] ). 
								"</td>" .
								"<td>" . (($row->price) + 1000) . "</td>" .
								"<td class='added " . (empty($offers[$row->id]['count']) ? "" : " add") . "'>" . 
									(isset($offers[$row->id]) ? $offers[$row->id]['count'] : '') . 
								"</td>" .
							"</tr>"
						);
					}
					
					echo (
						"<table class='offers'>" . 
							"<tr>" .
								"<th></th>" .
								"<th>наименование</th>" .
								"<th>Доступное количество</th>" .
								"<th>Цена</th>" .
								"<th>Добавить в заказ</th>" .
							"</tr>" .
							$list . 
						"</table>" .
						"<div class='form-group'>" .
							"<a href='/lk/orders/chekout' class='btn btn-primary'>Оформить заказ</a>" .
						"</div>"
					);
				}
			?>

		</div>
    </div>
</div>
