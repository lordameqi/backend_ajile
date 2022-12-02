<?php

namespace backend\controllers;

use app\models\Testimoni;
use app\models\TestimoniSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestimoniController implements the CRUD actions for Testimoni model.
 */
class TestimoniController extends Controller
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
     * Lists all Testimoni models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TestimoniSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTestimoniall()
    {
        $model = Testimoni::find()->with(['vendor'])->with(['nasabah'])->asArray()
        ->all();
        // print_r($model);
        // exit();
        return $this->asJson(['Testimoni' => $model]);

    }

    public function beforeAction($action) 
{ 
    $this->enableCsrfValidation = false; 
    return parent::beforeAction($action); 
}

    /**
     * Displays a single Testimoni model.
     * @param int $id_testimoni Id Testimoni
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_testimoni)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_testimoni),
        ]);
    }

    /**
     * Creates a new Testimoni model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Testimoni();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_testimoni' => $model->id_testimoni]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Testimoni model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_testimoni Id Testimoni
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_testimoni)
    {
        $model = $this->findModel($id_testimoni);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_testimoni' => $model->id_testimoni]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Testimoni model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_testimoni Id Testimoni
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_testimoni)
    {
        $this->findModel($id_testimoni)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Testimoni model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_testimoni Id Testimoni
     * @return Testimoni the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_testimoni)
    {
        if (($model = Testimoni::findOne(['id_testimoni' => $id_testimoni])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
