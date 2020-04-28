<?php

namespace api\common\controllers;

use yii\data\ActiveDataProvider;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return array_merge($behaviors, ['corsFilter' => ['class' => \yii\filters\Cors::className()]]);
    }

    public function actions()
    {
        $actions = parent::actions();

        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',

            'modelClass' => $this->modelClass,

            'prepareDataProvider' => function () {
                return new ActiveDataProvider([
                    'query' => $this->modelClass::find(),
                    'pagination' => [
                        'class' => 'yii\data\Pagination',
                        'validatePage' => false,
                    ],
                ]);
            },
        ];

        return $actions;
    }
}
