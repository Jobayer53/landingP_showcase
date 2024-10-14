<?php

namespace App\Http\Controllers\Admin;

use App\Models\BenefitList;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingPageController extends Controller
{
    public function index(){
        $landing = LandingPage::find(1);
        $feedback = explode(',', $landing?->feedback_image);
        $benefitLists = BenefitList::where('landing_page_id',$landing?->id)->get();
        // dd($feedback);
        return view('dashboard.pages.landing_page.index',[
            'landing' => $landing,
            'feedback' => $feedback,
            'benefitLists' => $benefitLists
        ]);
    }
    public function store(Request $request){
        // dd($request->all());

        $x = false;
        if(is_null(LandingPage::find(1))){
            $landing = new LandingPage;
            $x = true;
        }else{
            $landing = LandingPage::find(1);
        }
        $landing->header = $request->header;
        $landing->short_description  = $request->short_desc;
        $landing->quote_one  = $request->quote_one;
        if($request->uploaded_video){
            if($landing->video){
                unlink(public_path('uploads/landing/'.$landing->video));
            }
            $video_file = $request->file('uploaded_video');
            $file_name = 'FILE-' . time() . '.' . $video_file->getClientOriginalExtension();
            $video_file->move(public_path('uploads/landing/'), $file_name);
            $landing->video = $file_name;
            $landing->youtube_link = null;
        }
        if($request->yt_link){
            $landing->youtube_link = $request->yt_link;

            if($landing->video){
                unlink(public_path('uploads/landing/'.$landing->video));
            }
            $landing->video = null;
        }
        if($request->image){
            if($landing->image){
                unlink(public_path('uploads/landing/'.$landing->image));
            }
            $image_file = $request->file('image');
            $image_name = 'IMAGE-' . time() . '.' . $image_file->getClientOriginalExtension();
            $image_file->move(public_path('uploads/landing/'), $image_name);
            $landing->image = $image_name;
        }
        $landing->quote_two  = $request->quote_two;
        if($request->feedback_image){
            $file = $request->file('feedback_image');
            $feedback_name = 'FEEDBACK-IMAGE-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/landing/'), $feedback_name);
            if($landing->feedback_image){
                $exsisting = explode(',', $landing->feedback_image);
                array_push($exsisting, $feedback_name);
                $landing->feedback_image = implode(',', $exsisting);
            }else{
                $landing->feedback_image = $feedback_name;
            }
        }
        $landing->benefit_title  = $request->benefit_header;


        if($request->benefit_image){
            if($landing->benefit_image){
                unlink(public_path('uploads/landing/'.$landing->benefit_image));
            }
            $benefit_file = $request->file('benefit_image');
            $benefit_name = 'BENEFIT-IMAGE-' . time() . '.' . $benefit_file->getClientOriginalExtension();
            $benefit_file->move(public_path('uploads/landing/'), $benefit_name);
            $landing->benefit_image = $benefit_name;
        }
        $landing->uses_title = $request->uses_title;
        $landing->uses  = $request->uses;
        if($request->product_image){
            if($landing->product_image){
                unlink(public_path('uploads/landing/'.$landing->product_image));
            }
            $product_file = $request->file('product_image');
            $product_name = 'PRDUCT-IMAGE-' . time() . '.' . $product_file->getClientOriginalExtension();
            $product_file->move(public_path('uploads/landing/'), $product_name);
            $landing->product_image = $product_name;
        }
        $landing->product_name = $request->product_name;
        $landing->product_price = $request->product_price;

        $landing->save();
         // benefit list
         $benefitLists = $request->input('benefit_list', []);

         // Assuming there's a user ID or some identifier to associate with the benefits
         $id = $landing->id;

         // Fetch current benefits from database to compare
         $currentBenefits = BenefitList::where('landing_page_id', $id)->get();

         // Sync the benefits - Add new, update existing, and remove old
         $newBenefits = array_diff($benefitLists, $currentBenefits->pluck('list')->toArray());
         $removedBenefits = array_diff($currentBenefits->pluck('list')->toArray(), $benefitLists);

         // Remove old benefits
         foreach ($removedBenefits as $benefit) {
             BenefitList::where('landing_page_id', $id)->where('list', $benefit)->delete();
         }

         // Add new benefits
         foreach ($newBenefits as $benefit) {
             BenefitList::create([
                 'landing_page_id' => $id,
                 'list' => $benefit
             ]);
         }

        flash()->option('position', 'top-right')->success('Landing Page Data'.($x?' Created':' Updated').' Successfully');
        return back();



    }

    public function benefit_list_delete(Request $request){
        $benefit = BenefitList::find($request->benefit_id);
        $benefit->delete();
        flash()->option('position', 'top-right')->success('Benefit Deleted Successfully');
        return back();
    }
    public function feedback_image_delete($data){
        $landing = LandingPage::findOrFail(1); // Fetch the record based on ID

        $imageNameToDelete = $data; // Get the image name from the request

        if ($landing->feedback_image) {
            $existingImages = explode(',', $landing->feedback_image); // Convert string to array
            $filteredImages = array_filter($existingImages, function($image) use ($imageNameToDelete) {
                return $image != $imageNameToDelete; // Remove the specified image from the array
            });

            if (count($existingImages) != count($filteredImages)) {
                $landing->feedback_image = implode(',', $filteredImages); // Convert array back to string
                $landing->save(); // Save the updated record

                // Optionally, delete the file from the server
                $file_path = public_path('uploads/landing/') . $imageNameToDelete;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                flash()->option('position', 'top-right')->success('Feedback Image Deleted Successfully');
                return back();
            } else {
                return back()->with('error', 'Image not found.');
            }
        }

        return back()->with('error', 'No images found.');
    }

}
