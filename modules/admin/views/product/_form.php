<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\Multilevel;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\PodguznikiProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podguzniki-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--        --><? //= $form->field($model, 'category_id')->textInput() ?>
    <?php if (Yii::$app->controller->action->id == 'create') : ?>
    <?php
    $parents = app\modules\admin\models\Category::find()->where(['parent_id' => '0'])->all();
    $cat = new app\modules\admin\models\Category();
    $ml = new Multilevel();
    echo $form->field($model, 'category_id')->dropDownList($ml->makeDropDown($parents, $cat), ['id' => 'cat-id', 'prompt' => 'Выбрать категорию', 'class' => 'form-control required',
        ]

    );
    ?>
    <?php endif; ?>

    <?php if (Yii::$app->controller->action->id == 'update') : ?>
        <?php
        $parents = app\modules\admin\models\Category::find()->where(['parent_id' => '0'])->all();
        $cat = new app\modules\admin\models\Category();
        $ml = new Multilevel();
        echo $form->field($model, 'category_id')->dropDownList($ml->makeDropDown($parents, $cat), ['id' => 'cat-id-update', 'prompt' => 'Выбрать категорию', 'class' => 'form-control required',
            ]

        );
        ?>
    <?php endif; ?>
    <!--    Вывод фильтров после выбора категории-->


    <?php if ($id): ?>
        <div class="pod_view_t" style="width: 100%; padding: 5px; background-color: #1CB5A5; color: #fff; font-size: 20px; margin-bottom: 20px;  ">ДЛЯ ФИЛЬТРОВ:</div>
<!--        --><?php //Debug($id)?>
        <?php
        $filters = \app\models\Filters::find()->where(['category_id' => $id])->andWhere(['parent_id' => 0])->all();
        ?>
        <?php $i = 0; foreach ($filters as $filter): ?>
            <?php $i++; ?>

            <?php
            $filters_child = \app\models\Filters::find()->where(['category_id' => $id])->andWhere(['parent_id' => $filter->id])->all();
//            $items = \yii\helpers\ArrayHelper::map($filters_child, 'id', 'name');

            /**
             * Делаем неактивными у который есть дочерние фильтры что бы не выбирал юзер
             */
            foreach ($filters_child as $value){
                if( $value->child){
                    $ttt = $value->id;
                    $disableDataArr[$ttt ] =  ['disabled' => true];
                }

            }
            $parents = app\modules\admin\models\Category::find()->where(['parent_id' => '0'])->all();
            $cat2 = new \app\models\Filters();
            $ml = new Multilevel();


            echo $form->field($model_f, 'filter_id'.$i)->dropDownList($ml->makeDropDown(
                $filters_child , $cat2

            ), ['id' => 'filter-id', 'prompt' => 'Выбрать фильтр', 'class' => 'form-control required',
                    'options' => $disableDataArr
                ]

            )->label($filter->name);
            ?>


        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (Yii::$app->controller->action->id == 'update') : ?>
        <!--     При изменении продукта   -->
        <div class="pod_view_t" style="width: 100%; padding: 5px; background-color: #1CB5A5; color: #fff; font-size: 20px; margin-bottom: 20px;  ">ДЛЯ ФИЛЬТРОВ:</div>
        <?php
        if(Yii::$app->request->get('id_up')): ?>
            <?php    $id = $model->category_id; ?>
            <?php
            $filters = \app\models\Filters::find()->where(['category_id' => $id])->andWhere(['parent_id' => 0])->all();
            ?>
            <?php $i = 0; foreach ($filters as $filter): ?>
                <?php $i++; ?>

                <?php
                $filters_child = \app\models\Filters::find()->where(['category_id' => $id])->andWhere(['parent_id' => $filter->id])->all();
//                $items = \yii\helpers\ArrayHelper::map($filters_child, 'id', 'name');



                $parents = app\modules\admin\models\Category::find()->where(['parent_id' => '0'])->all();
                $cat2 = new \app\models\Filters();
                $ml = new Multilevel();
                echo $form->field($model_f, 'filter_id'.$i)->dropDownList($ml->makeDropDown($filters_child , $cat2), ['id' => 'filter-id', 'prompt' => 'Выбрать фильтр', 'class' => 'form-control required',
                    ]

                )->label($filter->name);
                ?>

            <?php endforeach; ?>
        <?php else: ?>
            <?php    $id = $model->category_id; ?>
            <?php
            $filters = \app\models\Filters::find()->where(['category_id' => $id])->andWhere(['parent_id' => 0])->all();
            ?>
            <?php $i = 0; foreach ($filters as $filter): ?>
                <?php $i++; ?>

                <?php
                $filters_child = \app\models\Filters::find()->where(['category_id' => $id])->andWhere(['parent_id' => $filter->id])->all();
//                $items = \yii\helpers\ArrayHelper::map($filters_child, 'id', 'name');




                $cat2 = new \app\models\Filters();
                $ml = new Multilevel();
//
                $filters_pr = array_column($filters_selected, 'filter_id1');
                $filters_pr2 = array_column($filters_selected, 'filter_id2');
                $filters_pr3 = array_column($filters_selected, 'filter_id3');
                $filters_pr4 = array_column($filters_selected, 'filter_id4');
                $filters_pr5 = array_column($filters_selected, 'filter_id5');
                $model_f->filter_id1 = $filters_pr;
                $model_f->filter_id2 = $filters_pr2;
                $model_f->filter_id3 = $filters_pr3;
                $model_f->filter_id4 = $filters_pr4;
                $model_f->filter_id5 = $filters_pr5;


                /**
                 * Делаем неактивными у который есть дочерние фильтры что бы не выбирал юзер
                 */
                foreach ($filters_child as $value){
                    if( $value->child){
                        $ttt = $value->id;
                        $disableDataArr[$ttt ] =  ['disabled' => true];
                    }

                }

                echo $form->field($model_f, 'filter_id'.$i)->dropDownList($ml->makeDropDown($filters_child , $cat2),
                    ['id' => 'filter-id', 'prompt' => 'Выбрать фильтр', 'class' => 'form-control required',
                        'options' => $disableDataArr
                    ]

                )->label($filter->name);
                ?>

            <?php endforeach; ?>
        <?php endif;?>


    <?php endif; ?>








    <div class="pod_view_t" style="width: 100%; padding: 5px; background-color: #1CB5A5; color: #fff; font-size: 20px; margin-bottom: 20px;  ">ДЛЯ РАЗДЕЛА БРЕНДЫ:</div>
    <?php
    $brands = \app\models\Brands::find()->all();
    $items = \yii\helpers\ArrayHelper::map($brands, 'id', 'name');
    ?>

    <?php echo $form->field($model, 'brands_id')->radioList(

        $items, ['separator' => '<br>']
    )->label('Бренд')
    ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'image')->fileInput() ?>



    <?= $form->field($model, 'content')->widget(CKEditor::className(), [

        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_sale')->textInput(['maxlength' => true]) ?>

    <!--    --><?//= $form->field($model, 'price_one')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <!--    --><?//= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->checkbox(['0', '1',]) ?>

    <?= $form->field($model, 'sale')->checkbox(['0', '1',]) ?>

    <?= $form->field($model, 'sale2')->checkbox(['0', '1',]) ?>




    <?= $form->field($model, 'sklad')->checkbox(['0', '1',]) ?>

    <!--    --><?//= $form->field($model, 'popular')->checkbox(['0', '1',]) ?>





    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>