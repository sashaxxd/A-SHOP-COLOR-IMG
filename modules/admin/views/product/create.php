<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PodguznikiProduct */

$this->title = 'Добавление товара';
$this->params['breadcrumbs'][] = ['label' => 'Podguzniki Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main_form_filters">
<div class="podguzniki-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'model_f' => $model_f,
    ]) ?>

</div>
</div>
