<?php

 /**
  * @OA\Post(path="/v1/foods",
  *   security={{"token": {}}},
  *   summary="Create food",
  *   tags={"foods"},
  *   @OA\RequestBody(
  *          required=true,
  *          @OA\JsonContent(ref="#/components/schemas/FoodSchema", example={
  *           "title": "Pollo",
  *           "description": "Pollo asado ",
  *           "price": 5,
  *           "moneyType": "CUC",
  *           "created_by": 2
  *           })
  *   ),
  *   @OA\Response(
  *     response=200,
  *     description="Return food created",
  *     @OA\JsonContent(ref="#/components/schemas/FoodSchema", example={
  *           "id": 1,
  *           "title": "Pollo",
  *           "description": "Pollo asado ",
  *           "price": 5,
  *           "moneyType": "CUC",
  *           "created_by": 2
  *      })
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
 * @OA\Get(path="/v1/foods",
 *   summary="Get foods",
 *   tags={"foods"},
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
 *     description="Return all foods",
 *     @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/FoodSchema"),
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
 * @OA\Get(path="/v1/foods/{id}",
 *   summary="Get food by id",
 *   tags={"foods"},
 *   @OA\Parameter(
 *     name="id",
 *     in="path",
 *     required=true,
 *     description="Food Id",
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
 *     description="Return food by id",
 *     @OA\JsonContent(ref="#/components/schemas/FoodSchema", example={
 *           "id": 1,
 *           "title": "Pollo",
 *           "description": "Pollo asado ",
 *           "price": 5,
 *           "moneyType": "CUC",
 *           "created_by": 2
 *     })
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
   * @OA\Put(path="/v1/foods/{id}",
   *   summary="Update food",
   *   security={{"token": {}}},
   *   tags={"foods"},
   *   @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/FoodSchema", example={
   *           "title": "Pollo",
   *           "description": "Pollo asado ",
   *           "price": 5,
   *           "moneyType": "CUC",
   *           "created_by": 2
   *           })
   *   ),
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     description="Food Id",
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Return food updated",
   *     @OA\JsonContent(ref="#/components/schemas/FoodSchema", example={
   *           "id": 1,
   *           "title": "Pollo",
   *           "description": "Pollo asado ",
   *           "price": 5,
   *           "moneyType": "CUC",
   *           "created_by": 2
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
   *     response=422,
   *     description="Error: Unprocessable entity",
   *   ),
   * )
   */
  function put()
  {
  }

  /**
   * @OA\Delete(path="/v1/foods/{id}",
   *   summary="Delete food",
   *   security={{"token": {}}},
   *   tags={"foods"},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     description="Food Id",
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response=204,
   *     description="Undocumented (food has deleted)",
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
 *     title="FoodSchema",
 *     @OA\Xml(
 *         name="FoodSchema"
 *     ),
 * )
 */
class FoodSchema
{
    /**
     * @OA\Property(
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     * )
     *
     * @var float
     */
    private $price;

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    private $moneyType;

    /**
     * @OA\Property(
     * )
     *
     * @var int
     */
    private $created_by;
}
