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
<div class="wrapper">
    <div class="content">
        <div id="site_header">
            <div id="header">
                <div class="row">
                    <div class="col-1">
                        <div id="site_Image1">
                            <img src="/images/logo2.jpg" id="Image1" alt="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div id="site_Text1">
                            <span id="site_uid0">ВЫ НАХОДИТЕСЬ В ПАНЕЛИ АДМИНИСТРАТОРА</span>
                        </div>
                    </div>
                    <div class="col-3">

                    </div>
                    <div class="col-4">
                        <a href="<?= \yii\helpers\Url::to(['/auth/logout'])?>">
                        <input type="button" id="button_call_header"  name="" value="ВЫЙТИ ИЗ АДМИНКИ">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="site_container_menu">
            <div id="container_menu">
                <div class="row">
                    <div class="col-1">
                        <div id="site_menu">
                            <label class="toggle" for="menu-submenu" id="menu-title"><span id="menu-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
                            <input type="checkbox" id="menu-submenu">
                            <ul class="menu" id="menu">


                                <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>">Приветствие</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/admin/category']) ?>">Категории продукции</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/admin/product']) ?>">Продукция</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/admin/product/create']) ?>">Добавить продукт</a></li>



                                <li>
                                    <label for="menu-submenu-2" class="toggle">Сертификаты<b class="arrow-down"></b></label>
                                    <a href="javascript:void(0)">Сертификаты<b class="arrow-down"></b></a>
                                    <input type="checkbox" id="menu-submenu-2">
                                    <ul>

                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/documents']) ?>">Республика Беларусь</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/documents-electro']) ?>">Республика Беларусь - Электро</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/documents-teplo']) ?>">Республика Беларусь - Тепло</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/documents-voda']) ?>">Республика Беларусь - Вода</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['/admin/documents-askue']) ?>">Республика Беларусь - АСКУЭ</a></li>


                                    </ul>
                                </li>

                                <li><a href="<?= \yii\helpers\Url::to(['/admin/contacts']) ?>">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">

                    </div>
                </div>
            </div>
        </div>
        <div id="site_LayoutGrid3">
            <div id="LayoutGrid3">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div id="site_line_pl1">
                            <div id="line_pl1">
                                <div class="row">
                                    <div class="col-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div id="admin_content" style="max-width: 1280px; width: 100%; margin: auto">

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

        <?= $content ?>
</div>
    </div>
    <div class="footer">
        <div id="site_main_footer">
            <div id="main_footer">
                <div class="row">
                    <div class="col-1">
<!--                        <div id="site_footer_txt1">-->
<!--                            <span id="site_uid50">г. Гродно <br>УНП 591018664 </span>-->
<!--                        </div>-->
                    </div>
                    <div class="col-2">
<!--                        <div id="site_footer_txt2">-->
<!--                            <span id="site_uid51">тел./факс <br> +375 152 65 79 39<br>бухгалтерия / приемная</span>-->
<!--                        </div>-->
                    </div>
                    <div class="col-3">
<!--                        <div id="site_Text41">-->
<!--                            <span id="site_uid52">+375 33 609 00 67 (мтс)<br> специалисты по продажам</span>-->
<!--                        </div>-->
                    </div>
                    <div class="col-4">
<!--                        <div id="site_Text42">-->
<!--                            <span id="site_uid53">+375 29 880 40 80 (мтс)<br>+375 44 512 06 91 (велком)</span>-->
<!--                        </div>-->
                    </div>
                    <div class="col-5">
<!--                        <div id="site_Text43">-->
<!--                            <span id="site_uid54">Режим работы<br>ПН-ПТ<br>09:00 - 12:00<br>13:00 - 17:00</span>-->
<!--                        </div>-->
                    </div>
                    <div class="col-6">
                        <div id="site_footer_txt3">
                            <span id="site_uid55">2018 © Все права защищены&nbsp;&nbsp; &nbsp;&nbsp; <br>elekomtrade@mail.ru</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="modal_window" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <hr id="modal_line">
                        <div id="site_mod_cont">
                            <div id="mod_cont">
                                <div class="row">
                                    <div class="col-1">
                                        <div id="site_modal_title">
                                            <span id="site_uid12"><strong>ОФОРМИТЬ ЗАЯВКУ</strong></span>
                                        </div>
                                        <input type="text" id="Editbox1" name="name" value="" spellcheck="false" placeholder="&#1042;&#1072;&#1096;&#1077; &#1080;&#1084;&#1103;">
                                        <input type="text" id="Editbox2" name="name" value="" spellcheck="false" placeholder="&#1042;&#1072;&#1096; &#1090;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;*">
                                        <input type="text" id="Editbox3" name="email" value="" spellcheck="false" placeholder="&#1042;&#1072;&#1096;  Email">
                                        <textarea name="message" id="TextArea1" rows="2" cols="53" spellcheck="false" placeholder="&#1044;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1072;&#1103; &#1080;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1103;"></textarea>
                                        <div id="site_Text33">
                                            <span id="site_uid13">* - поля, обязательные к заполнению</span>
                                        </div>
                                        <input type="submit" id="Button7" name="" value="ЗАКАЗАТЬ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
