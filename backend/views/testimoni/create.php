<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Testimoni $model */

$this->title = 'Create Testimoni';
$this->params['breadcrumbs'][] = ['label' => 'Testimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimoni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
