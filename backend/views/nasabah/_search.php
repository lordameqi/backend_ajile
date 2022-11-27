<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NasabahSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nasabah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_nasabah') ?>

    <?= $form->field($model, 'nama_nasabah') ?>

    <?= $form->field($model, 'alamat_nasabah') ?>

    <?= $form->field($model, 'no_hp_nasabah') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'id_rekening') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
