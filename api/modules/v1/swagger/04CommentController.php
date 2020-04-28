<?php

 /**
  * @OA\Post(path="/v1/comments",
  *   security={{"token": {}}},
  *   summary="Create comment",
  *   tags={"comments"},
  *   @OA\RequestBody(
  *          required=true,
  *          @OA\JsonContent(ref="#/components/schemas/CommentSchema", example={
  *             "text": "Excelente servicio",
  *             "created_by": 2,
  *             "start": 5,
  *             "post_id": 1
  *          })
  *   ),
  *   @OA\Response(
  *     response=200,
  *     description="Return comment created",
  *          @OA\JsonContent(ref="#/components/schemas/CommentSchema", example={
  *             "id" : 14,
  *             "text": "Excelente servicio",
  *             "created_by": 2,
  *             "start": 5,
  *             "post_id": 1
  *          })
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
 * @OA\Get(path="/v1/comments",
 *   summary="Get comments",
 *   tags={"comments"},
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
 *     description="Return all comments",
 *     @OA\MediaType(
 *           mediaType="application/json",
 *           @OA\Schema(ref="#/components/schemas/CommentSchema"),
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
 * @OA\Get(path="/v1/comments/{id}",
 *   summary="Get comment by id",
 *   tags={"comments"},
 *   @OA\Parameter(
 *     name="id",
 *     in="path",
 *     required=true,
 *     description="comment Id",
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
 *     description="Return comment by id",
 *          @OA\JsonContent(ref="#/components/schemas/CommentSchema", example={
 *             "id" : 14,
 *             "text": "Excelente servicio",
 *             "created_by": 2,
 *             "start": 5,
 *             "post_id": 1
 *          })
 *
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
   * @OA\Put(path="/v1/comments/{id}",
   *   summary="Update comment",
   *   security={{"token": {}}},
   *   tags={"comments"},
   *   @OA\RequestBody(
   *          required=true,
   *            @OA\JsonContent(ref="#/components/schemas/CommentSchema", example={
   *
   *             "text": "Excelente servicio",
   *             "created_by": 2,
   *             "start": 5,
   *             "post_id": 1
   *          })
   *   ),
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     description="comment Id",
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response=200,
   *     description="Return comment updated",
   *          @OA\JsonContent(ref="#/components/schemas/CommentSchema", example={
   *             "id" : 14,
   *             "text": "Excelente servicio",
   *             "created_by": 2,
   *             "start": 5,
   *             "post_id": 1
   *          })
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
   * @OA\Delete(path="/v1/comments/{id}",
   *   summary="Delete comment",
   *   security={{"token": {}}},
   *   tags={"comments"},
   *   @OA\Parameter(
   *     name="id",
   *     in="path",
   *     required=true,
   *     description="comment Id",
   *     @OA\Schema(
   *       type="integer"
   *     )
   *   ),
   *   @OA\Response(
   *     response=204,
   *     description="Undocumented (comment has deleted)",
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
 *     title="CommentSchema",
 *     @OA\Xml(
 *         name="CommentSchema"
 *     ),
 * )
 */
class CommentSchema
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
    private $text;

    /**
     * @OA\Property(
     * )
     *
     * @var int
     */
    private $created_by;

    /**
     * @OA\Property(
     * )
     *
     * @var int
     */
    private $post_id;

    /**
     * @OA\Property(
     * )
     *
     * @var int
     */
    private $start;
}
