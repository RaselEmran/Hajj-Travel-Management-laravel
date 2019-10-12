<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Contact;
use App\Subsciber;
use App\AirTicket;
use App\Notifications\ContactMail;
use App\Notifications\SubscribeNotify;
use App\Mail\SubscribeMail;

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
    	$validator = $request->validate([
          'reaply' => ['required']
          ]);
      $user =Contact::findOrfail($request->id);
      $messege =$request->reaply;

     if ($user->email) {
        $user->notify(new ContactMail($user,$messege));
     }

      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Email Send')]);
    }

    public function subscibers()
    {
      $subs =Subsciber::all();
      return view('admin.subscibers.index',compact('subs'));
    }

    public function subscibers_mail(Request $request)
    {
      if ($request->ajax()) {
        return view('admin.subscibers.email');
      }
    }

    public function subscibers_mailsend(Request $request)
    {
      if ($request->ajax()) {
       $validator = $request->validate([
          'subject' => ['required'],
          'messege' => ['required'],
          ]);

       $subject =$request->subject;
       $messege =$request->messege;
       $subs = Subsciber::all();
       foreach ($subs as $key => $user) {
        Mail::to($user->sub_email)->send(new SubscribeMail($messege,$subject));
       }


         return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Email Send')]);
       
      }
    }

    //
    public function air_ticket()
    {
      $ticket =AirTicket::all();
      return view('admin.booking.air_ticket',compact('ticket'));
    }

    //
    public function airticket_mail(Request $request,$id)
    {
      if ($request->ajax()) {
        $ticket =AirTicket::findOrfail($id);
        return view('admin.booking.air_ticketmail',compact('ticket'));
      }
    }

    //
    public function airticket_mailsend(Request $request)

    {
      $validator = $request->validate([
          'subject' => ['required'],
          'reaply' => ['required'],
          ]);
      $ticket =AirTicket::findOrfail($request->id);
      $messege =$request->reaply;
      $subject =$request->subject;

     if ($ticket->email) {
         Mail::to($ticket->email)->send(new SubscribeMail($messege,$subject));
     }

      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Email Send')]);
    }
 
}
