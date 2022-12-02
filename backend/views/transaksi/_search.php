<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Transaksi;

/** @var yii\web\View $this */
/** @var app\models\TransaksiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>



    <?= $form->field($model, 'kode_unik')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Transaksi::find()->all(),'id_transaksi','kode_unik'),
 'language' => 'en',
 'options' => ['placeholder' => 'List Kode'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?php // echo $form->field($model, 'id_paket') ?>

    <?php // echo $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'total_harga') ?>

    <?php // echo $form->field($model, 'is_wallet') ?>

    <?php // echo $form->field($model, 'id_culinary') ?>

    <?php // echo $form->field($model, 'tanggal_jam_pesan') ?>

    <?php // echo $form->field($model, 'exec_time') ?>

    <?php // echo $form->field($model, 'jumlah_orang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
