<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\User;
use Yii;
use yii\rest\Controller;

/**
 * Login controller for the `v1` module.
 */
class LoginController extends Controller
{
    /**
     * Login action.
     */

    /**
     * @OA\Post(path="/v1/login",
     *   summary="Login",
     *   tags={"users"},
     *   @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Return user id and token",
     *     @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/LoginResponse"),
     *     ),
     *   ),
     *   @OA\Response(
     *     response=401,
     *     description="Unauthorized response",
     *   ),
     *   @OA\Response(
     *     response=422,
     *     description="Error: Unprocessable entity",
     *   ),
     * )
     */
    public function actionIndex()
    {
        $body = Yii::$app->getRequest()->getBodyParams();

        Yii::$app->response->statusCode = 422;

        if (!isset($body['username'])) {
            return $this->asJson([
                [
                    'field' => 'username',
                    'message' => 'Username cannot be blank.',
                ],
            ]);
        }

        if (!isset($body['password'])) {
            return $this->asJson([
                [
                    'field' => 'password',
                    'message' => 'Password cannot be blank.',
                ],
            ]);
        }

        $username = $body['username'];
        $password = $body['password'];

        $user = User::findByUsername($username);

        Yii::debug($user);

        if (!$user || !$user->validatePassword($password)) {
            Yii::$app->response->statusCode = 401;

            return [
                'name' => 'Unauthorized',
                'message' => 'Your request was made with invalid credentials.',
                'code' => 0,
                'status' => 401,
            ];
        }

        /// BUILD JWT

        /** @var Jwt $jwt */
        $jwt = Yii::$app->jwt;
        $signer = $jwt->getSigner('HS256');
        $key = $jwt->getKey();
        $time = time();

        // Adoption for lcobucci/jwt ^4.0 version
        $token = $jwt->getBuilder()
            ->issuedAt($time)// Configures the time that the token was issue (iat claim)
            ->expiresAt($time + 3600)// Configures the expiration time of the token (exp claim)
            ->withClaim('u', $username) // Configures a new claim, called "username"
            ->withClaim('p', $password) // Configures a new claim, called "password"
            ->getToken($signer, $key) // Retrieves the generated token
        ;

        Yii::$app->response->statusCode = 200;

        return $this->asJson([
            'userId' => $user->id,
            'token' => (string) $token,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function verbs()
    {
        $verbs = parent::verbs();

        $verbs['index'] = ['POST'];

        return $verbs;
    }
}

// Schemmas for swagger

/**
 * @OA\Schema(
 *     title="LoginRequest",
 *     @OA\Xml(
 *         name="LoginRequest"
 *     ),
 *     required={"username", "password"}
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $username;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $password;
}

/**
 * @OA\Schema(
 *     title="LoginResponse",
 *     @OA\Xml(
 *         name="LoginResponse"
 *     )
 *
 * )
 */
class LoginResponse
{
    /**
     * @OA\Property(
     * )
     *
     * @var int
     */
    private $userId;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $token;
}
