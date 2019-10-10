<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;

class BookingController extends Controller
{
    public function index()
   {
   	$book =Book::all();
   	return view('admin.booking.index',compact('book'));
   }

   //

   public function client(Request $request,$id)
   {
   	if ($request->ajax()) {
   	 
   	  $book =Book::findOrFail($id);
   	  return view('admin.booking.client',compact('book'));
   	}
   }


   //
   public function packege(Request $request,$id)
    {
      if ($request->ajax()) {
        $book =Book::findOrFail($id);
        return view('admin.booking.packege',compact('book'));
      }
    }

    //
    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            $book = Book::findOrFail($id);
            $book->delete();
            if ($book) {
             return response()->json(['success' => true, 'status' => 'success', 'message' => 'Book Information Delete Successfully.','goto'=>route('admin.book.index')]);
         }
     }
 }
}
