<?php

namespace api\modules\v1\models;

use OutOfBoundsException;

class User extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['status', 'default', 'value' => parent::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        return ['id', 'username', 'email', 'phone_number', 'movil_number', 'is_provider'];
    }

    /**
     * {@inheritdoc}
     */
    public function extraFields()
    {
        return ['created_at', 'updated_at', 'status'];
    }

    /**
     * {@inheritdoc}
     *
     * @param \Lcobucci\JWT\Token $token
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        try {
            $username = $token->getClaim('u');
            $password = $token->getClaim('p');
        } catch (OutOfBoundsException $e) {
            return null;
        }

        $user = User::findByUsername($username);

        if ($user->validatePassword($password)) {
            return new static($user);
        }

        return null;
    }
}
