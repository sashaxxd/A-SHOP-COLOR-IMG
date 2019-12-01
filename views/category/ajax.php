
<div id="category_LayoutGridCat5">
    <div id="LayoutGridCat5">
        <div class="row">
            <div class="col-1">
                <div id="category_Text12">
                        <span id="category_uid6"><strong> <?= $category->name ?>
                                <?php if (Yii::$app->request->get('filters1')) {
                                    $filters_search = array_splice(Yii::$app->request->get('filters1'), 1);

                                    foreach ($filters_search as $filter_name => $value) {
                                        if ($filter_name == 0) {
                                            echo '(';
                                        }
                                        echo $value['name'];
                                        if ($value == end($filters_search)) {
                                          echo  ')';
                                        } else {
                                            echo ', ';
                                        }

                                    }
                                }

                                ?>
                            </strong></span>
                    <?php if (empty($category->child)): ?>
                    <a href="#catalog_cont">
                        <div id="go_to_filters" style="font-size: 20px; ">Вернуться к фильтрации для выбора параметров
                            товара!
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
    <div id="LayoutGridCat3">
        <div class="row">
            <div class="col-1">
                <?php $session = Yii::$app->session; ?>
                <?= $view = $session->get('view'); ?>

                <div id="category_Text7">

                                    <span id="category_uid7">Товаров: <?= $dataProvider->getTotalCount() ?>
<!--                                        --><?php
//                                        $sqlText = $dataProvider->query->createCommand()->getRawSql();
//                                        Debug($sqlText);
//                                       ?>
                                    </span>
                </div>

            </div>
            <div class="col-2">
                <div id="sort">
                    <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'form-sort']); ?>
                    <select name="sort" size="1" id="Combobox1">

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
                                        <img src="<?= '/' . $img->getPath() ?>" class="Image<?= $product->id ?> Image1"
                                             alt="" data-id="<?= $product->id ?>">
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
                                           class="field fieldCount qty qty<?= $product->id ?>" data-min="1"
                                           data-max="20">
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


                                <input data-id="<?= $product->id ?>" data-example-id="<?= $product->price ?>"
                                       type="button" id="Button2" name="" value="В КОРЗИНУ"
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
                                                         class="Image<?= $product->id ?> Image2" alt=""
                                                         data-id="<?= $product->id ?>">
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
                                                                    <span id="category_v2_uid3"><?= $product->price ?>
                                                                        РУБ.</span>
                                            </div>
                                            <div id="category_v2_Text25">
                                                <span id="category_v2_uid4">за упаковку</span>
                                            </div>
                                            <div id="category_v2_Text27">
                                                <span id="category_v2_uid5">0.22 РУБ.</span>
                                            </div>
                                            <div id="category_v2_Text28">
                                                <span id="category_v2_uid6">шт.&nbsp; </span>
                                            </div>
                                            <div class="counter">
                                                <button type="button" class="but counterBut dec">-
                                                </button>
                                                <input type="text" data-id="<?= $product->id ?>" value="1"
                                                       class="field fieldCount qty qty<?= $product->id ?>" data-min="1"
                                                       data-max="20">
                                                <button type="button" class="but counterBut inc">+
                                                </button>
                                            </div>
                                            <input data-id="<?= $product->id ?>" type="button" id="Button2" name=""
                                                   value="В КОРЗИНУ"
                                                   data-example-id="<?= $product->price ?>"
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
                                    <img src="<?= '/' . $img->getPath() ?>" class="Image<?= $product->id ?> Image1"
                                         alt="" data-id="<?= $product->id ?>">
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
