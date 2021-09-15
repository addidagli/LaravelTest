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

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function getAllProduct()
    {
        return Product::all();
    }

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
}
