<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactForm;
use App\Models\Department;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Redirect;

class FEController extends Controller
{
    public function indexPage()
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->where('is_active', 1)->limit(6)->get();
        $brandData = Brand::all();
        $popularProductData = Product::where('type', 1)->get(); // Type 1 = Feautured
        $custData = Vendor::all();
        $deptData = Department::all();
        return view('frontend.index', ['bannerData' => $bannerData, 'brandData' => $brandData, 'productData' => $popularProductData, 'custData' => $custData, 'deptData' => $deptData]);
    }

    public function productsPage(Request $request)
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->where('is_active', 1)->limit(6)->get();
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        $productQuery = new Product();
        $requestBrands = array();
        $requestCategory = array();

        if ($request->brands) {
            $productQuery = $productQuery->whereIn('brand_id', $request->brands);
            $requestBrands = $request->brands;
        }
        if ($request->category) {
            $productQuery = $productQuery->whereIn('category_id', $request->category);
            $requestCategory = $request->category;
        }

        $productData = $productQuery->orderBy('type', 'DESC')->paginate(9);
        return view('frontend.products', ['categories' => $categories, 'brands' => $brands, 'productData' => $productData, 'requestBrands' => $requestBrands, 'requestCategory' => $requestCategory, 'bannerData' => $bannerData]);
    }

    public function faqPage()
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->where('is_active', 1)->limit(6)->get();
        $faqs = Faq::all();
        return view('frontend.faqs', ['faqs' => $faqs, 'bannerData' => $bannerData]);
    }

    public function contactPage()
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->where('is_active', 1)->limit(6)->get();
        return view('frontend.contact_us', ['bannerData' => $bannerData]);
    }

    public function teamPage()
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->where('is_active', 1)->limit(6)->get();
        return view('frontend.team', ['bannerData' => $bannerData]);
    }

    public function aboutUs()
    {
        $bannerData = Banner::orderBy('created_at', 'DESC')->where('is_active', 1)->limit(6)->get();
        return view('frontend.about_us', ['bannerData' => $bannerData]);
    }

    public function submitContactForm(Request $req)
    {
        $validateForm = $req->validate([
            'name' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'contact_no' => 'required|digits:10',
            'message' => 'required|regex:/^[a-zA-Z0-9 ]{2,500}$/',

        ], [
            'name.required' => "Enter title",
            'name.regex' => "Alphabets only, 2-100 characters",
            'contact_no.required'=> "Contact number is required",
            'contact_no.digits' => "Only 10 digits allowed",
            'message.max' => "Alphanumeric only, 2-500 characters",

        ]);
        if ($validateForm) {

            $contactus = new ContactForm();
            $contactus->name = $req->name;
            $contactus->email = $req->email;
            $contactus->contact = $req->contact_no;
            $contactus->message = $req->message;
            try {
                $contactus->save();
                return Redirect::route('index')->with('Success', 'Contact form submitted successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Oops! Something went wrong. Try again later.');
            }
        }
    }
}
