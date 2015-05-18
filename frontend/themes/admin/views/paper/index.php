<?php

use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

/* @var $searchModel common\models\PaperSearch */

/* @var $model common\models\Paper */

/* @var $model common\models\PaperSearch */

/* @var $searchModel common\models\Paper\PaperSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $form yii\widgets\ActiveForm */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!--<title>SNIKOM</title>-->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <!-- 
        Botany Template 
        http://www.templatemo.com/preview/templatemo_391_botany 
        -->
        <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="templatemo_style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />

        <!--  TEST SLIDER -->
        
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery-1.6.3.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 

        <!--END OF SLIDER -->
      <!-- Modernizr -->
        <script src="slider/modernizr.js"></script>
  
    </head>
    <body class="templatemo_juice_bg">
        <div id="">
            <div class="container" id="home">
                <div class="row col-wrap">			 
                    <div id="left_contain" class="col col-md-3 col-sm-12">
                         <div class="row">
                            <div class="col col-md-12">

                                <div class="templatemo_logo"></div>  

                                <!-- SLIDER -->
                                                            
<?php
$this->title = 'My Papers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'pre_paper',
            [
                'label'=>'pre_paper',
                'format' => 'raw',
                'value'=>function ($data) {
                     //return Html::url('site/index');
                     return Html::a($data->pre_paper,['download','id'=>$data->id_paper]);
                 },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
    
    <p>Upload Your Paper Here!<br>

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
            <?= $form->field($model, 'pre_paper')->fileInput(); ?>

        <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'upload' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
            <?php ActiveForm::end(); ?>

        
    

    

</div>
                                
                            </div>
                        </div>
                                       
                    </div>
                </div>
                <footer class="row credit">
                    <div class="col col-md-12">
                        <div id="templatemo_footer">
                            Copyright © 2084 <a href="#">SYPTK-06</a>
                        </div>
                    </div>
                </footer>
            </div>		
        </div>

        <!-- jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

        <!-- FlexSlider -->
        <script defer src="slider/jquery.flexslider.js"></script>

        <script type="text/javascript">
            $(function() {
                SyntaxHighlighter.all();
            });
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!-- templatemo 391 botany -->
    </body>
</html>