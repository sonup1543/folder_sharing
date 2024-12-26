@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-8">
                     <h4 class="card-title">{{ @$title }}</h4>
                  </div>
                  <div class="col-md-4 d-flex justify-content-end">
                     <a href="{{route('departments.departmentList')}}" style=""><button type="button" class="btn btn-outline-primary">Back</button></a>
                  </div>
               </div>
               <form class="forms-sample" action="{{route('departments.store')}}" name="departmentForm" id="departmentForm" method="post" onsubmit="return addDepartment()" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Department Name<span class="required" style="color:red;">*</span></label>
                           <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Department name" value="{{@$department->department_name}}">
                           <span id="alt1" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Status</label><br>
                           <input type="radio" class="form-check-input" name="status" value="1" @if($department->status=='1') checked @endif>
                           Active
                           <input style="margin-left: 10px;" type="radio" class="form-check-input" name="status" value="0" @if($department->status=='0') checked @endif>
                           Inactive
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="added_by" value="{{@Auth::user()->id}}">
                  <input type="hidden" name="department_id" value="{{@$department->id}}">
                  <button type="submit" class="btn btn-outline-primary">Save</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
@endsection