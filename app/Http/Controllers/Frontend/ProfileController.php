<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use DB;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        
        $this->data['profile'] = User::where('id', $user->id)->get();      
        return view('frontend.profile.index', $this->data);
    }
    
    public function edit() {
        $this->data['editProfile'] = Auth::user();
        return view('frontend.profile.edit', $this->data);
    }
    
    public function disable_account() {
        try {
            DB::beginTransaction();
    
            $user = User::find(Auth::user()->id);
    
            $values = [
                'status' => 'disabled',
            ];
            $user->update($values);
    
            DB::commit();
    
            Auth::logout(); 
    
            return redirect('/login')->with('status', 'Your account has been disabled.'); 
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('notification-status', 'warning');
            session()->flash('notification-msg', "Something went wrong: " . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function updateProfile(ProfileRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $user = User::find($request->id); // Retrieve the user first

            $values = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];
            $user->update($values);
            
            session()->flash('notification-status', 'success');
            session()->flash('notification-msg', "Profile updated successfully.");
            DB::commit();

            return redirect()->route('profile.index');
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('notification-status', 'warning');
            session()->flash('notification-msg', "Something went wrong: " . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

}
