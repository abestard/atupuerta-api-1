<?php

namespace api\modules\v1\controllers;

/**
 * Default controller for the `v1` module.
 */
class DefaultController extends \api\common\controllers\RestController
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
