<?php

/**
 * @OA\Post(path="/v1/login",
 *   summary="Login",
 *   tags={"login"},
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
function generateSwagger()
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
