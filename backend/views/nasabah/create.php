<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Nasabah $model */

$this->title = 'Create Nasabah';
$this->params['breadcrumbs'][] = ['label' => 'Nasabahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nasabah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
