<?php

namespace backend\controllers;

use app\models\Rekening;
use app\models\RekeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RekeningController implements the CRUD actions for Rekening model.
 */
class RekeningController extends Controller
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
     * Lists all Rekening models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RekeningSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rekening model.
     * @param int $id_rekening Id Rekening
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_rekening)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_rekening),
        ]);
    }

    /**
     * Creates a new Rekening model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Rekening();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_rekening' => $model->id_rekening]);
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
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model = new Rekening();
        $model->scenario = Rekening::SCENARIO_CREATE;
        $model->attributes = \yii::$app->request->post();
        
        if($model->validate())
      {

     $model->save();
       return array('status' => true, 'data'=> 'Rekening record is successfully added');
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
     * Updates an existing Rekening model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_rekening Id Rekening
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_rekening)
    {
        $model = $this->findModel($id_rekening);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_rekening' => $model->id_rekening]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rekening model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_rekening Id Rekening
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_rekening)
    {
        $this->findModel($id_rekening)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rekening model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_rekening Id Rekening
     * @return Rekening the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_rekening)
    {
        if (($model = Rekening::findOne(['id_rekening' => $id_rekening])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
