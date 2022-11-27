<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Rekening;
use app\models\Vendor;
use app\models\Nasabah;
use app\models\Paket;
use app\models\Culinary;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_rekening')->textInput() ?>

    <?= $form->field($model, 'id_vendor')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Vendor::find()->all(),'id_vendor','nama'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Vendor'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?= $form->field($model, 'id_nasabah')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Nasabah::find()->all(),'id_nasabah','nama_nasabah'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Nasabah'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?= $form->field($model, 'kode_unik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_paket')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Paket::find()->all(),'id_paket','nama_paket'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Paket bundling...'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'sukses' => 'Sukses', 'gagal' => 'Gagal', 'pending' => 'Pending', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total_harga')->textInput() ?>

    <?= $form->field($model, 'is_wallet')->dropDownList([ 'true' => 'True', 'false' => 'False', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_culinary')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Culinary::find()->all(),'id_culinary','nama_culinary'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Makanan...'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?= $form->field($model, 'tanggal_jam_pesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exec_time')->textInput(['value' => date("d-m-Y h:i:s")]) ?>

    <?= $form->field($model, 'jumlah_orang')->textInput(['type' => 'number'])->hint('dalam orang') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
