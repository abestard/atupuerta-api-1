<?php

namespace api\modules\v1\models;

class Food extends \common\models\Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = parent::rules();

        array_push($rules, ['category', 'default', 'value' => 'food']);

        return $rules;
    }

    public static function find()
    {
        $query = parent::find();

        return $query->andWhere(['category' => 'food']);
    }
}
