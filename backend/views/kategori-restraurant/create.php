<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\KategoriRestraurant $model */

$this->title = 'Create Kategori Restraurant';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Restraurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-restraurant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
