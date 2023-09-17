<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\UserBook;

use DB;

class MybookController extends Controller
{
    public function index() { 
         $this->data['books'] = UserBook::with('book')->orderBy('updated_at', 'DESC')->where('user_id', auth()->user()->id)->get(); 
          
        return view('frontend.my_book.index', $this->data);
    }
    public function view_book($book_id){
         $book = Book::find($book_id);
    
        if (!$book) {
            // Handle the case where the book with the specified ID is not found
            return redirect()->route('mybook.index')->with('error', 'Book not found');
        }
    
        return view('frontend.my_book.view', compact('book'));
    }
    public function return_book($id = NULL) {
        try {
            $my_book = UserBook::find($id);
            
            if (!$my_book) {
                session()->flash('notification-status',"failed");
                session()->flash('notification-msg',"Record not found.");
                return redirect()->route('mybook.index');
            }
            if($id < 0){
                session()->flash('notification-status',"warning");
                session()->flash('notification-msg',"Unable to remove special record.");
                return redirect()->route('mybook.index');
            }
            if($my_book->delete()) {
             
                session()->flash('notification-status','success');
                session()->flash('notification-msg',"Record has been deleted.");
                return redirect()->route('mybook.index');
            }
            session()->flash('notification-status','failed');
            session()->flash('notification-msg','Something went wrong.');
        } catch (Exception $e) {
            session()->flash('notification-status','failed');
            session()->flash('notification-msg',$e->getMessage());
            return redirect()->back();
        }
    }
}
