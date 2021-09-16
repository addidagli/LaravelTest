<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        
        return $product = Product::create([
            'orderCode' => $request->input('orderCode'),
            'quantity' => $request->input('quantity'),
            'address' => $request->input('address'),
            'shippingDate' => $request->input('shippingDate'),
        ]);
    }
     /**
     * @OA\Post(
     ** path="/api/addProduct",
     *   tags={"addProduct"},
     *   summary="addProduct",
     *   operationId="addProduct",
     *
     *  @OA\Parameter(
     *      name="orderCode",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="quantity",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="address",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *)
     **/
 

    public function getProductById($id)
    {
        return Product::find($id);
    }
    /**
     * @OA\Get(
     ** path="/api/getProductById/{id}",
     *   tags={"getProductById"},
     *   summary="getProductById",
     *   operationId="getProductById",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *)
     **/

    public function getAllProduct()
    {
        return Product::all();
    }
    /**
 * @OA\Get(
 * path="/getAllProduct",
 * summary="getAllProduct",
 * description="GetAllProduct",
 * operationId="getAllProduct",
 * tags={"getAllProduct"},
 * @OA\Response(
 *    response=200,
 *    description="Success",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="All Products")
 *        )
 *     )
 * )
 */

    public function deleteProduct($id)
    {
        $data = Product::find($id);
        if($data->delete())
        {
            return response([
                'message' => 'data deleted'
            ]);
        }
    }

    /**
     * @OA\Get(
     ** path="/api/deleteProduct/{id}",
     *   tags={"deleteProduct"},
     *   summary="deleteProduct",
     *   operationId="deleteProduct",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *)
     **/

    public function updateProduct(Request $request)
    {
        $current = new Carbon();
        if($current < $request->shippingDate)
        {
            $data=Product::find($request->id);
            $data->orderCode=$request->orderCode;
            $data->quantity=$request->quantity;
            $data->address=$request->address;
            $data->shippingDate=$request->shippingDate;
            if($data->save())
            {
                return response([
                    'message' => 'data edited'
                ]);
            }else{
                return response([
                    'message' => 'something went wrong'
                ]);
            }
        }
        else
        {
            return response([
                'message' => 'time up',
            ]);
        }
        
    }
         /**
     * @OA\Put(
     ** path="/api/updateProduct/{id}",
     *   tags={"updateProduct"},
     *   summary="updateProduct",
     *   operationId="updateProduct",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="orderCode",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="quantity",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="address",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *)
     **/
}
