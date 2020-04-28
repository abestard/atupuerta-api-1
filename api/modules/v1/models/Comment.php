<?php

namespace api\modules\v1\models;

class Comment extends \common\models\Comment
{
    public function fields()
    {
        return ['id', 'text', 'created_by', 'start', 'post_id'];
    }

    public function extraFields()
    {
        return ['createdBy', 'post'];
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
