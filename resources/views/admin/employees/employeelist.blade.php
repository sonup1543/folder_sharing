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
                       <a href="{{route('employees.createEmployee')}}" style=""><button type="button" class="btn btn-outline-primary">Add Employee</button></a>
                   </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-striped" id="employee_datatable">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name of the Employee</th>
                           <th>Email ID Official</th>
                           <th>Mobile Number</th>
                           <th>Department</th>
                           <th>BU Number</th>
                           <th>Password</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                        @if(isset($employees))
                        @foreach($employees as $key => $employee)
                        
                        @php 
                        if($employee->nameofthebu_id=='0'){ $bunumber = ''; }
                        else{ $bunumber = $employee->bu ? $employee->bu->name_of_bu : ''; }
                        
                        if($employee->department_id=='0'){ $department = ''; }
                        else{ $department = $employee->department ? $employee->department->department_name : ''; }
                        
                        @endphp
                        
                        <tr>
                           <td> {{$key+1}} </td>
                           <td> {{$employee->employee_name}} </td>
                           <td> {{$employee->official_emailid}} </td>
                           <td> {{$employee->mobile_number}} </td>
                           <td> {{$department}} </td>
                           <td> {{$bunumber}} </td>
                           <td> {{$employee->password}} </td>
                           @if($employee->status == 1)
                           <td class="text-success"><button class="btn btn-outline-success btn-sm" value="{{ $employee->id }}" onclick="statusEmployeeInactive({{ $employee->id }})">Active</button></td>
                           <form action="{{ route('employees.statusUpdate',$employee->id) }}" id="inactiveForm-{{ $employee->id }}" method="POST">
                            <input type="hidden" name="status" value="0" >
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}" >
                            @csrf
                           </form>
                           @else
                           <td class="text-danger"><button class="btn btn-outline-warning btn-sm" value="{{ $employee->id }}" onclick="statusEmployeeActive({{ $employee->id }})">Inactive</button></td>
                           <form action="{{ route('employees.statusUpdate',$employee->id) }}" id="activeForm-{{ $employee->id }}" method="POST">
                            <input type="hidden" name="status" value="1" >
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}" >
                            @csrf
                           </form>
                           @endif
                           <td style="width:110px;">
                              <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-outline-primary btn-sm" title='Edit Employee'><i class='mdi mdi-lead-pencil menu-icon'></i></a>
                              <button class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete-forever menu-icon" title='Delete Employee' value="{{ $employee->id }}" onclick="deleteEmployeeItem({{ $employee->id }})"></i></button>
                              <form action="{{ route('employees.destroy',$employee->id) }}" id="deleteForm-{{ $employee->id }}" method="POST">
                                 @method('DELETE')
                                 @csrf
                              </form>
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
    new DataTable('#employee_datatable');
</script>
@endsection