<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rekening $model */

$this->title = 'Update Rekening: ' . $model->id_rekening;
$this->params['breadcrumbs'][] = ['label' => 'Rekenings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rekening, 'url' => ['view', 'id_rekening' => $model->id_rekening]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rekening-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
