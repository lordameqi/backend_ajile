<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Testimoni $model */

$this->title = $model->id_testimoni;
$this->params['breadcrumbs'][] = ['label' => 'Testimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="testimoni-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_testimoni' => $model->id_testimoni], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_testimoni' => $model->id_testimoni], [
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
            'id_testimoni',
            'id_nasabah',
            'id_vendor',
            'deskripsi_testimoni:ntext',
            'bintang',
        ],
    ]) ?>

</div>
