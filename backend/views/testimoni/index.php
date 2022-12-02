<?php

use app\models\Testimoni;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TestimoniSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Testimonis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimoni-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Testimoni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_testimoni',
            'id_nasabah',
            'id_vendor',
            'deskripsi_testimoni:ntext',
            'bintang',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Testimoni $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_testimoni' => $model->id_testimoni]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
