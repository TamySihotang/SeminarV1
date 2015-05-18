
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\Pagination;
use common\models\News;

/* @var $this yii\web\View */

/* @var $searchModel common\models\NewsSearch */

/* @var $searchModel common\models\News\NewsSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<!DOCTYPE html>
<html>
                                <?php
                                $News = new News;
                                $News = News::find()->limit(7)->orderBy('date DESC')
                                        ->all();
                                ?>
                                    <?php foreach ($News as $New) {
                                    ?><div style="border-bottom:3px solid #ddd;margin: 10px;"><br>
                                        <div class="title" style="font-size:20px;text-align: justify">
                                        <?= Html::encode("$New->title") ?>
                                    </div><br>
                                    <div class="time">created at: <?= Html::encode("$New->date") ?> </div>
<!--                                    <div class="setanimate" style=" float: left; margin: 10px;  ">
                                        <img src="
                                            <?php echo Yii::getAlias('@imageurl') . "/" . $New->picture; ?>" class="img-circle" style="width: 100%"/>
</div>-->
                                            <div class="inti">
                                      <?= Html::encode(implode(' ', array_slice(explode(' ', $New->content), 0, 20))) ?><br>
                                    <?= Html::a('Read More', ['view', 'id' => $New->id], ['class' => 'btn btn-danger']) ?>
                                            </div></div>
                                    <?php
                                }//LinkPager::widget(['pagination' => $pagination]) 
                                ?><br><br>	

    </html>
