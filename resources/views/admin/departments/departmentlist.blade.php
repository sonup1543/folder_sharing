@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
<style>
.page-body-wrapper {
    padding-top: 59px !important;
}
.container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl {
    padding-right: 0px !important; 
    padding-left: 0px !important;
}
.btn-outline-primary {
    color: #2659c6;
    border-color: #2659c6;
}
.btn-outline-primary:hover {
    color: #fff;
    background-color: #2659c6;
    border-color: #2659c6;
}
</style>
<!-- page content -->
<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="row" style="margin-bottom: 20px;">
                   <div class="col-md-8">
                       <h4 class="card-title">{{ @$title }}</h4>
                   </div>
                   <div class="col-md-4 d-flex justify-content-end">
                       <!-- <a href="{{route('departments.createDepartment')}}" style=""><button type="button" class="btn btn-outline-primary">Add Department</button></a> -->
                   </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-striped" id="department_datatable">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Department Name</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(isset($departments))
                        @foreach($departments as $key => $department)
                        
                        <tr>
                           <td> {{$key+1}} </td>
                           <td> {{$department->department_name}} </td>
                           @if($department->status == 1)
                           <td class="text-success"><button class="btn btn-outline-success btn-sm" value="{{ $department->id }}" onclick="statusDepartmentInactive({{ $department->id }})">Active</button></td>
                           <form action="{{ route('departments.statusUpdate',$department->id) }}" id="inactiveForm-{{ $department->id }}" method="POST">
                            <input type="hidden" name="status" value="0" >
                            <input type="hidden" name="department_id" value="{{ $department->id }}" >
                            @csrf
                           </form>
                           @else
                           <td class="text-danger"><button class="btn btn-outline-warning btn-sm" value="{{ $department->id }}" onclick="statusDepartmentActive({{ $department->id }})">Inactive</button></td>
                           <form action="{{ route('departments.statusUpdate',$department->id) }}" id="activeForm-{{ $department->id }}" method="POST">
                            <input type="hidden" name="status" value="1" >
                            <input type="hidden" name="department_id" value="{{ $department->id }}" >
                            @csrf
                           </form>
                           @endif
                           <td style="width:110px;">
                              <a href="{{route('departments.edit', $department->id)}}" class="btn btn-outline-primary btn-sm" title='Edit Department'><i class='mdi mdi-lead-pencil menu-icon'></i></a>
                              <!--<button class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete-forever menu-icon" title='Delete Department' value="{{ $department->id }}" onclick="deleteDepartmentItem({{ $department->id }})"></i></button>
                              <form action="{{ route('departments.destroy',$department->id) }}" id="deleteForm-{{ $department->id }}" method="POST">
                                 @method('DELETE')
                                 @csrf
                              </form>-->
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
@section('script')
<script>
    new DataTable('#department_datatable');
</script>
@endsection