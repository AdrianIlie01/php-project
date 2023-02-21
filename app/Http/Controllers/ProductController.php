<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = $request->page;
            $size = $request->size;
            $skip = ($page - 1) * $size;

            $product = Products::skip($skip)->take($size)->get();
            return response()->json($product, 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => "an error  occurred"], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Products::find($id);
            if ($product === null) {
//                var_dump('empty array');
                return response()->json('wrong id',404);
            } else
                 return response()->json($product, 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => "an error  occurred"], 500);
        }
    }

    public function store(Request $request) {

        try {
            $product = new Products();
            $product->product_name = $request->productName;
            $product->description_product = $request->descriptionProduct;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->save();

            return response()->json($product, 201);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => "an error  occurred"], 500);
        }
    }

    public function update(Request $request, $id) {

        try {
            $product = Products::find($id);

//            $product->product_name = $request->productName;
//            $product->desctition_product = $request->descriptionProduct;
//            $product->sku = $request->sku;
//            $product->price = $request->price;
//            $resProduct = $product->save(); // nu merge asa trebuie cu update

            if ($product === null) {
                var_dump('empty array');
                return response()->json('wrong id',http_response_code(404));
            } else

                $product->update([
                    'product_name' => $request->productName,
                    'description_product' => $request->descriptionProduct,
                    'sku' => $request->sku,
                    'price' => $request->price,
                    ]);

//            $product->update($request->all());
            return response()->json($product, 200);

        }
         catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => "an error  occurred"], 500);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
//            $product = Products::findOrFail($id); //daca nu exista trece direct in catch notFound->Fail

            $product = Products::find($id);
            if ($product === null) {
                var_dump('empty array');
                return response()->json('wrong id',http_response_code(404)); // nu afiseaza 404 status code
            } else
                $product->delete();
                return response()->json($product, http_response_code(200));
        }
        catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => "an error  occurred"], 500);
        }
    }

}
// TODO pagiantie

// TODO schimba din all() in $ request->....
// TODO try catch
//TODO daca id nu exista => bad request
