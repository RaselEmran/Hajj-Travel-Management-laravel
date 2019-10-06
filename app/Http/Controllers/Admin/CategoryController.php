<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use App\Category;

class CategoryController extends Controller
{

   private function route() {
    return 'admin.news.category.';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.category.index');
    }

    public function datatable(Request $request) {

        if ($request->ajax()) {
            $model = Category::all();
            return Datatables::of($model)
            ->addIndexColumn()
            ->editColumn('image',function($model){
                $url= asset('storage/news/category/'.$model->image);
                return '<img src="'.$url.'" border="0" width="120" class="img-rounded" align="center" />';
            })
            
            ->addColumn('action', function ($model) {
                return view('admin.news.category.action', compact('model'));
            })->rawColumns(['action','image'])->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {

            return view('admin.news.category.form');
        }
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
            'name' => ['required', 'max:255'],
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

           $category =new Category;
           if($request->hasFile('image')) {
              $storagepath = $request->file('image')->store('public/news/category');
              $fileName = basename($storagepath);
              $category->image = $fileName;
          }
          $category->name =$request->name;
          $category->save();

          return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Inserted')]); 

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
    public function edit(Request $request,$id)
    {
       if ($request->ajax()) {
           $model =Category::findOrfail($id);
           return view('admin.news.category.form',compact('model'));
       }
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
            'name' => ['required', 'max:255'],
            'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $category =Category::findOrfail($id);

        if ($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/news/category');
          $fileName = basename($storagepath);
          $category->image = $fileName;

        //if file chnage then delete old one
          $oldFile = $request->get('oldimage', '');
          if ($oldFile != '') {
            $file_path = "public/news/category" . $oldFile;
            Storage::delete($file_path);
        }
    } else {
      $category->image = $request->get('oldimage', '');
  }

  $category->name =$request->name;
  $category->save();

  return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('category Updated')]);

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
            $category = Category::find($id);
            unlink('storage/news/category/'.$category->image);
            $category->delete();
            if ($category) {
             return response()->json(['success' => true, 'status' => 'success', 'message' => 'Category Information Delete Successfully.']);
         }
     }
 }
}
