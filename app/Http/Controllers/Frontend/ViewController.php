<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\ProfileRequest;
use DB;

class ViewController extends Controller
{
    public function index() {
        $this->data['view'] = Book::orderBy('updated_at', 'DESC')->get();      
        return view('frontend.my_book.view', $this->data);
    }

}
