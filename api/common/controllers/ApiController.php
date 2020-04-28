<?php

namespace api\common\controllers;

use Yii;
use yii\rest\Controller;

/**
 * Api controller.
 */

/**
 * @OA\Info(
 *   version="1.0",
 *   title="ATuPuerta API",
 *   description="Server - ATuPuerta app API",
 * ),
 */
class ApiController extends Controller
{
    /**
     * Default Index.
     *
     * @return mixed
     */

    /**
     * @OA\Get(path="/",
     *   summary="API Info",
     *   tags={"default"},
     *   @OA\Response(
     *     response=200,
     *     description="Return API info",
     *   ),
     * )
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
                    Yii::getAlias('@api/common/controllers'),
                    Yii::getAlias('@api/modules/v1/controllers'),
                    Yii::getAlias('@api/modules/v1/models'),
                ],
            ],
        ];
    }
}
