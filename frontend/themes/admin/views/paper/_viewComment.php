<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CommentPaper */
?>
<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
<div class="view">
    <b><?php
    if ($data->user_id == NULL) {
        echo "Anonim : " . CHtml::encode($data->content);
    } else {
        echo $data->user->username. " : " . CHtml::encode($data->content);
    }
?>
    </b>


</div>
<br>