<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $home = Page::where('key', 'home')->select('key','value')->first();
     $about = Page::where('key', 'about')->select('key','value')->first();
     $contact = Page::where('key', 'contact')->select('key','value')->first();
     $news = Page::where('key', 'news')->select('key','value')->first();
     $hajj = Page::where('key', 'hajj')->select('key','value')->first();
     $umrah = Page::where('key', 'umrah')->select('key','value')->first();
     $homeinfo =null;
     $aboutinfo =null;
     $newsinfo =null;
     $hajjinfo =null;
     $umrahinfo =null;
     $contactinfo =null;

     if ($home) {
        $homeinfo=json_decode($home->value);
     }
     if ($about) {
        $aboutinfo=json_decode($about->value);
     }
     if ($contact) {
        $contactinfo=json_decode($contact->value);
     }

     if ($news) {
        $newsinfo=json_decode($news->value);
     }

     if ($hajj) {
        $hajjinfo=json_decode($hajj->value);
     }
     if ($umrah) {
        $umrahinfo=json_decode($umrah->value);
     }
        return view('admin.pages.index',compact(
            'homeinfo',
            'aboutinfo',
            'contactinfo',
            'newsinfo',
            'hajjinfo',
            'umrahinfo'

        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->ajax()) {
        $validator = $request->validate([
          'about_banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',
          'about_image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
          'contact_image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $home['meta_title'] =$request->meta_title;
        $home['meta_keyword'] =$request->meta_keyword;
        $home['meta_description'] =$request->meta_description;

          //now crate Home page
            Page::updateOrCreate(
                ['key' => 'home'],
                ['value' => json_encode($home)]
            );
          //about
            if($request->hasFile('about_banner')) {
            $storagepath = $request->file('about_banner')->store('public/pages');
            $fileName = basename($storagepath);
            $about['about_banner'] = $fileName;

            //if file chnage then delete old one
            $oldFile = $request->get('old_about_banner','');
            if( $oldFile != ''){
                $file_path = "public/pages/".$oldFile;
                Storage::delete($file_path);
            }
            }
            else{
                $about['about_banner'] = $request->get('old_about_banner','');
            }
            //................

             if($request->hasFile('about_image')) {
            $storagepath = $request->file('about_image')->store('public/pages');
            $fileName = basename($storagepath);
            $about['about_image'] = $fileName;

            //if file chnage then delete old one
            $oldFile = $request->get('old_about_image','');
            if( $oldFile != ''){
                $file_path = "public/pages/".$oldFile;
                Storage::delete($file_path);
            }
            }
            else{
                $about['about_image'] = $request->get('old_about_image','');
            }

            $about['about_content'] =$request->about_content;
            $about['about_meta_title'] =$request->about_meta_title;
            $about['about_meta_keyword'] =$request->about_meta_keyword;
            $about['about_meta_description'] =$request->about_meta_description;
              //now crate about page
            Page::updateOrCreate(
                ['key' => 'about'],
                ['value' => json_encode($about)]
            );
            //contact
            if($request->hasFile('contact_image')) {
            $storagepath = $request->file('contact_image')->store('public/pages');
            $fileName = basename($storagepath);
            $contact['contact_image'] = $fileName;

            //if file chnage then delete old one
            $oldFile = $request->get('old_contact_image','');
            if( $oldFile != ''){
                $file_path = "public/pages/".$oldFile;
                Storage::delete($file_path);
            }
            }
            else{
                $contact['contact_image'] = $request->get('old_contact_image','');
            }

            $contact['contact_heading'] =$request->contact_heading;
            $contact['contact_address'] =$request->contact_address;
            $contact['contact_email'] =$request->contact_email;
            $contact['contact_phone'] =$request->contact_phone;
            $contact['contact_map'] =$request->contact_map;
            $contact['contact_meta_title'] =$request->contact_meta_title;
            $contact['contact_meta_keyword'] =$request->contact_meta_keyword;
            $contact['contact_meta_description'] =$request->contact_meta_description;
              //now crate contact page
            Page::updateOrCreate(
                ['key' => 'contact'],
                ['value' => json_encode($contact)]
            );

            //news

            $news['news_heading'] =$request->news_heading;
            $news['news_meta_title'] =$request->news_meta_title;
            $news['news_meta_keyword'] =$request->news_meta_keyword;
            $news['news_meta_description'] =$request->news_meta_description;
         ;
              //now crate news page
            Page::updateOrCreate(
                ['key' => 'news'],
                ['value' => json_encode($news)]
            );

              //hajj

            $hajj['hajj_heading'] =$request->hajj_heading;
            $hajj['hajj_meta_title'] =$request->hajj_meta_title;
            $hajj['hajj_meta_keyword'] =$request->hajj_meta_keyword;
            $hajj['hajj_meta_description'] =$request->hajj_meta_description;
         ;
              //now crate hajj page
            Page::updateOrCreate(
                ['key' => 'hajj'],
                ['value' => json_encode($hajj)]
            );

              //umrah

            $umrah['umrah_heading'] =$request->umrah_heading;
            $umrah['umrah_meta_title'] =$request->umrah_meta_title;
            $umrah['umrah_meta_keyword'] =$request->umrah_meta_keyword;
            $umrah['umrah_meta_description'] =$request->umrah_meta_description;
         ;
              //now crate umrah page
            Page::updateOrCreate(
                ['key' => 'umrah'],
                ['value' => json_encode($umrah)]
            );

            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Updated')]); 
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
