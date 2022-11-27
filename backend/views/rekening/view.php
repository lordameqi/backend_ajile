<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Rekening $model */

$this->title = $model->id_rekening;
$this->params['breadcrumbs'][] = ['label' => 'Rekenings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rekening-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_rekening' => $model->id_rekening], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_rekening' => $model->id_rekening], [
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
            'id_rekening',
            'id_jenis_tabungan',
            'saldo',
            'id_nasabah',
        ],
    ]) ?>

</div>
