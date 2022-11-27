<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Nasabah $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nasabah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_nasabah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_nasabah')->textInput() ?>

    <?= $form->field($model, 'no_hp_nasabah')->textInput(['type' => 'number','placeholder' => "dimulai dengan '62'"]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'L' => 'L', 'P' => 'P', ], ['prompt' => 'Pilih Jenis Kelamin..']) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true,'type' => 'number' ]) ?>

    <?php // $form->field($model, 'id_rekening')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
