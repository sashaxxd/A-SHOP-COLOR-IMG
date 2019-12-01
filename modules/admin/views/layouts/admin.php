<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= \yii\helpers\Url::to(['/admin/default'])  ?>"><span>ПОДГУЗНИК ГРОДНО - ПАНЕЛЬ </span>АДМИНА</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>АДМИН <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="<?= \yii\helpers\Url::to(['/auth/logout'])?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> ВЫХОД</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>



<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

    <ul class="nav menu">
        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>Панель админки</a></li>
        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/order'])?>"><svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>Заказы</a></li>


        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/menu'])?>"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg>Верхнее меню</a></li>
        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/pages'])?>"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Cтраницы</a></li>





        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/category'])?>"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg>Категории продукции</a></li>
        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/filters'])?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg>
                Фильтры</a></li>
        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/brands'])?>"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Бренды</a></li>
        <li class="active"><a href="<?= \yii\helpers\Url::to(['/admin/product'])?>"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Продукция</a></li>


    </ul>



</div>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <?= $content ?>

</div>







<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div id="mess_msg-cntain">
        <div id="msg-cntain">
            <div class="row">
                <div class="col-1">
                    <div id="mess_message_ok">
                        <div id="message_ok">
                            <div class="row">
                                <div class="col-1">
                                    <div id="mess_message_text">
                                        <span id="mess_uid0"><?php echo Yii::$app->session->getFlash('success'); ?></span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div id="mess_message_close">
                                        <div id="message_close"><i class="fa fa-window-close">&nbsp;</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div id="message_msg-cntain-error">
        <div id="msg-cntain-error">
            <div class="row">
                <div class="col-1">
                    <div id="message_message_error">
                        <div id="message_error">
                            <div class="row">
                                <div class="col-1">
                                    <div id="message_message_error_text">
                                        <span id="message_uid0"><?php echo Yii::$app->session->getFlash('error'); ?></span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div id="message_message_close_error">
                                        <div id="message_close_error"><i class="fa fa-window-close">&nbsp;</i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

