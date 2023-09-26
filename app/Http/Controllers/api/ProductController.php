<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\productResourse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        $products = productResourse::collection(Product::get());

        return $this->apiResponse($products, 'created successfully', '200');
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $this->apiResponse(new productResourse($product), 'created successfully', '200');
        } else {
            return $this->apiResponse(null, 'Product not found', '404');
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), '400');
        }

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Store the image in the 'products' directory within your storage
        } else {
            // Handle the case where no image was provided
            return $this->apiResponse(null, 'Image not provided', '400');
        }

        // Create a new product using the retrieved data
        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'image' => $imagePath, // Store the image path in the database
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        // $product = Product::create($request->all());

        if ($product) {
            return $this->apiResponse(new productResourse($product), 'created successfully', '201');
        } else {
            return $this->apiResponse(null, 'Product not saved', '400');
        }
    }

    // public function update(Request $request, $id)
    // {
    //     $product = Product::find($id);

    //     if (!$product) {
    //         return $this->apiResponse(null, 'Product not found', '404');
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'category_id' => 'required|integer',
    //         'name' => 'required|string',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
    //         'description' => 'required|string',
    //         'price' => 'required|numeric',
    //     ]);

    //     if ($validator->fails()) {
    //         return $this->apiResponse(null, $validator->errors(), '400');
    //     }

    //     // Check if a new image was uploaded
    //     if ($request->hasFile('image')) {
    //         // Delete the old image file
    //         Storage::disk('public')->delete($product->image);
    //         // Handle the image upload
    //         $imagePath = $request->file('image')->store('products', 'public'); // Store the image in the 'products' directory within your storage
    //     } else {
    //         // Handle the case where no image was provided
    //         return $this->apiResponse(null, 'Image not provided', '400');
    //     }

    //     // Create a new product using the retrieved data
    //     $product = Product::update([
    //         'category_id' => $request->input('category_id'),
    //         'name' => $request->input('name'),
    //         'image' => $imagePath, // Store the image path in the database
    //         'description' => $request->input('description'),
    //         'price' => $request->input('price'),
    //     ]);
    //     // $product = Product::create($request->all());

    //     if ($product) {
    //         return $this->apiResponse(new productResourse($product), 'created successfully', '201');
    //     } else {
    //         return $this->apiResponse(null, 'Product not saved', '400');
    //     }
    // }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->apiResponse(null, 'Product not found', '404');
        }

        $validator = Validator::make($request->all(), [
            'category_id' => 'integer',
            'name' => 'string',
            'description' => 'string',
            'price' => 'numeric',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), '400');
        }

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image file
            Storage::disk('public')->delete($product->image);

            // Store the new image
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Update product data
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($product->save()) {
            return $this->apiResponse(new productResourse($product), 'Product updated successfully', '200');
        } else {
            return $this->apiResponse(null, 'Product not updated', '400');
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->apiResponse(null, 'Product not found', '404');
        }

        // Delete the product's image file
        Storage::disk('public')->delete($product->image);

        if ($product->delete()) {
            return $this->apiResponse(null, 'Product deleted successfully', '200');
        } else {
            return $this->apiResponse(null, 'Product not deleted', '400');
        }
    }
}
