<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

/* @var $model common\models\News */

/* @var $model common\models\News\News */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
 
    <?= $form->field($model, 'title')->textInput(['maxlength' => 200]) ?>




    <?= $form->field($model, 'content')->textarea(['cols' => 6, 'rows' => 10, 'maxlength' => 10000]) ?>


   
<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
