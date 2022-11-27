<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Culinary $model */

$this->title = 'Update Culinary: ' . $model->id_culinary;
$this->params['breadcrumbs'][] = ['label' => 'Culinaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_culinary, 'url' => ['view', 'id_culinary' => $model->id_culinary]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="culinary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
