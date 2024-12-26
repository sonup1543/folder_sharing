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
                     <a href="{{route('dashboard')}}" style=""><button type="button" class="btn btn-outline-primary">Dashboard</button></a>
                  </div>
               </div>
               <form class="forms-sample" action="{{route('profiles.storeUserPassword')}}" name="profileForm" id="profileForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Password<span class="required" style="color:red;">*</span></label>    
                           <div class="input-group">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                              <div class="input-group-append">
                                 <span class="input-group-text">
                                 <i class="mdi mdi-eye-off" id="password-toggle"></i>
                                 </span>
                              </div>
                           </div>
                           <span id="alt1" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Confirm Password<span class="required" style="color:red;">*</span></label>
                           <div class="input-group">
                              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                              <div class="input-group-append">
                                 <span class="input-group-text">
                                 <i class="mdi mdi-eye-off" id="confirm-toggle"></i>
                                 </span>
                              </div>
                           </div>
                           <span id="alt" style="color:red;"></span>
                           <span id="alt2" style="color:red;"></span>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="user_id" value="{{@Auth::user()->id}}">
                  <button type="submit" id="submit" class="btn btn-outline-primary">Submit</button>
                  <button type="reset" class="btn btn-outline-danger">Reset</button>
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
   $('#password').keyup(function() {
     var password = this.value;
     if(password!=''){ $("#alt1").text(""); }
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
            $("#alt2").text("Confirm Password Should be Same as Password");
         } else {
            $("#submit").attr('disabled', false);
            $("#alt2").text("");
         }
      }
   
      // Password format validation
      var passwordFormat = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
      if (passwordFormat.test(pass1)) {
         $("#alt1").text("");
      } else {
         $("#alt1").text("Password must be at least 8 characters long and contain at least one uppercase letter, one symbol, and one alphanumeric character.");
      }
   }); 
   
   function validateForm() {
         
        var password = document.forms["profileForm"]["password"].value;
        if (password == null || password == "")
        {
          $("#alt1").text("Password must be filled out!");
          return false;
        }
        else{
          $("#alt1").text("");
        }
        
        var confirm_password = document.forms["profileForm"]["confirm_password"].value;
        if (confirm_password == null || confirm_password == "")
        {
           $("#alt2").text("Confirm password must be filled out!");
           return false;
        }
        else{
           $("#alt2").text("");
        }
        
   }  
</script>
@endsection