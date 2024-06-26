<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function category()      // show categories
    {
        $catData = Category::orderBy('name')->paginate(10);
        return view('admin.pages.category.index', ['catData' => $catData]);
    }

    public function addCategory()   // add category
    {
        return view('admin.pages.category.add-category');
    }

    public function categoryValid(Request $req)     // add category validation
    {
        $validateCat = $req->validate([
            'name' => 'required|unique:categories',
            'desc' => 'nullable|max:500',
        ], [
            'name.required' => "Enter name",
            'name.unique' => "Category already exists",

            'desc.max' => "Maximum 500 characters",
        ]);
        if ($validateCat) {

            $cat = new Category();
            $cat->name = $req->name;
            if ($req->desc) {
                $cat->description = $req->desc;
            }
            try {
                $cat->save();
                return Redirect::route('admin.category')->with('Success', 'Category added successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Adding category failed - ' . $e->getMessage());
            }
        }
    }

    public function editCategory($id)   // edit category page
    {

        $cat = Category::where('id', '=', $id)->first();
        return view('admin.pages.category.edit-category', ['catData' => $cat]);
    }

    public function editCatValid(Request $req)   // edit category validation
    {
        $validateCat = $req->validate([
            'name' => 'required',
            'desc' => 'nullable|max:500',
            'cid' => 'required',
        ], [
            'name.required' => "Enter name",

            'desc.max' => "Maximum 500 characters",
        ]);
        if ($validateCat) {

            $cat = Category::where('id', '=', $req->cid)->first();
            $cat->name = $req->name;
            $cat->description = $req->desc;

            try {
                $cat->save();
                return back()->with('Success', 'Category updated successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Updating category failed - ' . $e->getMessage());
            }
        }
    }

    public function delCategory(Request $req)      // delete category
    {
        $id = $req->cid;
        $cat = Category::where('id', '=', $id)->first();
        if ($cat) {
            try {
                $pro = Product::where('category_id', '=', $id)->get();
                if ($pro) {
                    foreach ($pro as $p) {
                        $img = storage_path('app/public/uploads/products/') . $p->thumbnail;
                        unlink($img);
                        $p->delete();
                    }
                }
                $cat->delete();
                return "Category and products deleted successfully";
            } catch (\Illuminate\Database\QueryException $e) {
                return "Error deleting category - " . $e->getMessage();
            }
        }
    }
}
