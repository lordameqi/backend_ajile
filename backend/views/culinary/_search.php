<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CulinarySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="culinary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_culinary') ?>

    <?= $form->field($model, 'nama_culinary') ?>

    <?= $form->field($model, 'harga') ?>

    <?= $form->field($model, 'foto_culinary') ?>

    <?= $form->field($model, 'id_vendor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
