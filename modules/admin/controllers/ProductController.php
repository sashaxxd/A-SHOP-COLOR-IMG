<?php

namespace app\modules\admin\controllers;

use app\models\Alias;
use app\models\ProductFilters;
use Codeception\Util\Debug;
use richardfan\sortable\SortableAction;
use Yii;
use app\modules\admin\models\Product;
use app\modules\admin\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{

    public function actions(){
        return [
            'sortItem' => [
                'class' => SortableAction::className(),
                'activeRecordClassName' => Product::className(),
                'orderColumn' => 'sortOrder',
            ],
            // your other actions
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {



        $model = new Product();
        $alias = Alias::str2url(Yii::$app->request->post('Product')['name']);
        $model->alias = $alias;


        /**
         * Цена за штуку
         */
        $price = Yii::$app->request->post('Product')['price'];
        $count = Yii::$app->request->post('Product')['count'];

        if($price  && $count){
            $price_one = ($price / $count);
            $model->price_one = $price_one;
        }



        $model_f = new ProductFilters();


        if ($model->load(Yii::$app->request->post()) && $model->save() ) { //&& $model->save
//           \Debug(Yii::$app->request->post()
//           );

            $model->image = UploadedFile::getInstance($model, 'image');

            if ($model->image) {
                $model->upload();
            }

            $filters = Yii::$app->request->post()['ProductFilters'];$filters = array_values($filters);
            $model_f->product_id = $model->id;
            $model_f->filter_id1 = $filters[0];
            $model_f->filter_id2 = $filters[1];
            $model_f->filter_id3 = $filters[2];
            $model_f->filter_id4 = $filters[3];
            $model_f->filter_id5 = $filters[4];


            $model_f->save();





            Yii::$app->session->setFlash('success', 'Товар создан');
            return $this->redirect(['view', 'id' => $model->id]);


        }


        //Выводим фильтры
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $radio = Yii::$app->request->get('radio');
            $model->category_id = $id;

            return $this->renderAjax('create', [
                'model' => $model,
                'model_f' => $model_f,
                'id' => $id,
                'radio' => $radio,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
            'model_f' => $model_f,
        ]);

    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $alias = Alias::str2url(Yii::$app->request->post('Product')['name']);
        $model->alias = $alias;


        /**
         * Цена за штуку
         */
        $price = Yii::$app->request->post('Product')['price'];
        $count = Yii::$app->request->post('Product')['count'];

        if($price  && $count){
            $price_one = ($price / $count);
            $model->price_one = $price_one;
        }



        $model_f = new ProductFilters();
        $filters_selected = ProductFilters::find()->select('filter_id1, filter_id2, filter_id3, filter_id4, filter_id5')->where(['product_id' => $id])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');


            if (!empty($model->image)) {
                $this->findModel($id)->removeImages();
            }


            if ($model->image) {
                $model->upload();
            }
            /**
             * Удаляем связанную таблицу с фильтрами
             */
            $model->beforeDelete();

            $filters = Yii::$app->request->post()['ProductFilters'];$filters = array_values($filters);
            $model_f->product_id = $model->id;
            $model_f->filter_id1 = $filters[0];
            $model_f->filter_id2 = $filters[1];
            $model_f->filter_id3 = $filters[2];
            $model_f->filter_id4 = $filters[3];
            $model_f->filter_id5 = $filters[4];


            $model_f->save();


            Yii::$app->session->setFlash('success', 'Товар изменен');
            return $this->redirect(['view', 'id' => $model->id]);


        }


        //Выводим фильтры
        if (Yii::$app->request->isAjax) {
            $id_up = Yii::$app->request->get('id_up');

            $model = $this->findModel($id);
            $model->category_id = $id_up;
            $model_f = new ProductFilters();
            return $this->renderAjax('update', [
                'model' => $model,
                'model_f' => $model_f,
                'id_up' => $id_up,

            ]);
        }


        return $this->render('update', [
            'model' => $model,
            'model_f' => $model_f,
            'filters_selected' => $filters_selected,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->removeImages();
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Товар удален');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
