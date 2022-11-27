<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Vendor $model */

$this->title = 'Update Vendor: ' . $model->id_vendor;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vendor, 'url' => ['view', 'id_vendor' => $model->id_vendor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
