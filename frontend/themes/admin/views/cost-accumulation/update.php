<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

/* @var $model common\models\CostAccumulation */

$this->title = 'Update Cost Accumulation: ' . ' ' . $model->id_accumulation;
$this->params['breadcrumbs'][] = ['label' => 'Cost Accumulations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_accumulation, 'url' => ['view', 'id' => $model->id_accumulation]];

/* @var $model common\models\CostAccumulation\CostAccumulation */

$this->title = 'Update Cost Accumulation: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cost Accumulations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cost-accumulation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
