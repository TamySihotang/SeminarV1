<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

/* @var $model common\models\User */

/* @var $model common\models\User\User */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    


    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    
    <i>Example: August 17, 1945</i>
    <?= $form->field($model, 'birth') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'image')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
