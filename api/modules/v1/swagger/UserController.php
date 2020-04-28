<?php

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
 *   ),
 *   @OA\Response(
 *     response=401,
 *     description="Unauthorized response",
 *   ),
 * )
 */
function generateSwagger()
{
}
