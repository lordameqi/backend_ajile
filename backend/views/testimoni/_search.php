<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TestimoniSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="testimoni-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_testimoni') ?>

    <?= $form->field($model, 'id_nasabah') ?>

    <?= $form->field($model, 'id_vendor') ?>

    <?= $form->field($model, 'deskripsi_testimoni') ?>

    <?= $form->field($model, 'bintang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
