<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function product($id = null)   //product page
    {
        if ($id != null) {
            $proData = Product::where('category_id', '=', $id)->orderBy('created_at', 'DESC')->paginate(10);
            $catData = Category::all();
            return view('admin.pages.product.product', ['proData' => $proData, 'catData' => $catData]);
        } else {
            $proData = Product::orderBy('created_at', 'DESC')->paginate(10);
            $catData = Category::all();
            return view('admin.pages.product.product', ['proData' => $proData, 'catData' => $catData]);
        }
    }

    public function addProduct()  //add product page
    {
        $catData = Category::all();
        $brandData = Brand::all();
        return view('admin.pages.product.add-product', ['catData' => $catData, 'brandData' => $brandData]);
    }

    public function productValid(Request $req)    // add product validation
    {
        $validateProduct = $req->validate([
            'name' => 'required',
            'desc' => 'nullable|max:500',
            'catid' => 'required',
            'brandid' => 'required',
            'type'  => 'required',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
        ], [
            'name.required' => "Enter name",
            'desc.max' => "Maximum 500 characters allowed",
            'catid.required' => "Select category",
            'brandid.required' => "Select brand",
            'price.required' => "Enter price",

            'image.required' => "Select image",
            'image.mimes' => "Only jpeg, jpg and png files allowed",

        ]);
        if ($validateProduct) {
            // $uuid = hexdec(uniqid());
            try {
                $pro = new Product();
                $pro->name = $req->name;
                $pro->description = $req->desc;
                $pro->category_id = $req->catid;
                $pro->brand_id = $req->brandid;
                $pro->type = $req->type;
                // $pro->code = $uuid;
                $pro->price = $req->price;
                $pro->quantity = $req->quantity;
                $pro->thumbnail = $req->name . '.' . $req->image->extension();
                $pro->save();

                $name = $pro->id.'-'.$req->name . '.' . $req->image->extension();
                $pro->thumbnail = $name;
                $req->image->move(storage_path('app/public/uploads/products'), $name);
                $pro->save();

                return Redirect::route('admin.product')->with('Success', 'Product added successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Adding product failed - ' . $e->getMessage());
            }
        }
    }

    public function viewProduct($id) // view product page
    {
        $pro = Product::where('id', '=', $id)->first();
        $catData = Category::all();
        if ($pro) {
            return view(
                'admin.pages.product.view-product',
                ['proData' => $pro, 'catData' => $catData]
            );
        }
    }

    public function editProduct($id)  // edit product page
    {

        $pro = Product::where('id', '=', $id)->first();
        $catData = Category::all();
        $brandData = Brand::all();
        if ($pro) {
            return view(
                'admin.pages.product.edit-product',
                ['proData' => $pro, 'catData' => $catData,  'brandData' => $brandData]
            );
        }
    }

    public function editProValid(Request $req)    // edit product validation
    {
        $validateProduct = $req->validate([
            'name' => 'required',
            'desc' => 'nullable|max:500',
            'catid' => 'required',
            'brandid' => 'required',
            'type'  => 'required',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'pid' => 'required',
        ], [
            'name.required' => "Enter name",
            'desc.max' => "Maximum 500 characters allowed",
            'catid.required' => "Select category",
            'brandid.required' => "Select brand",

            'image.mimes' => "Only jpeg, jpg and png files allowed",
        ]);
        if ($validateProduct) {
            try {
                $id = $req->pid;
                $pro = Product::where('id', '=', $id)->first();
                $pro->name = $req->name;
                $pro->description = $req->desc;
                $pro->type = $req->type;
                $pro->category_id = $req->catid;
                $pro->brand_id = $req->brandid;
                $pro->price = $req->price;
                $pro->quantity = $req->quantity;
                if ($req->image) {
                    $name = $pro->thumbnail;
                    $req->image->move(storage_path('uploads/thumbnails'), $name);
                }
                $pro->save();
                return back()->with('Success', 'Product updated successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Updating product failed - ' . $e->getMessage());
            }
        }
    }

    public function delProduct(Request $req)  //delete product
    {
        $id = $req->pid;
        $pro = Product::where('id', '=', $id)->first();
        try {
            $img = storage_path('uploads/thumbnails/') . $pro->thumbnail;
            unlink($img);
            $pro->delete();
            return "Product deleted successfully";
        } catch (\Illuminate\Database\QueryException $e) {
            return "Error deleting product - " . $e->getMessage();
        }
    }
}
