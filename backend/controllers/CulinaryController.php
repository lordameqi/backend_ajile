<?php

namespace backend\controllers;

use app\models\Culinary;
use app\models\Vendor;
use app\models\CulinarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CulinaryController implements the CRUD actions for Culinary model.
 */
class CulinaryController extends Controller
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
     * Lists all Culinary models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CulinarySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Culinary model.
     * @param int $id_culinary Id Culinary
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_culinary)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_culinary),
        ]);
    }

    public function actionView2($id_culinary)
    {
        $dbusers = New Culinary;
        $users = $dbusers->find()->where(['id_vendor' => $id_culinary])->with(['vendor'])->asArray()->all();

        // $dbusers2 = New Vendor;
        // $users2 = $dbusers2->find()->where(['id_vendor' => $id_culinary])->all();



        return $this->asJson(['culinary' => $users]);
    }

    /**
     * Creates a new Culinary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Culinary();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_culinary' => $model->id_culinary]);
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
        $model = new Culinary();
        $model->scenario = Culinary::SCENARIO_CREATE;
        $model->attributes = \yii::$app->request->post();
        
        if($model->validate())
      {

     $model->save();
       return array('status' => true, 'data'=> 'culinary record is successfully added');
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
     * Updates an existing Culinary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_culinary Id Culinary
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_culinary)
    {
        $model = $this->findModel($id_culinary);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_culinary' => $model->id_culinary]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Culinary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_culinary Id Culinary
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_culinary)
    {
        $this->findModel($id_culinary)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Culinary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_culinary Id Culinary
     * @return Culinary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_culinary)
    {
        if (($model = Culinary::findOne(['id_culinary' => $id_culinary])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
