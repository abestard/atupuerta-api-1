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
        $rules = parent::rules();

        array_push($rules, [['username', 'email'], 'required']);

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        return ['id', 'username', 'email'];
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
