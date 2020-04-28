<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int         $id
 * @property string      $title
 * @property null|string $imageUrl
 * @property null|float  $price
 * @property null|string $moneyType
 * @property string      $description
 * @property int         $created_by
 * @property int         $created_at
 * @property int         $updated_at
 * @property string      $category
 * @property Comment[]   $comments
 * @property User        $createdBy
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%post}}';
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
            [['title', 'description', 'created_by'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['created_by', 'created_at', 'updated_at'], 'integer'],
            [['title', 'imageUrl', 'moneyType', 'category'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'imageUrl' => 'Image Url',
            'price' => 'Price',
            'moneyType' => 'Money Type',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category' => 'Category',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \common\models\query\CommentQuery|\yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
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
     * @return \common\models\query\PostQuery the active query used by this AR class
     */
    public static function find()
    {
        return new \common\models\query\PostQuery(get_called_class());
    }
}
