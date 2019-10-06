<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Contact;
use App\Notifications\ContactMail;

class SystemController extends Controller
{
    public function index()
    {
    	$faq =Question::with('package')->get();
    	return view('admin.faq.index',compact('faq'));
    }

    public function answer(Request $request,$id)
    {
    	if ($request->ajax()) {
    	$faq =Question::findOrfail($id);
    	return view('admin.faq.answer',compact('faq'));
    }
    }

    public function post_answer(Request $request)
    {
    	if ($request->ajax()) {
    		 $validator = $request->validate([
          'ans' => ['required']
          ]);

    		 $faq =Question::find($request->id);
    		 $faq->ans =$request->ans;
    		 $faq->save();
    		 return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Answer Include'), 'goto' => route('admin.faq')]); 
    	}
    }

    public function messege()
    {
    	$contact =Contact::all();
    	return view('admin.messege.index',compact('contact')); 
    }

    public function review(Request $request,$id)
    {
    	if ($request->ajax()) {

    	$messege =Contact::findOrfail($id);
    	return view('admin.messege.email',compact('messege'));
   	 }
    }

    public function reaply(Request $request)
    {
      $user =Contact::findOrfail($request->id);
      $messege =$request->reaply;

     if ($user->email) {
        $user->notify(new ContactMail($user,$messege));
     }

      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Email Send')]);
    }
}
