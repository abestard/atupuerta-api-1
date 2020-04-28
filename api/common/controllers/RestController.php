<?php

namespace api\common\controllers;

class RestController extends \yii\rest\Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return array_merge($behaviors, ['corsFilter' => ['class' => \yii\filters\Cors::className()]]);
    }
}
