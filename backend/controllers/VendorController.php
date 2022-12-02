<?php

namespace backend\controllers;

use app\models\Vendor;
use app\models\VendorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendorController implements the CRUD actions for Vendor model.
 */
class VendorController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Vendor models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VendorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vendor model.
     * @param int $id_vendor Id Vendor
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_vendor)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_vendor),
        ]);
    }

    /**
     * Creates a new Vendor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vendor();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_vendor' => $model->id_vendor]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreate2()
    {
        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model = new Vendor();
        $model->scenario = Vendor:: SCENARIO_CREATE;
        $model->attributes = \yii::$app->request->post();
        
        if($model->validate())
      {

       $model->save();
       return array('status' => true, 'data'=> 'vendor record is successfully added');
      }
      else
      {
       return array('status'=>false,'data'=>$model->getErrors());    
      }

       
    }
    public function beforeAction($action) 
{ 
    $this->enableCsrfValidation = false; 
    return parent::beforeAction($action); 
}

    /**
     * Updates an existing Vendor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_vendor Id Vendor
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_vendor)
    {
        $model = $this->findModel($id_vendor);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_vendor' => $model->id_vendor]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vendor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_vendor Id Vendor
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_vendor)
    {
        $this->findModel($id_vendor)->delete();

        return $this->redirect(['index']);
    }

    public function actionRating()
    {
        $model = Vendor::find()
        ->orderBy([
            'rating'=>SORT_DESC,
           
        ])
        ->limit(3)
        ->all();
        return $this->asJson(['Restorant' => $model]);

    }

    public function actionJarak()
    {
        $model = Vendor::find()
        ->orderBy([
            'jarak'=>SORT_ASC,
           
        ])
        ->limit(3)
        ->all();
        return $this->asJson(['Restorant' => $model]);

    }

    public function actionVendorall()
    {
        $model = Vendor::find()->with(['kategori'])->asArray()
        ->all();
        return $this->asJson(['Restorant' => $model]);

    }

    public function actionVendorcari($nama)
    {
        $model = Vendor::find()
        ->where(['nama'=>$nama])
        ->one();
        return $this->asJson(['Restorant' => $model]);

    }

    /**
     * Finds the Vendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_vendor Id Vendor
     * @return Vendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_vendor)
    {
        if (($model = Vendor::findOne(['id_vendor' => $id_vendor])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
