<?php

use app\models\Nasabah;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\NasabahSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nasabahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nasabah-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nasabah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_nasabah',
            'nama_nasabah',
            'alamat_nasabah',
            'no_hp_nasabah',
            'jenis_kelamin',
            //'nik',
            //'id_rekening',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Nasabah $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_nasabah' => $model->id_nasabah]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
