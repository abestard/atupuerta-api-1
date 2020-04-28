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

    public function fields()
    {
        return ['id', 'title', 'description', 'price', 'moneyType', 'created_by'];
    }

    public function extraFields()
    {
        return ['created_at', 'updated_at', 'category', 'comments', 'createdBy'];
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
