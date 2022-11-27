<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\JenisTabungan;
use app\models\Nasabah;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\number\NumberControl;

/** @var yii\web\View $this */
/** @var app\models\Rekening $model */
/** @var yii\widgets\ActiveForm $form */
$saveOptions = [
    'type' => 'text', 
    'label'=>'<label>Saved Value: </label>', 
    'class' => 'kv-saved',
    'readonly' => true, 
    'tabindex' => 1000
];
$dispOptions = ['class' => 'form-control kv-monospace'];
$saveCont = ['class' => 'kv-saved-cont'];
?>

<div class="rekening-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis_tabungan')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(JenisTabungan::find()->all(),'id_jenis_tabunugan','nama_tabungan'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Jenis Tabungan'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?= $form->field($model, 'saldo')->widget(NumberControl::classname(), [
    'maskedInputOptions' => [
        'prefix' => 'Rp. ',
        'suffix' => ' ,-',
        'allowMinus' => false
    ],
    'options' => $saveOptions,
    'displayOptions' => $dispOptions,
    'saveInputContainer' => $saveCont
]); ?>

    <?= $form->field($model, 'id_nasabah')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Nasabah::find()->all(),'id_nasabah','nama_nasabah'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Nasabah'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
