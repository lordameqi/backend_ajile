<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Vendor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\number\NumberControl;

/** @var yii\web\View $this */
/** @var app\models\Culinary $model */
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

<div class="culinary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_culinary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->widget(NumberControl::classname(), [
    'maskedInputOptions' => [
        'prefix' => 'Rp. ',
        'suffix' => ' ,-',
        'allowMinus' => false
    ],
    'options' => $saveOptions,
    'displayOptions' => $dispOptions,
    'saveInputContainer' => $saveCont
]); ?>

    <?= $form->field($model, 'foto_culinary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_vendor')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Vendor::find()->all(),'id_vendor','nama'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Vendor'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
