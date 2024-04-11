<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function banner()  //show banners
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.pages.banner.banners', ['bannerData' => $bannerData]);
    }

    public function addBanner()  //add banner
    {
        return view('admin.pages.banner.add-banner');
    }

    public function bannerValid(Request $req)    //add banner validation
    {
        $validateBanner = $req->validate([
            'title' => 'required|regex:/^[a-zA-Z0-9 ]{2,100}$/',
            'subtitle' => 'nullable|regex:/^[a-zA-Z0-9 ]{5,100}$/',
            'body' => 'nullable|max:500',
            'image' => 'required|mimes:jpeg,jpg,png',
            'is_active' => 'required|in:1,0',

        ], [
            'title.required' => "Enter title",
            'title.regex' => "Alphanumeric only, 2-100 characters",

            'subtitle.regex' => "Alphanumeric only, 5-100 characters",

            'body.max' => "Maximum 500 characters",

            'image.required' => "Select image",
            'image.mimes' => "Only jpeg, jpg and png files allowed",

        ]);
        if ($validateBanner) {

            $banner = new Banner();
            $banner->title = $req->title;
            $banner->sub_title = $req->subtitle;
            $banner->body = $req->body;
            $banner->is_active = $req->is_active;
            $name = time() . "-" . $req->title . '.' . $req->image->extension();
            $banner->image = $name;
            try {
                $banner->save();

                $req->image->move(storage_path('app/public/uploads/banners'), $name);
                return Redirect::route('admin.banner')->with('Success', 'Banner added successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Adding banner failed' . $e->getMessage());
            }
        }
    }

    public function editBanner($id)  //edit banner
    {
        $bannerData = Banner::where('id', '=', $id)->first();
        return view('admin.pages.banner.edit-banner', ['bannerData' => $bannerData]);
    }

    public function editBannerValid(Request $req)    //edit banner validation
    {
        $validateBanner = $req->validate([
            'title' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'subtitle' => 'nullable|regex:/^[a-zA-Z ]{5,100}$/',
            'body' => 'nullable|max:500',
            'image' => 'mimes:jpeg,jpg,png',
            'is_active' => 'required|in:1,0',
            'bid' => 'required'

        ], [
            'title.required' => "Enter title",
            'title.regex' => "Alphabets only, 2-100 characters",

            'subtitle.regex' => "Alphabets only, 5-100 characters",

            'body.required' => "Enter body",
            'body.max' => "Maximum 500 characters",

            'image.mimes' => "Only jpeg, jpg and png files allowed",

        ]);
        if ($validateBanner) {

            $banner = Banner::where('id', '=', $req->bid)->first();
            $banner->title = $req->title;
            $banner->sub_title = $req->subtitle;
            $banner->body = $req->body;
            $banner->is_active = $req->is_active;

            try {
                $banner->save();
                if ($req->image) {
                    $name = $req->img_name;
                    $req->image->move(storage_path('app/public/uploads/banners'), $name);
                }
                return Redirect::route('admin.banner')->with('Success', 'Banner updated successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Updating banner failed' . $e->getMessage());
            }
        }
    }

    public function delBanner(Request $req)   //delete banner
    {
        $id = $req->id;
        $banner = Banner::where('id', '=', $id)->first();

        try {
            $img = storage_path('app/public/uploads/banners/') . $banner->image;
            unlink($img);
            $banner->delete();
            return "Banner deleted successfully!";
        } catch (\Illuminate\Database\QueryException $e) {
            return "Error deleting banner - " . $e->getMessage();
        }
    }
}
