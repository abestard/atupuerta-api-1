<?php

namespace api\modules\v1\controllers;

class CommentController extends \api\common\controllers\ActiveController
{
    public $modelClass = 'api\modules\v1\models\Comment';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
            'optional' => [
                'create',
            ],
        ];

        return $behaviors;
    }
}
