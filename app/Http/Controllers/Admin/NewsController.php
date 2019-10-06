<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Comment;
use App\News;

class NewsController extends Controller
{

     private function route() {
      return 'admin.news.';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index');
    }

    public function datatable(Request $request) {

        if ($request->ajax()) {
            $model = News::all();
            return Datatables::of($model)
            ->addIndexColumn()
            ->editColumn('photo',function($model){
                $url= asset('storage/news/'.$model->photo);
                return '<img src="'.$url.'" border="0" width="120" class="img-rounded" align="center" />';
            })
            ->editColumn('category_id', function ($model) {
                return $model->category->name;
            })
            ->editColumn('status', function ($model) {
                $route =$this->route();
                return view('admin.status', compact('model','route'));
            })
            
            ->addColumn('action', function ($model) {
                return view('admin.news.action', compact('model'));
            })->rawColumns(['action','photo','status'])->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category =Category::all()->pluck('name','id')->prepend(_lang('Select One'), '');
      return view('admin.news.form',compact('category'));
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
            'title' => ['required', 'max:255'],
            'short_content' => ['required', 'max:255'],
            'news_content' => ['required'],
            'date' => ['required','date'],
            'category.id' => ['required','integer'],
            'photo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            'banner' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

           $news =new News;
           if($request->hasFile('photo')) {
              $storagepath = $request->file('photo')->store('public/news');
              $fileName = basename($storagepath);
              $news->photo = $fileName;
          }

            if($request->hasFile('banner')) {
              $storagepath = $request->file('banner')->store('public/news');
              $fileName = basename($storagepath);
              $news->banner = $fileName;
            }
          $news->title =$request->title;
          $news->slug =str_slug($request->title);
          $news->short_content =$request->short_content;
          $news->news_content =$request->news_content;
          $news->date =$request->date;
          $news->category_id =$request->category['id'];
          $news->meta_title =$request->meta_title;
          $news->meta_keywords =$request->meta_keywords;
          $news->meta_description =$request->meta_description;
          $news->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('News Inserted')]); 

      }
    }

  public function status(Request $request, $value, $id) {


      if (request()->ajax()) {
        $news = News::find($id);
        $news->status = $value;
            $news->save();

            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Status Updated')]);
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
        $model =News::findOrfail($id);
        $category =Category::all()->pluck('name','id')->prepend(_lang('Select One'), '');
        return view('admin.news.form',compact('category','model'));
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
           if ($request->ajax()) {

           $validator = $request->validate([
            'title' => ['required', 'max:255'],
            'short_content' => ['required', 'max:255'],
            'news_content' => ['required'],
            'date' => ['required','date'],
            'category.id' => ['required','integer'],
            'photo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'banner' => 'mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

          $news =News::findOrfail($id);
         
        if ($request->hasFile('photo')) {
          $storagepath = $request->file('photo')->store('public/news');
          $fileName = basename($storagepath);
          $news->photo = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldphoto', '');
          if ($oldFile != '') {
            $file_path = "public/news" . $oldFile;
            Storage::delete($file_path);
           }
          } 
          else {
             $news->photo = $request->get('oldphoto', '');
           }


        if ($request->hasFile('banner')) {
          $storagepath = $request->file('banner')->store('public/news');
          $fileName = basename($storagepath);
          $news->banner = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldbanner', '');
          if ($oldFile != '') {
            $file_path = "public/news" . $oldFile;
            Storage::delete($file_path);
           }
          } 
          else {
             $news->banner = $request->get('oldbanner', '');
           }

          $news->title =$request->title;
          $news->slug =str_slug($request->title);
          $news->short_content =$request->short_content;
          $news->news_content =$request->news_content;
          $news->date =$request->date;
          $news->category_id =$request->category['id'];
          $news->meta_title =$request->meta_title;
          $news->meta_keywords =$request->meta_keywords;
          $news->meta_description =$request->meta_description;
          $news->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('News Updated')]); 

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
     if ($request->ajax()) {
        $news = News::find($id);
        unlink('storage/news/'.$news->photo);
        unlink('storage/news/'.$news->banner);
        $news->delete();
        if ($news) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'News Information Delete Successfully.']);
       }
    }
  }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function comment()
   {
    $comment =Comment::find(1);
    return view('admin.news.comment',compact('comment'));
   }

   public function post_comment(Request $request)
   {
      if ($request->ajax()) {

           $validator = $request->validate([
            'code_body' => ['required'],
        ]);

         Comment::updateOrCreate(
                ['code_body' => $request->code_body]
            );

        return response()->json(['success' => true, 'status' => 'success', 'message' => 'Comment Code Updated.']);  
       }

   }
}
