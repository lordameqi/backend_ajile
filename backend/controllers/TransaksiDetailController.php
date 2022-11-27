<?php

namespace backend\controllers;

use app\models\TransaksiDetail;
use app\models\TransaksiDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiDetailController implements the CRUD actions for TransaksiDetail model.
 */
class TransaksiDetailController extends Controller
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
     * Lists all TransaksiDetail models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiDetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransaksiDetail model.
     * @param int $id_transaksi_detail Id Transaksi Detail
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_transaksi_detail)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_transaksi_detail),
        ]);
    }

    /**
     * Creates a new TransaksiDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TransaksiDetail();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_transaksi_detail' => $model->id_transaksi_detail]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TransaksiDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_transaksi_detail Id Transaksi Detail
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_transaksi_detail)
    {
        $model = $this->findModel($id_transaksi_detail);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_transaksi_detail' => $model->id_transaksi_detail]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TransaksiDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_transaksi_detail Id Transaksi Detail
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_transaksi_detail)
    {
        $this->findModel($id_transaksi_detail)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransaksiDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_transaksi_detail Id Transaksi Detail
     * @return TransaksiDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_transaksi_detail)
    {
        if (($model = TransaksiDetail::findOne(['id_transaksi_detail' => $id_transaksi_detail])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
