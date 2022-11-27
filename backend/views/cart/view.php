<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cart $model */

$this->title = $model->id_cart;
$this->params['breadcrumbs'][] = ['label' => 'Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_cart' => $model->id_cart], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_cart' => $model->id_cart], [
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
            'id_cart',
            'id_vendor',
            'id_nasabah',
            'id_paket',
            'id_culinary',
            'total_harga',
            'jumlah',
            'waktu_jam',
            'jumlah_orang',
        ],
    ]) ?>

</div>
