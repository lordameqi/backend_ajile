<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Culinary $model */

$this->title = $model->id_culinary;
$this->params['breadcrumbs'][] = ['label' => 'Culinaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="culinary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_culinary' => $model->id_culinary], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_culinary' => $model->id_culinary], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_culinary',
            'nama_culinary',
            'harga',
            'foto_culinary',
            'id_vendor',
        ],
    ]) ?>

</div>
