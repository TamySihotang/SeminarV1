<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

/* @var $model common\models\Cost */

$this->title = $model->id_cost;

/* @var $model common\models\Cost\Cost */

$this->title = $model->id;

$this->params['breadcrumbs'][] = ['label' => 'Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Update', ['update', 'id' => $model->id_cost], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cost], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [

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

            'id_cost',

            'id',

            'accomodation',
            'register',
        ],
    ]) ?>

</div>
