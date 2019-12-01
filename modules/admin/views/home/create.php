<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Home */

//$this->title = 'Create Home';
//$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-create">

    <h1>ТЕКСТОВЫЕ БЛОКИ ГЛАВНОЙ</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
