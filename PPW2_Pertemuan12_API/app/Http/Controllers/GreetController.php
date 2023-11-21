<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
* @OA\Info(
* description="Contoh API doc menggunakan OpenAPI/Swagger",
* version="0.0.1",
* title="Contoh API documentation",
* termsOfService="http://swagger.io/terms/",
* @OA\Contact(
* email="choirudin.emchagmail.com"
* ),
* @OA\License(
* name="Apache 2.0",
* url="http://www.apache.org/licenses/LICENSE-2.0.html"
* )
* )
*/

class GreetController extends Controller
{

/**
* @OA\Get(
* path="/api/greet",
* tags={"greeting"},
* summary="Returns a Sample API response",
* description="A sample greeting to test out the API",
* operationId="greet",
* @OA\Parameter(
* name="firstname",
* description="nama depan",
* required=true,
* in="query",
* @OA\Schema(
* type="string"
* )
* ),
* @OA\Parameter(
* name="lastname",
* description="nama belakang",
* required=true,
* in="query",
* @OA\Schema(
* type="string"
* )
* ),
* @OA\Response(
* response="default",
* description="successful operation"
* )
* )
*/


    public function greet(Request $request)
    {
     $userData = $request->only([
     'firstname',
     'lastname',
     ]);
     if (empty($userData['firstname']) &&
    empty($userData['lastname'])) {
     return new \Exception('Missing data', 404);
     }
     return 'Halo ' . $userData['firstname'] . ' ' .
    $userData['lastname'];
    } 


/**
 * @OA\Get(
 *     path="/api/gallery",
 *     tags={"gallery"},
 *     summary="Returns a list of gallery items",
 *     description="Get a list of gallery items with images",
 *     operationId="gallery",
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer"),
 *                 @OA\Property(property="title", type="string"),
 *                 @OA\Property(property="image_url", type="string"),
 *             ),
 *         ),
 *     ),
 * )
 */
public function getGallery()
{
    // Replace this with your actual gallery data retrieval logic
    $galleryItems = [
        [
            'id' => 1,
            'title' => 'Sample Image 1',
            'image_url' => 'https://rickandmortyapi.com/api/character/avatar/258.jpeg',
        ],
        [
            'id' => 2,
            'title' => 'Sample Image 2',
            'image_url' => 'https://rickandmortyapi.com/api/character/avatar/139.jpeg',
        ],
        // Add more gallery items as needed
    ];

    return response()->json($galleryItems);
}


}
