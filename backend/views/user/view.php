<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\helpers\BaseHtml;
/* @var $this yii\web\View */

/* @var $model common\models\User */

/* @var $model common\models\User\User */


$this->title = $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
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
