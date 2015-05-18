<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\editable\Editable;
use dosamigos\ckeditor\CKEditor;
use kartik\grid\GridView;
use kartik\select2\Select2;
/* @var $this yii\web\View */

/* @var $model common\models\Paper */
/* @var $model common\models\CommentPaper */
/* @var $searchModel common\models\CommentPaperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */



/* @var $model common\models\Paper\Paper */

$this->title = $model->pre_paper;


?>
<div class="paper-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <p>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'attribute'=>'pre_paper',
            'format'=>'raw',
            'value'=>Html::a($model->pre_paper,['download','id'=>$model->id]),
        ],

        ],
    ])
    ?>
</div>

<div>
    
    <br>
</div>
<?php
$model = new \common\models\CommentPaper();


?>

            <?php
        $this->beginContent('../views/paper/_viewComment.php');
        $this->endContent();
            
            ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?=
$form->field($model, 'content')->widget(CKEditor::className(), [
    'options' => ['rows' => 6],
    'preset' => 'basic'
])
?>


<div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-default']) ?>
</div>

<?php ?>
<?php ActiveForm::end(); ?>
