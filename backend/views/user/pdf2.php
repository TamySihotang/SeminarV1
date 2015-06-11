<?php
use common\models\User;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Kartu Tanda Peserta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <?php
    $model = new User();
    ?>
    <body>
        <table style="width:100%; background-color: #FFFF99;" border>
            <tr>
                <td style="font-family: georgia; font-size: 30px; padding-bottom: 10px; padding-top: 10px;">
                    <img src="images/S.png" style="width:170px; height:80px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kartu Tanda Peserta Seminar<br></td>
            </tr>
        </table>
        <table style="width:100%; background-color: #FFFFCC; height: 500px; " border>
            <tr>
                <td>
                	<br>
                	<center><img src="images/b.jpg"  width="250" height="250" border="2"></center>
                </td>
            </tr>
        </table>
        <table style="width:100%; background-color: #FFFFCC; height: 500px; padding-right: 100px; font-family:monospace" >
            <tr>
                <td>
                	<br>
                	&nbsp;&nbsp;&nbsp;
                	Nama &nbsp;&nbsp;&nbsp;&nbsp;:
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;
                    Email&nbsp;&nbsp;&nbsp;&nbsp;: <?= Html::encode("$model->email");?>
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;
                    Gender&nbsp;&nbsp;&nbsp;:
                    <br>
                    <br>
                    
                    &nbsp;&nbsp;&nbsp;
                    Birth&nbsp;&nbsp;&nbsp;&nbsp;:
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;
                    Phone&nbsp;&nbsp;&nbsp;&nbsp;:
                    <br>
                    <br>
                    <br>
            </tr></td></table>      
        <table style="width:100%; background-color: #FFFFCC; height: 500px; padding-left: 400px; font-family: monospace" >
            <tr>
                <td>
                
                ttd,
                <br><br><br><br><center> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    (________________)<br><br>
                    
            </td>
            </tr>
        </table>
        </body>
</html>
