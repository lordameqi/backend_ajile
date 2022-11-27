<?php

namespace backend\controllers;

use app\models\JenisTabungan;
use app\models\JenisTabunganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenisTabunganController implements the CRUD actions for JenisTabungan model.
 */
class JenisTabunganController extends Controller
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
     * Lists all JenisTabungan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JenisTabunganSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisTabungan model.
     * @param int $id_jenis_tabunugan Id Jenis Tabunugan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_jenis_tabunugan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_jenis_tabunugan),
        ]);
    }

    /**
     * Creates a new JenisTabungan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JenisTabungan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_jenis_tabunugan' => $model->id_jenis_tabunugan]);
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
        $model = new JenisTabungan();
        $model->scenario = JenisTabungan::SCENARIO_CREATE;
        $model->attributes = \yii::$app->request->post();
        
        if($model->validate())
      {

     $model->save();
       return array('status' => true, 'data'=> 'jenis tabungan record is successfully added');
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
     * Updates an existing JenisTabungan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_jenis_tabunugan Id Jenis Tabunugan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_jenis_tabunugan)
    {
        $model = $this->findModel($id_jenis_tabunugan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_jenis_tabunugan' => $model->id_jenis_tabunugan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JenisTabungan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_jenis_tabunugan Id Jenis Tabunugan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_jenis_tabunugan)
    {
        $this->findModel($id_jenis_tabunugan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JenisTabungan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_jenis_tabunugan Id Jenis Tabunugan
     * @return JenisTabungan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_jenis_tabunugan)
    {
        if (($model = JenisTabungan::findOne(['id_jenis_tabunugan' => $id_jenis_tabunugan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
