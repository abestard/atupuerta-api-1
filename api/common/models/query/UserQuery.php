<?php

namespace api\common\models\query;

/**
 * This is the ActiveQuery class for [[\api\common\models\User]].
 *
 * @see \api\common\models\User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \api\common\models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \api\common\models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
