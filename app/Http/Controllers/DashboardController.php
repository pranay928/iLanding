<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\CallToAction;
use App\Models\Contact;
use App\Models\FeatureCard;
use App\Models\FeaturesTab;
use App\Models\HeroSection;
use App\Models\Services;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

interface Dashboardinterface
{
    public function index();
    public function showAddToHeroSection();
    public function showAddToAboutSection();
    public function showFeaturesSection();
    public function addToHeroSection(Request $request);
    public function addToAboutSection(Request $request);
    public function AddToFeaturesSection(Request $request);
    
}


class DashboardController extends Controller  implements Dashboardinterface
{

    public function index()
    {

        $user = Auth::user();

        if (!$user) {

            return redirect()->route('showLogin')->with('error', 'Please login first.');
        }

        if ($user->userType === 'admin') {
            return view('admin.layouts.dashboard', compact('user'));
        }

        // If userType is NULL or not admin, redirect back
        return redirect()->back()->with('warning', 'You do not have access to this page.');
    }

    public function showAddToHeroSection()
    {

        $hero = HeroSection::firstOrNew();
        $user = Auth::user();
        return view('admin.layouts.heroSection.add', compact('user', 'hero'));
    }

    public function showAddToAboutSection()
    {
        $about = AboutSection::firstOrNew();
        $user = Auth::user();

        return view('admin.layouts.aboutSection.add', compact('user', 'about'));
    }

    public function showFeaturesSection()
    {
        $feature = FeaturesTab::all();
        $user = Auth::user();
        // dd($feature);

        return view('admin.layouts.featuresSection.table', compact('user', 'feature'));
    }

    public function showAddTooFeaturesSection()
    {
        $user = Auth::user();
        $features = FeaturesTab::all();

        return view('admin.layouts.featuresSection.add', compact('user', 'features'));
    }

        public function showModifyFeaturesSection($id)
    {
        $feature =  FeaturesTab::find($id);
        $user =Auth::user();
        
        return view('admin.layouts.featuresSection.update',compact('user','feature'));

    }
    
    public function DeleteToFeaturesSection($id){
        $data = FeaturesTab::find($id);
        $data->delete();
        return redirect()->back()->with('success','Data deleted successfully');
    }

    public function showFeaturesCardSection(){
        $user = Auth::user();
        return view('admin.layouts.featureCard.add',compact('user'));
    }

    public function showFeaturesCardTableSection(){
        $user = Auth::user();
        $card = FeatureCard::all();

        return view('admin.layouts.featureCard.table',compact('user','card'));

    }

    public function showModifyFeatureCardSection($id){
        $user = Auth::user();
        $card = FeatureCard::find($id);
        
        return view('admin.layouts.featureCard.update',compact('card','user'));

    }

    public function DeleteToFeatureCardSection($id){
        $data = FeatureCard::find($id);
        $data->delete();
        return redirect()->back()->with('success','Data deleted successfully');
        
    }
    
    public function showAddToCTASection(){
        $user = Auth::user();
        $cta = CallToAction::firstOrNew();
        return view('admin.layouts.callToAction.add',compact('user','cta'));
    }

    public function showAddToTestimonialSection(){
        $user = Auth::user();
        return view('admin.layouts.testimonials.add',compact('user'));
    }


    public function showAddToTestimonialTableSection(){
        $user = Auth::user();
        $testimonial = Testimonials::all();
        return view('admin.layouts.testimonials.table',compact('user','testimonial'));
    }
    
    
    public function showUpdateToTestimonialSection($id){
        $user = Auth::user();
        $testimonial = Testimonials::find($id);

        return view('admin.layouts.testimonials.update',compact('user','testimonial'));
        
    }
    
    public function DeleteToTestimonialSection($id){
        $data = Testimonials::find($id);
        $data->delete();
        return redirect()->back()->with('success','Data deleted successfully');

    
    }

    public function showAddToServicesSection(){
        $user = Auth::user();        
        return view('admin.layouts.servicesSection.add',compact('user'));
        
    }

    public function showAddToServicesTableSection(){
        $service = Services::all();
        $user = Auth::user();
        return view('admin.layouts.servicesSection.table',compact('user','service'));
    }

    public function showUpdateToTeServicesSection($id){
        $user = Auth::user();
        $services = Services::find($id);
        return view('admin.layouts.servicesSection.update',compact('user','services'));
    }


    public function showAddToContactSection(){
        $user= Auth::user();
        $contact = Contact::firstOrNew();
        return view('admin.layouts.contactSection.add',compact('user','contact'));
    }


    public function addToHeroSection(Request $request)

    {
        $validation = Validator::make($request->all(), [
            'badge_text' => ['required'],
            'heading' => ['required'],
            'highlight_text' => ['required'],
            'description' => ['required'],
            'button_1_text' => ['required'],
            'button_1_link' => ['required'],
            'button_2_text' => ['required'],
            'button_2_link' => ['required'],
            'customer_text' => ['required'],
            'main_image' => ['required'],
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $hero = HeroSection::first();

        if (!$hero) {
            $data = new HeroSection;
            $data->badge_text = $request->input('badge_text');
            $data->heading =  $request->input('heading');
            $data->highlight_text = $request->input('highlight_text');
            $data->description = $request->input('description');
            $data->button_1_text  = $request->input('button_1_text');
            $data->button_1_link  = $request->input('button_1_link');
            $data->button_2_text  = $request->input('button_2_text');
            $data->button_2_link  = $request->input('button_2_link');
            $data->customer_text = $request->input('customer_text');


            $image = $request->main_image;

            if ($image) {

                $imagename = time() . '.' . $image->getClientOriginalExtension();

                $request->main_image->move('admin\dynamicImages\hero', $imagename);
                $data->main_image  = $imagename;
            }

            $data->save();

            return redirect()->back()->with('success', 'data added successfully');
        }

        $hero->badge_text = $request->input('badge_text');
        $hero->heading =  $request->input('heading');
        $hero->highlight_text = $request->input('highlight_text');
        $hero->description = $request->input('description');
        $hero->button_1_text  = $request->input('button_1_text');
        $hero->button_1_link  = $request->input('button_1_link');
        $hero->button_2_text  = $request->input('button_2_text');
        $hero->button_2_link  = $request->input('button_2_link');
        $hero->customer_text = $request->input('customer_text');

        $image = $request->main_image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->main_image->move('admin\dynamicImages\hero', $imagename);
            $hero->main_image  = $imagename;
        }

        $hero->update();

        return redirect()->back()->with('success', 'Data Updated Successfully');
    }



    public function addToAboutSection(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'meta' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'profile_name' => ['required'],
            'profile_position' => ['required'],
            'contact_label' => ['required'],
            'contact_number' => ['required'],
            'experience_text' => ['required'],
            'experience_years' => ['required'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $about = AboutSection::first();

        if (!$about) {

            $data = new AboutSection;
            $data->meta = $request->meta;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->profile_name = $request->profile_name;
            $data->profile_position = $request->profile_position;
            $data->contact_label = $request->contact_label;
            $data->contact_number = $request->contact_number;
            $data->experience_text = $request->experience_text;
            $data->experience_years = $request->experience_years;

            $profileimg = $request->profile_image;
            $mainimg = $request->main_image;
            $smallimg = $request->small_image;
            function imageToDB($image, &$data, $fieldName)
            {

                if ($image) {
                    $imagename = rand(1000, 10000000) . '.' . $image->getClientOriginalExtension();
                    $image->move('admin/dynamicImages/about', $imagename);
                    $data->$fieldName = $imagename;
                } else {
                    return error('image does not exit');
                }
            }


            imageToDB($profileimg, $data, 'profile_image');
            imageToDB($mainimg, $data, 'main_image');
            imageToDB($smallimg, $data, 'small_image');

            $data->save();

            return redirect()->back()->with('success', 'data added successfully');
        }


        $about->meta = $request->meta;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->profile_name = $request->profile_name;
        $about->profile_position = $request->profile_position;
        $about->contact_label = $request->contact_label;
        $about->contact_number = $request->contact_number;
        $about->experience_text = $request->experience_text;
        $about->experience_years = $request->experience_years;


        $profileimg = $request->profile_image;
        $mainimg = $request->main_image;
        $smallimg = $request->small_image;
        function imageToDB($image, &$about, $fieldName)
        {
            if ($image) {

                $imagename = rand(10000, 1000000000) . '.' . $image->getClientOriginalExtension();
                $image->move('admin/dynamicImages/about', $imagename);
                $about->$fieldName = $imagename;
            }
        }



        imageToDB($profileimg, $about, 'profile_image');
        imageToDB($mainimg, $about, 'main_image');
        imageToDB($smallimg, $about, 'small_image');


        $about->update();


        return redirect()->back()->with('success', 'data Updated successfully');
    }

    public function AddToFeaturesSection(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'tab_title' => ['required'],
            'heading' => ['required'],
            'description' => ['required'],
            'feature_list_first' => ['required'],
            'feature_list_second' => ['required'],
            'feature_list_third' => ['required'],
            'feature_list_fourth' => ['required'],
            'image' => ['required'],

        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $features = FeaturesTab::get();
        if ($features->count() <= 2) {

            $data = new FeaturesTab();
            $data->tab_title = $request->tab_title;
            $data->heading = $request->heading;
            $data->description = $request->description;
            $data->feature_list_first = $request->feature_list_first;
            $data->feature_list_second = $request->feature_list_second;
            $data->feature_list_third = $request->feature_list_third;
            $data->feature_list_fourth = $request->feature_list_fourth;

            $image = $request->image;
            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('admin/dynamicImages/feature', $imagename);
                $data->image = $imagename;
            }
            $data->save();
            return redirect()->back()->with('success', 'Data added successfully');
        } else {
            return redirect()->back()->withErrors('only three entry allowed');
        }
    }

    public function UpdateToFeaturesSection(Request $request,$id){

        $validation = Validator::make($request->all(), [
            'tab_title' => ['required'],
            'heading' => ['required'],
            'description' => ['required'],
            'feature_list_first' => ['required'],
            'feature_list_second' => ['required'],
            'feature_list_third' => ['required'],
            'feature_list_fourth' => ['required'],
            'image' => ['required'],

        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data = FeaturesTab::find($id);

        $data->tab_title = $request->tab_title;
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->feature_list_first = $request->feature_list_first;
        $data->feature_list_second = $request->feature_list_second;
        $data->feature_list_third = $request->feature_list_third;
        $data->feature_list_fourth = $request->feature_list_fourth;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/dynamicImages/feature', $imagename);
            $data->image = $imagename;
        }
        $data->update();

        return redirect()->back()->with('success','data updated succesfully'); 
        
    }


    public function AddToFeaturesCardSection(Request $request){
       $validation = Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['required'],
            'color' => ['required', 'regex:/^#(?:[0-9a-fA-F]{3}){1,2}$|^[a-zA-Z]+$/'],  
       ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }


          $features = FeatureCard::all();
            if ($features->count() <= 3) {
            $data = new FeatureCard;

            $data->title = $request->title;
            $data->description = $request->description;
            $data->color = $request->color;
            $data->save();

            return redirect()->back()->with('success',"Data added successfully");
        }
        else {
            return redirect()->back()->withErrors('only four entry allowed for Now Contact Admin for more entry !');
        }


    }



    public function UpdateToFeaturesCardSection(Request $request,$id){
        $validation = Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['required'],
            'color' => ['required', 'regex:/^#(?:[0-9a-fA-F]{3}){1,2}$|^[a-zA-Z]+$/'],  
       ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $data = FeatureCard::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->color = $request->color;
        $data->update();

        return redirect()->back()->with('success','Data Updated successfully');
    }


    public function AddToCTASection(Request $request){
        $validation = Validator::make($request->all(),[
            'heading' => ['required'],
            'subtext' => ['required'],
            'button_text' => ['required'],
            'button_link' => ['required'],
            
       ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $cta = CallToAction::first();
        if(!$cta){
            $data = new CallToAction;
            $data->heading = $request->heading; 
            $data->subtext = $request->subtext; 
            $data->button_text = $request->button_text; 
            $data->button_link = $request->button_link; 
            $data->save();

            return redirect()->back()->with('success','Data added Successfully');
        }

            $cta->heading = $request->heading; 
            $cta->subtext = $request->subtext; 
            $cta->button_text = $request->button_text; 
            $cta->button_link = $request->button_link; 
            $cta->update();

            return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function AddToTestimonialSection(Request $request){
         $validation = Validator::make($request->all(),[
            'name' => ['required'],
            'designation' => ['required'],
            'image' => ['required'],
            'rating' => ['required','integer','min:1','max:5'],
            'message' => ['required'],
       ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $testimunial = new Testimonials;
        $testimunial->name = $request->name;
        $testimunial->designation = $request->designation;
        $testimunial->rating = $request->rating;
        $testimunial->message = $request->message;

        $image = $request->image ;
         if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/dynamicImages/testimonials', $imagename);
            $testimunial->image = $imagename;
        }
        $testimunial->save();
        return redirect()->back()->with('success','data added successfully');

    }

    public function UpdateToTestimonialSection(Request $request , $id){
         $validation = Validator::make($request->all(),[
            'name' => ['required'],
            'designation' => ['required'],
            'image' => ['required'],
            'rating' => ['required','integer','min:1','max:5'],
            'message' => ['required'],
       ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $testimunial =Testimonials::find($id);
        $testimunial->name = $request->name;
        $testimunial->designation = $request->designation;
        $testimunial->rating = $request->rating;
        $testimunial->message = $request->message;

        $image = $request->image ;
         if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/dynamicImages/testimonials', $imagename);
            $testimunial->image = $imagename;
        }
        $testimunial->update();
        return redirect()->back()->with('success','data Updated successfully');

    }

    public function AddToServicesSection(Request $request){

        $validation = Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['required'],
            'link' => ['required'],
        ]);
               if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }


         $Services = Services::all();
            if ($Services->count() <= 3) {
    
                $data = new Services;
                $data->title = $request->title;
                $data->description = $request->description;
                $data->link = $request->link;
                $data->save();

                return redirect()->back()->with('success','Data added successfully');           
        }
        else {
            return redirect()->back()->withErrors('only four entry allowed for Now Contact Admin for more entry !');
        }
    }

    public function UpdateToTeServicesSection(Request $request,$id){
         $validation = Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['required'],
            'link' => ['required'],
        ]);
               if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

         $data = Services::find($id);
         $data->title = $request->title;
         $data->description = $request->description;
         $data->link = $request->link;
         $data->update();

         return redirect()->back()->with('success','Data Updated Successfully');


    }


    public function AddToContactSection(Request $request){
          $validation = Validator::make($request->all(),[
            'section_description' => ['required'],
            'intro_text' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'phone_1' => ['required'],
            'phone_2' => ['required'],
            'email_1' => ['required'],
            'email_2' => ['required'],
            'form_text' => ['required'],
        ]);
               if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $data = Contact::first();
        if(!$data){

            $contact = new Contact;
            $contact->section_description = $request->section_description;
            $contact->intro_text = $request->intro_text;
            $contact->address_line_1 = $request->address_line_1;
            $contact->address_line_2 = $request->address_line_2;
            $contact->phone_1 = $request->phone_1;
            $contact->phone_2 = $request->phone_2;
            $contact->email_1 = $request->email_1;
            $contact->email_2 = $request->email_2;
            $contact->form_text = $request->form_text;
            $contact->save();

            return redirect()->back()->with('success','Data added successfully');
        }

         
            $data->section_description = $request->section_description;
            $data->intro_text = $request->intro_text;
            $data->address_line_1 = $request->address_line_1;
            $data->address_line_2 = $request->address_line_2;
            $data->phone_1 = $request->phone_1;
            $data->phone_2 = $request->phone_2;
            $data->email_1 = $request->email_1;
            $data->email_2 = $request->email_2;
            $data->form_text = $request->form_text;
            $data->update();

            return redirect()->back()->with('success','Data updated successfully');

    }


}
