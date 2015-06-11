<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\CommentPaperSearch;
use common\models\CommentPaper;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\CommentPaper */
/* @var $id common\models\User */

?>
<b>
    <?php 
//$comments = new CommentPaper();
$id=Yii::$app->user->identity->id;
//$comment->paper_id = $id;
$comments = CommentPaper::find()
                ->where(['paper_id'=>$id])
                ->orderBy('id DESC')
                ->all();
?>
</b>
<div class="view">
    
    
    <b><?php
    foreach($comments as $comment){
        echo "<div style='border-bottom:1px solid #ddd; padding:5px;margin:5px;'>";
    echo "<p class='pull-right'><small>
          Comment by ".$comment->user_id.
          "</small></p>";
    echo $comment->content;
   echo "</div>";
        
         }
         
         ?>
    

 

    </b>


</div>
<br>