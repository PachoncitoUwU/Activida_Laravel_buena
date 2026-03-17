<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return ProductResource::collection($products);
    }

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::create($request->all());

        return new ProductResource($product);
    }

    // Ver un solo producto
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    // Actualizar un producto
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    // Eliminar un producto
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Producto eliminado'], 204);
    }
}