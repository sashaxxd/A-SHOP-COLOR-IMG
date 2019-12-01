<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsHome */

$this->title = 'Добавить товар на главную';
$this->params['breadcrumbs'][] = ['label' => 'Products Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-home-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
