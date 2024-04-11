<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    public function faq()
    {
        $faqData = Faq::paginate(10);
        return view('admin.pages.faq.faq', ['faqData' => $faqData]);
    }

    public function addFaq()
    {
        return view('admin.pages.faq.add-faq');
    }
   
    public function faqValid(Request $req)    //add banner validation
    {
        $validateFaq = $req->validate([
            'title' => 'required|regex:/^[a-zA-Z0-9 ]{2,100}$/',
            'description' => 'required|regex:/^[a-zA-Z ]/',

        ], [
            'title.required' => "Enter title",
            'title.regex' => "Alphanumeric only, 2-100 characters",

            'description.required' => "Add Description",
            'description.regex' => "Minimum 10 words are required",

        ]);
        if ($validateFaq) {

            $faq = new Faq();
            $faq->title = $req->title;
            $faq->description = $req->description;
            
            try {
                $faq->save();
                
                return Redirect::route('admin.faq')->with('Success', 'FAQ uploaded successfully!');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Adding banner failed' . $e->getMessage());
            }
        }
    }


    public function editFaq($id)
    {
        $faqData = Faq::where('id', '=', $id)->first();
        return view('admin.pages.faq.edit-faq', ['faqData' => $faqData]);
    }


    public function editFaqValid(Request $req)    //edit banner validation
    {
        
        $validateFaq = $req->validate([
            'title' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
           'description' => 'required|regex:/^[a-zA-Z ]/',

        ], [
            'title.required' => "Enter title",
            'title.regex' => "Alphabets only, 2-100 characters",

            'description.required' => "Enter a valid description",
            'description.regex' => "Enter minimum 10 characters",

        ]);
        if ($validateFaq) {
            $faq = Faq::where('id', '=', $req->id)->first();
            
            $faq->title = $req->title;
            $faq->description = $req->description;

            try {
                $faq->save();
                return Redirect::route('admin.faq')->with('Success', 'FAQ updated successfully');
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('Error', 'Updating banner failed' . $e->getMessage());
            }
        }
    }

    public function delFaq(Request $req)   //delete banner
    {
        $id = $req->id;
        $faq = Faq::where('id', '=', $id)->first();

        $faq->title = $req->title;
        $faq->description = $req->description;

        try {
            $faq->delete();
            return "Faq deleted successfully!";
        } catch (\Illuminate\Database\QueryException $e) {
            return "Error deleting faq - " . $e->getMessage();
        }
    }
}
