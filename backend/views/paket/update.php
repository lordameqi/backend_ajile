<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paket $model */

$this->title = 'Update Paket: ' . $model->id_paket;
$this->params['breadcrumbs'][] = ['label' => 'Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_paket, 'url' => ['view', 'id_paket' => $model->id_paket]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
