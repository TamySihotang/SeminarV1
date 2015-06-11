<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 use dosamigos\ckeditor\CKEditor;
//use himiklab\ckeditor\CKEditor;
use common\models\News;
//use letyii\tinymce\Tinymce;
use moonland\tinymce\TinyMCE;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */

/* @var $model common\models\News */

/* @var $model common\models\News\News */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>
    
 
    <?= $form->field($model, 'title')->textInput(['maxlength' => 200]) ?>
    <?= $form->field($model, 'tanggal_penting')->textInput(['maxlength' => 200]) ?>
    <?= $form->field($model, 'picture')->widget(FileInput::classname(),[
    'options' => ['multiple' => true],
    'pluginOptions' =>[
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i>',
        'allowedFileExtensions' => ['png','jpg'],
    ],

    ]);

 ?>
        <?php
    	// $model = News::findOne(1);
	echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'preset' => 'full'
    ]) 
    ?>

   

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
