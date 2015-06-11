<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use yii\helpers\BaseHtml;
use kartik\grid\GridView;
use common\models\User;
/* @var $this yii\web\View */

/* @var $model common\models\User */

/* @var $model common\models\User\User */

/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $searchModel common\models\PaperSearch */

$this->title = "Kartu Tanda Peserta";
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
<h1><?= Html::encode($this->title) ?></h1>
                                        <?php
                                        $News = new User;
                                        $News = User::find()->limit(5)->orderBy('id')
                                                ->all();
                                        ?>
                                                    <?php foreach ($News as $New) {
                                        ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
   
    </p>
    <div style="margin: 30px;">
    <img src="<?php echo Yii::getAlias('@profilurl') . "/" . $New->image; ?>" style="width: 50%;border-radius: 50%;"/>        
    </div>
    <?=
    DetailView::widget([
        'model' => $New,
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
                                                    <?php }?>
</div>
