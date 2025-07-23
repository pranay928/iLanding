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
        // dd($hero);
        return view('home.index', compact(
            'hero',
            'about',
            'feature',
            'FeatureCard',
            'cta',
            'testimonial',
            'service','features','contact',
        ));
    }
}
