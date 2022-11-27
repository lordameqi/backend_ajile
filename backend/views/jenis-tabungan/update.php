<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JenisTabungan $model */

$this->title = 'Update Jenis Tabungan: ' . $model->id_jenis_tabunugan;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tabungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_tabunugan, 'url' => ['view', 'id_jenis_tabunugan' => $model->id_jenis_tabunugan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-tabungan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
