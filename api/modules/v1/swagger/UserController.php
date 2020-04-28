<?php

 /**
  * @OA\Post(path="/v1/users",
  *   summary="Create user",
  *   tags={"users"},
  *   @OA\RequestBody(
  *          required=true,
  *          @OA\JsonContent(ref="#/components/schemas/UserSchema", example={"username": "testuser", "password": "12345", "email":"testuser@example.com"})
  *   ),
  *   @OA\Response(
  *     response=200,
  *     description="Return user created",
  *     @OA\JsonContent(ref="#/components/schemas/UserSchema", example={
  *         "id": 14,
  *         "username": "testuser",
  *         "email": "testuser@example.com",
  *         "phone_number": null,
  *         "movil_number": null,
  *         "is_provider": null
  *       })
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

/**
 * @OA\Get(path="/v1/users",
 *   security={{"token": {}}},
 *   summary="Get users",
 *   tags={"users"},
 *   @OA\Parameter(
 *     name="fields",
 *     in="query",
 *     required=false,
 *     description="Show only this fields",
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *  @OA\Parameter(
 *     name="expand",
 *     in="query",
 *     description="Show extra fields",
 *     required=false,
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *  @OA\Parameter(
 *     name="sort",
 *     in="query",
 *     description="Sort by this field",
 *     required=false,
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *  @OA\Parameter(
 *     name="page",
 *     in="query",
 *     required=false,
 *     description="Page number",
 *     @OA\Schema(
 *       type="integer"
 *     )
 *   ),
 *  @OA\Parameter(
 *     name="per-page",
 *     in="query",
 *     description="Number of records in page",
 *     required=false,
 *     @OA\Schema(
 *       type="integer"
 *     )
 *   ),
 *   @OA\Response(
 *     response=200,
 *     description="Return all users",
 *     @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/UserSchema"),
 *     ),
 *   ),
 *   @OA\Response(
 *     response=401,
 *     description="Unauthorized response",
 *   ),
 * )
 */
function get()
{
}

/**
 * @OA\Get(path="/v1/users/{id}",
 *   security={{"token": {}}},
 *   summary="Get user by id",
 *   tags={"users"},
 *   @OA\Parameter(
 *     name="id",
 *     in="path",
 *     required=true,
 *     description="User Id",
 *     @OA\Schema(
 *       type="integer"
 *     )
 *   ),
 *   @OA\Parameter(
 *     name="fields",
 *     in="query",
 *     required=false,
 *     description="Show only this fields",
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *  @OA\Parameter(
 *     name="expand",
 *     in="query",
 *     description="Show extra fields",
 *     required=false,
 *     @OA\Schema(
 *       type="string"
 *     )
 *   ),
 *
 *   @OA\Response(
 *     response=200,
 *     description="Return user by id",
 *     @OA\JsonContent(ref="#/components/schemas/UserSchema", example={
 *         "id": 14,
 *         "username": "testuser",
 *         "email": "testuser@example.com",
 *         "phone_number": null,
 *         "movil_number": null,
 *         "is_provider": null
 *       })
 *   ),
 *   @OA\Response(
 *     response=404,
 *     description="Not Found",
 *     @OA\JsonContent(example={
 *         "name": "Not Found",
 *         "message": "Object not found: 1",
 *         "code": 0,
 *         "status": 404
 *       })
 *   ),
 *   @OA\Response(
 *     response=401,
 *     description="Unauthorized response",
 *   ),
 * )
 */
function getId()
{
}

  /**
   * @OA\Put(path="/v1/users/{id}",
   *   summary="Update user",
   *   security={{"token": {}}},
   *   tags={"users"},
   *   @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/UserSchema", example={"username": "testuser_updated", "email":"newtestuser@example.com","phone_number": "55555559", "movil_number": "+53 55555551", "is_provider": true})
   *   ),
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     description="User Id",
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Return user updated",
   *     @OA\JsonContent(ref="#/components/schemas/UserSchema", example={"username": "testuser_updated", "email":"newtestuser@example.com","phone_number": "55555559", "movil_number": "+53 55555551", "is_provider": true})
   *   ),
   *   @OA\Response(
   *     response=404,
   *     description="Not Found",
   *     @OA\JsonContent(example={
   *         "name": "Not Found",
   *         "message": "Object not found: 1",
   *         "code": 0,
   *         "status": 404
   *       })
   *   ),
   *   @OA\Response(
   *     response=422,
   *     description="Error: Unprocessable entity",
   *   ),
   * )
   */
  function put()
  {
  }

  /**
   * @OA\Delete(path="/v1/users/{id}",
   *   summary="Delete user",
   *   security={{"token": {}}},
   *   tags={"users"},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     description="User Id",
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response=204,
   *     description="Undocumented (user has deleted)",
   *   ),
   *   @OA\Response(
   *     response=404,
   *     description="Not Found",
   *     @OA\JsonContent(example={
   *         "name": "Not Found",
   *         "message": "Object not found: 1",
   *         "code": 0,
   *         "status": 404
   *       })
   *   ),
   * )
   */
  function delete()
  {
  }

// Schemmas for swagger

/**
 * @OA\Schema(
 *     title="UserSchema",
 *     @OA\Xml(
 *         name="UserSchema"
 *     ),
 *     required={"username", "password"}
 * )
 */
class UserSchema
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

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $phone_number;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $movil_number;

    /**
     * @OA\Property(
     * )
     *
     * @var bool
     */
    private $is_provider;
}
