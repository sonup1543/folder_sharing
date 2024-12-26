@extends('layouts.admin')
@section('content')
<style>
    .iti {
        display:block;
    }
</style>
@php
  $datetime = date('Y-m-d');
  $mbl_cc = $employee->mbl_cc ?? 'IN';
@endphp
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
                     <a href="{{route('employees.employeeList')}}" style=""><button type="button" class="btn btn-outline-primary">Back</button></a>
                  </div>
               </div>
               <form class="forms-sample" action="{{route('employees.store')}}" name="employeeForm" id="employeeForm" method="post" onsubmit="return editEmployee()" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Name of the Employee<span class="required" style="color:red;">*</span></label>
                           <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Name of the employee" value="{{@$employee->employee_name}}">
                           <span id="alt1" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Email ID Official<span class="required" style="color:red;">*</span></label>
                           <input type="email" class="form-control" name="official_emailid" id="official_emailid" placeholder="Email id official" value="{{@$employee->official_emailid}}">
                           <span id="alt5" style="color:red;"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Mobile Number<span class="required" style="color:red;">*</span></label>
                           <input type="tel" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="12" value="{{@$employee->mobile_number}}">
                           <span id="alt7" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Department<span class="required" style="color:red;">*</span></label>
                            <select class="form-control" name="department_id" id="department_id">
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" @if($department->id == $employee->department_id) {{@'selected'}} @endif >{{$department->department_name}}</option>
                                @endforeach;
                            </select>
                            <span id="alt22" style="color:red;"></span>
                        </div>
                     </div>
                </div>
            <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Password</label>    
                           <div class="input-group">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                              <div class="input-group-append">
                                 <span class="input-group-text">
                                 <i class="mdi mdi-eye-off" id="password-toggle"></i>
                                 </span>
                              </div>
                           </div>
                           <span id="alt24" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Confirm Password</label>
                           <div class="input-group">
                              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                              <div class="input-group-append">
                                 <span class="input-group-text">
                                 <i class="mdi mdi-eye-off" id="confirm-toggle"></i>
                                 </span>
                              </div>
                           </div>
                           <span id="alt" style="color:red;"></span>
                           <span id="alt25" style="color:red;"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Status</label><br>
                           <input type="radio" class="form-check-input" name="status" value="1" @if($employee->status=='1') checked @endif>
                           Active
                           <input style="margin-left: 10px;" type="radio" class="form-check-input" name="status" value="0" @if($employee->status=='0') checked @endif>
                           Inactive
                        </div>
                     </div>
                     <div class="col-md-6">
                     </div>
                  </div>
                  <input type="hidden" name="nameofthebu_ids" id="nameofthebu_ids" value="{{@$employee->nameofthebu_id}}">
                  <input type="hidden" name="countrycode" class="cc" value="{{@$employee->mbl_cc}}">
                  <input type="hidden" name="countrycode1" class="cc1" value="{{@$employee->mbl_cc1}}">
                  <input type="hidden" name="countrycode2" class="cc2" value="{{@$employee->mbl_cc2}}">
                  <input type="hidden" name="emgcountrycode" class="emgcc" value="{{@$employee->emgmbl_cc}}">
                  <input type="hidden" name="emgcountrycode1" class="emgcc1" value="{{@$employee->emgmbl_cc1}}">
                  <input type="hidden" name="added_by" value="{{@Auth::user()->id}}">
                  <input type="hidden" name="employee_id" value="{{@$employee->id}}">
                  <input type="hidden" name="user_id" value="{{@$user->id}}">
                  <button type="submit" id="submit" class="btn btn-outline-primary">Save</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
@endsection
@section('script')
<script>

    document.getElementById("department_id").addEventListener("change", function() {
      const selectedDepartmentId = this.value;
      const buDiv = document.getElementById("bu_div");
       const buDivs = document.getElementById("archive_div");
    
      // Add department IDs that should hide the BU Number dropdown
      const departmentsToHideBU = ["1", "3", "7", "8"];
      const departmentsToHideBUS = ["8"];
    
      // Check if the selected department is in the list of departments to hide BU
      if (departmentsToHideBU.includes(selectedDepartmentId)) {
        buDiv.style.display = "none";
      } else {
        buDiv.style.display = "block";
      }
      
      if (departmentsToHideBUS.includes(selectedDepartmentId)) {
        buDivs.style.display = "block";
      } else {
        buDivs.style.display = "none";
      }
      
    });
    
    document.getElementById("nameofthebu_id").addEventListener("change", function() {
      const selectedDepartmentId = this.value;
      $("#nameofthebu_ids").val(selectedDepartmentId);
      
    });
   
    const phoneInputField = document.querySelector("#mobile_number");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        initialCountry: "IN",
    });
    
    
    
    $("#password-toggle").click(function () {
      togglePasswordVisibility("#password", "#password-toggle");
   });

   $("#confirm-toggle").click(function () {
      togglePasswordVisibility("#confirm_password", "#confirm-toggle");
   });

   function togglePasswordVisibility(inputField, toggleIcon) {
      var field = $(inputField);
      var fieldType = field.attr("type");

      if (fieldType === "password") {
         field.attr("type", "text");
         $(toggleIcon).removeClass("mdi-eye-off").addClass("mdi-eye");
      } else {
         field.attr("type", "password");
         $(toggleIcon).removeClass("mdi-eye").addClass("mdi-eye-off");
      }
   }
   
   $("input").keyup(function() {
      var pass1 = $("#password").val();
      var pass2 = $("#confirm_password").val();
   
      if (pass2.length > 0) {
         if (pass1 !== pass2) {
            $("#submit").attr('disabled', true);
            $("#alt25").text("Confirm Password Should be Same as Password");
         } else {
            $("#submit").attr('disabled', false);
            $("#alt25").text("");
         }
      }
   
      // Password format validation
      if (pass1.length > 0) {
          var passwordFormat = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
          if (passwordFormat.test(pass1)) {
             $("#alt24").text("");
          } else {
             $("#alt24").text("Password must be at least 8 characters long and contain at least one uppercase letter, one symbol, and one alphanumeric character.");
          }
      }
      
   });
    
    
</script>    
<script type="text/javascript">
   $(document).ready(function() 
    {
        $('ul#iti-0__country-listbox li').click(function(e) 
        { 
            var countrycode = $(this).text();
            $(".cc").val(countrycode);
        });
        
       
       $('#department_id').change(function(){
           var department_id = $(this).val();
           if(department_id!=''){ $("#alt22").text(""); }
       });
       
       $('#nameofthebu_id').change(function(){
           var nameofthebu_id = $(this).val();
           if(nameofthebu_id!=''){ $("#alt23").text(""); }
       });
        
    });


   $("#official_emailid").keyup(function(){
      var official_emailid = $("#official_emailid").val();
      var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             
      if(!mailformat.test(official_emailid)){
         $("#alt5").text("You have entered an invalid email id!");
         return false;
      }
      else{
         
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
   
        $.ajax({
             type:'POST',
             url:"{{ route('profiles.getEmalid') }}",
             data:{email:official_emailid},
             success:function(data){
              if(data=='Success')
              {
                $("#alt5").text("This email id already exists:Please select a different one.");
                $("#submit").attr('disabled',true);
              }
              else
              {
                 $("#alt5").text("");
                 $("#submit").attr('disabled',false);
              }
                //alert(data);
                //console.log(data);
             }
        });
   
         
      }
             
   });

</script>
@endsection