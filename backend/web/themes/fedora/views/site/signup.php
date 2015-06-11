<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\SignupForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'first_name') ?> 
                <?= $form->field($model, 'last_name') ?>
                <?= $form->field($model, 'gender') ?> 
                <i>Example: August 17, 1945</i>
                <?= $form->field($model, 'birth') ?>
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'image')->fileInput(); ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-default', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
