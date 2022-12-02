<?php

namespace backend\controllers;
use Yii;
use app\models\Transaksi;
use app\models\Rekening;
use app\models\TransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller
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
     * Lists all Transaksi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2()
    {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaksi model.
     * @param int $id_transaksi Id Transaksi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_transaksi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_transaksi),
        ]);
    }

    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Transaksi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_transaksi' => $model->id_transaksi]);
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
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
      //  {'id_rekening' :'abc', 'kode_unik':'abc', 'is_wallet':false,'culinary':[{'id_culinary:'asd'}]}
      //$calenderYear = Yii::$app->request->post('calender_year');
      $rekeningNasabah = Yii::$app->request->post('id_rekening');
      $kodeUnik = Yii::$app->request->post('kode_unik');
      $wallet = Yii::$app->request->post('is_wallet');
      $namaNasabah = Yii::$app->request->post('id_nasabah');
      $idPaket = Yii::$app->request->post('id_paket');
      $jumlah_orang = Yii::$app->request->post('jumlah_orang');
      $kulinary = Yii::$app->request->post('culinary');



      
      $model = new Transaksi();
      $model->id_rekening =  $rekeningNasabah;
      $model->kode_unik = $kodeUnik;
      $model->is_wallet = $wallet;
      $model->id_nasabah = $namaNasabah;
      $model->id_paket = $idPaket;
      $model->jumlah_orang = $jumlah_orang;
      $model->save();
      return $rekeningNasabah;

      $total = 0;
      foreach ($kulinary as $key => $value) {
        $detail_kulinary = Culinary()->find()->where(['id_culinary' => $value])->one();
        $total+=$detail_kulinary->harga;
        $modelTransaksi = new TransaksiDetail();
        $modelTransaksi->id_transaksi = $model->id_transaksi;
        $modelTransaksi->id_culinary = $value['id_culinary'];
        $modelTransaksi->save();
      }

    //   $model2 = new Rekening();
      $users = Rekening()->find()->where(['id_rekening' => $rekeningNasabah])->one();
      if($users->saldo >= $total){
        $users->saldo-= $total;
        $users->save();
        return array('status' => 'sukses');
      }else{
        return array('status' => 'gagal');
      }
   
    //   save();

    }
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    /**
     * Updates an existing Transaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_transaksi Id Transaksi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_transaksi)
    {
        $model = $this->findModel($id_transaksi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_transaksi' => $model->id_transaksi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Transaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_transaksi Id Transaksi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_transaksi)
    {
        $this->findModel($id_transaksi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_transaksi Id Transaksi
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_transaksi)
    {
        if (($model = Transaksi::findOne(['id_transaksi' => $id_transaksi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
