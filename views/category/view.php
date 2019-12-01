<?php
$this->registerCssFile('/css/category.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/category_v2.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/plus.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/v_menu.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/jquery-ui.css', ['depends' => ['app\assets\AppAsset']]);
$this->registerCssFile('/css/price-slide.css', ['depends' => ['app\assets\AppAsset']]);

$this->registerJsFile('/js/cart.js', ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('/js/plus.js', ['depends' => 'app\assets\AppAsset']);
$this->registerJsFile('/js/filters.js', ['depends' => 'app\assets\AppAsset']);

?>

<div class="loading">
    <div class="lds-hourglass"></div>
</div>
<div id="category_catalog_cont">
    <div id="catalog_cont">
        <div class="row">
            <div class="col-1 ">
                <div class="dis">
                    <hr id="Line1">
                    <div id="category_Text4">
                        <span id="category_uid0">КАТАЛОГ ТОВАРОВ</span>
                    </div>
                    <hr id="Line2">
                    <div id="menu">
                        <ul>
                            <?= \app\components\MenuImagesWidget::widget(['tpl' => 'menu_img'])?>
                        </ul>
                    </div>
<!--                    <div class="widget">-->
<!--                        <ul class="catalog widget-list">-->
<!--                            --><?//= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
<!--                        </ul>-->
<!--                    </div>-->
                </div>
                <?php if (!empty($category->filters)): ?>
                    <hr id="Line3">
                    <div id="category_Text21">
                        <span id="category_uid1">ПАРАМЕТРЫ ТОВАРА</span>
                    </div>
                    <hr id="Line4">
                <?php endif; ?>
                <!-- ФИЛЬТРЫ -->
                <?php $filters = \app\models\Filters::find()->where(['category_id' => $category->id])->andWhere(['parent_id' => 0])->all(); ?>

                <div class="filters_carusel">
                    <div id="check_filter">

                        <?php $i = 0;
                        foreach ($filters as $filter): ?>
                            <?php $i++; ?>
                            <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'form-filters' . $i]); ?>
                            <!--Заголовок-->
                            <div class="filters_head" style="height: 30px; background-color: #FFF; padding: 5px;" >
                                <div id="category_Text22">
                                 <span id="category_uid2">
                                     <?php echo $filter->name; ?>:
                                  </span>
                                </div>
                            </div>


                            <!--Чекбоксы-->
                            <?php $filters_child = \app\models\Filters::find()->where(['category_id' => $category->id])->orderBy('sortOrder ASC')->andWhere(['parent_id' => $filter->id])->all(); ?>

                            <?php foreach ($filters_child as $item): ?>
                        <?php    if($item->child): ?>
                            <div class="filters_body parent_filters"  data-id="<?= $item->id ?>">
                                <div id="FlexBoxContainerCat1" style="background-color: #007FAD;" >

                                    <label for="Checkbox1<?= $item->id ?>" id="Label1"> <?php echo $item->name;
                                        //                                            echo ' ' . $item->id ?>
                                    </label>
                                    <i class="fa fa-angle-down" style="color: #fff; font-size: 30px;"></i>
                                </div>

                                <div class="line_filters" style="width: 100%; height: 1px;"></div>

                            </div>
                        <?php    else: ?>
                                <div class="filters_body">
                                    <div id="FlexBoxContainerCat1">
                                        <div id="category_Checkbox1">
                                            <input type="checkbox" id="Checkbox1<?= $item->id ?>" class="checkbox"
                                                   name="<?= $item->name ?>"
                                                   value="<?= $item->id ?>"

                                                <?php


                                                if (Yii::$app->request->get('filters1')) {
                                                    $chicked = Yii::$app->request->get('filters1');

                                                    if (array_search($item->id, array_column($chicked, 'value')) !== false) {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }
                                                }
                                                if (Yii::$app->request->get('filters2')) {
                                                    $chicked2 = Yii::$app->request->get('filters2');

                                                    if (array_search($item->id, array_column($chicked2, 'value')) !== false) {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }
                                                }
                                                if (Yii::$app->request->get('filters3')) {
                                                    $chicked3 = Yii::$app->request->get('filters3');

                                                    if (array_search($item->id, array_column($chicked3, 'value')) !== false) {
                                                        echo 'checked';
                                                    } else {
                                                        echo '';
                                                    }
                                                }


                                                ?>
                                            >
                                            <label
                                                    for="Checkbox1<?= $item->id ?>"></label>
                                        </div>
                                        <label for="Checkbox1<?= $item->id ?>" id="Label1"> <?php echo $item->name;
//                                            echo ' ' . $item->id ?>
                                        </label>
                                    </div>

                                    <div class="line_filters" style="width: 100%; height: 1px;"></div>

                                </div>
                                <?php    endif; ?>
                                <!-- Подфильтры-->
                                <?php

                                $filters_child2 = \app\models\Filters::find()->where(['parent_id' =>  $item->id])->orderBy('sortOrder ASC')->all(); ?>
                                <div class="children_filters" style="display: none;">
                                    <?php foreach ($filters_child2 as $item): ?>
                                        <?php // Debug($item)?>
                                        <div class="filters_body" >
                                            <div id="FlexBoxContainerCat1" style="background-color:#9D1C20;">
                                                <div id="category_Checkbox1" >
                                                    <input type="checkbox" id="Checkbox1<?= $item->id ?>" class="checkbox child_filters"
                                                           name="<?= $item->name ?> "
                                                           value="<?= $item->id ?>"

                                                        <?php


                                                        if (Yii::$app->request->get('filters1')) {
                                                            $chicked = Yii::$app->request->get('filters1');

                                                            if (array_search($item->id, array_column($chicked, 'value')) !== false) {
                                                                echo 'checked';
                                                            } else {
                                                                echo '';
                                                            }
                                                        }
                                                        if (Yii::$app->request->get('filters2')) {
                                                            $chicked2 = Yii::$app->request->get('filters2');

                                                            if (array_search($item->id, array_column($chicked2, 'value')) !== false) {
                                                                echo 'checked';
                                                            } else {
                                                                echo '';
                                                            }
                                                        }
                                                        if (Yii::$app->request->get('filters3')) {
                                                            $chicked3 = Yii::$app->request->get('filters3');

                                                            if (array_search($item->id, array_column($chicked3, 'value')) !== false) {
                                                                echo 'checked';
                                                            } else {
                                                                echo '';
                                                            }
                                                        }


                                                        ?>
                                                    >
                                                    <label
                                                            for="Checkbox1<?= $item->id ?>"></label>
                                                </div>
                                                <label for="Checkbox1<?= $item->id ?>" id="Label1" style="font-size: 12px; line-height: 1; height: 35px;
                                                  padding: 12px 0px 12px 12px; "> <?php echo $item->name;
                                                    //                                            echo ' ' . $item->id ?>
                                                </label>
                                            </div>

                                            <div class="line_filters" style="width: 100%; height: 1px;"></div>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                            <?php \yii\widgets\ActiveForm::end(); ?>
                        <?php endforeach; ?>


                    </div>
                    <?php if ($min_price): ?>
                        <?php \yii\widgets\ActiveForm::begin(['id' => 'form-price']); ?>
                        <div class="filters_head">

                            <div id="category_Text22">
                    <span id="category_uid2">
                        Цена:
                    </span>
                            </div>
                        </div>
                        <div id="FlexBoxContainerPrice">


                            <input type="text" id="price" name="Editbox1" data-id="<?= $min_price ?>"

                                   value="0"
                                   spellcheck="false" readonly>

                            <input type="text" id="price2" data-id="<?= $max_price ?>" name="Editbox1" value="0"
                                   spellcheck="false" readonly>

                        </div>


                        <?php \yii\widgets\ActiveForm::end(); ?>

                        <div id="slider_price" style=" max-width: 95%; margin-top: 20px; margin-bottom: 20px;"></div>
                        <div class="filters_body reset_all" >
                            <div id="FlexBoxContainerCat1" style="background-color: #9D1C20" >
                                <div id="reswet_all" style="color: #fff; padding: 20px; cursor: pointer;">
                                    СБРОСИТЬ ВСЕ
                                </div>
                            </div>

                            <div class="line_filters" style="width: 100%; height: 1px;"></div>

                        </div>
                    <?php endif; ?>
                </div>


            </div>
            <div class="col-2">
                <div id="category_LayoutGridCat11">
                    <div id="LayoutGridCat11">
                        <div class="row">
                            <div class="col-1">
                                <div id="category_Text38">
                                    <span id="category_uid5">
                                                                <a href="<?= \yii\helpers\Url::home() ?>">Главная</a> &gt;

                         <a href="<?= \yii\helpers\Url::home() ?>"></a>
                                        <?php if (!empty($category->parent)): ?>
                                            <a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $category->parent->alias]) ?>">
                                 <?= $category->parent->name ?>
                             </a> &gt;

                                            <?= $category->name ?>

                                        <?php else: ?>
                                            <?= $category->name ?>
                                        <?php endif; ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ajax">
                    <div id="category_LayoutGridCat5">
                        <div id="LayoutGridCat5">
                            <div class="row">
                                <div class="col-1">
                                    <div id="category_Text12">
                                                                <span id="category_uid6"><strong>
                                                                        <?= $category->name ?>
                                                                        <?php if (Yii::$app->request->get('filters1')) {
                                                                            $filters_search = Yii::$app->request->get('filters1');

                                                                            foreach ($filters_search as $filter_name => $value) {
                                                                                if ($filter_name == 0) {
                                                                                    echo '(';
                                                                                }echo $value['name'];if ($value == end($filters_search)) {
                                                                                   echo ')';} else {echo ', ';
                                                                               }
                                                                           }
                                                                        }

                                                                        ?>
                            </strong></span>
                                        <?php if (empty($category->child)): ?>
                                        <a href="#catalog_cont">
                                            <div id="go_to_filters" style="font-size: 20px; ">Вернуться к фильтрации для
                                                выбора параметров товара!
                                            </div>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="category_LayoutGridCat3">
                        <?php if (empty($category->child)): ?>
                            <div id="LayoutGridCat3">
                                <div class="row">
                                    <div class="col-1">
                                        <?php $session = Yii::$app->session; ?>
                                        <?= $view = $session->get('view'); ?>

                                        <div id="category_Text7">

                                    <span id="category_uid7">Товаров: <?= $dataProvider->getTotalCount() ?>

                                    </span>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <div id="sort">
                                            <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'form-sort']); ?>
                                            <select name="sort" size="1" id="Combobox1">
                                                <!--                                    --><?php //if($_GET['sort'] == 'price' || empty($_GET['sort'])) : ?>
                                                <option value="default"

                                                        selected

                                                >По умолчанию
                                                </option>

                                                <option value="price"
                                                    <?php if (Yii::$app->request->get('main_sort')[1]['value'] == 'price') : ?>
                                                        selected
                                                    <?php endif; ?>
                                                >Цена по возрастанию
                                                </option>

                                                <option value="-price"
                                                    <?php if (Yii::$app->request->get('main_sort')[1]['value'] == '-price') : ?>
                                                        selected
                                                    <?php endif; ?>
                                                >Цена по убыванию
                                                </option>
                                            </select>
                                            <?php \yii\widgets\ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div id="category_FontAwesomeIconCat3">
                                            <div id="FontAwesomeIconCat3"><i class="fa fa-th-large"
                                                    <?php if ($session->get('view') == 'table') : ?>
                                                        style="color: #696969;"
                                                    <?php endif; ?>
                                                >
                                                    &nbsp;</i></div>
                                        </div>
                                        <div id="category_FontAwesomeIconCat2">
                                            <div id="FontAwesomeIconCat2"><i class="fa fa-th-list"
                                                    <?php if ($session->get('view') == 'table') : ?>
                                                        style="color: #9D1C20;"
                                                    <?php endif; ?>
                                                ></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div id="category_formats_bl1">
                        <div id="formats_bl1">
                            <div class="row">

                                <?php if (!empty($dataProvider->getModels())): ?>
                                    <?php $i = 0;
                                    foreach ($dataProvider->getModels() as $product): ?>
                                        <?php $i++; ?>
                                        <?php

                                        $img = $product->getImage();

                                        ?>
                                        <div class="col-1"
                                            <?php if ($session->get('view') == 'table') : ?>
                                                style="width: 100%;"
                                            <?php endif; ?>
                                        >


                                            <?php if ($session->get('view') !== 'table') : ?>
                                                <div class="item-info" data-id="<?= $session->get('view') ?>">
                                                    <?php if($product->sale):  ?>
                                                        <div class="podnew" style="position: absolute; width: 90px; height: 24px; right: 30px; top: 20px; z-index: 300;">
                                                            <?= \yii\helpers\Html::img("@web/images/sale.png", ['alt' => 'Новинка', 'class'=>'sale'])  ?></div>
                                                    <?php endif;  ?>
                                                    <?php if($product->sale2):  ?>
                                                        <div class="podnew" style="position: absolute; width: 90px; height: 24px; left: 30px; top: 20px; z-index: 300;">
                                                            <?= \yii\helpers\Html::img("@web/images/sale2.png", ['alt' => 'Новинка', 'class'=>'sale'])  ?></div>
                                                    <?php endif;  ?>
                                                    <div id="category_Image1">

                                                        <a href="<?= \yii\helpers\Url::to(['podguzniki-product/view', 'alias' => $product->alias]) ?>">
                                                            <img src="<?= '/' . $img->getPath() ?>"
                                                                 class="Image<?= $product->id ?> Image1" alt=""
                                                                 data-id="<?= $product->id ?>">
                                                        </a>
                                                    </div>
                                                    <div id="category_Text8">
                                                        <a href="<?= \yii\helpers\Url::to(['podguzniki-product/view', 'alias' => $product->alias]) ?>">
                                                            <span id="category_uid8"><?= $product->name ?></span>
                                                        </a>
                                                    </div>

                                                    <div id="category_v2_Text26">
                                                        <span id="category_v2_uid3"><strike><?= $product->price_sale ?></strike> <?= $product->price ?> РУБ.</span>
                                                    </div>
                                                    <div id="category_v2_Text25">
                                                        <span id="category_v2_uid4">за упаковку</span>
                                                    </div>
                                                    <div id="category_v2_Text27">
                                                        <span id="category_v2_uid5"><?= $product->price_one ?> РУБ.</span>
                                                    </div>
                                                    <div id="category_v2_Text28">
                                                        <span id="category_v2_uid6">шт.&nbsp; </span>
                                                    </div>


                                                    <div class="counter">
                                                        <button type="button" class="but counterBut dec">-</button>
                                                        <input type="text" data-id="<?= $product->id ?>" value="1"
                                                               class="field fieldCount qty qty<?= $product->id ?>"
                                                               data-min="1" data-max="20">
                                                        <button type="button" class="but counterBut inc">+</button>
                                                    </div>


                                                    <?php if (!$product->sklad): ?>
                                                        <div id="category_LayoutGridCat7">
                                                            <div id="LayoutGridCat7">
                                                                <div class="col-1">
                                                                    <div id="category_FontAwesomeIconCat4">
                                                                        <div id="FontAwesomeIconCat4"><i
                                                                                    class="fa fa-times-circle">&nbsp;</i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div id="category_Text15">
                                                                        <span id="category_uid9">нет в наличии </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div id="category_v_nalichii">
                                                            <div id="v_nalichii">
                                                                <div class="col-1">
                                                                    <div id="category_FontAwesomeIconCat8">
                                                                        <div id="FontAwesomeIconCat8"><i
                                                                                    class="fa fa-check-circle">&nbsp;</i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-2">
                                                                    <div id="category_Text20">
                                                                        <span id="category_uid10">в наличии </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>


                                                    <input data-id="<?= $product->id ?>"
                                                           data-example-id="<?= $product->price ?>" type="button"
                                                           id="Button2" name="" value="В КОРЗИНУ"
                                                           class="button_m add-to-cart-one button_m<?= $product->id ?>">

                                                </div>
                                            <?php else: ?>
                                                <div class="item-info2" data-id="<?= $session->get('view') ?>">
                                                    <?php if($product->sale):  ?>
                                                        <div class="podnew" style="position: absolute; width: 90px; height: 24px; left: 10px; top: 20px; z-index: 300;">
                                                            <?= \yii\helpers\Html::img("@web/images/sale.png", ['alt' => 'Новинка', 'class'=>'sale'])  ?></div>
                                                    <?php endif;  ?>
                                                    <?php if($product->sale2):  ?>
                                                        <div class="podnew" style="position: absolute; width: 90px; height: 24px; left: 10px; top: 90px; z-index: 300;">
                                                            <?= \yii\helpers\Html::img("@web/images/sale2.png", ['alt' => 'Новинка', 'class'=>'sale'])  ?></div>
                                                    <?php endif;  ?>
                                                    <div id="category_v2_cat_vid2">
                                                        <div id="cat_vid2">
                                                            <div class="col-1">
                                                                <div id="category_v2_Image1">
                                                                    <a href="<?= \yii\helpers\Url::to(['podguzniki-product/view', 'alias' => $product->alias]) ?>">
                                                                        <img src="<?= '/' . $img->getPath() ?>"
                                                                             class="Image<?= $product->id ?> Image2"
                                                                             alt="" data-id="<?= $product->id ?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div id="category_v2_Text8">
                                                                    <a href="<?= \yii\helpers\Url::to(['podguzniki-product/view', 'alias' => $product->alias]) ?>">
                                                                        <span id="category_v2_uid0"><?= $product->name ?></span>
                                                                    </a>
                                                                </div>


                                                                <?php if (!$product->sklad): ?>
                                                                    <div id="category_v2_cat_vid2_nal">
                                                                        <div id="cat_vid2_nal">
                                                                            <div class="row">
                                                                                <div class="col-1">
                                                                                    <div id="category_v2_FontAwesomeIcon4">
                                                                                        <div id="FontAwesomeIcon4"><i
                                                                                                    class="fa fa-times-circle">&nbsp;</i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <div id="category_v2_Text15">
                                                                                        <span id="category_v2_uid1">нет в наличии </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div id="category_v2_cat_vid2_no_nal">
                                                                        <div id="cat_vid2_no_nal">
                                                                            <div class="row">
                                                                                <div class="col-1">
                                                                                    <div id="category_v2_FontAwesomeIcon8">
                                                                                        <div id="FontAwesomeIcon8"><i
                                                                                                    class="fa fa-check-circle">&nbsp;</i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <div id="category_v2_Text20">
                                                                                        <span id="category_v2_uid2">в наличии </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-3">
                                                                <div id="category_v2_Text26">
                                                                    <span id="category_v2_uid3"><strike><?= $product->price_sale ?></strike> <?= $product->price ?>
                                                                        РУБ.</span>
                                                                </div>
                                                                <div id="category_v2_Text25">
                                                                    <span id="category_v2_uid4">за упаковку</span>
                                                                </div>
                                                                <div id="category_v2_Text27">
                                                                    <span id="category_v2_uid5"><?= $product->price_one ?> РУБ.</span>
                                                                </div>
                                                                <div id="category_v2_Text28">
                                                                    <span id="category_v2_uid6">шт.&nbsp; </span>
                                                                </div>
                                                                <div class="counter">
                                                                    <button type="button" class="but counterBut dec">-
                                                                    </button>
                                                                    <input type="text" data-id="<?= $product->id ?>"
                                                                           value="1"
                                                                           class="field fieldCount qty qty<?= $product->id ?>"
                                                                           data-min="1"
                                                                           data-max="20">
                                                                    <button type="button" class="but counterBut inc">+
                                                                    </button>
                                                                </div>
                                                                <input data-id="<?= $product->id ?>" data-example-id="<?= $product->price ?>" type="button"
                                                                       id="Button2" name="" value="В КОРЗИНУ"

                                                                       class="button_m add-to-cart-one button_m<?= $product->id ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <?php if ($i % 3 == 0): ?>
                                            <div class="line_pod_pr"
                                                 style="width: 100%; height: 1px; margin-top: 30px; margin-bottom: 20px;  float: left; background-color: #00A7CD;"></div>
                                        <?php endif; ?>


                                    <?php endforeach; ?>

                                    <div class="line_pod_pr"
                                         style="width: 100%; height: 1px; margin-top: 30px; margin-bottom: 20px;  float: left;"></div>
                                    <!-- Пагинация-->
                                    <?php
                                    echo \yii\widgets\LinkPager::widget([
                                            'pagination' => $dataProvider->pagination,
                                        ]
                                    );
                                    ?>
                                    <!-- /Пагинация-->


                                <?php elseif (!empty($category->child)): ?>
                                    <?php $i = 0;
                                    foreach ($category->child as $item): ?>
                                        <?php $i++; ?>
                                        <?php

                                        $img = $item->getImage();

                                        ?>
                                        <div class="col-1">
                                            <div class="item-info">
                                                <div id="category_Image1">
                                                    <a href="<?= \yii\helpers\Url::to(['/category/view', 'alias' => $item->alias]) ?>">
                                                        <img src="<?= '/' . $img->getPath() ?>"
                                                             class="Image<?= $product->id ?> Image1" alt=""
                                                             data-id="<?= $product->id ?>">
                                                    </a>
                                                </div>
                                                <div id="category_Text8">
                                                    <a href="<?= \yii\helpers\Url::to(['/category/view', 'alias' => $item->alias]) ?>">
                                                        <span id="category_uid8"><?= $item->name ?></span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
