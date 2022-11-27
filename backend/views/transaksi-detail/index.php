<?php

use app\models\TransaksiDetail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TransaksiDetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_transaksi_detail',
            'id_transaksi',
            'id_culinary',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_transaksi_detail' => $model->id_transaksi_detail]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
