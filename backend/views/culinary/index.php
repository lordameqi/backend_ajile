<?php

use app\models\Culinary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CulinarySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Culinaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="culinary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Culinary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_culinary',
            'nama_culinary',
            'harga',
            'foto_culinary',
            'id_vendor',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Culinary $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_culinary' => $model->id_culinary]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
