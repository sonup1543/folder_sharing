<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $title = 'Edit Profile';
        $user = User::Where('id', $id)->first();
        
        return view('admin/profiles.editProfile', compact('title','user'));
    }
    
    public function store(Request $request)
    {   
        try{
            
            $user = User::where('id', $request->user_id)->first() ;
            $users = User::where('id', $request->user_id)->first() ;
                
            $msg = 'Profile has been updated successfully.' ;


            $user->name   = $request->name;
            $user->email          = $request->email;
            $user->save();
            
          
            $activity = new ActivityLog;
            
            $activity->user_id = Auth::user()->id;
            $activity->fullname = Auth::user()->name;
            $activity->activity_type = 'Admin Profile Update';
            $activity->new_summery = json_encode($_POST);
            $activity->old_summery = json_encode($users);
            $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
            $activity->save(); 
            

            return back()->with('success', $msg);
            
  
        } catch(\Illuminate\Database\QueryException $ex){ 
        
        return back()->with('error',  $ex->errorInfo[2]);
        
        }   
        
    }
    
    public function getEmalid(Request $request)
    {
        $user = User::where('email', $request->email)->first() ;
        if(isset($user)){ $text = 'Success'; }
        else{ $text = 'Failed'; }

        return response()->json($text);
        
        
    }
    
    public function changePassword($id)
    {
        $title = 'Change Password';
        $user = User::Where('id', $id)->first();
        
        return view('admin/profiles.changePassword', compact('title','user'));
    }
    
    public function storeUserPassword(Request $request)
    {   
        try{
            
            $user = User::where('id', $request->user_id)->first() ;
            $users = User::where('id', $request->user_id)->first() ;
                
            $msg = 'Password has been updated successfully.' ;


            $password = $request->password;
            $hashedPassword = Hash::make($password);

            $user->password   = $hashedPassword;
            $user->save();
            
          
            $activity = new ActivityLog;
            
            $activity->user_id = Auth::user()->id;
            $activity->fullname = Auth::user()->name;
            $activity->activity_type = 'Admin Password Update';
            $activity->new_summery = json_encode($_POST);
            $activity->old_summery = json_encode($users);
            $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
            $activity->save(); 
            

            return back()->with('success', $msg);
            
  
        } catch(\Illuminate\Database\QueryException $ex){ 
        
        return back()->with('error',  $ex->errorInfo[2]);
        
        }   
        
    }
    
    
}
