<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CommentPaper */
/* @var $form ActiveForm */
?>

<div class="site-formCommentPaper">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id') ->textInput(['style'=>'width:50%;'])?>
        <?= $form->field($model, 'paper_id') ->textInput(['style'=>'width:50%;'])?>
        <?= $form->field($model, 'content') ->textarea(['rows'=>3])?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-formCommentPaper -->
