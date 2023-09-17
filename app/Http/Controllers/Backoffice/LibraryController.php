<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\LibraryRequest;
use DB;


class LibraryController extends Controller
{
    public function index()
    {
        $this->data['books'] = Book::orderBy('updated_at', "DESC")->get();
        return view('backoffice.books.index', $this->data);
    }
    public function create()
    {
        return view('backoffice.books.create');
    }
    public function users()
    {
        return view('backoffice.users.index');
    }
    public function store(LibraryRequest $request) {
        DB::beginTransaction();
    
        try {
            $book = new Book;
    
            // Handling the file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time(). $file->getClientOriginalName();
                $path = public_path() . '/uploads/images/book/';
                $full_path = $path . $filename;
    
                // Set file information on the model
                $book->image_fullpath = $full_path;
                $book->image_filename = $filename;
                $book->user_id = $request->user()->id;
                // Fill other data from the request
                $book->fill($request->except(['file']));
                
                // Save model and move the file
                if ($book->save()) {
                    $file->move($path, $filename);
                    DB::commit();
                    session()->flash('notification-status', 'success');
                    session()->flash('notification-msg', "New record has been added.");
                    return redirect()->route('backoffice.books.index');
                }
            }
    
            // If saving failed
            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', 'Something went wrong.');
            return redirect()->back();
    
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', 'failed');
            session()->flash('notification-msg', $e->getMessage());
            return redirect()->back();
        }
    }
    
    public function edit ($id = NULL) {
        $book = Book::find($id);
        if (!$book) {
            session()->flash('notification-status',"failed");
            session()->flash('notification-msg',"Record not found.");
            return redirect()->route('backoffice.books.index');
        }
        if($id < 0){
            session()->flash('notification-status',"warning");
            session()->flash('notification-msg',"Unable to update special record.");
            return redirect()->route('backoffice.books.index');
        }
        $this->data['books'] = $book;
        return view('backoffice.books.edit',$this->data);
    }

    public function update(LibraryRequest $request, $id=NULL){
        try {
            DB::beginTransaction();
    
            $book = Book::find($id); // Assuming News is the correct model
            if (!$book) {
                throw new Exception("Book not found.");
            }
    
            if($request->hasFile('file') && $request->file('file')->isValid()){
                $file = $request->file('file');
                $filename = time(). $file->getClientOriginalName();
                $path = public_path() . '/uploads/images/book/';
                $full_path = $path . $filename;
    
                // Set file information on the model
                $book->image_fullpath = $full_path;
                $book->image_filename = $filename;
                $file->move($path, $filename);
            } else {
                $book->image_fullpath = $book->image_fullpath; 
                $book->image_filename = $book->image_filename; 
            }
            $book->user_id = $request->user()->id;
            // Update other fields
            $book->fill($request->only('title', 'author', 'description','status'));
           
            if ($book->save()) {
                DB::commit();
                session()->flash('notification-status', 'success');
                session()->flash('notification-msg', "News updated successfully.");
                return redirect()->route('backoffice.books.index');
            }
    
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('notification-status', 'warning');
            session()->flash('notification-msg', "Something went wrong: " . $e->getMessage());
            return redirect()->back();
        }
    }
    
    public function destroy($id = NULL) {
        try {
            $book = Book::find($id);
            if (!$book) {
                session()->flash('notification-status',"failed");
                session()->flash('notification-msg',"Record not found.");
                return redirect()->route('backoffice.books.index');
            }
            if($id < 0){
                session()->flash('notification-status',"warning");
                session()->flash('notification-msg',"Unable to remove special record.");
                return redirect()->route('backoffice.books.index');
            }
            if($book->delete()) {
                session()->flash('notification-status','success');
                session()->flash('notification-msg',"Record has been deleted.");
                return redirect()->route('backoffice.books.index');
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
