<?php

use app\models\KategoriRestraurant;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\KategoriRestraurantSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategori Restraurants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-restraurant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kategori Restraurant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kategori',
            'nama_kategori',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, KategoriRestraurant $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_kategori' => $model->id_kategori]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
