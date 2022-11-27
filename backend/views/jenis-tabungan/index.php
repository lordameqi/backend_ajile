<?php

use app\models\JenisTabungan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\JenisTabunganSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jenis Tabungans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-tabungan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jenis Tabungan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jenis_tabunugan',
            'nama_tabungan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JenisTabungan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_jenis_tabunugan' => $model->id_jenis_tabunugan]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
