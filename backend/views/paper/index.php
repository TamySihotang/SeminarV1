<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\BaseHtml;
use yii\widgets\LinkPager;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use common\models\CostAccumulation;
use kartik\widgets\FileInput
/* @var $this yii\web\View */

/* @var $searchModel common\models\PaperSearch */

/* @var $model common\models\Paper */

/* @var $model common\models\PaperSearch */

/* @var $searchModel common\models\Paper\PaperSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $form yii\widgets\ActiveForm */
?><h1>
<?php
$this->title = 'My Papers';
?>
    <!--<link rel="stylesheet" type="text/css" href='admin/css/bootstrap.css' />-->

</h1>
<div class="paper-index">
    <div class="news_3"><p>
        <h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
        <br>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showHeader' => false,
    'showFooter' => true,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'label' => 'pre_paper',
            'format' => 'raw',
            'value' => function ($data) {
        //return Html::url('site/index');
        return Html::a($data->pre_paper, ['download', 'id' => $data->id]);
    },
        ],
        ['class' => 'kartik\grid\ActionColumn'],
    ],
])
?>


        <h3><i>Upload Your Paper Here!!!</i></h3><br>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($model, 'pre_paper')->widget(FileInput::classname(),[
    'options' => ['multiple' => true],
    'pluginOptions' =>[
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i>',
        'allowedFileExtensions' => ['pdf'],
    ],

    ]);

 ?>
        <br>
        <div class="form-group">
      
        

<?php
$Cost_accumulations = new CostAccumulation;
$Cost_accumulations = CostAccumulation::find()->limit(1)->orderBy('id DESC')
        ->all();
?>
 
            <?php foreach ($Cost_accumulations as $Cost) {
                                    ?>
                                     
                                    <?= Html::a('Daftar Bayar', ['cost'], ['class' => 'btn btn-default']) ?>
                                            </div></div>
                                    <?php
                                }//LinkPager::widget(['pagination' => $pagination]) 
                                ?>

        </div>

            <?php ActiveForm::end(); ?>



