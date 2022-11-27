<?php

use app\models\Rekening;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\RekeningSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rekenings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekening-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rekening', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rekening',
            'id_jenis_tabungan',
            'saldo',
            'id_nasabah',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Rekening $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_rekening' => $model->id_rekening]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
