<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Home */

//$this->title = 'Изменить: ' . $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-update">

    <h1>ТЕКСТОВЫЕ БЛОКИ ГЛАВНОЙ</h1>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
