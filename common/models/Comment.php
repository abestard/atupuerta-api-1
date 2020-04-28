<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int    $id
 * @property int    $start
 * @property int    $created_by
 * @property int    $post_id
 * @property string $text
 * @property int    $created_at
 * @property int    $updated_at
 * @property Post   $post
 * @property User   $createdBy
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start', 'created_by', 'post_id', 'text'], 'required'],
            [['start', 'created_by', 'post_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start' => 'Start',
            'created_by' => 'Created By',
            'post_id' => 'Post ID',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \common\models\query\PostQuery|\yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \common\models\query\UserQuery|\yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     *
     * @return \common\models\query\CommentQuery the active query used by this AR class
     */
    public static function find()
    {
        return new \common\models\query\CommentQuery(get_called_class());
    }
}
