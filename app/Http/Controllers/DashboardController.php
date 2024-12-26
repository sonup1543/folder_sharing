<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';
        
        return view('admin.index', compact('title' ));
    }
    
    public function csdashboard(Request $request)
    {
        $title = 'Employee Dashboard';
        $themeid = $request->themeid;
                
        $employee = Employee::where('id',Auth::user()->id)->first();
               
        return view('admin.csdash', compact('title'));
        
        
    }
    
    public function cs_stats_dashboard(Request $request)
    {
        $title = 'Employee Stats Dashboard';
        $themeid = $request->themeid;
        
        $user = auth()->user();
        $authId = $user->id;
        
        $financialYear = session()->has('financial_year') ? session('financial_year') : '';
        
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        
        $selectedBusId = $employee->nameofthebu_id;

        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        $targetAllocator = null;
        $totalQuater = [];
           
         if ($selectedBusId && $selectedBusId !== "all") {
                 $selectedBu = $selectedBusId; 
                 $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
                     ->where('financial_year', $financialYear)
                     ->orderBy('id', 'desc')
                     ->first();
                 
                    //  $toplineTarget = $targetAllocator->topline_target;
                    //  $bottomlineTarget = $targetAllocator->bottomline_target;

                     if ($targetAllocator !== null) {
                        $toplineTarget = $targetAllocator->topline_target;
                        $bottomlineTarget = $targetAllocator->bottomline_target;
                    } else {
                        $toplineTarget = 0;
                        $bottomlineTarget = 0;
                    }
                 } else {
                     $selectedBu = "all";
                     
                    $targetAllocator = collect([]);
                     foreach ($nameofthebus as $bus) {
                         $latestTargetAllocator = TargetAllocator::where('bu_id', $bus->id)
                             ->where('financial_year', $financialYear)
                             ->orderByDesc('id')
                             ->first();
                     if ($latestTargetAllocator) {
                             $targetAllocator->push($latestTargetAllocator);
                         }
                     }
                     $toplineTarget = $targetAllocator->sum('topline_target');
                     $bottomlineTarget = $targetAllocator->sum('bottomline_target');
                }
                
                $productGroup = [];
                $indutriesGroup = [];
                
                    
                    $projectsQuery = Project::where('financial_year', 'LIKE', trim($financialYear) . '%');
                    if ($selectedBu !== "all") {
                        $projectsQuery->where('bu_number', $selectedBu);
                    }
                    $allProjects = $projectsQuery->get();
                    
                   $countAllProject = $projectsQuery->count();

                    $openProjectCount = clone $projectsQuery;
                    $openProjectCount = $openProjectCount->where('project_status', '1')->count();
                    
                    $totalEstimateValue = clone $projectsQuery;
                    $totalEstimateValue = $totalEstimateValue->where('project_status', '1')->sum('estimate_value');
                    
                    $lossProjectCount = clone $projectsQuery;
                    $lossProjectCount = $lossProjectCount->where('project_status', '3')->count();
                    
                    $loosEstimateValue = clone $projectsQuery;
                    $loosEstimateValue = $loosEstimateValue->where('project_status', '3')->sum('estimate_value');
                    
                    $deferredProjectCount = clone $projectsQuery;
                    $deferredProjectCount = $deferredProjectCount->where('project_status', '2')->count();
                    
                    $deferredEstimateValue = clone $projectsQuery;
                    $deferredEstimateValue = $deferredEstimateValue->where('project_status', '2')->sum('estimate_value');
                    
                    $closeProjectData = clone $projectsQuery;
                    $closeProjectData = $closeProjectData->where('project_status', '5')->get();
                    
                  
                    $creativeproductsolds = ProductsOfNykas::all();
                    $categoryCounts = [];
                    foreach ($creativeproductsolds as $category) {
                                $categoryCounts[$category->products_of_nyka] = 0;
                            }
                
                    $industries = Industry::all();
                    $categoryIndustry = [];
                    
                   foreach ($industries as $industry) {
                        $categoryIndustry[$industry->industry_name] = 0;
                    }
                  
          
                    $quaterBillAmount = 0;
                    $quaterBillMargin = 0;
           
                    foreach ($allProjects as $project) {
                        $billData = AccountData::where('project_id', $project->id)->first();
                     
                        if ($billData) {
                            $billAmount = $billData->bill_amt;
                            $billMargin = $billData->actual_margin;
                        } else {
                            $billAmount = 0;
                            $billMargin = 0;
                        }
                        
                        $quaterBillAmount += $billAmount; 
                        $quaterBillMargin += $billMargin; 
                        
                        $closeBillProject = 0;
                        if($billData){
                            $closeBillProject += 1;
                            
                        }
                        
                         $category = ProductsOfNykas::where('id', $project->product_sold)->value('products_of_nyka');
                            if ($category !== null && isset($categoryCounts[$category])) {
                                $categoryCounts[$category]++;
                            }
                            
                           $clientData = Clients::find($project->client_id);
                       
                           $clientData = Clients::find($project->client_id);
                            if ($clientData !== null) {
                                $industryData = Industry::find($clientData->industry);
                                if ($industryData !== null && isset($categoryIndustry[$industryData->industry_name])) {
                                    $categoryIndustry[$industryData->industry_name]++;
                                }
                            }
                    }
                    
                   
                    
                    $productGroup = [];
                        foreach ($categoryCounts as $category => $count) {
                           // $count = ($count == 0) ? 10 : $count;
                            $productGroup[] = [
                                $category => $count 
                            ];
                        }
                        
                        $indutriesGroup = [];

                        foreach ($categoryIndustry as $industry => $count1) {
                            if ($count1 > 0) {
                                $indutriesGroup[] = [
                                    $industry => $count1 
                                ];
                            }
                        }
                        
                        if (empty($indutriesGroup)) {
                            $indutriesGroup[] = ['No data found' => 0];
                        }
                   

                    $closeNotBillProjectCount = 0;
                    $closeBillProjectCount = 0;
                    $closeNotBillStimate = 0;
                    $closBillStimate = 0;
                    $fileCloserCount = 0;
                    $totalQuoteEstimate = 0;
                    $projectBillNotRecept = 0;
                    $projectNotBill = 0;
                    $totalQuoteEstimate1 = 0;
                    $billingValueWoGST = 0;
                    $projectBillEceAmount = 0;
                    $projectBillNotRecpt = 0;
                    $receptBillPendingData = 0;
                    
                    if ($closeProjectData) {
                       
                        foreach ($closeProjectData as $closeProject) {
                            
                          $accountData = AccountData::where('project_id', $closeProject->id)->first();
                            if ($accountData != null && ($accountData->file_closer_sub_date === null || $accountData->file_closer_sub_date === "NA")){
                                $fileCloserCount += 1;
                                
                                $QuoteStore = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                    if ($QuoteStore != null) {
                                        $totalQuoteStore = $QuoteStore->ttl_bamt ?? 0;
                                        $totalQuoteEstimate += $totalQuoteStore;
                                    }
                            }
                            

                           if ($accountData != null && $accountData->bill_amt != null && $accountData->bill_amt != "NA") {
                                $projectBillEceAmount += 1;
                                
                                $billingValue = $accountData->bill_amt;
                                 $billingValueWoGST += $billingValue;
                                 
                                 
                                 if($accountData->bill_receive_amt === null || $accountData->bill_receive_amt === "NA"){
                                    $projectBillNotRecpt += 1; 
                                    $notrecivedData = $accountData->bill_amt;
                                    $receptBillPendingData += $notrecivedData;
                                }
                            }
                            
                           if ($accountData === null || $accountData->bill_sub_date === null || $accountData->bill_sub_date === "NA") {
                                $projectNotBill += 1;
                                
                                $QuoteStore1 = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                if ($QuoteStore1 != null) {
                                        $totalQuoteStore1 = $QuoteStore1->ttl_bamt ?? 0;
                                        $totalQuoteEstimate1 += $totalQuoteStore1;
                                }
                               
                            }
                            
                        }
                    }

                    $totalQuater = [
                        'quater_bill' => $quaterBillAmount,
                        'quater_margin' => $quaterBillMargin,
                        'topline_target' => $toplineTarget,
                        'bottom_target' => $bottomlineTarget,
                        'count_project' => $countAllProject,
                        'open_project' => $openProjectCount,
                        'open_project_value' => $totalEstimateValue,
                        'loss_project' => $lossProjectCount,
                        'loss_value' => $loosEstimateValue,
                        'deffer_project' => $deferredProjectCount,
                        'deffer_value' => $deferredEstimateValue,
                        'close_not_bill_count' => $projectNotBill,
                        'close_bill_estimate' => $totalQuoteEstimate1,
                        'bill_project_count' => $projectBillEceAmount,
                        'bill_project_amount' => $billingValueWoGST,
                        'close_bill_not_recept_count' => $projectBillNotRecpt,
                        'close_bill_data_estimate' => $receptBillPendingData,
                        'close_submit_count' => $fileCloserCount,
                        'close_submit_count_estimate' => $totalQuoteEstimate,
                        
                        
                    ];
                    
                    
                
               
        
        return view('admin.cs_stats_dash', compact('title', 'nameofthebus', 'bumember', 'selectedBu', 'totalQuater', 'productGroup', 'indutriesGroup'));
    }
    
    public function mngdashboard(Request $request)
    {
        $title = 'Management Dashboard';
        $themeid = $request->themeid;
        
        
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
		
        return view('admin.mngdash', compact('title', 'nameofthebus', 'bumember' ));
    }
    
     public function mngStatsdashboard(Request $request)
    {
        $title = 'Management Stats Dashboard';
        $themeid = $request->themeid;
        $user = auth()->user();
                $authId = $user->id;
            
                $financialYear = session()->has('financial_year') ? session('financial_year') : '';
            
                $nameofthebus = NameOfTheBus::where('status', 1)->get();
                $selectedBusId = $request->input('busId');
                
                $targetAllocator = null;
                $totalQuater = [];
           
                if ($selectedBusId && $selectedBusId !== "all") {
                    $selectedBu = $selectedBusId; 
            
                    $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
                        ->where('financial_year', $financialYear)
                        ->orderBy('id', 'desc')
                        ->first();
                        
                    if ($targetAllocator !== null) {
                        $toplineTarget = $targetAllocator->topline_target;
                        $bottomlineTarget = $targetAllocator->bottomline_target;
                    } else {
                        $toplineTarget = 0;
                        $bottomlineTarget = 0;
                    }

            
                } else {
                    $selectedBu = "all";
                    
                   $targetAllocator = collect([]);
                    foreach ($nameofthebus as $bus) {
                        $latestTargetAllocator = TargetAllocator::where('bu_id', $bus->id)
                            ->where('financial_year', $financialYear)
                            ->orderByDesc('id')
                            ->first();
                        if ($latestTargetAllocator) {
                            $targetAllocator->push($latestTargetAllocator);
                        }
                    }
                    $toplineTarget = $targetAllocator->sum('topline_target');
                    $bottomlineTarget = $targetAllocator->sum('bottomline_target');
                }
                
                
                    
                    $projectsQuery = Project::where('financial_year', 'LIKE', trim($financialYear) . '%');
                    if ($selectedBu !== "all") {
                        $projectsQuery->where('bu_number', $selectedBu);
                    }
                    $allProjects = $projectsQuery->get();
                    
                   $countAllProject = $projectsQuery->count();

                    $openProjectCount = clone $projectsQuery;
                    $openProjectCount = $openProjectCount->where('project_status', '1')->count();
                    
                    $totalEstimateValue = clone $projectsQuery;
                    $totalEstimateValue = $totalEstimateValue->where('project_status', '1')->sum('estimate_value');
                    
                    $lossProjectCount = clone $projectsQuery;
                    $lossProjectCount = $lossProjectCount->where('project_status', '3')->count();
                    
                    $loosEstimateValue = clone $projectsQuery;
                    $loosEstimateValue = $loosEstimateValue->where('project_status', '3')->sum('estimate_value');
                    
                    $deferredProjectCount = clone $projectsQuery;
                    $deferredProjectCount = $deferredProjectCount->where('project_status', '2')->count();
                    
                    $deferredEstimateValue = clone $projectsQuery;
                    $deferredEstimateValue = $deferredEstimateValue->where('project_status', '2')->sum('estimate_value');
                    
                    $closeProjectData = clone $projectsQuery;
                    $closeProjectData = $closeProjectData->where('project_status', '5')->get();
                    
                  
                    $creativeproductsolds = ProductsOfNykas::all();
                    $categoryCounts = [];
                    foreach ($creativeproductsolds as $category) {
                                $categoryCounts[$category->products_of_nyka] = 0;
                            }
                
                    $industries = Industry::all();
                    $categoryIndustry = [];
                    
                   foreach ($industries as $industry) {
                        $categoryIndustry[$industry->industry_name] = 0;
                    }
                  
          
                    $quaterBillAmount = 0;
                    $quaterBillMargin = 0;
           
                    foreach ($allProjects as $project) {
                        $billData = AccountData::where('project_id', $project->id)->first();
                     
                        if ($billData) {
                            $billAmount = $billData->bill_amt;
                            $billMargin = $billData->actual_margin;
                        } else {
                            $billAmount = 0;
                            $billMargin = 0;
                        }
                        
                        $quaterBillAmount += $billAmount; 
                        $quaterBillMargin += $billMargin; 
                        
                        $closeBillProject = 0;
                        if($billData){
                            $closeBillProject += 1;
                            
                        }
                        
                         $category = ProductsOfNykas::where('id', $project->product_sold)->value('products_of_nyka');
                            if ($category !== null && isset($categoryCounts[$category])) {
                                $categoryCounts[$category]++;
                            }
                            
                           $clientData = Clients::find($project->client_id);
                       
                           $clientData = Clients::find($project->client_id);
                            if ($clientData !== null) {
                                $industryData = Industry::find($clientData->industry);
                                if ($industryData !== null && isset($categoryIndustry[$industryData->industry_name])) {
                                    $categoryIndustry[$industryData->industry_name]++;
                                }
                            }
                    }
                    
                   
                    
                    $productGroup = [];
                        foreach ($categoryCounts as $category => $count) {
                            $productGroup[] = [
                                $category => $count 
                            ];
                        }
                        
                        $indutriesGroup = [];

                        foreach ($categoryIndustry as $industry => $count1) {
                            if ($count1 > 0) {
                                $indutriesGroup[] = [
                                    $industry => $count1 
                                ];
                            }
                        }
                        
                        if (empty($indutriesGroup)) {
                            $indutriesGroup[] = ['No data found' => 0];
                        }
                     

                    $closeNotBillProjectCount = 0;
                    $closeBillProjectCount = 0;
                    $closeNotBillStimate = 0;
                    $closBillStimate = 0;
                    $fileCloserCount = 0;
                    $totalQuoteEstimate = 0;
                    $projectBillNotRecept = 0;
                    $projectNotBill = 0;
                    $totalQuoteEstimate1 = 0;
                    $billingValueWoGST = 0;
                    $projectBillEceAmount = 0;
                    $projectBillNotRecpt = 0;
                    $receptBillPendingData = 0;
                    
                    if ($closeProjectData) {
                       
                        foreach ($closeProjectData as $closeProject) {
                            
                            $accountData = AccountData::where('project_id', $closeProject->id)->first();
                            if ($accountData != null && ($accountData->file_closer_sub_date === null || $accountData->file_closer_sub_date === "NA")){
                                $fileCloserCount += 1;
                                
                                $QuoteStore = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                    if ($QuoteStore != null) {
                                        $totalQuoteStore = $QuoteStore->ttl_bamt ?? 0;
                                        $totalQuoteEstimate += $totalQuoteStore;
                                    }
                            }
                            
                            //$billData->bill_sub_date
                            
                           if ($accountData != null && $accountData->bill_amt != null && $accountData->bill_amt != "NA") {
                                $projectBillEceAmount += 1;
                                
                                $billingValue = $accountData->bill_amt;
                                 $billingValueWoGST += $billingValue;
                                 
                                 
                                 if($accountData->bill_receive_amt === null || $accountData->bill_receive_amt === "NA"){
                                    $projectBillNotRecpt += 1; 
                                    $notrecivedData = $accountData->bill_amt;
                                    $receptBillPendingData += $notrecivedData;
                                }
                            }
                            
                           if ($accountData === null || $accountData->bill_sub_date === null || $accountData->bill_sub_date === "NA") {
                                $projectNotBill += 1;
                                
                                $QuoteStore1 = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                if ($QuoteStore1 != null) {
                                        $totalQuoteStore1 = $QuoteStore1->ttl_bamt ?? 0;
                                        $totalQuoteEstimate1 += $totalQuoteStore1;
                                }
                               
                            }
                            
                        }
                    }

                    $totalQuater = [
                        'quater_bill' => $quaterBillAmount,
                        'quater_margin' => $quaterBillMargin,
                        'topline_target' => $toplineTarget,
                        'bottom_target' => $bottomlineTarget,
                        'count_project' => $countAllProject,
                        'open_project' => $openProjectCount,
                        'open_project_value' => $totalEstimateValue,
                        'loss_project' => $lossProjectCount,
                        'loss_value' => $loosEstimateValue,
                        'deffer_project' => $deferredProjectCount,
                        'deffer_value' => $deferredEstimateValue,
                        'close_not_bill_count' => $projectNotBill,
                        'close_bill_estimate' => $totalQuoteEstimate1,
                        'bill_project_count' => $projectBillEceAmount,
                        'bill_project_amount' => $billingValueWoGST,
                        'close_bill_not_recept_count' => $projectBillNotRecpt,
                        'close_bill_data_estimate' => $receptBillPendingData,
                        'close_submit_count' => $fileCloserCount,
                        'close_submit_count_estimate' => $totalQuoteEstimate,
                        
                        
                    ];
                    
                    
                
                

                $employee = Employee::find(Auth::user()->id);
                $bumember = Employee::where('nameofthebu_id', $employee->nameofthebu_id)->get();

		
        return view('admin.mng_stats_dash', compact('title', 'nameofthebus', 'bumember', 'selectedBu', 'totalQuater', 'productGroup', 'indutriesGroup'));
    }
    
    
    
    public function opsdashboard(Request $request)
    {
        $title = 'Operations Stats Dashboard';
        $themeid = $request->themeid;

        $user = auth()->user();
        $authId = $user->id;
        
        $financialYear = session()->has('financial_year') ? session('financial_year') : '';
        
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        
        $selectedBusId = $employee->nameofthebu_id;

        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        $targetAllocator = null;
        $totalQuater = [];
           
         if ($selectedBusId && $selectedBusId !== "all") {
                 $selectedBu = $selectedBusId; 
                 $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
                     ->where('financial_year', $financialYear)
                     ->orderBy('id', 'desc')
                     ->first();
                 
                    //  $toplineTarget = $targetAllocator->topline_target;
                    //  $bottomlineTarget = $targetAllocator->bottomline_target;

                     if ($targetAllocator !== null) {
                        $toplineTarget = $targetAllocator->topline_target;
                        $bottomlineTarget = $targetAllocator->bottomline_target;
                    } else {
                        $toplineTarget = 0;
                        $bottomlineTarget = 0;
                    }
                 } else {
                     $selectedBu = "all";
                     
                    $targetAllocator = collect([]);
                     foreach ($nameofthebus as $bus) {
                         $latestTargetAllocator = TargetAllocator::where('bu_id', $bus->id)
                             ->where('financial_year', $financialYear)
                             ->orderByDesc('id')
                             ->first();
                     if ($latestTargetAllocator) {
                             $targetAllocator->push($latestTargetAllocator);
                         }
                     }
                     $toplineTarget = $targetAllocator->sum('topline_target');
                     $bottomlineTarget = $targetAllocator->sum('bottomline_target');
                }
                
                $productGroup = [];
                $indutriesGroup = [];
                
                    
                    $projectsQuery = Project::where('financial_year', 'LIKE', trim($financialYear) . '%');
                    if ($selectedBu !== "all") {
                        $projectsQuery->where('bu_number', $selectedBu);
                    }
                    $allProjects = $projectsQuery->get();
                    
                   $countAllProject = $projectsQuery->count();

                    $openProjectCount = clone $projectsQuery;
                    $openProjectCount = $openProjectCount->where('project_status', '1')->count();
                    
                    $totalEstimateValue = clone $projectsQuery;
                    $totalEstimateValue = $totalEstimateValue->where('project_status', '1')->sum('estimate_value');
                    
                    $lossProjectCount = clone $projectsQuery;
                    $lossProjectCount = $lossProjectCount->where('project_status', '3')->count();
                    
                    $loosEstimateValue = clone $projectsQuery;
                    $loosEstimateValue = $loosEstimateValue->where('project_status', '3')->sum('estimate_value');
                    
                    $deferredProjectCount = clone $projectsQuery;
                    $deferredProjectCount = $deferredProjectCount->where('project_status', '2')->count();
                    
                    $deferredEstimateValue = clone $projectsQuery;
                    $deferredEstimateValue = $deferredEstimateValue->where('project_status', '2')->sum('estimate_value');
                    
                    $closeProjectData = clone $projectsQuery;
                    $closeProjectData = $closeProjectData->where('project_status', '5')->get();
                    
                  
                    $creativeproductsolds = ProductsOfNykas::all();
                    $categoryCounts = [];
                    foreach ($creativeproductsolds as $category) {
                                $categoryCounts[$category->products_of_nyka] = 0;
                            }
                
                    $industries = Industry::all();
                    $categoryIndustry = [];
                    
                   foreach ($industries as $industry) {
                        $categoryIndustry[$industry->industry_name] = 0;
                    }
                  
          
                    $quaterBillAmount = 0;
                    $quaterBillMargin = 0;
           
                    foreach ($allProjects as $project) {
                        $billData = AccountData::where('project_id', $project->id)->first();
                     
                        if ($billData) {
                            $billAmount = $billData->bill_amt;
                            $billMargin = $billData->actual_margin;
                        } else {
                            $billAmount = 0;
                            $billMargin = 0;
                        }
                        
                        $quaterBillAmount += $billAmount; 
                        $quaterBillMargin += $billMargin; 
                        
                        $closeBillProject = 0;
                        if($billData){
                            $closeBillProject += 1;
                            
                        }
                        
                         $category = ProductsOfNykas::where('id', $project->product_sold)->value('products_of_nyka');
                            if ($category !== null && isset($categoryCounts[$category])) {
                                $categoryCounts[$category]++;
                            }
                            
                           $clientData = Clients::find($project->client_id);
                       
                           $clientData = Clients::find($project->client_id);
                            if ($clientData !== null) {
                                $industryData = Industry::find($clientData->industry);
                                if ($industryData !== null && isset($categoryIndustry[$industryData->industry_name])) {
                                    $categoryIndustry[$industryData->industry_name]++;
                                }
                            }
                    }
                    
                   
                    
                    $productGroup = [];
                        foreach ($categoryCounts as $category => $count) {
                           // $count = ($count == 0) ? 10 : $count;
                            $productGroup[] = [
                                $category => $count 
                            ];
                        }
                        
                       $indutriesGroup = [];

                        foreach ($categoryIndustry as $industry => $count1) {
                            if ($count1 > 0) {
                                $indutriesGroup[] = [
                                    $industry => $count1 
                                ];
                            }
                        }
                        
                        if (empty($indutriesGroup)) {
                            $indutriesGroup[] = ['No data found' => 0];
                        }
                   

                    $closeNotBillProjectCount = 0;
                    $closeBillProjectCount = 0;
                    $closeNotBillStimate = 0;
                    $closBillStimate = 0;
                    $fileCloserCount = 0;
                    $totalQuoteEstimate = 0;
                    $projectBillNotRecept = 0;
                    $projectNotBill = 0;
                    $totalQuoteEstimate1 = 0;
                    $billingValueWoGST = 0;
                    $projectBillEceAmount = 0;
                    $projectBillNotRecpt = 0;
                    $receptBillPendingData = 0;
                    
                    if ($closeProjectData) {
                       
                        foreach ($closeProjectData as $closeProject) {
                            
                          $accountData = AccountData::where('project_id', $closeProject->id)->first();
                            if ($accountData != null && ($accountData->file_closer_sub_date === null || $accountData->file_closer_sub_date === "NA")){
                                $fileCloserCount += 1;
                                
                                $QuoteStore = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                    if ($QuoteStore != null) {
                                        $totalQuoteStore = $QuoteStore->ttl_bamt ?? 0;
                                        $totalQuoteEstimate += $totalQuoteStore;
                                    }
                            }
                            

                           if ($accountData != null && $accountData->bill_amt != null && $accountData->bill_amt != "NA") {
                                $projectBillEceAmount += 1;
                                
                                $billingValue = $accountData->bill_amt;
                                 $billingValueWoGST += $billingValue;
                                 
                                 
                                 if($accountData->bill_receive_amt === null || $accountData->bill_receive_amt === "NA"){
                                    $projectBillNotRecpt += 1; 
                                    $notrecivedData = $accountData->bill_amt;
                                    $receptBillPendingData += $notrecivedData;
                                }
                            }
                            
                           if ($accountData === null || $accountData->bill_sub_date === null || $accountData->bill_sub_date === "NA") {
                                $projectNotBill += 1;
                                
                                $QuoteStore1 = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                if ($QuoteStore1 != null) {
                                        $totalQuoteStore1 = $QuoteStore1->ttl_bamt ?? 0;
                                        $totalQuoteEstimate1 += $totalQuoteStore1;
                                }
                               
                            }
                            
                        }
                    }

                    $totalQuater = [
                        'quater_bill' => $quaterBillAmount,
                        'quater_margin' => $quaterBillMargin,
                        'topline_target' => $toplineTarget,
                        'bottom_target' => $bottomlineTarget,
                        'count_project' => $countAllProject,
                        'open_project' => $openProjectCount,
                        'open_project_value' => $totalEstimateValue,
                        'loss_project' => $lossProjectCount,
                        'loss_value' => $loosEstimateValue,
                        'deffer_project' => $deferredProjectCount,
                        'deffer_value' => $deferredEstimateValue,
                        'close_not_bill_count' => $projectNotBill,
                        'close_bill_estimate' => $totalQuoteEstimate1,
                        'bill_project_count' => $projectBillEceAmount,
                        'bill_project_amount' => $billingValueWoGST,
                        'close_bill_not_recept_count' => $projectBillNotRecpt,
                        'close_bill_data_estimate' => $receptBillPendingData,
                        'close_submit_count' => $fileCloserCount,
                        'close_submit_count_estimate' => $totalQuoteEstimate,
                        
                        
                    ];
        
        return view('admin.opsdash', compact('title', 'nameofthebus', 'bumember', 'selectedBu', 'totalQuater', 'productGroup', 'indutriesGroup'));
    }
    
    public function opscldashboard(Request $request)
    {
        $title = 'Operations Dashboard';
        $themeid = $request->themeid;
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        return view('admin.ops_cl_dash', compact('title','nameofthebus','employee','bumember' ));
    }
    
    public function opsmngdashboard(Request $request)
    {
        $title = 'Operations Manager Stats Dashboard';
        $themeid = $request->themeid;

        $user = auth()->user();
                $authId = $user->id;
            
                $financialYear = session()->has('financial_year') ? session('financial_year') : '';
            
                $nameofthebus = NameOfTheBus::where('status', 1)->get();
                $selectedBusId = $request->input('busId');
                
                $targetAllocator = null;
                $totalQuater = [];
           
                if ($selectedBusId && $selectedBusId !== "all") {
                    $selectedBu = $selectedBusId; 
            
                    $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
                        ->where('financial_year', $financialYear)
                        ->orderBy('id', 'desc')
                        ->first();
                        
                    if ($targetAllocator !== null) {
                        $toplineTarget = $targetAllocator->topline_target;
                        $bottomlineTarget = $targetAllocator->bottomline_target;
                    } else {
                        $toplineTarget = 0;
                        $bottomlineTarget = 0;
                    }

            
                } else {
                    $selectedBu = "all";
                    
                   $targetAllocator = collect([]);
                    foreach ($nameofthebus as $bus) {
                        $latestTargetAllocator = TargetAllocator::where('bu_id', $bus->id)
                            ->where('financial_year', $financialYear)
                            ->orderByDesc('id')
                            ->first();
                        if ($latestTargetAllocator) {
                            $targetAllocator->push($latestTargetAllocator);
                        }
                    }
                    $toplineTarget = $targetAllocator->sum('topline_target');
                    $bottomlineTarget = $targetAllocator->sum('bottomline_target');
                }
                
                
                    
                    $projectsQuery = Project::where('financial_year', 'LIKE', trim($financialYear) . '%');
                    if ($selectedBu !== "all") {
                        $projectsQuery->where('bu_number', $selectedBu);
                    }
                    $allProjects = $projectsQuery->get();
                    
                   $countAllProject = $projectsQuery->count();

                    $openProjectCount = clone $projectsQuery;
                    $openProjectCount = $openProjectCount->where('project_status', '1')->count();
                    
                    $totalEstimateValue = clone $projectsQuery;
                    $totalEstimateValue = $totalEstimateValue->where('project_status', '1')->sum('estimate_value');
                    
                    $lossProjectCount = clone $projectsQuery;
                    $lossProjectCount = $lossProjectCount->where('project_status', '3')->count();
                    
                    $loosEstimateValue = clone $projectsQuery;
                    $loosEstimateValue = $loosEstimateValue->where('project_status', '3')->sum('estimate_value');
                    
                    $deferredProjectCount = clone $projectsQuery;
                    $deferredProjectCount = $deferredProjectCount->where('project_status', '2')->count();
                    
                    $deferredEstimateValue = clone $projectsQuery;
                    $deferredEstimateValue = $deferredEstimateValue->where('project_status', '2')->sum('estimate_value');
                    
                    $closeProjectData = clone $projectsQuery;
                    $closeProjectData = $closeProjectData->where('project_status', '5')->get();
                    
                  
                    $creativeproductsolds = ProductsOfNykas::all();
                    $categoryCounts = [];
                    foreach ($creativeproductsolds as $category) {
                                $categoryCounts[$category->products_of_nyka] = 0;
                            }
                
                    $industries = Industry::all();
                    $categoryIndustry = [];
                    
                   foreach ($industries as $industry) {
                        $categoryIndustry[$industry->industry_name] = 0;
                    }
                  
          
                    $quaterBillAmount = 0;
                    $quaterBillMargin = 0;
           
                    foreach ($allProjects as $project) {
                        $billData = AccountData::where('project_id', $project->id)->first();
                     
                        if ($billData) {
                            $billAmount = $billData->bill_amt;
                            $billMargin = $billData->actual_margin;
                        } else {
                            $billAmount = 0;
                            $billMargin = 0;
                        }
                        
                        $quaterBillAmount += $billAmount; 
                        $quaterBillMargin += $billMargin; 
                        
                        $closeBillProject = 0;
                        if($billData){
                            $closeBillProject += 1;
                            
                        }
                        
                         $category = ProductsOfNykas::where('id', $project->product_sold)->value('products_of_nyka');
                            if ($category !== null && isset($categoryCounts[$category])) {
                                $categoryCounts[$category]++;
                            }
                            
                           $clientData = Clients::find($project->client_id);
                       
                           $clientData = Clients::find($project->client_id);
                            if ($clientData !== null) {
                                $industryData = Industry::find($clientData->industry);
                                if ($industryData !== null && isset($categoryIndustry[$industryData->industry_name])) {
                                    $categoryIndustry[$industryData->industry_name]++;
                                }
                            }
                    }
                    
                   
                    
                    $productGroup = [];
                        foreach ($categoryCounts as $category => $count) {
                            $productGroup[] = [
                                $category => $count 
                            ];
                        }
                        
                        $indutriesGroup = [];

                        foreach ($categoryIndustry as $industry => $count1) {
                            if ($count1 > 0) {
                                $indutriesGroup[] = [
                                    $industry => $count1 
                                ];
                            }
                        }
                        
                        if (empty($indutriesGroup)) {
                            $indutriesGroup[] = ['No data found' => 0];
                        }

                    $closeNotBillProjectCount = 0;
                    $closeBillProjectCount = 0;
                    $closeNotBillStimate = 0;
                    $closBillStimate = 0;
                    $fileCloserCount = 0;
                    $totalQuoteEstimate = 0;
                    $projectBillNotRecept = 0;
                    $projectNotBill = 0;
                    $totalQuoteEstimate1 = 0;
                    $billingValueWoGST = 0;
                    $projectBillEceAmount = 0;
                    $projectBillNotRecpt = 0;
                    $receptBillPendingData = 0;
                    
                    if ($closeProjectData) {
                       
                        foreach ($closeProjectData as $closeProject) {
                            
                            $accountData = AccountData::where('project_id', $closeProject->id)->first();
                            if ($accountData != null && ($accountData->file_closer_sub_date === null || $accountData->file_closer_sub_date === "NA")){
                                $fileCloserCount += 1;
                                
                                $QuoteStore = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                    if ($QuoteStore != null) {
                                        $totalQuoteStore = $QuoteStore->ttl_bamt ?? 0;
                                        $totalQuoteEstimate += $totalQuoteStore;
                                    }
                            }
                            
                            
                            
                           if ($accountData != null && $accountData->bill_amt != null && $accountData->bill_amt != "NA") {
                                $projectBillEceAmount += 1;
                                
                                $billingValue = $accountData->bill_amt;
                                 $billingValueWoGST += $billingValue;
                                 
                                 
                                 if($accountData->bill_receive_amt === null || $accountData->bill_receive_amt === "NA"){
                                    $projectBillNotRecpt += 1; 
                                    $notrecivedData = $accountData->bill_amt;
                                    $receptBillPendingData += $notrecivedData;
                                }
                            }
                            
                           if ($accountData === null || $accountData->bill_sub_date === null || $accountData->bill_sub_date === "NA") {
                                $projectNotBill += 1;
                                
                                $QuoteStore1 = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                if ($QuoteStore1 != null) {
                                        $totalQuoteStore1 = $QuoteStore1->ttl_bamt ?? 0;
                                        $totalQuoteEstimate1 += $totalQuoteStore1;
                                }
                               
                            }
                            
                        }
                    }

                    $totalQuater = [
                        'quater_bill' => $quaterBillAmount,
                        'quater_margin' => $quaterBillMargin,
                        'topline_target' => $toplineTarget,
                        'bottom_target' => $bottomlineTarget,
                        'count_project' => $countAllProject,
                        'open_project' => $openProjectCount,
                        'open_project_value' => $totalEstimateValue,
                        'loss_project' => $lossProjectCount,
                        'loss_value' => $loosEstimateValue,
                        'deffer_project' => $deferredProjectCount,
                        'deffer_value' => $deferredEstimateValue,
                        'close_not_bill_count' => $projectNotBill,
                        'close_bill_estimate' => $totalQuoteEstimate1,
                        'bill_project_count' => $projectBillEceAmount,
                        'bill_project_amount' => $billingValueWoGST,
                        'close_bill_not_recept_count' => $projectBillNotRecpt,
                        'close_bill_data_estimate' => $receptBillPendingData,
                        'close_submit_count' => $fileCloserCount,
                        'close_submit_count_estimate' => $totalQuoteEstimate,
                        
                        
                    ];
                    
                    
                
                

                $employee = Employee::find(Auth::user()->id);
                $bumember = Employee::where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        return view('admin.opsmngdash', compact('title', 'nameofthebus', 'bumember', 'selectedBu', 'totalQuater', 'productGroup', 'indutriesGroup'));
    }
    
    public function opsmngcldashboard(Request $request)
    {
        $title = 'Operations Manager Dashboard';
        $themeid = $request->themeid;
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        return view('admin.opsmng_cl_dash', compact('title','nameofthebus','employee','bumember' ));
    }
    
    
     public function accntcldashboard(Request $request)
    {
        $title = 'Accounts Dashboard';
        $themeid = $request->themeid;
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        return view('admin.accnt_cl_dash', compact('title','nameofthebus','employee','bumember' ));
    }
    
  
    public function accntdashboard(Request $request)
    {
        $title = 'Accounts Stats Dashboard';
        $themeid = $request->themeid;
        
        $user = auth()->user();
        $authId = $user->id;
            
        $financialYear = session()->has('financial_year') ? session('financial_year') : '';
            
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        $selectedBusId = $request->input('busId');
                
        $targetAllocator = null;
        $totalQuater = [];
        
        if ($selectedBusId && $selectedBusId !== "all") {
              $selectedBu = $selectedBusId; 
            
               $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
                   ->where('financial_year', $financialYear)
                   ->orderBy('id', 'desc')
                   ->first();
                    
                    if ($targetAllocator !== null) {
                        $toplineTarget = $targetAllocator->topline_target;
                        $bottomlineTarget = $targetAllocator->bottomline_target;
                        } else {
                            $toplineTarget = 0;
                            $bottomlineTarget = 0;
                        }
            
                } else {
                    $selectedBu = "all";
                    
                   $targetAllocator = collect([]);
                    foreach ($nameofthebus as $bus) {
                        $latestTargetAllocator = TargetAllocator::where('bu_id', $bus->id)
                            ->where('financial_year', $financialYear)
                            ->orderByDesc('id')
                            ->first();
                        if ($latestTargetAllocator) {
                            $targetAllocator->push($latestTargetAllocator);
                        }
                    }
                  $toplineTarget = $targetAllocator->sum('topline_target');
                  $bottomlineTarget = $targetAllocator->sum('bottomline_target');
            }
            
            
           
                    
                    $projectsQuery = Project::where('financial_year', 'LIKE', trim($financialYear) . '%');
                    if ($selectedBu !== "all") {
                        $projectsQuery->where('bu_number', $selectedBu);
                    }
                    $allProjects = $projectsQuery->get();
                    
                   $countAllProject = $projectsQuery->count();

                    $openProjectCount = clone $projectsQuery;
                    $openProjectCount = $openProjectCount->where('project_status', '1')->count();
                    
                    $totalEstimateValue = clone $projectsQuery;
                    $totalEstimateValue = $totalEstimateValue->where('project_status', '1')->sum('estimate_value');
                    
                    $lossProjectCount = clone $projectsQuery;
                    $lossProjectCount = $lossProjectCount->where('project_status', '3')->count();
                    
                    $loosEstimateValue = clone $projectsQuery;
                    $loosEstimateValue = $loosEstimateValue->where('project_status', '3')->sum('estimate_value');
                    
                    $deferredProjectCount = clone $projectsQuery;
                    $deferredProjectCount = $deferredProjectCount->where('project_status', '2')->count();
                    
                    $deferredEstimateValue = clone $projectsQuery;
                    $deferredEstimateValue = $deferredEstimateValue->where('project_status', '2')->sum('estimate_value');
                    
                    $closeProjectData = clone $projectsQuery;
                    $closeProjectData = $closeProjectData->where('project_status', '5')->get();
                    
                  
                    $creativeproductsolds = ProductsOfNykas::all();
                    $categoryCounts = [];
                    foreach ($creativeproductsolds as $category) {
                                $categoryCounts[$category->products_of_nyka] = 0;
                            }
                
                    $industries = Industry::all();
                    $categoryIndustry = [];
                    
                   foreach ($industries as $industry) {
                        $categoryIndustry[$industry->industry_name] = 0;
                    }
                  
          
                    $quaterBillAmount = 0;
                    $quaterBillMargin = 0;
           
                    foreach ($allProjects as $project) {
                        $billData = AccountData::where('project_id', $project->id)->first();
                     
                        if ($billData) {
                            $billAmount = $billData->bill_amt;
                            $billMargin = $billData->actual_margin;
                        } else {
                            $billAmount = 0;
                            $billMargin = 0;
                        }
                        
                        $quaterBillAmount += $billAmount; 
                        $quaterBillMargin += $billMargin; 
                        
                        $closeBillProject = 0;
                        if($billData){
                            $closeBillProject += 1;
                            
                        }
                        
                         $category = ProductsOfNykas::where('id', $project->product_sold)->value('products_of_nyka');
                            if ($category !== null && isset($categoryCounts[$category])) {
                                $categoryCounts[$category]++;
                            }
                            
                           $clientData = Clients::find($project->client_id);
                       
                           $clientData = Clients::find($project->client_id);
                            if ($clientData !== null) {
                                $industryData = Industry::find($clientData->industry);
                                if ($industryData !== null && isset($categoryIndustry[$industryData->industry_name])) {
                                    $categoryIndustry[$industryData->industry_name]++;
                                }
                            }
                    }
                    
                   
                    
                    $productGroup = [];
                        foreach ($categoryCounts as $category => $count) {
                            $productGroup[] = [
                                $category => $count 
                            ];
                        }
                        
                        $indutriesGroup = [];

                        foreach ($categoryIndustry as $industry => $count1) {
                            if ($count1 > 0) {
                                $indutriesGroup[] = [
                                    $industry => $count1 
                                ];
                            }
                        }
                        
                        if (empty($indutriesGroup)) {
                            $indutriesGroup[] = ['No data found' => 0];
                        }
                    

                        $closeNotBillProjectCount = 0;
                        $closeBillProjectCount = 0;
                        $closeNotBillStimate = 0;
                        $closBillStimate = 0;
                        $fileCloserCount = 0;
                        $totalQuoteEstimate = 0;
                        $projectBillNotRecept = 0;
                        $projectNotBill = 0;
                        $totalQuoteEstimate1 = 0;
                        $billingValueWoGST = 0;
                        $projectBillEceAmount = 0;
                        $projectBillNotRecpt = 0;
                        $receptBillPendingData = 0;
                    
                        if ($closeProjectData) {
                           
                            foreach ($closeProjectData as $closeProject) {
                                
                                $accountData = AccountData::where('project_id', $closeProject->id)->first();
                                if ($accountData != null && ($accountData->file_closer_sub_date === null || $accountData->file_closer_sub_date === "NA")){
                                    $fileCloserCount += 1;
                                    
                                    $QuoteStore = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                        if ($QuoteStore != null) {
                                            $totalQuoteStore = $QuoteStore->ttl_bamt ?? 0;
                                            $totalQuoteEstimate += $totalQuoteStore;
                                        }
                                }
                                
                               if ($accountData != null && $accountData->bill_amt != null && $accountData->bill_amt != "NA") {
                                    $projectBillEceAmount += 1;
                                    
                                    $billingValue = $accountData->bill_amt;
                                     $billingValueWoGST += $billingValue;
                                     
                                     
                                     if($accountData->bill_receive_amt === null || $accountData->bill_receive_amt === "NA"){
                                        $projectBillNotRecpt += 1; 
                                        $notrecivedData = $accountData->bill_amt;
                                        $receptBillPendingData += $notrecivedData;
                                    }
                                }
                                
                               if ($accountData === null || $accountData->bill_sub_date === null || $accountData->bill_sub_date === "NA") {
                                    $projectNotBill += 1;
                                    
                                    $QuoteStore1 = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                    if ($QuoteStore1 != null) {
                                            $totalQuoteStore1 = $QuoteStore1->ttl_bamt ?? 0;
                                            $totalQuoteEstimate1 += $totalQuoteStore1;
                                    }
                                   
                                }
                                
                            }
                        }
                    
                        $totalQuater = [
                            'quater_bill' => $quaterBillAmount,
                            'quater_margin' => $quaterBillMargin,
                            'topline_target' => $toplineTarget,
                            'bottom_target' => $bottomlineTarget,
                            'count_project' => $countAllProject,
                            'open_project' => $openProjectCount,
                            'open_project_value' => $totalEstimateValue,
                            'loss_project' => $lossProjectCount,
                            'loss_value' => $loosEstimateValue,
                            'deffer_project' => $deferredProjectCount,
                            'deffer_value' => $deferredEstimateValue,
                            'close_not_bill_count' => $projectNotBill,
                            'close_bill_estimate' => $totalQuoteEstimate1,
                            'bill_project_count' => $projectBillEceAmount,
                            'bill_project_amount' => $billingValueWoGST,
                            'close_bill_not_recept_count' => $projectBillNotRecpt,
                            'close_bill_data_estimate' => $receptBillPendingData,
                            'close_submit_count' => $fileCloserCount,
                            'close_submit_count_estimate' => $totalQuoteEstimate,
                            
                            
                        ];
                    
                    
               
        return view('admin.accntdash', compact('title', 'nameofthebus', 'selectedBu', 'totalQuater', 'productGroup', 'indutriesGroup'));
    }
    
    public function store(Request $request)
    {
        $themeid = $request->themeid;
        $userid = Auth::user()->id;
        
        $user = User::where('id', $userid)->first() ;
        $users = User::where('id', $userid)->first() ;
        
        $user->theme_id  = $themeid;
        $user->save();
        
        $activity = new ActivityLog;
         
        $activity->user_id = Auth::user()->id;
        $activity->fullname = Auth::user()->name;
        $activity->activity_type = 'Theme Color Change';
        $activity->new_summery = json_encode($_POST);
        $activity->old_summery = json_encode($users);
        $activity->ipaddress = $_SERVER["REMOTE_ADDR"];
        $activity->save();
        
        return response()->json($themeid);
        
        
    }  
    
    public function csmdashboard(Request $request)
    {
        $title = 'CS Manager Dashboard';
        $themeid = $request->themeid;
        
        $nameofthebus = NameOfTheBus::where('status', 1)->get();
        
        $employee = Employee::where('id',Auth::user()->id)->first();
        $bumember = Employee::Where('nameofthebu_id', $employee->nameofthebu_id)->get();
        
        return view('admin.csmdash', compact('title', 'nameofthebus', 'bumember'));
        
        
    }
    
    
    public function csm_stats_dashboard(Request $request)
            {
                $title = 'CS Manager Stats Dashboard';
                $themeid = $request->themeid;
                
                $user = auth()->user();
                $authId = $user->id;
            
                $financialYear = session()->has('financial_year') ? session('financial_year') : '';
            
                $nameofthebus = NameOfTheBus::where('status', 1)->get();
                $selectedBusId = $request->input('busId');
                
                $targetAllocator = null;
                $totalQuater = [];
           
                if ($selectedBusId && $selectedBusId !== "all") {
                    $selectedBu = $selectedBusId; 
            
                    $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
                        ->where('financial_year', $financialYear)
                        ->orderBy('id', 'desc')
                        ->first();
                    
                  
                    if ($targetAllocator !== null) {
                        $toplineTarget = $targetAllocator->topline_target;
                        $bottomlineTarget = $targetAllocator->bottomline_target;
                    } else {
                        $toplineTarget = 0;
                        $bottomlineTarget = 0;
                    }
            
                } else {
                    $selectedBu = "all";
                    
                   $targetAllocator = collect([]);
                    foreach ($nameofthebus as $bus) {
                        $latestTargetAllocator = TargetAllocator::where('bu_id', $bus->id)
                            ->where('financial_year', $financialYear)
                            ->orderByDesc('id')
                            ->first();
                        if ($latestTargetAllocator) {
                            $targetAllocator->push($latestTargetAllocator);
                        }
                    }
                    $toplineTarget = $targetAllocator->sum('topline_target');
                    $bottomlineTarget = $targetAllocator->sum('bottomline_target');
                }
                
                
                    
                    $projectsQuery = Project::where('financial_year', 'LIKE', trim($financialYear) . '%');
                    if ($selectedBu !== "all") {
                        $projectsQuery->where('bu_number', $selectedBu);
                    }
                    $allProjects = $projectsQuery->get();
                    
                   $countAllProject = $projectsQuery->count();

                    $openProjectCount = clone $projectsQuery;
                    $openProjectCount = $openProjectCount->where('project_status', '1')->count();
                    
                    $totalEstimateValue = clone $projectsQuery;
                    $totalEstimateValue = $totalEstimateValue->where('project_status', '1')->sum('estimate_value');
                    
                    $lossProjectCount = clone $projectsQuery;
                    $lossProjectCount = $lossProjectCount->where('project_status', '3')->count();
                    
                    $loosEstimateValue = clone $projectsQuery;
                    $loosEstimateValue = $loosEstimateValue->where('project_status', '3')->sum('estimate_value');
                    
                    $deferredProjectCount = clone $projectsQuery;
                    $deferredProjectCount = $deferredProjectCount->where('project_status', '2')->count();
                    
                    $deferredEstimateValue = clone $projectsQuery;
                    $deferredEstimateValue = $deferredEstimateValue->where('project_status', '2')->sum('estimate_value');
                    
                    $closeProjectData = clone $projectsQuery;
                    $closeProjectData = $closeProjectData->where('project_status', '5')->get();
                    
                  
                    $creativeproductsolds = ProductsOfNykas::all();
                    $categoryCounts = [];
                    foreach ($creativeproductsolds as $category) {
                                $categoryCounts[$category->products_of_nyka] = 0;
                            }
                
                    $industries = Industry::all();
                    $categoryIndustry = [];
                    
                   foreach ($industries as $industry) {
                        $categoryIndustry[$industry->industry_name] = 0;
                    }
                  
          
                    $quaterBillAmount = 0;
                    $quaterBillMargin = 0;
           
                    foreach ($allProjects as $project) {
                        $billData = AccountData::where('project_id', $project->id)->first();
                     
                        if ($billData) {
                            $billAmount = $billData->bill_amt;
                            $billMargin = $billData->actual_margin;
                        } else {
                            $billAmount = 0;
                            $billMargin = 0;
                        }
                        
                        $quaterBillAmount += $billAmount; 
                        $quaterBillMargin += $billMargin; 
                        
                        $closeBillProject = 0;
                        if($billData){
                            $closeBillProject += 1;
                            
                        }
                        
                         $category = ProductsOfNykas::where('id', $project->product_sold)->value('products_of_nyka');
                            if ($category !== null && isset($categoryCounts[$category])) {
                                $categoryCounts[$category]++;
                            }
                            
                           $clientData = Clients::find($project->client_id);
                       
                           $clientData = Clients::find($project->client_id);
                            if ($clientData !== null) {
                                $industryData = Industry::find($clientData->industry);
                                if ($industryData !== null && isset($categoryIndustry[$industryData->industry_name])) {
                                    $categoryIndustry[$industryData->industry_name]++;
                                }
                            }
                    }
                    
                   
                    
                    $productGroup = [];
                        foreach ($categoryCounts as $category => $count) {
                            $productGroup[] = [
                                $category => $count 
                            ];
                        }
                        
                        $indutriesGroup = [];

                        foreach ($categoryIndustry as $industry => $count1) {
                            if ($count1 > 0) {
                                $indutriesGroup[] = [
                                    $industry => $count1 
                                ];
                            }
                        }
                        
                        if (empty($indutriesGroup)) {
                            $indutriesGroup[] = ['No data found' => 0];
                        }
                    

                    $closeNotBillProjectCount = 0;
                    $closeBillProjectCount = 0;
                    $closeNotBillStimate = 0;
                    $closBillStimate = 0;
                    $fileCloserCount = 0;
                    $totalQuoteEstimate = 0;
                    $projectBillNotRecept = 0;
                    $projectNotBill = 0;
                    $totalQuoteEstimate1 = 0;
                    $billingValueWoGST = 0;
                    $projectBillEceAmount = 0;
                    $projectBillNotRecpt = 0;
                    $receptBillPendingData = 0;
                    
                    if ($closeProjectData) {
                       
                        foreach ($closeProjectData as $closeProject) {
                            
                                                     
                            $accountData = AccountData::where('project_id', $closeProject->id)->first();
                            if ($accountData != null && ($accountData->file_closer_sub_date === null || $accountData->file_closer_sub_date === "NA")){
                                $fileCloserCount += 1;
                                
                                $QuoteStore = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                    if ($QuoteStore != null) {
                                        $totalQuoteStore = $QuoteStore->ttl_bamt ?? 0;
                                        $totalQuoteEstimate += $totalQuoteStore;
                                    }
                            }
                            
                            
                           if ($accountData != null && $accountData->bill_amt != null && $accountData->bill_amt != "NA") {
                                $projectBillEceAmount += 1;
                                
                                $billingValue = $accountData->bill_amt;
                                 $billingValueWoGST += $billingValue;
                                 
                                 
                                 if($accountData->bill_receive_amt === null || $accountData->bill_receive_amt === "NA"){
                                    $projectBillNotRecpt += 1; 
                                    $notrecivedData = $accountData->bill_amt;
                                    $receptBillPendingData += $notrecivedData;
                                }
                            }
                            
                           if ($accountData === null || $accountData->bill_sub_date === null || $accountData->bill_sub_date === "NA") {
                                $projectNotBill += 1;
                                
                                $QuoteStore1 = QuoteStore::where('project_id', $closeProject->id)->latest()->first();
                                if ($QuoteStore1 != null) {
                                        $totalQuoteStore1 = $QuoteStore1->ttl_bamt ?? 0;
                                        $totalQuoteEstimate1 += $totalQuoteStore1;
                                }
                               
                            }
                            
                        }
                    }
                    
                    $totalQuater = [
                        'quater_bill' => $quaterBillAmount,
                        'quater_margin' => $quaterBillMargin,
                        'topline_target' => $toplineTarget,
                        'bottom_target' => $bottomlineTarget,
                        'count_project' => $countAllProject,
                        'open_project' => $openProjectCount,
                        'open_project_value' => $totalEstimateValue,
                        'loss_project' => $lossProjectCount,
                        'loss_value' => $loosEstimateValue,
                        'deffer_project' => $deferredProjectCount,
                        'deffer_value' => $deferredEstimateValue,
                        'close_not_bill_count' => $projectNotBill,
                        'close_bill_estimate' => $totalQuoteEstimate1,
                        'bill_project_count' => $projectBillEceAmount,
                        'bill_project_amount' => $billingValueWoGST,
                        'close_bill_not_recept_count' => $projectBillNotRecpt,
                        'close_bill_data_estimate' => $receptBillPendingData,
                        'close_submit_count' => $fileCloserCount,
                        'close_submit_count_estimate' => $totalQuoteEstimate,
                        
                        
                    ];
                    
               
                
              
                $employee = Employee::find(Auth::user()->id);
                $bumember = Employee::where('nameofthebu_id', $employee->nameofthebu_id)->get();
                
                return view('admin.csm_stats_dash', compact('title', 'nameofthebus', 'bumember', 'selectedBu', 'totalQuater', 'productGroup', 'indutriesGroup'));
            }
    
    
}
