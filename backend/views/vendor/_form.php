<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\KategoriRestraurant;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\rating;
use kartik\rating\StarRating;

/** @var yii\web\View $this */
/** @var app\models\Vendor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vendor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'rating')->widget(StarRating::classname(), [
    'pluginOptions' => ['size'=>'lg']
]); ?>

    <?= $form->field($model, 'foto_vendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longtitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kapasitas')->textInput(['type' => 'number'])->hint('dalam orang') ?>

    <?= $form->field($model, 'id_kategori')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(KategoriRestraurant::find()->all(),'id_kategori','nama_kategori'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Kategori'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>

    <?= $form->field($model, 'halal')->dropDownList([ 'halal' => 'Halal', 'non halal' => 'Non halal', ], ['prompt' => 'Halal or not?']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
