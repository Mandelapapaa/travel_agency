<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Package $model */

$this->title = $model->package_name;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>

<div class="package-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(
            'Update',
            ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']
        ) ?>

        <?= Html::a(
            'Delete',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>


    <?php if ($model->image): ?>

        <div class="mb-4">
            <?= Html::img(
                Yii::getAlias('@web/uploads/' . $model->image),
                [
                    'width' => '400',
                    'height' => '250',
                    'style' => 'object-fit:cover; border-radius:15px;'
                ]
            ) ?>
        </div>

    <?php endif; ?>


    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [

            [
                'attribute' => 'package_name',
                'label' => 'Package Name',
            ],

            [
                'attribute' => 'destination',
                'label' => 'Destination',
            ],

            [
                'attribute' => 'duration',
                'label' => 'Duration',
            ],

            [
                'attribute' => 'price',
                'label' => 'Price',
                'value' => number_format($model->price, 2) . ' TZS',
            ],

            [
                'attribute' => 'description',
                'label' => 'Description',
                'format' => 'ntext',
            ],

        ],
    ]) ?>

</div>