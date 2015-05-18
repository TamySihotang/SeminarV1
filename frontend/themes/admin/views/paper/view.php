<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */

/* @var $model common\models\Paper */
/* @var $model common\models\CommentPaper */
/* @var $searchModel common\models\CommentPaperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $model->id_paper;

/* @var $model common\models\Paper\Paper */

//$this->title = $model->id;

$this->params['breadcrumbs'][] = ['label' => 'Papers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Update', ['update', 'id' => $model->id_paper], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_paper], [
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

//            'id_paper',
//            'user_id',
            'pre_paper',
//            'final_paper',
//            'status',
//            'modified_time',
        ],
    ]) ?>
</div>

<div>
    <?php
    
        $searchModel = new common\models\CommentPaperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        
        
    ?>
    
       <?= GridView::widget([
           'dataProvider' => $dataProvider,
//         'filterModel' => $searchModel,
           'columns' => [
//                     'user_id',
//                     'id_comment',
                     'content',
           ],
//        
    ]); ?>
</div>
