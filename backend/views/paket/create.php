<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Paket $model */

$this->title = 'Create Paket';
$this->params['breadcrumbs'][] = ['label' => 'Pakets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
