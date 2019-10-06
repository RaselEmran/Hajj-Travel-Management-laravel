<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Package;
use App\Service;
use App\ServiceSlider;
use App\User;
use App\Book;
use App\Page;
use App\News;
use App\Comment;
use App\Contact;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider =Slider::where('status','activated')->get();
        $package =Package::where('status','activated')->get();
        $service =Service::where('status','activated')->get();
        $service_slider =ServiceSlider::where('status','activated')->get();
        return view('pages.main',compact(
        'slider',
        'package',
        'service',
        'service_slider'
        ));
    }

    public function details(Request $request,$slug,$id)
    {
        $package =Package::where('id',$id)->where('slug',$slug)->firstOrfail();
        return view('pages.pkg_details',compact('package'));

    }

    public function book(Request $request)
    {
        if ($request->ajax()) {
          $validator = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric'],
            'subject' => ['required','max:255'],
            'messege' => ['required','string']
        ]);

        $ip =getVisIpAddr();
        $getvalue=  getVisIpDetails($ip);

        $user = New User;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->subject =$request->subject;
        $user->messege =$request->messege;
        $user->ip =$ip;
        $user->country =$getvalue->geoplugin_countryName;
        $user->city =$getvalue->geoplugin_city;
        $user->continent =$getvalue->geoplugin_continentName;
        $user->latitude =$getvalue->geoplugin_latitude;
        $user->longitude =$getvalue->geoplugin_longitude;
        $user->currency_symbol =$getvalue->geoplugin_currencySymbol;
        $user->currency_code =$getvalue->geoplugin_currencyCode;
        $user->timezone =$getvalue->geoplugin_timezone;
        $user->save();

        $book =new Book;
        $book->user_id =$user->id;
        $book->package_id =$request->package_id;
        $book->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Book Confirm')]);
        }
    }


    public function about()
    {

       $about = Page::where('key', 'about')->select('key','value')->first();
        $aboutinfo =null;

     if ($about) {
        $aboutinfo=json_decode($about->value);
     }

     return view('pages.about',compact('aboutinfo'));
    }

    public function umrah()
    {
      $about = Page::where('key', 'about')->select('key','value')->first();
        $aboutinfo =null;

     if ($about) {
        $aboutinfo=json_decode($about->value);
     }
        $packages =Package::where('type','umrah')->where('status','activated')->get();
        return view('pages.umrah',compact('packages','aboutinfo'));
    }

   public function hajj()
   {
       $about = Page::where('key', 'about')->select('key','value')->first();
        $aboutinfo =null;

     if ($about) {
        $aboutinfo=json_decode($about->value);
     }
        $packages =Package::where('type','hajj')->where('status','activated')->get();
        return view('pages.hajj',compact('packages','aboutinfo'));
     }

    public function news()
    {

    $about = Page::where('key', 'about')->select('key','value')->first();
        $aboutinfo =null;

     if ($about) {
        $aboutinfo=json_decode($about->value);
     }
        $news =News::where('status','activated')->paginate(12);
        return view('pages.news',compact('news','aboutinfo'));
     }

     public function news_details(Request $request ,$slug,$id)
     {
        $populars =News::get()->take(4)->except($id);
        $comments =Comment::findOrFail(1);
        $news =News::where('id',$id)->where('slug',$slug)->firstOrfail();
        return view('pages.news_details',compact('news','populars','comments'));
     }

     public function contact()
     {
         $contact = Page::where('key', 'contact')->select('key','value')->first();
           $contactinfo =null;
    if ($contact) {
        $contactinfo=json_decode($contact->value);
     }

     return view('pages.contact',compact('contactinfo'));
     }

     public function post_contact(Request $request)
     {
         if ($request->ajax()) {
          $validator = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required','numeric'],
            'subject' => ['required','max:255'],
            'messege' => ['required','string']
        ]);

        $contact = New Contact;
        $contact->name =$request->name;
        $contact->email =$request->email;
        $contact->phone =$request->phone;
        $contact->subject =$request->subject;
        $contact->messege =$request->messege;
        $contact->save();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Thank For Your Response')]);
      }
     }
  

  public function question(Request $request)
  {
    if ($request->ajax()) {
          $validator = $request->validate([
            'qname' => ['required', 'max:255'],
            'qemail' => ['required', 'string', 'email', 'max:255', 'unique:questions'],
            'ques' => ['required','string']
        ]);
    $question =new Question;
    $question->package_id =$request->package_id;
    $question->qname =$request->qname;
    $question->qemail =$request->qemail;
    $question->ques =$request->ques;
    $question->save();
    return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Thank For Your Feedback')]);

  }
  }
}
