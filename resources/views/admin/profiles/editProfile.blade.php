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
               <form class="forms-sample" action="{{route('profiles.store')}}" name="profileForm" id="profileForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Name<span class="required" style="color:red;">*</span></label>
                           <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{@$user->name}}">
                           <span id="alt1" style="color:red;"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputName1">Email Id<span class="required" style="color:red;">*</span></label>
                           <input type="email" class="form-control" name="email" id="email" placeholder="Email id" value="{{@$user->email}}">
                           <span id="alt2" style="color:red;"></span>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="user_id" value="{{@Auth::user()->id}}">
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
   $('#name').keyup(function() {
       var name = this.value;
       if(name!=''){ $("#alt1").text(""); }
   });
   
   function validateForm() {
         
        var name = document.forms["profileForm"]["name"].value;
        if (name == null || name == "")
        {
          $("#alt1").text("Name must be filled out!");
          return false;
        }
        else{
          $("#alt1").text("");
        }
        
        var email = document.forms["profileForm"]["email"].value;
        if (email == null || email == "")
        {
           $("#alt2").text("Email id must be filled out!");
           return false;
        }
        else{
           $("#alt2").text("");
        }
        
   }  
</script>
<script type="text/javascript">
   $("#email").keyup(function(){
      var email = $("#email").val();
      var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             
      if(!mailformat.test(email)){
         $("#alt2").text("You have entered an invalid email id!");
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
             data:{email:email},
             success:function(data){
              if(data=='Success')
              {
                $("#alt2").text("This email id already exists:Please select a different one.");
                $("#submit").attr('disabled',true);
              }
              else
              {
                 $("#alt2").text("");
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