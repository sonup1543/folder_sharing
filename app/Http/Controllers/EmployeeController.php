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

class EmployeeController extends Controller
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
    
    public function employeeList()
    {
        $title = 'Employee List';
        $employees = Employee::all();
        
        return view('admin/employees.employeelist', compact('title', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function createEmployee()
    {
        $title = 'Add Employee';
        $departments = Department::where('status', '1')->get();
        return view('admin/employees.addEmployee', compact('title','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $user = new User ;
            $employee = new Employee ;
            $msg = 'Employee has been added successfully.' ;
            if($request->employee_id){
                $user = User::where('id', $request->user_id)->first() ;
                $employee = Employee::where('id', $request->employee_id)->first() ;
                $employees = Employee::where('id', $request->employee_id)->first() ;
                
                $msg = 'Employee has been updated successfully.' ;

            }
            
            if($request->user_id){
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
            }
            else{
                $profile_image = $request->profile_image;
                if (!empty($profile_image)) {
                    $profile_images =  time() . '_' . uniqid() . '.' . $profile_image->getClientOriginalExtension();
                    $request->profile_image->move('data/employee', $profile_images);
                }
                if (empty($profile_image)) {
                    $profile_images = null;
                }
                
                $adhar_copy = $request->adhar_copy;
                if (!empty($adhar_copy)) {
                    $adhar_copys =  time() . '_' . uniqid() . '.' . $adhar_copy->getClientOriginalExtension();
                    $request->adhar_copy->move('data/employee', $adhar_copys);
                }
                if (empty($adhar_copy)) {
                    $adhar_copys = null;
                }
                
                $pan_copy = $request->pan_copy;
                if (!empty($pan_copy)) {
                    $pan_copys =  time() . '_' . uniqid() . '.' . $pan_copy->getClientOriginalExtension();
                    $request->pan_copy->move('data/employee', $pan_copys);
                }
                if (empty($pan_copy)) {
                    $pan_copys = null;
                }
                
                $salary_slip = $request->salary_slip;
                if (!empty($salary_slip)) {
                    $salary_slips =  time() . '_' . uniqid() . '.' . $salary_slip->getClientOriginalExtension();
                    $request->salary_slip->move('data/employee', $salary_slips);
                }
                if (empty($salary_slip)) {
                    $salary_slips = null;
                }
            }
            
            
            if($request->password=='' || $request->password==null){
                $password = $employees->password;
            }
            else{
                $password = $request->password;
            }
            

            $employee->employee_name   = $request->employee_name;
            $employee->joining_date   = $request->joining_date;
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
            $employee->department_id          = $request->department_id;
            $employee->nameofthebu_id          = $request->nameofthebu_ids;
            $employee->password   = $password;
            $employee->status          = $request->status;
            $employee->archive_permission          = $request->archive_permission;
            $employee->added_by        = $request->added_by;
            $employee->save();
            
            if($request->user_id){
                
                if($request->password=='' || $request->password==null){
                    
                    $user->name   = $request->employee_name;
                    $user->email   = $request->official_emailid;
                    $user->roles_id  = $request->department_id;
                    $user->status   = $request->status;
                    $user->save();
                    
                }
                else{
                    $password = $request->password;
                    $hashedPassword = Hash::make($password);
                    
                    $user->name   = $request->employee_name;
                    $user->email   = $request->official_emailid;
                    $user->password   = $hashedPassword;
                    $user->roles_id  = $request->department_id;
                    $user->status   = $request->status;
                    $user->save();
                }
                
            }
            else{
                $password = $request->password;
                $hashedPassword = Hash::make($password);
                
                $user->name   = $request->employee_name;
                $user->email   = $request->official_emailid;
                $user->password   = $hashedPassword;
                $user->roles_id  = $request->department_id;
                $user->theme_id  = '1';
                $user->status   = $request->status;
                $user->save();
                
            }
            
          
            $activity = new ActivityLog;
            
            if($request->employee_id){
                $activity->user_id = Auth::user()->id;
                $activity->fullname = Auth::user()->name;
                $activity->activity_type = 'Employee Update';
                $activity->new_summery = json_encode($_POST);
                $activity->old_summery = json_encode($employees);
                $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
                $activity->save();
            }
            else{
                $activity->user_id = Auth::user()->id;
                $activity->fullname = Auth::user()->name;
                $activity->activity_type = 'Employee Create';
                $activity->new_summery = json_encode($_POST);
                $activity->old_summery = json_encode($_POST);
                $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
                $activity->save(); 
            }

            return back()->with('success', $msg);
            
  
        } catch(\Illuminate\Database\QueryException $ex){ 
        
            return back()->with('success', $msg);
        
        }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Employee';
        $employee = Employee::Where('id', $id)->first();
        $user = User::Where('email', $employee->official_emailid)->first();
        $departments = Department::where('status', '1')->get();
              
        return view('admin/employees.editEmployee', compact('title','employee','user','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::Where('id', $id)->first();
        
        $old_adhar_copy = $employee->adhar_copy;
        $old_adhar_copy_url = 'data/employee/' . $old_adhar_copy;
        if (file_exists($old_adhar_copy_url) && $old_adhar_copy) 
        {
            unlink($old_adhar_copy_url);
        }
        
        $old_pan_copy = $employee->pan_copy;
        $old_pan_copy_url = 'data/employee/' . $old_pan_copy;
        if (file_exists($old_pan_copy_url) && $old_pan_copy) 
        {
            unlink($old_pan_copy_url);
        }
        
        $old_salary_slip = $employee->salary_slip;
        $old_salary_slip_url = 'data/employee/' . $old_salary_slip;
        if (file_exists($old_salary_slip_url) && $old_salary_slip) 
        {
            unlink($old_salary_slip_url);
        }
        
        
        $employee->delete();
        
        $user = User::Where('email', $employee->official_emailid)->first();
        $user->delete();
        
        $activity = new ActivityLog;

        $activity->user_id = Auth::user()->id;
        $activity->fullname = Auth::user()->name;
        $activity->activity_type = 'Employee Delete';
        $activity->new_summery = json_encode($_POST);
        $activity->old_summery = json_encode($employee);
        $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
        $activity->save();
        
        $msg = 'Employee Deleted Successfully!';
        return back()->with('success', $msg);
        
    }
    
    public function statusUpdate(Request $request)
    {
        $employees = Employee::where('id', $request->employee_id)->first() ;
        
        $employee = Employee::where('id', $request->employee_id)->first() ;
        $employee->status          = $request->status;
        $employee->save();
        
        $user = User::where('email', $employees->official_emailid)->first() ;
        $user->status          = $request->status;
        $user->save();
        
        $activity = new ActivityLog;

        $activity->user_id = Auth::user()->id;
        $activity->fullname = Auth::user()->name;
        $activity->activity_type = 'Employee Status Update';
        $activity->new_summery = json_encode($_POST);
        $activity->old_summery = json_encode($employees);
        $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
        $activity->save();
        
        if($request->status=='1'){
            $msg = 'Employee Active Successfully!';
        }
        else{
            $msg = 'Employee Inactive Successfully!';
        }
        
        return back()->with('success', $msg);
        
    }
    
    
}
