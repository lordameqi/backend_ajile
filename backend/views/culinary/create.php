<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Culinary $model */

$this->title = 'Create Culinary';
$this->params['breadcrumbs'][] = ['label' => 'Culinaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="culinary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
