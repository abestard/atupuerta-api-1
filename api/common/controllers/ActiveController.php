<?php

namespace api\common\controllers;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = ['class' => \yii\filters\Cors::className()];

        return $behaviors;
    }
}
