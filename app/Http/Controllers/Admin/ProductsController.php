<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Faker\Provider\Image;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::paginate(3);

        return view('admin.products', ['products' => $products]);
    }

    public function edit($id) {
        $product = Product::find($id);

        return view('admin.editProduct', ['product' => $product]);
    }

    public function editImage($id) {
        $product = Product::find($id);

        return view('admin.editProductImage', ['product' => $product]);
    }

    public function remove($id) {
        $product = Product::find($id);

        Storage::delete('public/product_images/' . $product->image);

        Product::destroy($id);

        return redirect()->route('adminProducts');
    }

    public function create(Request $request) {
        return view('admin.createProduct');
    }

    public function updateImage(Request $request, $id) {
        Validator::make($request->all(), ['image' => 'required|image|mimes:jpg,png,jpeg|max:5000'])->validate();

        if($request->hasFile('image')) {
            $product = Product::find($id);
            $exists = Storage::disk('local')->exists('public/product_images/' . $product->image);

            if($exists) {
                Storage::delete('public/product_images/' . $product->image);
            }

            $request->image->storeAs('public/product_images/', $product->image);
            $update = array(
                'image' => $product->image
            );

            DB::table('products')->where('id', $id)->update($update);

            return redirect()->route('adminProducts');
        }
    }

    public function update(Request $request, $id) {
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');

        $update = array(
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'price' => $price
        );

        DB::table('products')->where('id', $id)->update($update);

        return redirect()->route('adminProducts');
    }

    public function createAction(Request $request) {
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $fileName = $name . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put('public/product_images/' . $fileName, file_get_contents($image->getRealPath()));
        }

        //Validator::make($request->all(), ['image' => 'required|image|mimes:jpg,png,jpeg|max:5000'])->validate();

        $update = array(
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'price' => $price,
            'image' => $fileName
        );

        $created = DB::table('products')->insert($update);

        if($created) {
            return redirect()->route('adminProducts');
        }
        else {
            return 'error';
        }
    }
}
