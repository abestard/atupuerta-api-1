<?php

namespace api\modules\v1\controllers;

use yii\rest\Controller;

/**
 * Default controller for the `v1` module.
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->asJson([
            'message' => 'ATuPuerta API',
            'version' => 'v1',
        ]);
    }
}
