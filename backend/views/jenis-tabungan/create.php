<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JenisTabungan $model */

$this->title = 'Create Jenis Tabungan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tabungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-tabungan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
