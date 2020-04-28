<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\User;
use Yii;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

/**
 * @OA\Get(path="/v1/users",
 *   security={{"token": {}}},
 *   summary="Get users",
 *   tags={"users"},
 *   @OA\Response(
 *     response=200,
 *     description="Return all users",
 *   ),
 *   @OA\Response(
 *     response=401,
 *     description="Unauthorized response",
 *   ),
 * )
 */
class UserController extends \api\common\controllers\ActiveController
{
    public $modelClass = User::class;

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

    // Override create action
    public function actions()
    {
        $actions = parent::actions();

        // disable default create action
        unset($actions['create']);

        return $actions;
    }

    // Define create action
    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->statusCode = 422;

        $model = new User();

        $body = Yii::$app->getRequest()->getBodyParams();

        if (!isset($body['password'])) {
            return [
                [
                    'field' => 'password',
                    'message' => 'Password cannot be blank.',
                ],
            ];
        }

        $model->load($body, '');
        $model->setPassword($body['password']);
        $model->generateAuthKey();
        $model->generateEmailVerificationToken();

        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return $model;
    }
}
