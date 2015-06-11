
<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;
use backend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use backend\controllers\SiteController;
use common\models\News;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $this yii\web\View */
/* @var $News common\models\News */
/* @var $News common\models\NewsSearch */
/* @var $News backend\controllers\SiteController */
/* @var $dataProvider yii\data\ActiveDataProvider */

AppAsset::register($this);


// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>

<html lang="en-US">
    

                                <?php
                                $News = new News;
                                $News = News::find()->limit(2)->orderBy('id ASC')
                                        ->all();
                                ?>

                                <?php foreach ($News as $New) {
                                    ?><div style="border-bottom:2px solid #ddd; ">
                                        <h1>
                                        <?= Html::encode("$New->title") ?>
                                    </h1><br>
                                    <div class="time">created at: <?= Html::encode("$New->date") ?> </div>
                                    <div class="setanimate" style=" float: left; margin: 10px;  ">
                                        <img src="<?php echo Yii::getAlias('@imageurl') . "/" . $New->picture; ?>"  style="width: 100%;  "/>
                                    </div>
                                    <div class="inti">
                                    <?= Html::encode("$New->content") ?>
                                    </div></div><br>
                                    <?php
                                }//LinkPager::widget(['pagination' => $pagination]) 
                                ?><br><br>	<br>

</html>