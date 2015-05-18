<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paper".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $pre_paper
 * @property string $final_paper
 * @property string $status
 * @property string $modified_time
 *
 * @property file $pre_paper 
 * @property CommentPaper[] $commentPapers
 * @property CostAccumulation[] $costAccumulations
 * @property User $user
 */
class Paper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    CONST STATUS_BAYAR_SUDAH = 'sudah bayar';
    CONST STATUS_BAYAR_BELUM = 'belum bayar';
    
    public static function tableName()
    {
        return 'paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'modified_time'], 'required'],
            [['user_id'], 'integer'],
            [['pre_paper'],'file'],
            [['modified_time'], 'safe'],
            [['pre_paper', 'final_paper', 'status'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Paper',
            'user_id' => 'User ID',
//            'pre_paper' => 'Pre Paper',
            'final_paper' => 'Final Paper',
            'status' => 'Status',
            'modified_time' => 'Modified Time',
            'pre_paper'=>'Pre Paper'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentPapers()
    {
        return $this->hasMany(CommentPaper::className(), ['paper_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostAccumulations()
    {
        return $this->hasMany(CostAccumulation::className(), ['paper_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
