<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Department;
use Illuminate\Http\Request;
use Auth;

class DepartmentController extends Controller
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
    
    public function departmentList()
    {
        $title = 'Department List';
        $departments = Department::all();
        return view('admin/departments.departmentlist', compact('title', 'departments'));
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
    
    public function createDepartment()
    {
        $title = 'Add Department';
        return view('admin/departments.addDepartment', compact('title'));
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
            $department = new Department ;
            $msg = 'Department has been added successfully.' ;
            if($request->department_id){
                $department = Department::where('id', $request->department_id)->first() ;
                $departments = Department::where('id', $request->department_id)->first() ;
                
                $msg = 'Department has been updated successfully.' ;

            }

            $department->department_name   = $request->department_name;
            $department->status          = $request->status;
            $department->added_by        = $request->added_by;
            $department->save();
            
          
            $activity = new ActivityLog;
            
            if($request->department_id){
                $activity->user_id = Auth::user()->id;
                $activity->fullname = Auth::user()->name;
                $activity->activity_type = 'Department Update';
                $activity->new_summery = json_encode($_POST);
                $activity->old_summery = json_encode($departments);
                $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
                $activity->save();
            }
            else{
                $activity->user_id = Auth::user()->id;
                $activity->fullname = Auth::user()->name;
                $activity->activity_type = 'Department Create';
                $activity->new_summery = json_encode($_POST);
                $activity->old_summery = json_encode($_POST);
                $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
                $activity->save(); 
            }

            return back()->with('success', $msg);
            
  
        } catch(\Illuminate\Database\QueryException $ex){ 
        
        return back()->with('error',  $ex->errorInfo[2]);
        
        }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Department';
        $department = Department::Where('id', $id)->first();
        
        return view('admin/departments.editDepartment', compact('title','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::Where('id', $id)->first();
        $department->delete();
        
        $activity = new ActivityLog;

        $activity->user_id = Auth::user()->id;
        $activity->fullname = Auth::user()->name;
        $activity->activity_type = 'Department Delete';
        $activity->new_summery = json_encode($_POST);
        $activity->old_summery = json_encode($department);
        $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
        $activity->save();
        
        $msg = 'Department Deleted Successfully!';
        return back()->with('success', $msg);
        
    }
    
    public function statusUpdate(Request $request)
    {
        $departments = Department::where('id', $request->department_id)->first() ;
        
        $department = Department::where('id', $request->department_id)->first() ;
        $department->status          = $request->status;
        $department->save();
        
        $activity = new ActivityLog;

        $activity->user_id = Auth::user()->id;
        $activity->fullname = Auth::user()->name;
        $activity->activity_type = 'Department Status Update';
        $activity->new_summery = json_encode($_POST);
        $activity->old_summery = json_encode($departments);
        $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
        $activity->save();
        
        if($request->status=='1'){
            $msg = 'Department Active Successfully!';
        }
        else{
            $msg = 'Department Inactive Successfully!';
        }
        
        return back()->with('success', $msg);
        
    }
    
    
}
