<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\helpers\BaseHtml;
use kartik\grid\GridView;
/* @var $this yii\web\View */

/* @var $model common\models\User */

/* @var $model common\models\User\User */

/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $searchModel common\models\PaperSearch */

$this->title = $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?php

echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Cetak Kartu Peserta', ['/user/mpdf-demo-1'], [
    'class' => 'btn btn-default',
    'target' => '_blank',
    'data-toggle' => 'tooltip',
    'title' => 'Will open the generated PDF file in a new window'
]);
?>
    </p>
    <div style="margin: 30px;">
    <img src="<?php echo Yii::getAlias('@profilurl') . "/" . $model->image; ?>" style="width: 50%;border-radius: 50%;"/>        
    </div>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            'first_name',
            'last_name',
            'username', 
            'email:email',
//            'status',
            'gender',
            'birth',
            'phone',
          
        ],
    ])
    ?>

</div>
