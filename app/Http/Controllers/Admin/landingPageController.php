<?php

namespace App\Http\Controllers\Admin;

use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingPageController extends Controller
{
    public function index(){
        return view('dashboard.pages.landing_page.index');
    }
    public function store(Request $request){
        // dd($request->all());
        $landing = new LandingPage;
        $landing->header = $request->header;
        $landing->short_desc  = $request->short_desc;
        $landing->quote_one  = $request->quote_one;
        if($request->uploader_video){
            $file = $request->file('uploader_video');
            $file_name = 'FILE-' . time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/landing/'), $file_name);
            $landing->video = $file->getClientOriginalName();
        }
        $request->yt_link ? $landing->video = $request->yt_link : '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = 'IMAGE-' . time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/landing/'), $image_name);
            $landing->image = $image_name;
        }
        $landing->quote_two  = $request->quote_two;
        if($request->hasFile('feedback_image')){
            $file = $request->file('feedback_image');
            $feedback_name = 'FEEDBACK-IMAGE-' . time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/landing/'), $feedback_name);
            $landing->feedback_image = $feedback_name;
        }
        $landing->benefit_title  = $request->benefit_header;
        if($request->hasFile('benefit_image')){
            $file = $request->file('benefit_image');
            $benefit_name = 'BENEFIT-IMAGE-' . time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/landing/'), $benefit_name);
            $landing->benefit_image = $benefit_name;
        }
        $landing->uses_title = $request->uses_title;
        $landing->uses  = $request->uses;
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $product_name = 'PRDUCT-IMAGE-' . time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('uploads/landing/'), $product_name);
            $landing->product_image = $product_name;
        }
        $landing->product_name = $request->product_name;
        $landing->product_price = $request->product_price;
        $landing->save();
        return back();


    }
}
