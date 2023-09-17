<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\UserBook;
use DB;

class LibraryController extends Controller
{
    public function index()
    {
        $this->data['books'] = Book::orderBy('updated_at', "DESC")->get();
        $this->data['MyBook'] = UserBook::orderBy('updated_at', 'DESC')
                ->where('user_id', auth()->user()->id)
                ->get();
        
        return view('frontend.library.index', $this->data);
    }
    
    public function borrowBook(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        UserBook::create([
            'user_id' => auth()->user()->id, 
            'book_id' => $request->input('book_id'),
        ]);
        
        return redirect()->route('book.index')->with('success', 'Book borrowed successfully');
    }
    
}
