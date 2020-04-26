<?php

namespace api\common\controllers;

use yii\rest\Controller;

/**
 * Api controller.
 */
class ApiController extends Controller
{
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
}
