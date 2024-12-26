<!-- partial:partials/_settings-panel.html -->
<div class="theme-setting-wrapper">
   <div id="settings-trigger"><i class="ti-settings"></i></div>
   <div id="theme-settings" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options selected" id="sidebar-light-theme">
         <div class="img-ss rounded-circle bg-light border me-3"></div>
         Light
      </div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme">
         <div class="img-ss rounded-circle bg-dark border me-3"></div>
         Dark
      </div>
   </div>
</div>
<div id="right-sidebar" class="settings-panel">
   <i class="settings-close ti-close"></i>
   <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
      </li>
   </ul>
   <div class="tab-content" id="setting-content">
      <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
         <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
               <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
               </div>
            </form>
         </div>
         <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
               <li>
                  <div class="form-check">
                     <label class="form-check-label">
                     <input class="checkbox" type="checkbox">
                     Team review meeting at 3.00 PM
                     </label>
                  </div>
                  <i class="remove ti-close"></i>
               </li>
               <li>
                  <div class="form-check">
                     <label class="form-check-label">
                     <input class="checkbox" type="checkbox">
                     Prepare for presentation
                     </label>
                  </div>
                  <i class="remove ti-close"></i>
               </li>
               <li>
                  <div class="form-check">
                     <label class="form-check-label">
                     <input class="checkbox" type="checkbox">
                     Resolve all the low priority tickets due today
                     </label>
                  </div>
                  <i class="remove ti-close"></i>
               </li>
               <li class="completed">
                  <div class="form-check">
                     <label class="form-check-label">
                     <input class="checkbox" type="checkbox" checked>
                     Schedule meeting for next week
                     </label>
                  </div>
                  <i class="remove ti-close"></i>
               </li>
               <li class="completed">
                  <div class="form-check">
                     <label class="form-check-label">
                     <input class="checkbox" type="checkbox" checked>
                     Project review
                     </label>
                  </div>
                  <i class="remove ti-close"></i>
               </li>
            </ul>
         </div>
         <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
         <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
               <i class="ti-control-record text-primary me-2"></i>
               <span>Feb 11 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
            <p class="text-gray mb-0">The total number of sessions</p>
         </div>
         <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
               <i class="ti-control-record text-primary me-2"></i>
               <span>Feb 7 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
         </div>
      </div>
      <!-- To do section tab ends -->
      <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
         <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
         </div>
      </div>
      <!-- chat tab ends -->
   </div>
</div>
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
   <?php if(Auth::user()->roles_id == 1) { ?>
   <ul class="nav">
      <li class="nav-item">
         <a class="nav-link" href="{{route('dashboard')}}">
         <i class="mdi mdi-grid-large menu-icon"></i>
         <span class="menu-title">Dashboard</span>
         </a>
      </li>     
      <li class="nav-item">
         <a class="nav-link" href="{{route('departments.departmentList')}}">
         <i class="mdi mdi-settings menu-icon"></i>
         <span class="menu-title">Departrment List</span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('employees.employeeList')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
         <span class="menu-title">Employee List</span>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{ route('file-manager.index') }}">
            <i class="mdi mdi-folder-open menu-icon"></i>
            <span class="menu-title">File Manager</span>
         </a>
      </li>
   </ul>
   <?php } elseif(Auth::user()->roles_id == 2) { ?>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('csdashboard')}}">
                <i class="mdi mdi-grid-large menu-icon"></i><span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('emp.file-manager.index') }}">
               <i class="mdi mdi-folder-open menu-icon"></i>
               <span class="menu-title">File Manager</span>
            </a>
         </li>

      
      

    <?php } ?>
</nav>