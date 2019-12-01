<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsHomeLinks */
$product = \app\models\ProductsHome::find()->select('name')->where(['id' => Yii::$app->request->get('parent_id')])->one();
$this->title = 'Создание ссылки для раздела ' .$product->name;


$this->params['breadcrumbs'][] = ['label' => 'Products Home Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-home-links-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
