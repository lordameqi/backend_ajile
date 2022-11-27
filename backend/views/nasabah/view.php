<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Nasabah $model */

$this->title = $model->id_nasabah;
$this->params['breadcrumbs'][] = ['label' => 'Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nasabah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_nasabah' => $model->id_nasabah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_nasabah' => $model->id_nasabah], [
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
            'id_nasabah',
            'nama_nasabah',
            'alamat_nasabah',
            'no_hp_nasabah',
            'jenis_kelamin',
            'nik',
            'id_rekening',
        ],
    ]) ?>

</div>
