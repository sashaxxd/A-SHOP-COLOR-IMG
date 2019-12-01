<?php

$this->title = 'Админ панель';

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Привет администратор!</h1>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?=phpversion() ?></div>
                    <div class="text-muted">Версия PHP</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"> <div id='clock'></div></div>
                    <div class="text-muted">Время на сервере</div>
                </div>
            </div>
        </div>
    </div>

    <a href="<?= \yii\helpers\Url::to('/admin/category')?>">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= \app\models\Category::find()->count()?></div>
                    <div class="text-muted">Категорий</div>
                </div>
            </div>
        </div>
    </div>
    </a>

    <a href="<?= \yii\helpers\Url::to('/admin/podguzniki-product')?>">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= \app\models\Product::find()->count()?></div>
                    <div class="text-muted">Товаров</div>
                </div>
            </div>
        </div>
    </div>
    </a>


    <script>


        window.setInterval(
            function(){
                var d = new Date();
                document.getElementById("clock").innerHTML =     d.toLocaleTimeString();

            }
            , 1000);
    </script>



</div>


<div class="row">



    <a href="<?= \yii\helpers\Url::to(['/admin/order'])?>">
    <div class="col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading dark-overlay">ВСЕГО ЗАКАЗОВ</div>
            <div class="panel-body" style="text-align: center; font-size: 50px;">
                <?= $orders = \app\models\Order::find()->count()?>

            </div>
        </div>
    </div>
    </a>
    <a href="<?= \yii\helpers\Url::to(['/admin/order'])?>">
    <div class="col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading dark-overlay">НОВЫХ ЗАКАЗОВ</div>
            <div class="panel-body" style="text-align: center; font-size: 50px;">
                <?= $orders = \app\models\Order::find()->where(['status' => '0'])->count()?>
            </div>
        </div>
    </div>
    </a>
</div>

<div class="col-lg-12">
    <h2>ДОП. ИНФОРМАЦИЯ</h2>
</div>

<div class="col-md-6">
    <div class="panel panel-blue">
        <div class="panel-heading dark-overlay">ЗАКАЗ ЗВОНКА</div>
        <div class="panel-body" style="text-align: center; font-size: 50px;">
            <p><?php $calls = \app\models\Calls::find()->select(['count'])->where(['id' => 1])->one()?>
                <?= $calls->count ?>
                раз</p>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="panel panel-teal">
        <div class="panel-heading dark-overlay">КОЛ-ВО СЛАЙДОВ</div>
        <div class="panel-body" style="text-align: center; font-size: 50px;">
         <?= $slider = \app\modules\admin\models\Slider::find()->count()?>

                шт.
        </div>
    </div>
</div>

<div class="proiz_poliya" style="float: left;">

</div>