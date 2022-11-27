<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CartSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_cart') ?>

    <?= $form->field($model, 'id_vendor') ?>

    <?= $form->field($model, 'id_nasabah') ?>

    <?= $form->field($model, 'id_paket') ?>

    <?= $form->field($model, 'id_culinary') ?>

    <?php // echo $form->field($model, 'total_harga') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'waktu_jam') ?>

    <?php // echo $form->field($model, 'jumlah_orang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
