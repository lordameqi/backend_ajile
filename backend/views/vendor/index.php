<?php

use app\models\Vendor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\VendorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_vendor',
            'nama',
            'alamat',
            'no_hp',
            'rating',
            //'foto_vendor',
            //'latitude',
            //'longtitude',
            //'kapasitas',
            //'id_kategori',
            //'halal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Vendor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_vendor' => $model->id_vendor]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
