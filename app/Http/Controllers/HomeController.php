<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\CallToAction;
use App\Models\Contact;
use App\Models\FeatureCard;
use App\Models\FeaturesTab;
use App\Models\HeroSection;
use App\Models\Message;
use App\Models\Navbar;
use App\Models\Services;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $hero = HeroSection::first();
        $about = AboutSection::first();
        $feature = FeaturesTab::all();
        $features = FeaturesTab::all();
        $FeatureCard = FeatureCard::all();
        $cta = CallToAction::first();
        $testimonial = Testimonials::all();
        $service = Services::all();
        $contact = Contact::first();
        $navbar = Navbar::all();

        // dd($hero);
        return view('home.index', compact(
            'hero',
            'about',
            'feature',
            'FeatureCard',
            'cta',
            'testimonial',
            'service',
            'features',
            'contact',
            'navbar',
        ));
    }

    public function  msgFromHomePage(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $msg = new Message;
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();
        return redirect()->back()->with('success', 'message sent successfully');
    }
}
