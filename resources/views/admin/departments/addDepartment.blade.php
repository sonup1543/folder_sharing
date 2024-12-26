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
                           <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Department name">
                           <span id="alt1" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                     </div>
                  </div>
                  <input type="hidden" name="status" value="1">
                  <input type="hidden" name="added_by" value="{{@Auth::user()->id}}">
                  <button type="submit" class="btn btn-outline-primary">Submit</button>
                  <button type="reset" class="btn btn-outline-danger">Reset</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
@endsection