<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StoreHours */

$this->title = 'Измекнить часы работы с ID: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Store Hours', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="store-hours-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
