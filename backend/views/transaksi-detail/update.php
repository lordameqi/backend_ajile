<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TransaksiDetail $model */

$this->title = 'Update Transaksi Detail: ' . $model->id_transaksi_detail;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transaksi_detail, 'url' => ['view', 'id_transaksi_detail' => $model->id_transaksi_detail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
