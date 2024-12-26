@extends('layouts.admin')
@section('content')
<style>
   .iti
   {
   display:block;
   }
   .fontweight
   {
   font-weight:bold;
   }
   .form-control {
   padding: 0.875rem 0.575rem;
   }
   .eform
   {
   display:inline;
   }
</style>
<?php //print_r($projects[0]); ?>
@php
    if (session()->has('number_format')) {
        $NumberFormat = session('number_format');
    } else {
        $NumberFormat = '';
    }
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
                     <a href="{{route('project.accesssingleproject', $projects[0]->id)}}" style=""><button type="button" class="btn btn-outline-primary"> Back</button></a>
                     <!--<button type="button" class="btn btn-outline-primary" onclick="window.history.back();"> Back</button>-->
                  </div>
               </div>
               <div class="row" style="margin-top:10px;">
                  <form class="forms-sample" action="{{route('project.quotebillstore')}}" name="projectForm" id="projectForm" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                     @csrf
                    <div id="new_insert"> 
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                 <table style="width: 100%;  ">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px; width:33%;"><span class="fontweight">Date: </span><span>{{@date("d-m-Y", strtotime($projects[0]->opening_date))}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px; width:31%;"><span class="fontweight">Bill No: </span><span>{{@$quoteapproval->bill_no}}</span></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">To: </span><span>{{@ucfirst(@$clientinfo->f_name." ".@$clientinfo->m_name." ".@$clientinfo->l_name)}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">Company Name: </span><span>{{(@$clientbilldata->company_name)}}</span></td>
                                    </tr>
                                    <!--<tr style="border-bottom: 1px solid #ddd;"><td style="padding:5px 10px;">Company Name</td></tr>-->
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Address 1: </span><span>{{@ucfirst(@$clientbilldata->address1)}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">Address 2: </span><span>{{@ucfirst(@$clientbilldata->address2)}}</span></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Address 3: </span><span>{{@ucfirst(@$clientbilldata->address3)}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">City: </span><span>{{@ucfirst(@$clientbilldata->city)}}</span></td>
                                    </tr>
                                    <!--<tr style="border-bottom: 1px solid #ddd;"><td style="padding:5px 10px;">Address 2</td></tr>
                                       <tr style="border-bottom: 1px solid #ddd;"><td style="padding:5px 10px;">Address 3</td></tr>-->
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Pincode: </span><span>{{@ucfirst(@$clientbilldata->pincode)}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">State: </span><span>{{@ucfirst(@$clientbilldata->state)}}</span></td>
                                    </tr>
                                    <!--<tr style="border-bottom: 1px solid #ddd;"><td style="padding:5px 10px;">Pincode</td></tr>
                                       <tr style="border-bottom: 1px solid #ddd;"><td style="padding:5px 10px;">State</td></tr>-->
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Authorized Representative: </span><span>{{@ucfirst(@$clientbilldata->representative_name)}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px; width:31%;"></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Client GST No: </span><span>{{@ucfirst(@$clientbilldata->client_gst)}}</span></td>
                                       <td style="padding:5px 10px; width:36%;"></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">PAN: </span><span>{{@ucfirst(@$clientbilldata->client_pan)}}</span></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                <table style="width: 100%;  ">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Project ID: </span><span>{{@$projects[0]->project_id}}</span></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Project Name: </span><span>{{@ucfirst($projects[0]->project_name)}}</span></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     <div class="table-responsive main-table" style=" padding:5px 10px; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px; padding:5px 10px;">
                                 <table style="width: 1150px" id="particulars">
                                    <thead>
                                       <tr>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Sr. No.</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Heading</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Particulars</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Rate</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Units</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Days</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">SqFt<br>Exch<br>Rate</td>
                                          <td style="padding:5px 10px; border: 1px solid #ddd; text-align:center;">Base<br>Amount</td>
                                       </tr>
                                    </thead>
                                    <tbody class="dynamicrows">
                                       @if($quotestore == "")
                                       <?php $count = 5; $readonly = ""; ?>
                                       <tr>
                                         <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:6%"><input type="text" class="form-control" name="srno[]" id="sno1" placeholder="Sr. No." value="1" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:19%"><input type="text" class="form-control" name="heading[]" id="heading1" placeholder="Heading" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:30%"><input type="text" class="form-control" name="particulr[]" id="particulr1" placeholder="Particulars"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control crateval" name="crate[]" id="crate1" placeholder="Rate">
                                          <input style="width:120px;" type="hidden" class="form-control rateval" name="rate[]" id="rate1" placeholder="Rate">
                                          </td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:8%"><input type="text" class="form-control unitval" name="unit[]" id="unit1" placeholder="Units"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control dayval" name="days[]" id="days1" placeholder="Days"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control camtval" name="cbamt[]" id="cbamt1" placeholder="Base amount">
                                          <input style="width:120px;" type="hidden" class="form-control amtval" name="bamt[]" id="bamt1" placeholder="Base amount">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:6%"><input type="text" class="form-control" name="srno[]" id="sno1" placeholder="Sr. No." value="2" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:19%"><input type="text" class="form-control" name="heading[]" id="heading2" placeholder="Heading" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:30%"><input type="text" class="form-control" name="particulr[]" id="particulr2" placeholder="Particulars"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control crateval" name="crate[]" id="crate2" placeholder="Rate">
                                          <input style="width:120px;" type="hidden" class="form-control rateval" name="rate[]" id="rate2" placeholder="Rate">
                                          </td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:8%"><input type="text" class="form-control unitval" name="unit[]" id="unit2" placeholder="Units"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control dayval" name="days[]" id="days2" placeholder="Days"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control camtval" name="cbamt[]" id="cbamt2" placeholder="Base amount">
                                          <input style="width:120px;" type="hidden" class="form-control amtval" name="bamt[]" id="bamt2" placeholder="Base amount">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:6%"><input type="text" class="form-control" name="srno[]" id="sno1" placeholder="Sr. No." value="3" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:19%"><input type="text" class="form-control" name="heading[]" id="heading3" placeholder="Heading" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:30%"><input type="text" class="form-control" name="particulr[]" id="particulr3" placeholder="Particulars"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control crateval" name="crate[]" id="crate3" placeholder="Rate">
                                          <input style="width:120px;" type="hidden" class="form-control rateval" name="rate[]" id="rate3" placeholder="Rate">
                                          </td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:8%"><input type="text" class="form-control unitval" name="unit[]" id="unit3" placeholder="Units"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control dayval" name="days[]" id="days3" placeholder="Days"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control camtval" name="cbamt[]" id="cbamt3" placeholder="Base amount">
                                          <input style="width:120px;" type="hidden" class="form-control amtval" name="bamt[]" id="bamt3" placeholder="Base amount">
                                          </td>
                                       </tr>
                                       <tr>
                                         <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:6%"><input type="text" class="form-control" name="srno[]" id="sno1" placeholder="Sr. No." value="4" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:19%"><input type="text" class="form-control" name="heading[]" id="heading4" placeholder="Heading" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:30%"><input type="text" class="form-control" name="particulr[]" id="particulr4" placeholder="Particulars"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control crateval" name="crate[]" id="crate4" placeholder="Rate">
                                          <input style="width:120px;" type="hidden" class="form-control rateval" name="rate[]" id="rate4" placeholder="Rate">
                                          </td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:8%"><input type="text" class="form-control unitval" name="unit[]" id="unit4" placeholder="Units"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control dayval" name="days[]" id="days4" placeholder="Days"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control camtval" name="cbamt[]" id="cbamt4" placeholder="Base amount">
                                          <input style="width:120px;" type="hidden" class="form-control amtval" name="bamt[]" id="bamt4" placeholder="Base amount">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:6%"><input type="text" class="form-control" name="srno[]" id="sno1" placeholder="Sr. No." value="5" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:19%"><input type="text" class="form-control" name="heading[]" id="heading5" placeholder="Heading" required></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:30%"><input type="text" class="form-control" name="particulr[]" id="particulr5" placeholder="Particulars"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control crateval" name="crate[]" id="crate5" placeholder="Rate">
                                          <input style="width:120px;" type="hidden" class="form-control rateval" name="rate[]" id="rate5" placeholder="Rate">
                                          </td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:8%"><input type="text" class="form-control unitval" name="unit[]" id="unit5" placeholder="Units"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control dayval" name="days[]" id="days5" placeholder="Days"></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control camtval" name="cbamt[]" id="cbamt5" placeholder="Base amount">
                                          <input style="width:120px;" type="hidden" class="form-control amtval" name="bamt[]" id="bamt5" placeholder="Base amount">
                                          </td>
                                       </tr>
                                       @else
                                       <?php $i = 0;
                                          $count = count($quoteparticulrs); ?>
                                       @foreach($quoteparticulrs as $key => $particulr)
                                       <?php $i = $i+1; ?>
                                       <?php $readonly = "readonly"; ?>
                                       <tr>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:6%;"><input type="text" class="form-control" name="srno[]" id="sno{{@$i}}" placeholder="Sr. No." value="{{@$particulr->srno }}" @if(@$i==1) required @endif readonly></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:19%"><input type="text" class="form-control" name="heading[]" id="heading{{@$i}}" placeholder="Heading" value="{{@$particulr->heading}}" @if(@$i==1) required @endif readonly></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:30%"><input type="text" class="form-control" name="particulr[]" id="particulr{{@$i}}" placeholder="Particulars" value="{{@$particulr->particulars}}" readonly></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control crateval" name="crate[]" id="crate{{@$i}}" placeholder="Rate" value="{{@$particulr->crate}}" readonly>
                                          <input style="width:120px;" type="hidden" class="form-control rateval" name="rate[]" id="rate{{@$i}}" placeholder="Rate" value="{{@$particulr->rate}}" >
                                          </td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:8%"><input type="text" class="form-control unitval" name="unit[]" id="unit{{@$i}}" placeholder="Units" value="{{@$particulr->units}}" readonly></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control dayval" name="days[]" id="days{{@$i}}" placeholder="Days" value="{{@$particulr->days}}" readonly></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:10%"><input type="text" class="form-control sqftval" name="sqft[]" id="sqft{{@$i}}" placeholder="SqFt/Exch rate" value="{{@$particulr->sqft}}" readonly></td>
                                          <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center; width:12%">
                                          <input style="width:120px;" type="text" class="form-control cbamtval" name="cbamt[]" id="cbamt{{@$i}}" placeholder="Base Amount" value="{{@$particulr->cbaseamount}}" readonly>
                                          <input style="width:120px;" type="hidden" class="form-control bamtval" name="bamt[]" id="bamt{{@$i}}" placeholder="Base Amount" value="{{@$particulr->baseamount}}" >
                                          </td>
                                       </tr>
                                       
                                      {{-- @php
                                        $eccomments = \App\ExpectedCommentsParticulars::where(['project_id'=>$projects[0]->id, 'srnos'=>@$i])->whereNotNull('qc_comments')->get();
                                      @endphp
                                      
                                      @if($eccomments !== null)
                                      @foreach($eccomments as $key => $eccomment)
                                      @php $commentno = $i.'.'.$key+1; @endphp
                                      
                                      <tr class="input-box{{@$i}}">
                                        <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" value="{{@$commentno}}" readonly></td>
                                        <td style="padding:3px 6px; border: 1px solid #ddd; text-align:left;" colspan="7"><textarea style="height: 35px;" rows="5" class="form-control" readonly>{{@$eccomment->qc_comments}}</textarea></td>
                                      </tr>
                                      @endforeach
                                      @endif --}}
                                       
                                       
                                       @endforeach
                                       @endif
                                    </tbody>
                                    <tbody>
                                       <tr>
                                          <td colspan="5" style="padding:3px 6px; border: 1px solid #ddd; text-align:left;">Sub-Total</td>
                                          <!--<td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="sub_unit" id="sub_unit" value="{{@$quotestore->subttl_units}}" readonly></td>
                                             <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="sub_days" id="sub_days" value="{{@$quotestore->subttl_days}}" readonly></td>-->
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="csub_bamt" id="csub_bamt" value="{{@$quotestore->csubttl_bamt}}" readonly>
                                          <input type="hidden" class="form-control" name="sub_bamt" id="sub_bamt" value="{{@$quotestore->subttl_bamt}}" >
                                          </td>
                                       </tr>
                                       <tr>
                                          <td colspan="5" style="padding:3px 6px; border: 1px solid #ddd; text-align:left;">Add EMC (%)</td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="percentge" id="percentge" value="{{@$quotestore->emc_in_percent}}" required <?= $readonly ?> ></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="cemcbamt" id="cemcbamt" value="{{@$quotestore->cemc_ttl}}" readonly>
                                          <input type="hidden" class="form-control" name="emcbamt" id="emcbamt" value="{{@$quotestore->emc_ttl}}" >
                                          </td>
                                       </tr>
                                       <tr>
                                          <td colspan="5" style="padding:3px 6px; border: 1px solid #ddd; text-align:left;">Total</td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="cttlamt" id="cttlamt" value="{{@$quotestore->cttl_bamt}}" readonly>
                                          <input type="hidden" class="form-control" name="ttlamt" id="ttlamt" value="{{@$quotestore->ttl_bamt}}" >
                                          </td>
                                       </tr>
                                    </tbody>
                                    <tbody>
                                       <tr>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:left;" colspan="5">SGST (%)</td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="sgst" id="sgst" placeholder="" value="{{@$quotestore->sgst}}" readonly></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="csgstamt" id="csgstamt" placeholder="" value="{{@$quotestore->csgstamt}}" readonly>
                                          <input type="hidden" class="form-control" name="sgstamt" id="sgstamt" placeholder="" value="{{@$quotestore->sgstamt}}" >
                                          </td>
                                          <!--<td></td>-->
                                       </tr>
                                       <tr>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:left;" colspan="5">CGST (%)</td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="cgst" id="cgst" placeholder="" value="{{@$quotestore->cgst}}" readonly></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="ccgstamt" id="ccgstamt" placeholder="" value="{{@$quotestore->ccgstamt}}" readonly>
                                          <input type="hidden" class="form-control" name="cgstamt" id="cgstamt" placeholder="" value="{{@$quotestore->cgstamt}}" >
                                          </td>
                                          <!--<td></td>-->
                                       </tr>
                                       <tr>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:left;" colspan="5">IGST (%)</td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="igst" id="igst" placeholder="" value="{{@$quotestore->igst}}" readonly></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="cigstamt" id="cigstamt" placeholder="" value="{{@$quotestore->cigstamt}}" readonly>
                                          <input type="hidden" class="form-control" name="igstamt" id="igstamt" placeholder="" value="{{@$quotestore->igstamt}}" >
                                          </td>
                                          <!--<td></td>-->
                                       </tr>
                                    </tbody>
                                    <tbody>
                                       <tr>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:left;" colspan="5">Final Total</td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;"></td>
                                          <td style="padding:3px 6px; border: 1px solid #ddd; text-align:center;">
                                          <input type="text" class="form-control" name="cfinamt" id="cfinamt" placeholder="" value="{{@$quotestore->cfinamt}}" readonly>
                                          <input type="hidden" class="form-control" name="finamt" id="finamt" placeholder="" value="{{@$quotestore->finamt}}" >
                                          </td>
                                          <!--<td></td>-->
                                       </tr>
                                    </tbody>
                                 </table>

                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                 <table style="width: 100%;">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px; width:35%;"><span class="fontweight">Amount In Words: </span></td>
                                       <td style="padding:5px 10px; width:65%;">
                                          <span class="fontweight" id="amtwords">{{@$quotestore->amtword}}</span>
                                          <input type="hidden" class="form-control" name="amtword" id="amtword" placeholder="">
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                <table style="width: 100%;  ">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px; width:33%;"><span class="fontweight">For Nyka Events Pvt Ltd </span></td>
                                       <td style="padding:5px 10px; width:36%;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px; width:31%;"><span class="fontweight">Nyka Events Pvt Ltd Bank A/C Details:</span></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">Name of the Bank: </span><span>{{@$bankdata->bank_name}}</span></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">Account Number: </span><span>{{@$bankdata->account_number}}</span></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">Branch Name: </span><span>{{@$bankdata->branch_name}}</span></td>
                                    </tr>
                                    @php
                                      if(($quoteapproval->send_for_mgmtapproval == 1 || $quoteapproval->send_for_mgmtapproval == 0) && $quoteapproval->send_to_account == 2){
                                        $emp = \App\Employee::Where('id', @$quoteapproval->accnt_approve_id)->first();
                                        $accountname = $emp->employee_name;
                                      }
                                      else{
                                        $accountname = '';
                                      }
                                    @endphp
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px;"><span class="fontweight">Authorized Signatory: </span> {{--<span>{{$accountname}}</span>--}}</td>
                                       <td style="padding:5px 10px;"><span class="fontweight"></span></td>
                                       <td style="padding:5px 10px;"><span class="fontweight">IFSC Code: </span><span>{{@$bankdata->ifsc_code}}</span></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                 <table style="width: 100%;  ">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px; width:100%; text-align:center;"><b>Additional Information</b></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="width: 100%; margin:10px; padding:5px 10px;">
                                          <table style="width: 100%;  ">
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:50%"><span class="fontweight">Project Owner: </span><span>{{@ucfirst($projects[0]->project_csowner)}}</span></td>
                                                <td style="padding:5px 10px; width:50%"><span class="fontweight">Project Opening Date: </span><span>{{@date("d-m-Y", strtotime($projects[0]->opening_date))}}</span></td>
                                             </tr>
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:50%"><span class="fontweight">Start date of Event: </span><span>{{@date("d-m-Y", strtotime($projects[0]->event_st_date))}}</span></td>
                                                <td style="padding:5px 10px; width:50%"><span class="fontweight">End date of Event: </span><span>{{@date("d-m-Y", strtotime($projects[0]->event_end_date))}}</span></td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                    </div>

                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                 <table style="width: 100%;  ">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px; width:100%; text-align:center;"><b>Approval Summary</b></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="width: 100%; margin:10px; padding:5px 10px;">
                                          <table style="width: 100%;  ">
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%"><b>Approval on Bill Worksheet <br>(By Management)</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @php
                                                   $notappocomms = \App\NotApprovedComments::where(['project_id'=>$projects[0]->id, 'page_name'=>'Bill Worksheet', 'request_type'=>'Approval Projectwise By Management' ])->count();
                                                   @endphp    
                                                    
                                                   @if(@$quotestore != "")
                                                   @if(@$quoteapproval->send_for_mgmtapproval == 1 || @$quoteapproval->send_for_mgmtapproval == 0)
                                                     @if($quoteapproval->management_approval !='')
                                                     {{@$quoteapproval->management_approval}}
                                                     @else
                                                        @if(@$quoteapproval->mgmt_approve_date == "")
                                                             @if($notappocomms > 0)
                                                             <?php echo "Not Approved"; ?>
                                                             @endif
                                                        @endif
                                                        @if(@$quoteapproval->edit_request_by != "" && @$quoteapproval->edit_request_approved_by == "")
                                                        <?php echo "Not Approved"; ?>
                                                        @endif
                                                        
                                                     @endif
                                                   @endif
                                                   @endif 
                                                   
                                                   
                                                 {{--  @if($quotestore != "")
                                                   @if($quoteapproval->send_for_mgmtapproval == 1 || $quoteapproval->send_for_mgmtapproval == 0)
                                                   {{@$quoteapproval->management_approval}}
                                                   @endif
                                                   @endif --}}
                                                </td>
                                                <td style="padding:5px 10px; width:25%"><b>Approval on Bill Worksheet <br>(By Client)</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($quotestore != "")
                                                   @if($quoteapproval->send_for_mgmtapproval == 1 || $quoteapproval->send_for_mgmtapproval == 0)
                                                   {{@$quoteapproval->client_approval}}
                                                   @endif
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%"><b>Approved By</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($quotestore != "")
                                                   @if($quoteapproval->send_for_mgmtapproval == 1 || $quoteapproval->send_for_mgmtapproval == 0)
                                                   @if($quoteapproval->management_approval !='')
                                                   {{@$mgmtapprovedby->employee_name}}
                                                   @endif
                                                   @endif
                                                   @endif
                                                </td>
                                                <td style="padding:5px 10px; width:25%"><b>View Approval On Bill <br>Worksheet (By Client)</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                    @php
                                                     $billimgcount = \App\BillImage::Where('quoteproject_id', @$quoteapproval->quoteproject_id)->Where('upload_for', 'Client Approval')->count();
                                                    @endphp 
                                                    
                                                   @if($quotestore != "")
                                                   @if($quoteapproval->send_for_mgmtapproval == 1 || $quoteapproval->send_for_mgmtapproval == 0)
                                                    @if($billimgcount > 0)
                                                   <a href="javascript:void(0);" onclick="viewapproclient({{@$quoteapproval->quoteproject_id}})" class="btn btn-outline-primary">View</a>
                                                    @endif
                                                   @endif
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%"><b>Date</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($quotestore != "")
                                                   @if($quoteapproval->mgmt_approve_date != "")
                                                   @if($quoteapproval->management_approval !='')
                                                   {{@date("d-m-Y", strtotime($quoteapproval->mgmt_approve_date))}}
                                                   @endif
                                                   @endif
                                                   @endif
                                                </td>
                                                <td style="padding:5px 10px; width:25%"><b>Date</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($quotestore != "")
                                                   @if($quoteapproval->client_approv_date != "")
                                                   {{@date("d-m-Y", strtotime($quoteapproval->client_approv_date))}}
                                                   @endif
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%">&nbsp;</td>
                                                <td style="padding:5px 10px; width:25%"></td>
                                                <td style="padding:5px 10px; width:25%"></td>
                                                <td style="padding:5px 10px; width:25%"></td>
                                             </tr>
                                             @php
                                                $queappro = \App\QuoteApprovals::orderBy('id', 'DESC')->Where('project_id', @$projects[0]->id)->first();
                                             @endphp
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%"><b>Client PO Received</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($queappro != "")
                                                   @if($queappro->client_po_received != "")
                                                   {{@$queappro->client_po_received}}
                                                   @endif
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%"><b>Client PO Received Date</b></td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($queappro != "")
                                                   @if($queappro->client_po_received_date != "")
                                                   {{@date("d-m-Y", strtotime($queappro->client_po_received_date))}}
                                                   @endif
                                                   @endif
                                                </td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                     <tbody>
                        <tr>
                           <td style="width: 100%; margin:10px;">
                              <table style="width: 100%;  ">
                                 <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding:5px 10px; width:100%; text-align:center;"><b>Additional Client Billing & GST Information:</b> 
                                       <a style="margin-left: 20px;" data-toggle="modal" data-target="#chngests" onclick="gstmodal({{@$projects[0]->id}}, {{@$projects[0]->client_id}}, {{@$quotestore->client_billing_id}})" class="btn btn-outline-primary btn-sm" title='Client Billing & GST'>
                                       Client Billing & GST
                                       </a>
                                       <a style="margin-left: 20px;" href="{{ route('project.clientgstbilling', ['pid' => @$projects[0]->id, 'cid' => @$projects[0]->client_id]) }}?data=bill" class="btn btn-outline-primary btn-sm" title='Add Client Billing & GST'>Add 
                                       Client Billing & GST</a>
                                    </td>
                                 </tr>
                                 <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="width: 100%; margin:10px; padding:5px 10px;">
                                       <table style="width: 100%;  ">
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Company Name: </span><span>{{@ucfirst(@$clientbilldata->company_name)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Address 1: </span><span>{{@ucfirst(@$clientbilldata->address1)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Address 2: </span><span>{{@ucfirst(@$clientbilldata->address2)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Address 3: </span><span>{{@ucfirst(@$clientbilldata->address3)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">City: </span><span>{{@ucfirst(@$clientbilldata->city)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Pincode: </span><span>{{@@$clientbilldata->pincode}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">State: </span><span>{{@ucfirst(@$clientbilldata->state)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Authorized Representative: </span><span>{{@ucfirst(@$clientbilldata->representative_name)}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Client GST Nos: </span><span>{{@@$clientbilldata->client_gst}}</span></td>
                                          </tr>
                                          <tr style="border-bottom: 1px solid #ddd;">
                                             <td style="padding:5px 10px; width:50%"><span class="fontweight">Client PAN No: </span><span>{{@@$clientbilldata->client_pan}}</span></td>
                                          </tr>
                                       </table>
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                     </div>
                     <div class="table-responsive my-responsive" style=" padding:0 0; border: 2px solid #000;margin: 15px -5px 5px 5px;">
                     <table style=" width: 100%; margin:15px 5px 5px 5px;">
                        <tbody>
                           <tr>
                              <td style="width: 100%; margin:10px;">
                                 <table style="width: 100%;  ">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="padding:5px 10px; width:100%; text-align:center;"><b>For Further Internal Action </b></td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                       <td style="width: 100%; margin:10px; padding:5px 10px;">
                                          <table style="width: 100%;  ">
                                             <tr style="border-bottom: 1px solid #ddd;">
                                                <td style="padding:5px 10px; width:25%">View Bill</td>
                                                <td style="padding:5px 10px; width:25%">
                                                    @if($quotestore != "")
                                                   <a href="javascript:void(0);" onclick="viewbilltoclient()" class="btn btn-outline-primary">View</a>
                                                   @endif
                                                </td>
                                                <td style="padding:5px 10px; width:25%">Send To Accounts </td>
                                                <td style="padding:5px 10px; width:25%">
                                                   @if($quotestore != "")
                                                   @if($quoteapproval->send_to_account === null || $quoteapproval->send_to_account === '')
                                                   <a href="javascript:void(0);" onclick="sendtoaccount()" class="btn btn-outline-primary">Send</a>
                                                   @else
                                                   <a href="javascript:void(0);" class="btn btn-outline-primary" >Already Send </a>    
                                                   @endif
                                                   @endif
                                                </td>
                                             </tr>
                                            
                                          </table>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <input type="hidden" name="client_id" id="clientid" value="{{@$clientinfo->id}}">
                     <input type="hidden" name="project_id" id="projectid" value="{{@$projects[0]->id}}">
                     <input type="hidden" name="added_by" id="added_by" value="{{@Auth::user()->id}}">
                     @if($quoteparticulrs != "")
                     <input type="hidden" name="edit_id" id="quoteid" value="{{@$quoteapproval->quoteproject_id}}">
                     <input type="hidden" name="quoteapprovl" id="quoteapprovl" value="{{@$quoteapproval->id}}">
                     @endif
                     </div>
                  </form>
                  
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->

<!--- view quote popup --->
<div class="modal fade" id="quoteview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Bill</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
         </div>
         <div class="modal-body">
            <div id="vquote"></div>
         </div>
      </div>
   </div>
</div>

<!--- download bill to client popup --->
<div class="modal fade" id="billdownload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabels">Download Bill Worksheet</h5>
            <button type="button" class="close1" data-dismiss="modal" aria-hidden="true">X</button>
         </div>
         <div class="modal-body">
            <div id="dquote">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <a href="javascript:void(0);" onclick="downloadbillpdf()" class="btn btn-outline-primary">PDF Format</a>
                    </div>
                    <div class="col-md-5">
                        <a href="javascript:void(0);" onclick="downloadbillexcel()" class="btn btn-outline-primary">Excel Format</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!--- client gst popup --->
<div class="modal fade" id="chngests" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Client Billing & GST Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalButton">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="forms-sample" action="#" name="gstform" id="gstform" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName1">Client Billing & GST<span class="required" style="color:red;">*</span></label>
                            <div style="max-height: 170px; overflow-y: auto;">
                                @foreach($clientbilldts as $clientbilldt)
                                    <div class="form-check">
                                        <input style="margin-left: 0px;" class="form-check-input" type="radio" name="client_billing_id" id="client_billing_{{$clientbilldt->id}}" value="{{$clientbilldt->id}}" @if($loop->first) required @endif>
                                        <label class="form-check-label" for="client_billing_{{$clientbilldt->id}}">
                                            {{$clientbilldt->company_name}} ( Address1: {{$clientbilldt->address1}}, Address2: {{$clientbilldt->address2}}, Address3: {{$clientbilldt->address3}}, City: {{$clientbilldt->city}}, City: {{$clientbilldt->pincode}}, State: {{$clientbilldt->state}}, GST: {{$clientbilldt->client_gst}}, PAN: {{$clientbilldt->client_pan}} )
                                        </label>
                                    </div>
                                @endforeach
                            </div>    
                        </div>
                  </div>
               </div>
               <input type="hidden" name="pid" id="pid">
               <input type="hidden" name="cid" id="cid">
               <div class="modal-footer" style="justify-content: flex-start;">
                  <a href="javascript:void(0);" onclick="gstdetails()" class="btn btn-outline-primary">Save changes</a>
                  <button type="button" id="closeModalButtons" class="btn btn-outline-danger close" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!--- Client Approval view popup --->
<div class="modal fade" id="viewdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Approval On Bill Worksheet (By Client)</h5>
            <button type="button" class="close2" data-dismiss="modal" aria-label="Close" id="closeModalButton2">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12" id="approclient_view">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection
@section('script')
<script src="{{asset('data/admin/js/jspdf.min.js')}}"></script>
<script>
    function gstmodal(pid, cid, cbid) {
        $('#chngests').modal('show');
        $('#pid').val(pid);
        $("#cid").val(cid);
        $("#client_billing_id").val(cbid);
    }

    $('.close').on('click', function() {
       $('#chngests').modal('hide');
    })
    
    function gstdetails() {
        var pid = $("#pid").val();
        var cid = $("#cid").val();
        var clbillid = $("input[name='client_billing_id']:checked").val();
        if (clbillid != undefined) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('project.gstdetailstore') }}",
                data: {
                    pid: pid,
                    cid: cid,
                    clbillid: clbillid
                },
                success: function(data) {
                    var status = data.status;
                    var msg = data.msg;
                    if (status == 'success') {
                        $('#chngests').modal('hide');
                        swal("Success!", msg, "success").then(function() {
                            location.reload();
                        });
                    } else {
                        setTimeout(function() {
                            location.reload();
                        }, 6000);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error(errorThrown);
                }
            });
        }
        else {
        alert("Please select a Client Billing & GST option.");
       }
        
    }
    
    function viewapproclient(qid) {
        var qid = qid;
        if (qid == '') {
            alert("Quote Approval Required.");
            return;
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('project.viewapproclient') }}",
                data: {
                    qid: qid
                    
                },
                success: function(data) {
                    //console.log(data);
                    $("#approclient_view").html(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            $('#viewdoc').modal('show');
        }
    }
    
    $('.close2').on('click', function() {
        $('#viewdoc').modal('hide');
    })

   $(document).ready(function () {
       var max_input = 200;
       var x = "<?php echo $count ?>";

       var initialCount = parseInt("<?php echo $count; ?>") || 0;

       function updateHeight(currentCount) {
           if(currentCount < 20){
               var calValue = (currentCount * 45) + 396;
               var newHeight = calValue + 'px';
               $('.main-table').css('height', newHeight); 
              }else{
               var calValue = (19 * 45) + 120;
               var newHeight = calValue + 'px';
               $('.main-table').css('height', newHeight); 
            }            
         }
        updateHeight(initialCount);

        
       $('.add-btn').click(function (e) {
           e.preventDefault();
           if (x < max_input) { // validate the condition
               x++; // increment the counter
               updateHeight(x);
               $('.dynamicrows').append(`
                   <tr class="input-box`+x+`" >
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="srno[]" id="sno`+x+`" placeholder="Sr. No." value="`+x+`"></td>
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="heading[]" id="heading5" placeholder="Heading"></td>
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control" name="particulr[]" id="particulr`+x+`" placeholder="Particulars"></td>
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control rateval" name="rate[]" id="rate`+x+`" placeholder="Rate"></td>
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control unitval" name="unit[]" id="unit`+x+`" placeholder="Units"></td>
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control dayval" name="days[]" id="days`+x+`" placeholder="Days/Sq. ft."></td>
                    <td style="padding:5px 6px; border: 1px solid #ddd; text-align:center;"><input type="text" class="form-control amtval" name="bamt[]" id="bamt`+x+`" placeholder="Base amount"></td>
                    <td><a href="#" class="col-sm-1 remove-lnk btn" data-xval="`+x+`" style="max-width: 4% !important;"><i class="mdi mdi-minus-box-outline menu-icon" style="font-size:22px"></i></a></td>
                </tr>
               `); // add input field
           }
       });
       
       // handle click event of the remove link
       $('.dynamicrows').on("click", ".remove-lnk", function (e) {
          
           e.preventDefault();
           var xval = $(this).data('xval');
           alert(xval); 
           var cls = '.input-box'+xval;
           $(cls).remove();  
           x--; 
           updateHeight(x);
           var subtotal = 0;
           $('.amtval').each(function (index, element) {
               var vals = $(element).val();
               if(vals == "")
               {
                   var valu = 0;
               }
               else
               {
                   var valu = parseFloat($(element).val());
               }
               subtotal = subtotal + valu;
           });
           $("#sub_bamt").val(subtotal);
           
           var prcnt = $("#percentge").val();
           if(prcnt != "")
           {
               var subam = parseFloat(subtotal);
               var emcval = parseFloat((subam*prcnt)/100);
               var emcamt = $("#emcbamt").val(emcval);
               var ttlamt = emcval+subam;
               $("#ttlamt").val(ttlamt);
               
               var sgstamt = parseFloat($("#sgstamt").val());
               var cgstamt = parseFloat($("#cgstamt").val());
               var igstamt = parseFloat($("#igstamt").val());
               
               if (isNaN(sgstamt)) { sgstamt = 0; }
               if (isNaN(cgstamt)) { cgstamt = 0; }
               if (isNaN(igstamt)) { igstamt = 0; }
                   
               
               var sgst = parseFloat($("#sgst").val());
               var cgst = parseFloat($("#cgst").val());
               var igst = parseFloat($("#igst").val());
               
               if (isNaN(sgst)) { sgst = 0; }
               if (isNaN(cgst)) { cgst = 0; }
               if (isNaN(igst)) { igst = 0; }
               
               if(sgst != '0'){
                   sgstamt = parseFloat((ttlamt*sgst)/100);
                   $("#sgstamt").val(sgstamt);
               }
               if(cgst != '0'){
                   cgstamt = parseFloat((ttlamt*cgst)/100);
                   $("#cgstamt").val(cgstamt);
               }
               if(igst != '0'){
                   igstamt = parseFloat((ttlamt*igst)/100);
                   $("#igstamt").val(igstamt);
               }
               
               var finamt = emcval+subam+sgstamt+cgstamt+igstamt;
               $("#finamt").val(finamt);
               
               var finamtWords = numberToWords(finamt);
               $("#amtword").val(finamtWords);
               $("#amtwords").html(finamtWords);
               
           }
           
           var subdays = 0;
           $('.dayval').each(function (index, element) {
               var vals = $(element).val();
               if(vals == "")
               {
                   var valu = 0;
               }
               else
               {
                   var valu = parseFloat($(element).val());
               }
               subdays = subdays + valu;
           });
           $("#sub_days").val(subdays);
           
           var subunit = 0;
           $('.unitval').each(function (index, element) {
               var vals = $(element).val();
               if(vals == "")
               {
                   var valu = 0;
               }
               else
               {
                   var valu = parseFloat($(element).val());
               }
               subunit = subunit + valu;
           });
           $("#sub_unit").val(subunit);
       });
       
       
   });
   
   function numberToWords(number) {
    const units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
    const teens = ['Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
    const tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    const thousands = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];

    function convertChunk(chunk) {
        const words = [];
        if (chunk >= 100) {
            words.push(units[Math.floor(chunk / 100)] + ' Hundred');
            chunk %= 100;
        }
        if (chunk >= 11 && chunk <= 19) {
            words.push(teens[chunk - 11]);
        } else {
            words.push(tens[Math.floor(chunk / 10)]);
            words.push(units[chunk % 10]);
        }
        return words.filter(Boolean).join(' ');
    }

    if (number === 0) {
        return 'Zero';
    }

    let integerPartWords = [];
    let decimalPartWords = [];

    let integerPart = Math.floor(number);
    const decimalPart = Math.round((number - integerPart) * 100);

    if (integerPart > 0) {
        let chunkCount = 0;
        while (integerPart > 0) {
            const chunk = integerPart % 1000;
            if (chunk !== 0) {
                const chunkWords = convertChunk(chunk) + ' ' + thousands[chunkCount];
                integerPartWords.unshift(chunkWords);
            }
            integerPart = Math.floor(integerPart / 1000);
            chunkCount++;
        }
    } else {
        integerPartWords.push('Zero');
    }

    if (decimalPart > 0) {
        decimalPartWords.push('Point');
        decimalPartWords.push(units[Math.floor(decimalPart / 10)]); // Tens place
        decimalPartWords.push(units[decimalPart % 10]); // Ones place
    }

    let result = integerPartWords.join(' ');
    
    // Add "And" only if both integer and decimal parts have words
    if (integerPartWords.length > 0 && decimalPartWords.length > 0) {
        result += ' And ' + decimalPartWords.join(' ');
    }

    return result.trim();
}
   
   function mgmtapprovalreq()
   {
       var qapprovl = $("#quoteapprovl").val();
       var added_by = $("#added_by").val();
       var project_id = $("#projectid").val();
       if(qapprovl != "")
       {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type:'POST',
               url:"{{ route('project.mgmtapprovalquotebill') }}",
               data:{id:qapprovl,added_by:added_by,project_id:project_id},
               success:function(data) {
                   swal("Sent!", "Bill to client sent for approval successfully.", "success").then(function(){
                       location.reload();
                   });
                   setTimeout(function() { location.reload(); }, 6000);
               }
           });
       }
   }
   
   function editreq()
   {
       var quoteid = $("#quoteid").val();
       var added_by = $("#added_by").val();
       var project_id = $("#projectid").val();
       var billno = $("#billno").val();
       if(quoteid != "")
       {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type:'POST',
               url:"{{ route('project.editreqapprovlbill') }}",
               data:{quoteid:quoteid,added_by:added_by,project_id:project_id,billno:billno },
               success:function(data) {
                   swal("Request Sent!", "Bill to client sent to management for edit.", "success").then(function(){
                       location.reload();
                   });
                   setTimeout(function() { location.reload(); }, 6000);
               }
           });
       }
   }

   function viewbilltoclient()
   {
      $("#vquote").html($("#new_insert").html());
      $("#quoteview").modal("show");
   }
   
   /* function viewbilltoclient()
   {
       var pid = $("#projectid").val();
       var cid = $("#clientid").val();
       $("#vquote").html("");
       if(pid != "")
       {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type:'POST',
               url:"{{ route('project.viewbill') }}",
               data:{pid:pid,cid:cid },
               success:function(data) {
                   $("#quoteview").modal("show");
                   $("#vquote").html(data);
               }
           });
       }
   } */
   
   function downloadbillmodel() {
       
       $("#billdownload").modal("show");
       
   }
   
   function downloadbillpdf() {
       var pid = $("#projectid").val();
       var cid = $("#clientid").val();
       if (pid != "") {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type: 'GET',
               url: "{{ route('project.downloadbill') }}",
               data: { pid: pid, cid: cid },
               xhrFields: {
                   responseType: 'blob' 
               },
               success: function (data) {
                   var blob = new Blob([data], { type: 'application/pdf' });
   
                   var blobUrl = URL.createObjectURL(blob);
   
                   var a = document.createElement('a');
                   a.href = blobUrl;
                   a.download = 'Bill-to-Client.pdf';
                   a.style.display = 'none';
                   document.body.appendChild(a);
                   
                   a.click();
   
                   document.body.removeChild(a);
                   URL.revokeObjectURL(blobUrl);
                   
                   $("#billdownload").modal("hide");
                   
               }
           });
       }
   }
   
   function downloadbillexcel() {
       var pid = $("#projectid").val();
       var cid = $("#clientid").val();
       if (pid != "") {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type: 'GET',
               url: "{{ route('project.downloadbills') }}",
               data: { pid: pid, cid: cid },
               xhrFields: {
                   responseType: 'blob' 
               },
               success: function (data) {
                    var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'Bill-to-Client.xlsx';
                    link.click();
                    $("#billdownload").modal("hide");
                   
               }
           });
       }
   }
   
   function quotetoperforma() {
    var quoteid = $("#quoteid").val();
    var added_by = $("#added_by").val();
       if (quoteid != "") {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type: 'POST',
               url: "{{ route('project.billsendtoaccount') }}",
               data: { quoteid: quoteid, added_by: added_by },
               success: function (data) {
                   var status = data.status;
                   var msg = data.msg;
                   if (status == 'warning') {
                       swal("Warning!", msg, "warning").then(function () {
                           location.reload();
                       });
                   } 
                   else if(status == 'success') {
                       swal("Success!", msg, "success").then(function () {
                           location.reload();
                       });
                   }
                   else {
                       setTimeout(function () { location.reload(); }, 6000);
                   }
               },
               error: function (xhr, textStatus, errorThrown) {
                   
                   console.error(errorThrown);
               }
           });
       }
   }
   
   
   function quotetobill() {
    var quoteid = $("#quoteid").val();
    var added_by = $("#added_by").val();
       if (quoteid != "") {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type: 'POST',
               url: "{{ route('project.convertquotetobill') }}",
               data: { quoteid: quoteid, added_by: added_by },
               success: function (data) {
                   var status = data.status;
                   var msg = data.msg;
                   if (status == 'warning') {
                       swal("Warning!", msg, "warning").then(function () {
                           location.reload();
                       });
                   } 
                   else if(status == 'success') {
                       swal("Success!", msg, "success").then(function () {
                           location.reload();
                       });
                   }
                   else {
                       setTimeout(function () { location.reload(); }, 6000);
                   }
               },
               error: function (xhr, textStatus, errorThrown) {
                   
                   console.error(errorThrown);
               }
           });
       }
   }
   
   function sendtoaccount() {
       var quoteid = $("#quoteid").val();
       var added_by = $("#added_by").val();
       if (quoteid != "") {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               type: 'POST',
               url: "{{ route('project.billsendtoaccount') }}",
               data: { quoteid: quoteid, added_by: added_by },
               success: function (data) {
                   var status = data.status;
                   var msg = data.msg;
                   if (status == 'warning') {
                       swal("Warning!", msg, "warning").then(function () {
                           location.reload();
                       });
                   } 
                   else if(status == 'success') {
                       swal("Success!", msg, "success").then(function () {
                           location.reload();
                       });
                   }
                   else {
                       setTimeout(function () { location.reload(); }, 6000);
                   }
               },
               error: function (xhr, textStatus, errorThrown) {
                   
                   console.error(errorThrown);
               }
           });
       }
   }
    
   
   $('.close').on('click', function() {
       $('#quoteview').modal('hide');
   })
   
   $('.close1').on('click', function() {
       $('#billdownload').modal('hide');
   })
   
   $('#particulars').on('keyup', 'input[name="rate[]"]', function() {
       var id = this.id;
       var nos = id.split('rate');
       var no = nos[1]
       var unit = '#unit'+no;
       var days = '#days'+no;
       var rate = '#rate'+no;
       var bamt = '#bamt'+no;
      
       var dayvals = $(days).val();
       if(dayvals == '')
       {
           dayvals = 1;
       }
       var unitvals = $(unit).val();
       if(unitvals == '')
       {
           unitvals = 1;
       }
       var ratevals = $(rate).val();
       if(ratevals == '')
       {
           ratevals = 1;
       }
       //alert(ratevals)
       var baseamt = ratevals*unitvals*dayvals;
       $(bamt).val(baseamt);
       
       var subtotal = 0;
       $('.amtval').each(function (index, element) {
           var vals = $(element).val();
           if(vals == "")
           {
               var valu = 0;
           }
           else
           {
               var valu = parseFloat($(element).val());
           }
           //alert(valu);
           subtotal = subtotal + valu;
       });
       $("#sub_bamt").val(subtotal);
       
       var prcnt = $("#percentge").val();
       if(prcnt != "")
       {
           var subam = parseFloat(subtotal);
           var emcval = parseFloat((subam*prcnt)/100);
           var emcamt = $("#emcbamt").val(emcval);
           var ttlamt = emcval+subam;
           $("#ttlamt").val(ttlamt);
           
           var sgstamt = parseFloat($("#sgstamt").val());
           var cgstamt = parseFloat($("#cgstamt").val());
           var igstamt = parseFloat($("#igstamt").val());
           
           if (isNaN(sgstamt)) { sgstamt = 0; }
           if (isNaN(cgstamt)) { cgstamt = 0; }
           if (isNaN(igstamt)) { igstamt = 0; }
               
           
           var sgst = parseFloat($("#sgst").val());
           var cgst = parseFloat($("#cgst").val());
           var igst = parseFloat($("#igst").val());
           
           if (isNaN(sgst)) { sgst = 0; }
           if (isNaN(cgst)) { cgst = 0; }
           if (isNaN(igst)) { igst = 0; }
           
           if(sgst != '0'){
               sgstamt = parseFloat((ttlamt*sgst)/100);
               $("#sgstamt").val(sgstamt);
           }
           if(cgst != '0'){
               cgstamt = parseFloat((ttlamt*cgst)/100);
               $("#cgstamt").val(cgstamt);
           }
           if(igst != '0'){
               igstamt = parseFloat((ttlamt*igst)/100);
               $("#igstamt").val(igstamt);
           }
           
           
           var finamt = emcval+subam+sgstamt+cgstamt+igstamt;
           $("#finamt").val(finamt);
           
           var finamtWords = numberToWords(finamt);
           $("#amtword").val(finamtWords);
           $("#amtwords").html(finamtWords);
           
       }
       
   });
   $('#particulars').on('keyup', 'input[name="unit[]"]', function() {
       var id = this.id;
       var nos = id.split('unit');
       var no = nos[1]
       var unit = '#unit'+no;
       var days = '#days'+no;
       var rate = '#rate'+no;
       var bamt = '#bamt'+no;
      
       var dayvals = $(days).val();
       if(dayvals == '')
       {
           dayvals = 1;
       }
       var unitvals = $(unit).val();
       if(unitvals == '')
       {
           unitvals = 1;
       }
       var ratevals = $(rate).val();
       if(ratevals == '')
       {
           ratevals = 1;
       }
       
       var baseamt = ratevals*unitvals*dayvals;
       
       $(bamt).val(baseamt);
       
       var subtotal = 0;
       $('.amtval').each(function (index, element) {
           var vals = $(element).val();
           if(vals == "")
           {
               var valu = 0;
           }
           else
           {
               var valu = parseFloat($(element).val());
           }
           subtotal = subtotal + valu;
       });
       $("#sub_bamt").val(subtotal);
       
       var subunit = 0;
       $('.unitval').each(function (index, element) {
           var vals = $(element).val();
           if(vals == "")
           {
               var valu = 0;
           }
           else
           {
               var valu = parseFloat($(element).val());
           }
           subunit = subunit + valu;
       });
       $("#sub_unit").val(subunit);
       
       var prcnt = $("#percentge").val();
       if(prcnt != "")
       {
           var subam = parseFloat(subtotal);
           var emcval = parseFloat((subam*prcnt)/100);
           var emcamt = $("#emcbamt").val(emcval);
           var ttlamt = emcval+subam;
           $("#ttlamt").val(ttlamt);
           
           var sgstamt = parseFloat($("#sgstamt").val());
           var cgstamt = parseFloat($("#cgstamt").val());
           var igstamt = parseFloat($("#igstamt").val());
           
           if (isNaN(sgstamt)) { sgstamt = 0; }
           if (isNaN(cgstamt)) { cgstamt = 0; }
           if (isNaN(igstamt)) { igstamt = 0; }
               
           
           var sgst = parseFloat($("#sgst").val());
           var cgst = parseFloat($("#cgst").val());
           var igst = parseFloat($("#igst").val());
           
           if (isNaN(sgst)) { sgst = 0; }
           if (isNaN(cgst)) { cgst = 0; }
           if (isNaN(igst)) { igst = 0; }
           
           if(sgst != '0'){
               sgstamt = parseFloat((ttlamt*sgst)/100);
               $("#sgstamt").val(sgstamt);
           }
           if(cgst != '0'){
               cgstamt = parseFloat((ttlamt*cgst)/100);
               $("#cgstamt").val(cgstamt);
           }
           if(igst != '0'){
               igstamt = parseFloat((ttlamt*igst)/100);
               $("#igstamt").val(igstamt);
           }
           
           
           var finamt = emcval+subam+sgstamt+cgstamt+igstamt;
           $("#finamt").val(finamt);
           
           var finamtWords = numberToWords(finamt);
           $("#amtword").val(finamtWords);
           $("#amtwords").html(finamtWords);
           
       }
       
       
   });
   $('#particulars').on('keyup', 'input[name="days[]"]', function() {
       var id = this.id;
       var nos = id.split('days');
       var no = nos[1]
       var unit = '#unit'+no;
       var days = '#days'+no;
       var rate = '#rate'+no;
       var bamt = '#bamt'+no;
      
       var dayvals = $(days).val();
       if(dayvals == '')
       {
           dayvals = 1;
       }
       var unitvals = $(unit).val();
       if(unitvals == '')
       {
           unitvals = 1;
       }
       var ratevals = $(rate).val();
       if(ratevals == '')
       {
           ratevals = 1;
       }
       
       var baseamt = ratevals*unitvals*dayvals;
       
       $(bamt).val(baseamt);
       
       var subtotal = 0;
       $('.amtval').each(function (index, element) {
           var vals = $(element).val();
           if(vals == "")
           {
               var valu = 0;
           }
           else
           {
               var valu = parseFloat($(element).val());
           }
           subtotal = subtotal + valu;
       });
       $("#sub_bamt").val(subtotal);
       
       var prcnt = $("#percentge").val();
       if(prcnt != "")
       {
           var subam = parseFloat(subtotal);
           var emcval = parseFloat((subam*prcnt)/100);
           var emcamt = $("#emcbamt").val(emcval);
           var ttlamt = emcval+subam;
           $("#ttlamt").val(ttlamt);
           
           var sgstamt = parseFloat($("#sgstamt").val());
           var cgstamt = parseFloat($("#cgstamt").val());
           var igstamt = parseFloat($("#igstamt").val());
           
           if (isNaN(sgstamt)) { sgstamt = 0; }
           if (isNaN(cgstamt)) { cgstamt = 0; }
           if (isNaN(igstamt)) { igstamt = 0; }
               
           
           var sgst = parseFloat($("#sgst").val());
           var cgst = parseFloat($("#cgst").val());
           var igst = parseFloat($("#igst").val());
           
           if (isNaN(sgst)) { sgst = 0; }
           if (isNaN(cgst)) { cgst = 0; }
           if (isNaN(igst)) { igst = 0; }
           
           if(sgst != '0'){
               sgstamt = parseFloat((ttlamt*sgst)/100);
               $("#sgstamt").val(sgstamt);
           }
           if(cgst != '0'){
               cgstamt = parseFloat((ttlamt*cgst)/100);
               $("#cgstamt").val(cgstamt);
           }
           if(igst != '0'){
               igstamt = parseFloat((ttlamt*igst)/100);
               $("#igstamt").val(igstamt);
           }
           
           var finamt = emcval+subam+sgstamt+cgstamt+igstamt;
           $("#finamt").val(finamt);
           
           var finamtWords = numberToWords(finamt);
           $("#amtword").val(finamtWords);
           $("#amtwords").html(finamtWords);
           
       }
       
       var subdays = 0;
       $('.dayval').each(function (index, element) {
           var vals = $(element).val();
           if(vals == "")
           {
               var valu = 0;
           }
           else
           {
               var valu = parseFloat($(element).val());
           }
           subdays = subdays + valu;
       });
       $("#sub_days").val(subdays);
   });
   
   $("#percentge").keyup(function() {
       var subam = parseFloat($("#sub_bamt").val());
       var perval = this.value;
       
       var emcval = parseFloat((subam*perval)/100);
       var emcamt = $("#emcbamt").val(emcval);
       var ttlamt = emcval+subam;
       $("#ttlamt").val(ttlamt);
       
       var sgstamt = parseFloat($("#sgstamt").val());
       var cgstamt = parseFloat($("#cgstamt").val());
       var igstamt = parseFloat($("#igstamt").val());
       
       if (isNaN(sgstamt)) { sgstamt = 0; }
       if (isNaN(cgstamt)) { cgstamt = 0; }
       if (isNaN(igstamt)) { igstamt = 0; }
           
       
       var sgst = parseFloat($("#sgst").val());
       var cgst = parseFloat($("#cgst").val());
       var igst = parseFloat($("#igst").val());
       
       if (isNaN(sgst)) { sgst = 0; }
       if (isNaN(cgst)) { cgst = 0; }
       if (isNaN(igst)) { igst = 0; }
       
       if(sgst != '0'){
           sgstamt = parseFloat((ttlamt*sgst)/100);
           $("#sgstamt").val(sgstamt);
       }
       if(cgst != '0'){
           cgstamt = parseFloat((ttlamt*cgst)/100);
           $("#cgstamt").val(cgstamt);
       }
       if(igst != '0'){
           igstamt = parseFloat((ttlamt*igst)/100);
           $("#igstamt").val(igstamt);
       }
       
       var finamt = emcval+subam+sgstamt+cgstamt+igstamt;
       $("#finamt").val(finamt);
       
       var finamtWords = numberToWords(finamt);
       $("#amtword").val(finamtWords);
       $("#amtwords").html(finamtWords);
       
       //alert(emcval);
   })
   
       var ttlamt = parseFloat($("#ttlamt").val());
       if (isNaN(ttlamt)) { ttlamt = 0; }
       
       var sgstamt = parseFloat($("#sgstamt").val());
       var cgstamt = parseFloat($("#cgstamt").val());
       var igstamt = parseFloat($("#igstamt").val());
       
       if (isNaN(sgstamt)) { sgstamt = 0; }
       if (isNaN(cgstamt)) { cgstamt = 0; }
       if (isNaN(igstamt)) { igstamt = 0; }
           
       
       var sgst = parseFloat($("#sgst").val());
       var cgst = parseFloat($("#cgst").val());
       var igst = parseFloat($("#igst").val());
       
       if (isNaN(sgst)) { sgst = 0; }
       if (isNaN(cgst)) { cgst = 0; }
       if (isNaN(igst)) { igst = 0; }
       
       if(sgst != '0'){
           sgstamt = parseFloat((ttlamt*sgst)/100);
           $("#sgstamt").val(sgstamt);
       }
       if(cgst != '0'){
           cgstamt = parseFloat((ttlamt*cgst)/100);
           $("#cgstamt").val(cgstamt);
       }
       if(igst != '0'){
           igstamt = parseFloat((ttlamt*igst)/100);
           $("#igstamt").val(igstamt);
       }
       
       var finamt = ttlamt+sgstamt+cgstamt+igstamt;
       $("#finamt").val(finamt);
       
       var finamtWords = numberToWords(finamt);
       $("#amtword").val(finamtWords);
       $("#amtwords").html(finamtWords);
   
</script>
@endsection