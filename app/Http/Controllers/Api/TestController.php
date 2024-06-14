<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/test",
     *     operationId="test",
     *     tags={"Test"},
     *     summary="Test endpoint",
     *     description="Test endpoint",
     *     @OA\Response(
     *         response=200,
     *         description="Successful",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function test(Request $request)
    {
        return response()->json([
            'message' => "Hello, Swagger is working"
        ], 200);
    }
}
