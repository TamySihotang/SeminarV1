<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

/* @var $model common\models\Paper */

/* @var $model common\models\Paper\Paper */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-form">
   

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    
    
    <?= $form->field($model, 'user_id')->textInput() ?>
    
    <?= $form->field($model, 'final_paper')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'pre_paper')->fileInput(); ?>
    
    <?= $form->field($model, 'status')->textInput() ?>

    

    <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
