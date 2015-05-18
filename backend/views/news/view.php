<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\AppAsset;
/* @var $this yii\web\View */

/* @var $model common\models\News */
/* @var $this yii\web\View */


/* @var $model common\models\News\News */

$this->title = $model->title;



//$this->title = $model->id_cost;


//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <div class="title"><?= Html::encode($this->title) ?></div>
    
  

    <p><br>
        
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
             'class' => 'btn btn-default',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
       
       
    </p>
    <div style="float:left; margin: 30px">
    <img src="<?php echo Yii::getAlias('@imageurl') . "/" . $model->picture; ?>" style="width: 100%"/>
    </div>
    <div class="inti">
    <?= Html::encode("$model->content") ?>
    </div>  

</div>
