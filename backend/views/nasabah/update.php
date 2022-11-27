<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Nasabah $model */

$this->title = 'Update Nasabah: ' . $model->id_nasabah;
$this->params['breadcrumbs'][] = ['label' => 'Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nasabah, 'url' => ['view', 'id_nasabah' => $model->id_nasabah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nasabah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
