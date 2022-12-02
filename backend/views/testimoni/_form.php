<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Testimoni $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="testimoni-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_nasabah')->textInput() ?>

    <?= $form->field($model, 'id_vendor')->textInput() ?>

    <?= $form->field($model, 'deskripsi_testimoni')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bintang')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
