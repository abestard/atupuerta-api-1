<?php

/**
 * @OA\Info(
 *   version="1.0",
 *   title="ATuPuerta API",
 *   description="Server - ATuPuerta app API",
 * ),
 *
 * @OA\SecurityScheme(
 *   securityScheme="token",
 *   type="http",
 *   scheme="bearer",
 *   bearerFormat="JWT",
 *   name="Authorization Token",
 *   in="header"
 * )
 *
 * @OA\Get(path="/",
 *   summary="API Info",
 *   tags={"default"},
 *   @OA\Response(
 *     response=200,
 *     description="Return API info",
 *   ),
 * )
 */
function get()
{
}
