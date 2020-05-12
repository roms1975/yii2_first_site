<?php
	use yii\widgets\Menu;
	
	echo Menu::widget([
		'items' => [
			['label' => 'Персональные данные', 'url' => ['optpolymer/showperson'] ],
			['label' => 'Заказы', 'url' => ['optpolymer/orders']],
			['label' => 'Выход', 'url' => ['logout']],
		],
		'options' => [
			'class' => 'lk-menu',
		],
		'activeCssClass'=>'active',
	]);
?>