<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Cost;
use common\models\CostAccumulation;

/* @var $this yii\web\View */

/* @var $searchModel common\models\CostAccumulationSearch */

/* @var $searchModel common\models\CostAccumulation\CostAccumulationSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pembayaran';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-accumulation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <?php
    $Cost_accumulations = new CostAccumulation;
    $Cost_accumulations = CostAccumulation::find()->limit(1)->orderBy('id DESC')
            ->all();
    ?>
    <?php foreach ($Cost_accumulations as $Cost) {
        ?>
    <div class="inti">
            Berikut adalah daftar pembayaran yang harus di bayar oleh peserta Seminar<br><br>
            
            Alamat pembayaran:<br><br>

            Bank Mandiri Cabang Balige<br><br>

            No. Rekening: 107-00-0717003-0<br><br>

            Atas nama    : Rusneni Vitaria<br><br>
        

Total Harga: Rp.<?= Html::encode("$Cost->total") ?>
</div>


        <?php
    }//LinkPager::widget(['pagination' => $pagination]) 
    ?>

</div>

