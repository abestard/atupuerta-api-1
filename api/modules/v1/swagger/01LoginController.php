<?php

/**
 * @OA\Post(path="/v1/login",
 *   summary="Login",
 *   tags={"login"},
 *   @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/LoginRequest", example={"username": "testuser", "password": "1234pass"})
 *   ),
 *   @OA\Response(
 *     response=200,
 *     description="Return user id and token",
 *     @OA\JsonContent(ref="#/components/schemas/LoginRequest", example={
 *              "userId": 2,
 *              "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1ODgwNTkxNTAsImV4cCI6MTU4ODA2Mjc1MCwidSI6ImFkbWluIiwicCI6IjEyMzQ1In0.7WG7NOr-z0FZzOpMlQDJeuxrW-hcM_pIgGCxMY5keiU",
 *              "expiration": 1588062750
 *          }
 *      )
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
function post()
{
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
    private $username = 'testuser';

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
