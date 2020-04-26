<?php

namespace api\modules\v1\models;

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
}
