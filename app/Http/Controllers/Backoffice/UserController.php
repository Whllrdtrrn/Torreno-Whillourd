<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Http\Requests\LibraryRequest;


class UserController extends Controller
{
    public function index()
    {
         // Get the authenticated user
        $authenticatedUser = auth()->user();
        
        $this->data['users'] = User::where('id', '!=', $authenticatedUser->id)
        ->orderBy('updated_at', 'DESC')
        ->get();
        return view('backoffice.users.index', $this->data);
        
        
    }
    public function updateUserStatus(Request $request)
    {
        
        $id = $request->input('id');
        $status = $request->input('status');
        
        $user = User::find($id);
        if ($user) {
            $user->status = $status;
            $user->save();

            return response()->json(['message' => 'Status updated successfully']);
        }

        return response()->json(['message' => 'User not found'], 404);
    }
    
    
}
