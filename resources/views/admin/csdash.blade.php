@extends('layouts.admin')
@section('content')
<head>
   <!--<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">-->
</head>
<style>
   .progress-bar {
   background-color: #fd750d !important;
   }
   /* #calendar {
   height: 500px; 
   width: 100% !important;
   }*/
   .other-month {
   visibility: hidden; /* Alternatively, you can use display: none; */
   }
   .fc-col-header-cell-cushion, /* Week day */
   .fc-daygrid-day.fc-day-today, /* Today's date */
   .fc-daygrid-day.fc-day-selected, /* Selected date */
   .fc-daygrid-day-number { /* Date number */
   text-decoration: none;
   }
   .hovered .fc-title {
   display: block !important;
   }
   .fc-title {
   display: none;
   }
   button.fc-today-button.fc-button.fc-button-primary {
   display: none;
   }
   .fc-h-event {
   border: none !important;
   }
   img.colorpick-eyedropper-input-trigger {
   display: none;
   }
   .popper,
   .tooltip {
   position: absolute;
   z-index: 9999;
   background:#899499;
   width: 150px;
   padding: 10px;
   text-align: center;
   }
   .style5 .tooltip {
   color: #FFFFFF;
   background:#899499;
   max-width: 200px;
   width: auto;
   font-size: 20px;
   padding: .5em 1em;
   }
   .popper .popper__arrow,
   .tooltip .tooltip-arrow {
   width: 0;
   height: 0;
   position: absolute;
   margin: 5px;
   }
   .tooltip .tooltip-arrow,
   .popper .popper__arrow {
   }
   .style5 .tooltip .tooltip-arrow {
   }
   .fc-h-event .fc-event-main{
	   color:#000;
   }
</style>
@php
$user = Auth::user();
if ($user) {
    $employee = \App\Models\Employee::where('id', $user->id)->first();

    if ($employee && $employee->nameofthebu_id == '0') {
        $bunumber = '';
    } else {
        $bunumber = $employee ? $employee->bu : '';
    }

    $currentMonth = date('m');
    $currentYear = date('Y');
} else {
    $bunumber = '';
    $currentMonth = '';
    $currentYear = '';
}
@endphp
<div class="content-wrapper">
   <div class="row">
      <div class="col-sm-12">
         <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <h2 class="welcome-text"></span>{{@$title}}</h2>
               <!--<ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                  </li>
               </ul>
               <div>
                  <div class="btn-wrapper">
                     <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                     <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                     <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                  </div>
               </div>-->
            </div>
            <div class="tab-content tab-content-basic">
               <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                           <div>
                              <p class="statistics-title">Total Employees</p>
                              <h3 class="rate-percentage">30</h3>
                              <p class="text-success d-flex">&nbsp;</p>
                           </div>
                           <div>
                              <p class="statistics-title">Total Projects</p>
                              <h3 class="rate-percentage">2,530</h3>
                              <p class="text-success d-flex">&nbsp;</p>
                           </div>
                           <div>
                              <p class="statistics-title">Total Clients</p>
                              <h3 class="rate-percentage">2,754</h3>
                              <p class="text-success d-flex">&nbsp;</p>
                           </div>
                           <div class="d-none d-md-block">
                              <p class="statistics-title">Total Collections</p>
                              <h3 class="rate-percentage">56%</h3>
                              <p class="text-success d-flex">&nbsp;</p>
                           </div>
                           <div class="d-none d-md-block">
                              <p class="statistics-title">Total Vendors</p>
                              <h3 class="rate-percentage">1,836</h3>
                              <p class="text-success d-flex">&nbsp;</p>
                           </div>
                           <div class="d-none d-md-block">
                              <p class="statistics-title">Open Projects</p>
                              <h3 class="rate-percentage">11</h3>
                              <p class="text-success d-flex">&nbsp;</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                           <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                 <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                       <div>
                                          <h4 class="card-title card-title-dash"> Project Performance Line Chart</h4>
                                          <h5 class="card-subtitle card-subtitle-dash">Project Performance Weekly Line Chart</h5>
                                       </div>
                                       <div id="performance-line-legend"></div>
                                    </div>
                                    <div class="chartjs-wrapper mt-5">
                                       <canvas id="performaneLine"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                           <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card bg-primary card-rounded">
                                 <div class="card-body pb-0">
                                    <h4 class="card-title card-title-dash text-white mb-4">Project Status Summary</h4>
                                    <div class="row">
                                       <div class="col-sm-4">
                                          <p class="status-summary-ight-white mb-1">Opened Value</p>
                                          <h2 class="text-info">357</h2>
                                       </div>
                                       <div class="col-sm-8">
                                          <div class="status-summary-chart-wrapper pb-4">
                                             <canvas id="status-summary"></canvas>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-sm-6">
                                          <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                             <div class="circle-progress-width">
                                                <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                             </div>
                                             <div>
                                                <p class="text-small mb-2">Total Clients</p>
                                                <h4 class="mb-0 fw-bold">26.80%</h4>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="d-flex justify-content-between align-items-center">
                                             <div class="circle-progress-width">
                                                <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                             </div>
                                             <div>
                                                <p class="text-small mb-2">Visits per day</p>
                                                <h4 class="mb-0 fw-bold">165</h4>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection