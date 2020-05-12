<<<<<<< HEAD
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
=======
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
>>>>>>> 2ab52489858bb854a784b9997c35ba5b392579ca
