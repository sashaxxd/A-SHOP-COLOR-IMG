<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StoreHours */

$this->title = 'Create Store Hours';
$this->params['breadcrumbs'][] = ['label' => 'Store Hours', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-hours-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
