<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class CsprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Profile';
        $user = User::Where('id', $id)->first();
        $employee = Employee::Where('official_emailid', $user->email)->first();
        $departments = Department::where('status', '1')->get();
        
        return view('cs/profiles.editProfile', compact('title','employee','user','departments'));
        
    }
    
    public function store(Request $request)
    {
        try{
            
            $user = User::where('id', $request->user_id)->first() ;
            $employee = Employee::where('id', $request->employee_id)->first() ;
            $employees = Employee::where('id', $request->employee_id)->first() ;
                
            $msg = 'Profile has been updated successfully.' ;

            $profile_image = $request->profile_image;
            if (!empty($profile_image)) {
                
                $old_profile_image = $employee->profile_image;
                $old_profile_image_url = 'data/employee/' . $old_profile_image;
                if (file_exists($old_profile_image_url) && $old_profile_image) 
                {
                    unlink($old_profile_image_url);
                }

                $profile_images =  time() . '_' . uniqid() . '.' . $profile_image->getClientOriginalExtension();
                $request->profile_image->move('data/employee', $profile_images);
                $page = DB::table('employees')->where('id', $request->employee_id)->update(array('profile_image' => $profile_images));
                
            }
            if (empty($profile_image)) {
                $profile_images = $employee->profile_image;
            }
            
            $adhar_copy = $request->adhar_copy;
            if (!empty($adhar_copy)) {
                
                $old_adhar_copy = $employee->adhar_copy;
                $old_adhar_copy_url = 'data/employee/' . $old_adhar_copy;
                if (file_exists($old_adhar_copy_url) && $old_adhar_copy) 
                {
                    unlink($old_adhar_copy_url);
                }

                $adhar_copys =  time() . '_' . uniqid() . '.' . $adhar_copy->getClientOriginalExtension();
                $request->adhar_copy->move('data/employee', $adhar_copys);
                $page = DB::table('employees')->where('id', $request->employee_id)->update(array('adhar_copy' => $adhar_copys));
                
            }
            if (empty($adhar_copy)) {
                $adhar_copys = $employee->adhar_copy;
            }
            
            $pan_copy = $request->pan_copy;
            if (!empty($pan_copy)) {
                
                $old_pan_copy = $employee->pan_copy;
                $old_pan_copy_url = 'data/employee/' . $old_pan_copy;
                if (file_exists($old_pan_copy_url) && $old_pan_copy) 
                {
                    unlink($old_pan_copy_url);
                }

                $pan_copys =  time() . '_' . uniqid() . '.' . $pan_copy->getClientOriginalExtension();
                $request->pan_copy->move('data/employee', $pan_copys);
                $page = DB::table('employees')->where('id', $request->employee_id)->update(array('pan_copy' => $pan_copys));
                
            }
            if (empty($pan_copy)) {
                $pan_copys = $employee->pan_copy;
            }
            
            $salary_slip = $request->salary_slip;
            if (!empty($salary_slip)) {
                
                $old_salary_slip = $employee->salary_slip;
                $old_salary_slip_url = 'data/employee/' . $old_salary_slip;
                if (file_exists($old_salary_slip_url) && $old_salary_slip) 
                {
                    unlink($old_salary_slip_url);
                }

                $salary_slips =  time() . '_' . uniqid() . '.' . $salary_slip->getClientOriginalExtension();
                $request->salary_slip->move('data/employee', $salary_slips);
                $page = DB::table('employees')->where('id', $request->employee_id)->update(array('salary_slip' => $salary_slips));
                
            }
            if (empty($salary_slip)) {
                $salary_slips = $employee->salary_slip;
            }
            
            //dd($request);

            $employee->employee_name   = $request->employee_name;
            //$employee->joining_date   = $request->joining_date;
            $employee->personal_emailid   = $request->personal_emailid;
            $employee->father_husband_name = $request->father_husband_name;
            $employee->official_emailid   = $request->official_emailid;
            $employee->mother_name   = $request->mother_name;
            $employee->mbl_cc   = $request->countrycode;
            $employee->mobile_number   = $request->mobile_number;
            $employee->mbl_cc1   = $request->countrycode1;
            $employee->father_husband_cotact_number          = $request->father_husband_cotact_number;
            $employee->mbl_cc2   = $request->countrycode2;
            $employee->mobile_number1          = $request->mobile_number1;
            $employee->profile_image          = $profile_images;
            $employee->address1          = $request->address1;
            $employee->adhar_copy          = $adhar_copys;
            $employee->address2          = $request->address2;
            $employee->pan_copy          = $pan_copys;
            $employee->address3          = $request->address3;
            $employee->salary_slip          = $salary_slips;
            $employee->pincode          = $request->pincode;
            $employee->state          = $request->state;
            $employee->name_of_emergency_contact          = $request->name_of_emergency_contact;
            $employee->relationship_of_emergency_contact          = $request->relationship_of_emergency_contact;
            $employee->emgmbl_cc   = $request->emgcountrycode;
            $employee->emg_mobile_number          = $request->emg_mobile_number;
            $employee->emgmbl_cc1   = $request->emgcountrycode1;
            $employee->emg_mobile_number1          = $request->emg_mobile_number1;
            //$employee->department_id          = $request->department_id;
            //$employee->nameofthebu_id          = $request->nameofthebu_id;
            //$employee->status          = $request->status;
            //$employee->added_by        = $request->added_by;
            $employee->save();
            
           
            $user->name   = $request->employee_name;
            $user->email   = $request->official_emailid;
            $user->save();
            
          
            $activity = new ActivityLog;
            
            $activity->user_id = Auth::user()->id;
            $activity->fullname = Auth::user()->name;
            $activity->activity_type = 'CG Profile Update';
            $activity->new_summery = json_encode($_POST);
            $activity->old_summery = json_encode($employees);
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
        
        return view('cs/profiles.changePassword', compact('title','user'));
    }
    
    public function storeUserPassword(Request $request)
    {   
        try{
            
            $user = User::where('id', $request->user_id)->first() ;
            $users = User::where('id', $request->user_id)->first() ;
            $employee = Employee::where('official_emailid', $users->email)->first() ;
                
            $msg = 'Password has been updated successfully.' ;


            $password = $request->password;
            $hashedPassword = Hash::make($password);

            $user->password   = $hashedPassword;
            $user->save();
            
            $employee->password   = $password;
            $employee->save();
            
          
            $activity = new ActivityLog;
            
            $activity->user_id = Auth::user()->id;
            $activity->fullname = Auth::user()->name;
            $activity->activity_type = 'CS Password Update';
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
