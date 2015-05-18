<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property string $title
 * @property string $tanggal_penting
 * @property string $judul_tanggal_penting
 * @property string $content
 * @property string $post_news
 * @property file $picture

 *
 * @property User $user
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'date'], 'required'],
            [['user_id'], 'integer'],
            [['date', 'tanggal_penting'], 'safe'],
            [['content'], 'string'],
            [['picture'],'file'],
            [['title'], 'string', 'max' => 64],
            [['judul_tanggal_penting'], 'string', 'max' => 200],
            [['post_news'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'title' => 'Title',
            'tanggal_penting' => 'Tanggal Penting',
            'judul_tanggal_penting' => 'Judul Tanggal Penting',
            'content' => 'Content',
            'post_news' => 'Post News',
            'picture'=>'picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
