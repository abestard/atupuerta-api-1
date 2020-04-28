<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;

/**
 * Api controller.
 */
class ApiController extends Controller
{
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
            ],
        ];
    }

    /**
     * Default Index.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->asJson([
            'message' => 'ATuPuerta API',
            'last_version' => 'v1',
        ]);
    }

    public function actions()
    {
        return [
            'docs' => [
                'class' => 'genxoft\swagger\ViewAction',
                'apiJsonUrl' => \yii\helpers\Url::to(['/api/api-json'], true),
            ],
            'api-json' => [
                'class' => 'genxoft\swagger\JsonAction',
                'dirs' => [
                    Yii::getAlias('@api/swagger'),
                    Yii::getAlias('@api/modules/v1/swagger'),
                ],
            ],
        ];
    }
}
