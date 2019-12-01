<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PodguznikiProduct */

$this->title = 'Изменить товар: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Podguzniki Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main_form_filters_update">
<div class="podguzniki-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_f' => $model_f,
        'filters_selected' => $filters_selected
    ]) ?>

</div>
</div>
