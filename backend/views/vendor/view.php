<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Vendor $model */

$this->title = $model->id_vendor;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vendor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_vendor' => $model->id_vendor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_vendor' => $model->id_vendor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_vendor',
            'nama',
            'alamat',
            'no_hp',
            'rating',
            'foto_vendor',
            'latitude',
            'longtitude',
            'kapasitas',
            'id_kategori',
            'halal',
        ],
    ]) ?>

</div>
