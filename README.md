Steps:
1.	composer require zircote/swagger-php
2.	composer require darkaonline/l5-swagger
3.	php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
4.	php artisan make:controller Api/TestController
5.	php artisan l5-swagger:generate


1. TestController.php:
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

2. Controllers.php:
    <?php

    namespace App\Http\Controllers;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;
        /**
        * @OA\Info(
        *    title="Swagger with Laravel",
        *    version="1.0.0",
        * )
        */
    class Controller extends BaseController
    {
        use AuthorizesRequests, ValidatesRequests;
    }

3. api.php :
    <?php

    use App\Http\Controllers\Api\TestController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/test',[TestController::class,'test']);

* Browser URL
    http://127.0.0.1:8000/api/documentation

