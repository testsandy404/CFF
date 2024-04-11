<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function brand()
    {
        $brandData = Brand::paginate(10);
        return view('admin.pages.brand.brands', ['brandData' => $brandData]);
    }

    public function addBrand()
    {
        return view('admin.pages.brand.add-brand');
    }

    public function brandValid(Request $req)    //add banner validation
    {
        $validateBrand = $req->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9 ]{2,100}$/',
            'desc' => 'nullable|max:500',
            'image' => 'required|mimes:jpeg,jpg,png',

        ], [
            'name.required' => "Enter title",
            'name.regex' => "Alphanumeric only, 2-100 characters",

            'desc.max' => "500 characters allowed",

            'image.required' => "Select image",
            'image.mimes' => "Only jpeg, jpg and png files allowed",

        ]);
        if ($validateBrand) {

            try {
                $brand = new Brand();
                $brand->name = $req->name;
                $brand->description = $req->desc;
                $name = "Logo-" . $req->name . '.' . $req->image->extension();
                $brand->logo = $name;
                $brand->save();
                $req->image->move(storage_path('app/public/uploads/brands/'), $name);
                return Redirect::route('admin.brand')->with('Success', 'Brand added successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Adding banner failed' . $e->getMessage());
            }
        }
    }

    public function editBrand($id)
    {
        $brandData = Brand::where('id', '=', $id)->first();
        return view('admin.pages.vendor.edit-brand', ['vendorData' => $brandData]);
    }



    public function editBrandValid(Request $req)    //edit banner validation
    {
        $validateVendor = $req->validate([
            'name' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'image' => 'mimes:jpeg,jpg,png',

        ], [
            'name.required' => "Enter title",
            'name.regex' => "Alphabets only, 2-100 characters",

            'image.mimes' => "Only jpeg, jpg and png files allowed",

        ]);
        if ($validateVendor) {

            $vendor = vendor::where('id', '=', $req->bid)->first();
            $vendor->name = $req->name;


            try {
                $vendor->save();
                if ($req->image) {
                    $name = $req->img_name;
                    $req->image->move(public_path('uploads/vendor'), $name);
                }
                return Redirect::to('/vendor')->with('Success', 'vendor added successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Updating banner failed' . $e->getMessage());
            }
        }
    }


    public function delBrand(Request $req)   //delete banner
    {
        $id = $req->id;
        $vendor = Brand::where('id', '=', $id)->first();

        try {
            $img = public_path('uploads/vendor/') . $vendor->image;
            unlink($img);
            $vendor->delete();
            return "banner deleted successfully";
        } catch (\Illuminate\Database\QueryException $e) {
            return "Error deleting banner - " . $e->getMessage();
        }
    }
}
