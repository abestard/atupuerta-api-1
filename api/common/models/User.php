<?php

namespace api\common\models;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int         $id
 * @property string      $username
 * @property string      $auth_key
 * @property string      $password_hash
 * @property null|string $password_reset_token
 * @property string      $email
 * @property int         $status
 * @property int         $created_at
 * @property int         $updated_at
 * @property null|string $verification_token
 * @property null|string $phone_number
 * @property null|string $movil_number
 * @property null|int    $is_provider
 */

 // @property Comment[]   $comments
 // @property Post[]      $posts

class User extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $r = parent::rules();

        return array_merge($r, [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_provider'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'phone_number', 'movil_number'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'phone_number' => 'Phone Number',
            'movil_number' => 'Movil Number',
            'is_provider' => 'Is Provider',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \api\common\models\query\CommentQuery|\yii\db\ActiveQuery
     *
     *public function getComments()
     *{
     *    return $this->hasMany(Comment::className(), ['created_by' => 'id']);
     *}
     */

    /**
     * Gets query for [[Posts]].
     *
     * @return \api\common\models\query\PostQuery|\yii\db\ActiveQuery
     *
     *public function getPosts()
     *{
     *    return $this->hasMany(Post::className(), ['created_by' => 'id']);
     *}
     */

    /**
     * {@inheritdoc}
     *
     * @return \api\common\models\query\UserQuery the active query used by this AR class
     */
    public static function find()
    {
        return new \api\common\models\query\UserQuery(get_called_class());
    }
}
