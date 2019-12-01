<?php
/**
 * Created by PhpStorm.
 * User: АЛЕКСАНДР
 * Date: 17.11.2018
 * Time: 12:02
 */

namespace app\controllers;

use app\models\Category;
use app\models\PodguznikiProduct;
use app\models\PodguznikiProductSearch;
use Codeception\Util\Debug;
use Yii;



class CategoryController extends AppController
{


    public function actionView($alias)
    {

        // Если аякс
        if(Yii::$app->request->isAjax && !Yii::$app->request->get()['_pjax'] ) {
//             \Debug(Yii::$app->request->get());
            $this->layout = false;


            $category = Category::find()->where(['alias' => $alias])->one();
            if(empty($category)){
                throw new \yii\web\HttpException(404, 'Такая категория не существует');
            }

            $this->setMeta('Магазин Подгузники в Гродно | ' .  $category->name, $category->keywords, $category->description);

            $searchModel = new PodguznikiProductSearch();
            if(Yii::$app->request->get('price')) {
                $searchModel->price = Yii::$app->request->get('price')[1]['value'];
                $searchModel->price2 = Yii::$app->request->get('price')[2]['value'];
            }

            /**
             * Создаем кол-во фильтров (дописваются в js и в поисковую модель)
             * упрощаем в цикле
             */
            for ($i = 1; $i < 6; $i++){
                if(Yii::$app->request->get('filters'.$i)){
                    $checkbox_filters[$i] = array_splice(Yii::$app->request->get('filters' .$i), 1);
//                    \Debug($checkbox_filters);
                    $searchModel->{'filters' . $i} =  $checkbox_filters[$i];

                }
            }

            /**
             * Создаем кол-во фильтров (дописваются в js и в поисковую модель)
             * без цикла
             */
//            if(Yii::$app->request->get('filters1')){
//                $checkbox_filters1 = array_splice(Yii::$app->request->get('filters1'), 1);
//
//                $searchModel->filters1 =  $checkbox_filters1;
//            }
//            if(Yii::$app->request->get('filters2')){
//                $checkbox_filters2 = array_splice(Yii::$app->request->get('filters2'), 1);
//
//
//                $searchModel->filters2 =  $checkbox_filters2;
//            }
//            if(Yii::$app->request->get('filters3')){
//                $checkbox_filters3 = array_splice(Yii::$app->request->get('filters3'), 1);
//
//
//                $searchModel->filters3 =  $checkbox_filters3;
//            }
//            if(Yii::$app->request->get('filters4')){
//                $checkbox_filters4 = array_splice(Yii::$app->request->get('filters4'), 1);
//
//
//                $searchModel->filters4 =  $checkbox_filters4;
//            }
//            if(Yii::$app->request->get('filters5')){
//                $checkbox_filters5 = array_splice(Yii::$app->request->get('filters5'), 1);
//
//
//                $searchModel->filters5 =  $checkbox_filters5;
//            }


            /**
             * Сортировка
             */
            if(Yii::$app->request->get('main_sort')){
//
                if(Yii::$app->request->get('main_sort')[1]['value'] == 'price'){
                    $searchModel->main_sort =  SORT_ASC;
                }
                else if (Yii::$app->request->get('main_sort')[1]['value'] == '-price'){
                    $searchModel->main_sort =  SORT_DESC;
                }
                else{
                    $searchModel->main_sort =  null;
                }

            }



            /**
             * Записываем вид в сессию
             */
            $session = \Yii::$app->session;
            if(isset(Yii::$app->request->get()['view'])){
                $session->set('view', Yii::$app->request->get()['view']);
            }


            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




            return $this->render('ajax',
                [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'category' =>  $category,

                ]);

        }

        else{
            $category = Category::find()->where(['alias' => $alias])->one();
            if(empty($category)){
                throw new \yii\web\HttpException(404, 'Такая категория не существует');
            }
            if (!empty($category->parent)){
                $category_parent =  $category->parent->name;
            }
            $this->setMeta('Магазин Подгузники в Гродно | ' . $category_parent . ' | ' . $category->name, $category->keywords, $category->description);

            $searchModel = new PodguznikiProductSearch();



            /**
             * Создаем кол-во фильтров (дописваются в js и в поисковую модель)
             * упрощаем в цикле
             */
            for ($i = 1; $i < 6; $i++){
                if(Yii::$app->request->get('filters'.$i)){
                    $checkbox_filters[$i] = Yii::$app->request->get('filters' .$i);
//                    \Debug($checkbox_filters);
                    $searchModel->{'filters' . $i} =  $checkbox_filters[$i];

                }
            }

            /**
             * Создаем кол-во фильтров (дописваются в js и в поисковую модель)
             * без цикла
             **/

//            if(Yii::$app->request->get('filters1')){
//                $checkbox_filters = Yii::$app->request->get('filters1');
//                $searchModel->filters1 =  $checkbox_filters;
//            }
//            if(Yii::$app->request->get('filters2')){
//                $checkbox_filters2 = Yii::$app->request->get('filters2');
//                $searchModel->filters2 =  $checkbox_filters2;
//            }
//            if(Yii::$app->request->get('filters3')){
//                $checkbox_filters3 = Yii::$app->request->get('filters3');
//                $searchModel->filters3 =  $checkbox_filters3;
//            }
//            if(Yii::$app->request->get('filters4')){
//                $checkbox_filters4 = Yii::$app->request->get('filters4');
//                $searchModel->filters4 =  $checkbox_filters4;
//            }
//            if(Yii::$app->request->get('filters5')){
//                $checkbox_filters5 = Yii::$app->request->get('filters5');
//                $searchModel->filters5 =  $checkbox_filters5;
//            }


            /**
             * Сортировка
             */
            if(Yii::$app->request->get('main_sort')){
                if(Yii::$app->request->get('main_sort')[1]['value'] == 'price'){
                    $searchModel->main_sort =  SORT_ASC;
                }
                else if (Yii::$app->request->get('main_sort')[1]['value'] == '-price'){
                    $searchModel->main_sort =  SORT_DESC;
                }
                else{
                    $searchModel->main_sort =  null;
                }

            }

            if(Yii::$app->request->get('price')) {
                $price = Yii::$app->request->get('price');
                $price2 = Yii::$app->request->get('price2');
                $searchModel->price = $price;
                $searchModel->price2 = $price2;
            }


            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $min_price = PodguznikiProduct::find()->where(['category_id' => $category->id])->min('price');
            $max_price = PodguznikiProduct::find()->where(['category_id' => $category->id])->max('price');

//            $model = $dataProvider->sort->attributes;


            return $this->render('view',
                [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'category' =>  $category,
                    'min_price' => $min_price,
                    'max_price' => $max_price,
                ]);


        }

    }




}