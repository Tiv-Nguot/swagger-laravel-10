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

    /**
 * @OA\Post(
 *     path="/api/store",
 *     operationId="store",
 *     tags={"Store"},
 *     summary="Store data",
 *     description="Store data endpoint",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","email"},
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Hello, Swagger is working")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The given data was invalid."),
 *             @OA\Property(
 *                 property="errors",
 *                 type="object",
 *                 @OA\Property(
 *                     property="name",
 *                     type="array",
 *                     @OA\Items(type="string", example="The name field is required.")
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="array",
 *                     @OA\Items(type="string", example="The email must be a valid email address.")
 *                 )
 *             )
 *         )
 *     )
 * )
 */

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        return response()->json([
            'message' => "Hello, Swagger is working",
            'data' => $data
        ], 200);
    }
}
