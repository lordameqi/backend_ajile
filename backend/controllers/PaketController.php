<?php

namespace backend\controllers;

use app\models\Paket;
use app\models\PaketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaketController implements the CRUD actions for Paket model.
 */
class PaketController extends Controller
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
     * Lists all Paket models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PaketSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paket model.
     * @param int $id_paket Id Paket
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_paket)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_paket),
        ]);
    }

    /**
     * Creates a new Paket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Paket();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_paket' => $model->id_paket]);
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
        $model = new Paket();
        $model->scenario = Paket::SCENARIO_CREATE;
        $model->attributes = \yii::$app->request->post();
        
        if($model->validate())
      {

     $model->save();
       return array('status' => true, 'data'=> 'paket record is successfully added');
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

public function actionPaketall()
    {
        $model = Paket::find()
        ->all();
        return $this->asJson(['Paket' => $model]);
    }

    /**
     * Updates an existing Paket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_paket Id Paket
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_paket)
    {
        $model = $this->findModel($id_paket);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_paket' => $model->id_paket]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_paket Id Paket
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_paket)
    {
        $this->findModel($id_paket)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_paket Id Paket
     * @return Paket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_paket)
    {
        if (($model = Paket::findOne(['id_paket' => $id_paket])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
