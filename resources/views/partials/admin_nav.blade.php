
<style>
   .fydiv {
   /*display: flex;*/
   align-items: center;
   justify-content: center;
   height: 100vh;
   margin: 0;
   text-align: center;
   }
   .notification{
          margin-right: 20px; 
   }
   .notification .notification-icon{
    position:relative;   
   }
   .notification .notification-icon i{
   color: #b1b1b1;
    font-size: 28px !important;
    margin-top: 5px;
    display: block;    
   }
   .notification .notification-icon .numb-not{
    position: absolute;
    background: #f00;
    color: #fff;
    padding: 4px 6px;
    border-radius: 50%;
    font-size: 9px;
    width: 25px;
    height: 25px;
    left: 14px;
    display: flex;
    justify-content: center;
    align-items: center;   
   }
   .notification-all .notification-li .icon{
       background: #1688135c;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;    
   }
   .notification-all .notification-li{
display: flex;
    justify-content: left;
    align-items: center;
    font-size: 13px;
    font-weight: 500;
    border-bottom: 1px solid #e8e8e8;
    padding-bottom: 8px;
    padding-top: 8px;
   }
   .notification-all .notification-li:last-child {
  border-bottom: none;
}
   .notification-all .notification-li .icon i{
    color: #008000;   
   }
   .notification-all .notification-li .text{
       padding-left: 15px;
    text-align: left;   
   }
   .notification .see-all-noti{
   color: #f00;
    font-weight: 400;
    text-decoration: none;
    width: 100%;
    display: block;
    border-top: 1px solid #e0e0e0;
    padding-top: 7px;
    padding-left: 16px;    
   }
   
  i.mdi.mdi-check.mark-as-read {
    color: green;
}

.notification-all .notification-li .icon-sec {
    background: #00800042;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.mdi-alert-circle::before {
    content: "\F028";
    color: #ff0000ad;
    font-size: 34px;
}

</style>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">

   <div class="navbar-menu-wrapper d-flex align-items-top">
      @php
      if (session()->has('financial_year')) {
      $financialYear = session('financial_year');
      } else {
      $financialYear = '';
      }
      @endphp
      
      <div class="me-3" style="margin-top: 10px;">
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
         <span class="icon-menu"></span>
         </button>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
      </button>
      </div>
      <ul class="navbar-nav ms-auto">
        
      </ul>
     
      <?php
            $user_id = Auth::user()->id;
            $unreadNotificationCount = App\Models\Notification::where('recipient_id', $user_id)
                ->where('read', 0)
                ->count();
        ?>

    @if($financialYear != '')
     <ul class="navbar-nav ms-auto notification">
         <li class="nav-item dropdown user-dropdown displayname-img">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="notification-icon">  
           @if($unreadNotificationCount > 0)
             <div class="numb-not">{{$unreadNotificationCount}}</div>
            @endif
            <i class="mdi mdi-bell"></i>
            </div>
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
               <div class="dropdown-header text-center">
                <div class="notification-all">
                   <?php
                        $user_id = Auth::user()->id;
                        $allnotifications = App\Models\Notification::where('recipient_id', $user_id)->orderByDesc('created_at')->take(7)->get();
                    ?>
                    @foreach($allnotifications as $notification)
                        <div class="notification-li">
                            <div class="@if($notification->read == 0) icon-sec-change @else icon @endif">
                            @if($notification->read == 0)
                               <i class="mdi mdi-alert-circle mark-as-read"></i>
                            @else
                              <i class="mdi mdi-check"></i>
                            @endif
                                
                            </div>
                            <div class="text">
                                {{ $notification->heading }}
                            </div>
                        </div>
                    @endforeach
                </div>  
               </div>
               <?php if( Auth::user()->roles_id == 8 ) { ?>
                <a href="{{ route('notifications') }}" class="see-all-noti">See All</a>
                <?php }elseif( Auth::user()->roles_id == 2 ){ ?>
               <a href="{{ route('cs.notifications') }}" class="see-all-noti">See All</a>
               <?php }else{ ?>
               <a href="" class="see-all-noti get-rol-id-{{Auth::user()->roles_id}}">See All</a>
               <?php } ?>
            </div>
         </li>
      </ul>  
      @endif
      
      
      <ul class="navbar-nav">
         <li class="nav-item dropdown user-dropdown displayname-img">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if( Auth::user()->roles_id < 2) { ?>    
            <img class="img-xs rounded-circle" src="{{asset('public/data/admin/images/faces/face8.jpg')}}" alt="Profile image">
            <?php } else{ 
               if(Auth::user()->employee->profile_image!=''){
               
                 $image = Auth::user()->employee->profile_image;
               
               }
               
               else { $image = ''; }
               
               
               
               if($image==''){
               
               ?>
            <img class="img-xs rounded-circle" src="{{asset('public/data/admin/images/faces/face8.jpg')}}" alt="Profile image"> </a>
            <p class="mb-1 mt-3 pl-2 font-weight-semibold">{{ Auth::user()->name }}</p>
            <?php } else { ?>
            <img class="img-xs rounded-circle" src="{{ asset('public/data/employee/'.$image) }}" alt="Profile image" width="42"> </a>
            <p class="mb-1 mt-3 pl-2 font-weight-semibold">{{ Auth::user()->name }}</p>
            <?php } } ?>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
               <div class="dropdown-header text-center">
                  <?php if( Auth::user()->roles_id < 2) { ?>
                  <img class="img-md rounded-circle" src="{{asset('public/data/admin/images/faces/face8.jpg')}}" alt="Profile image">
                  <?php } else{ 
                     if(Auth::user()->employee->profile_image!=''){
                     
                       $image = Auth::user()->employee->profile_image;
                     
                     }
                     
                     else { $image = ''; }
                     
                     
                     
                     if($image==''){
                     
                     ?>
                  <img class="img-md rounded-circle" src="{{asset('public/data/admin/images/faces/face8.jpg')}}" alt="Profile image">
                  <?php } else { ?>
                  <img class="img-md rounded-circle" src="{{ asset('public/data/employee/'.$image) }}" alt="Profile image" width="42">
                  <?php } } ?>
                  <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                  <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
               </div>
               <?php if( Auth::user()->roles_id == 1) { ?>
               <a class="dropdown-item" href="{{route('profiles.edit', Auth::user()->id)}}">
                  <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <!--<span class="badge badge-pill badge-danger">1</span>-->
               </a>
               <a class="dropdown-item" href="{{route('profiles.changePassword', Auth::user()->id)}}"><i class="dropdown-item-icon mdi mdi-lock-outline text-primary me-2"></i> Change Password</a>
               <?php } if( Auth::user()->roles_id == 2) { ?>
               <a class="dropdown-item" href="{{route('csprofiles.edit', Auth::user()->id)}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
               <a class="dropdown-item" href="{{route('csprofiles.changePassword', Auth::user()->id)}}"><i class="dropdown-item-icon mdi mdi-lock-outline text-primary me-2"></i> Change Password</a>
               <?php } ?>
               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
         </li>
      </ul>
      
   </div>
</nav>
<form method="POST" action="{{ route('logout') }}" id="logout_form">
   @csrf
</form>