<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JenisTabungan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jenis-tabungan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_tabungan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
