<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Project; 
use App\Models\Employee;
use App\Models\Notification;

use Auth;
use Carbon\Carbon;

class CsBuTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function butopbottamstatus(Request $request)
    {
        $title = 'BU Topline + Bottom Line Index';
        $user = auth()->user();
        $auth_id = $user->id;
        
        if (session()->has('financial_year')) {
            $financialYear = session('financial_year');
        } else {
            $financialYear = '';
        }
        
        $finayearData = $financialYear;
        
        $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();
        $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();
        $selectedBusId = $buId->nameofthebu_id;
        
        if ($selectedBusId && $selectedBusId !== "all") {
           
            $selectedBu = "$selectedBusId";
            
             $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
            $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)->where('financial_year', $finayearData)->get();
            
            
           $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $quaterBillAmount2 = 0;
            $quaterBillMargin2 = 0;
            
            foreach ($quaterdata as $SingleQ) {
                //dd(trim($financialYear));
                $allProject = Project::where('bu_number', $selectedBu)
                    ->where('financial_year', 'LIKE', trim($financialYear) . '%')
                    ->where('project_quarter', $SingleQ) 
                    ->get();
              //dd($allProject);
                $quaterBillAmount = 0;
                $quaterBillMargin = 0;
            
                foreach ($allProject as $singleProject) {
                   // dd($singleProject->id);
                    $billData = AccountData::where('project_id', $singleProject->id)->first();
                    if ($billData) {
                        $billAmount = $billData->bill_amt;
                        $billmargin = $billData->actual_margin;
                    } else {
                        $billAmount = 0;
                        $billmargin = 0;
                    }
            
                    $quaterBillAmount += $billAmount; 
                    $quaterBillMargin += $billmargin; 
                }
            
                $quaterBillAmount1 = $quaterBillAmount;
                $quaterBillMargin1 = $quaterBillMargin;
                $totalQuater[] = [
                    'quater_bill' => $quaterBillAmount1,
                    'quater_margin' => $quaterBillMargin1,
                ];
            
                $quaterBillAmount2 += $quaterBillAmount1;
                $quaterBillMargin2 += $quaterBillMargin1;
            }
            
            $totalQuater[] = [
                'quater_bill' => $quaterBillAmount2,
                'quater_margin' => $quaterBillMargin2,
            ];
          $firstQuarterSum = [];
        } else {
            
            $selectedBu = "$selectedBusId";
            
            $allEmployees = [];

            foreach ($nameofthebus as $bu) {
                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                
                $allEmployee[$bu->id] = $employeesForBu;
            }

            $allEmployee = collect($allEmployee)->flatten();
            
            
            $targetsAllocator = TargetAllocator::select('bu_id')->where('financial_year', $finayearData)->groupBy('bu_id')->get();

            $firstQuarterSum = [
                'topline_target1' => 0,
                'bottomline_target1' => 0,
                'topline_target2' => 0,
                'bottomline_target2' => 0,
                'topline_target3' => 0,
                'bottomline_target3' => 0,
                'topline_target4' => 0,
                'bottomline_target4' => 0,
                'topline_target5' => 0,
                'bottomline_target5' => 0,
            ];
            
            foreach ($targetsAllocator as $singleLocator) {
                $targetBuTask = TargetAllocator::where('bu_id', $singleLocator->bu_id)->where('financial_year', $finayearData)->get();
            
                // Check if each element exists before accessing it
                if (isset($targetBuTask[0])) {
                    $firstQuarterSum['topline_target1'] += (int)$targetBuTask[0]->topline_target;
                    $firstQuarterSum['bottomline_target1'] += (int)$targetBuTask[0]->bottomline_target;
                }
            
                if (isset($targetBuTask[1])) {
                    $firstQuarterSum['topline_target2'] += (int)$targetBuTask[1]->topline_target;
                    $firstQuarterSum['bottomline_target2'] += (int)$targetBuTask[1]->bottomline_target;
                }
            
                if (isset($targetBuTask[2])) {
                    $firstQuarterSum['topline_target3'] += (int)$targetBuTask[2]->topline_target;
                    $firstQuarterSum['bottomline_target3'] += (int)$targetBuTask[2]->bottomline_target;
                }
            
                if (isset($targetBuTask[3])) {
                    $firstQuarterSum['topline_target4'] += (int)$targetBuTask[3]->topline_target;
                    $firstQuarterSum['bottomline_target4'] += (int)$targetBuTask[3]->bottomline_target;
                }
            
                if (isset($targetBuTask[4])) {
                    $firstQuarterSum['topline_target5'] += (int)$targetBuTask[4]->topline_target;
                    $firstQuarterSum['bottomline_target5'] += (int)$targetBuTask[4]->bottomline_target;
                }
            }


            $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $quaterBillAmount2 = 0;
            $quaterBillMargin2 = 0;
            
             foreach ($quaterdata as $SingleQ) {
                $allProject = Project::where('financial_year', 'LIKE', trim($financialYear) . '%')
                    ->where('project_quarter', $SingleQ) 
                    ->get();
                    
                $quaterBillAmount = 0;
                $quaterBillMargin = 0;
            
                foreach ($allProject as $singleProject) {
                   // dd($singleProject->id);
                    $billData = AccountData::where('project_id', $singleProject->id)->first();
                    if ($billData) {
                        $billAmount = $billData->bill_amt;
                        $billmargin = $billData->actual_margin;
                    } else {
                        $billAmount = 0;
                        $billmargin = 0;
                    }
            
                    $quaterBillAmount += $billAmount; 
                    $quaterBillMargin += $billmargin; 
                }
            
                $quaterBillAmount1 = $quaterBillAmount;
                $quaterBillMargin1 = $quaterBillMargin;
                $totalQuater[] = [
                    'quater_bill' => $quaterBillAmount1,
                    'quater_margin' => $quaterBillMargin1,
                ];
            
                $quaterBillAmount2 += $quaterBillAmount1;
                $quaterBillMargin2 += $quaterBillMargin1;
            }
             $totalQuater[] = [
                'quater_bill' => $quaterBillAmount2,
                'quater_margin' => $quaterBillMargin2,
            ];
            
            $targetAllocator = [];
           
        }
       
        
        return view('cs.bu_tracker.butopbottamstatus', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'targetAllocator', 'finayearData', 'totalQuater', 'firstQuarterSum'));
    }
    
    public function butopstatus(Request $request)
    {
        $title = 'BU Topline';
        $user = auth()->user();
        $auth_id = $user->id;
        
         if (session()->has('financial_year')) {
            $financialYear = session('financial_year');
        } else {
            $financialYear = '';
        }
        
        
        $finayearData = $financialYear;
        
       $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();
        $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();         
       $selectedBusId = $buId->nameofthebu_id;
        
        if ($selectedBusId) {
            //$products = Project::where('bu_number', $selectedBusId)->get(); 
            $selectedBu = "$selectedBusId";
        } else {
            //$products = Project::all();
            $employee = Employee::find($auth_id);
            $selectedBu = $employee->nameofthebu_id;
        }
        
        if ($selectedBusId && $selectedBusId !== "all") {
            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
            $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)
            ->where('financial_year', $finayearData)
            ->get();
            
            
           $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $quaterBillAmount2 = 0;
            $quaterBillMargin2 = 0;
            
            foreach ($quaterdata as $SingleQ) {
                $allProject = Project::where('bu_number', $selectedBu)
                    ->where('financial_year', $finayearData)
                    ->where('project_quarter', $SingleQ) 
                    ->get();
                $quaterBillAmount = 0;
                $quaterBillMargin = 0;
            
                foreach ($allProject as $singleProject) {
                    $billData = AccountData::where('project_id', $singleProject->id)->first();
                    if ($billData) {
                        $billAmount = $billData->bill_amt;
                        $billmargin = $billData->actual_margin;
                    } else {
                        $billAmount = 0;
                        $billmargin = 0;
                    }
            
                    $quaterBillAmount += $billAmount; 
                    $quaterBillMargin += $billmargin; 
                }
            
                $quaterBillAmount1 = $quaterBillAmount;
                $quaterBillMargin1 = $quaterBillMargin;
                $totalQuater[] = [
                    'quater_bill' => $quaterBillAmount1,
                    'quater_margin' => $quaterBillMargin1,
                ];
            
                $quaterBillAmount2 += $quaterBillAmount1;
                $quaterBillMargin2 += $quaterBillMargin1;
            }
            
            $totalQuater[] = [
                'quater_bill' => $quaterBillAmount2,
                'quater_margin' => $quaterBillMargin2,
            ];
            
            $firstQuarterSum = [];
            
        } else {
            
            $selectedBu = "all";
            
            $allEmployees = [];

            foreach ($nameofthebus as $bu) {
                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                
                $allEmployee[$bu->id] = $employeesForBu;
            }

            $allEmployee = collect($allEmployee)->flatten();
            
            
            $targetsAllocator = TargetAllocator::select('bu_id')->where('financial_year', $finayearData)->groupBy('bu_id')->get();

            $firstQuarterSum = [
                'topline_target1' => 0,
                'bottomline_target1' => 0,
                'topline_target2' => 0,
                'bottomline_target2' => 0,
                'topline_target3' => 0,
                'bottomline_target3' => 0,
                'topline_target4' => 0,
                'bottomline_target4' => 0,
                'topline_target5' => 0,
                'bottomline_target5' => 0,
            ];
            
            foreach ($targetsAllocator as $singleLocator) {
                $targetBuTask = TargetAllocator::where('bu_id', $singleLocator->bu_id)->where('financial_year', $finayearData)->get();
            
                if (isset($targetBuTask[0])) {
                    $firstQuarterSum['topline_target1'] += (int)$targetBuTask[0]->topline_target;
                }
            
                if (isset($targetBuTask[1])) {
                    $firstQuarterSum['topline_target2'] += (int)$targetBuTask[1]->topline_target;
                }
            
                if (isset($targetBuTask[2])) {
                    $firstQuarterSum['topline_target3'] += (int)$targetBuTask[2]->topline_target;
                }
            
                if (isset($targetBuTask[3])) {
                    $firstQuarterSum['topline_target4'] += (int)$targetBuTask[3]->topline_target;
                }
            
                if (isset($targetBuTask[4])) {
                    $firstQuarterSum['topline_target5'] += (int)$targetBuTask[4]->topline_target;
                }
            }


            $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $quaterBillAmount2 = 0;
            $quaterBillMargin2 = 0;
            
             foreach ($quaterdata as $SingleQ) {
                $allProject = Project::where('financial_year', 'LIKE', trim($financialYear) . '%')
                    ->where('project_quarter', $SingleQ) 
                    ->get();
                    
                $quaterBillAmount = 0;
                $quaterBillMargin = 0;
            
                foreach ($allProject as $singleProject) {
                    $billData = AccountData::where('project_id', $singleProject->id)->first();
                    if ($billData) {
                        $billAmount = $billData->bill_amt;
                        $billmargin = $billData->actual_margin;
                    } else {
                        $billAmount = 0;
                        $billmargin = 0;
                    }
            
                    $quaterBillAmount += $billAmount; 
                    $quaterBillMargin += $billmargin; 
                }
            
                $quaterBillAmount1 = $quaterBillAmount;
                $quaterBillMargin1 = $quaterBillMargin;
                $totalQuater[] = [
                    'quater_bill' => $quaterBillAmount1,
                    'quater_margin' => $quaterBillMargin1,
                ];
            
                $quaterBillAmount2 += $quaterBillAmount1;
                $quaterBillMargin2 += $quaterBillMargin1;
            }
             $totalQuater[] = [
                'quater_bill' => $quaterBillAmount2,
                'quater_margin' => $quaterBillMargin2,
            ];
            
            $targetAllocator = [];
        }
        //dd($firstQuarterSum);
        
        return view('cs.bu_tracker.butopstatus', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'targetAllocator', 'finayearData', 'totalQuater', 'firstQuarterSum'));
    }
    
    public function bubottomstatus(Request $request)
    {
        $title = 'BU BottomLine';
        $user = auth()->user();
        $auth_id = $user->id;
         if (session()->has('financial_year')) {
            $financialYear = session('financial_year');
        } else {
            $financialYear = '';
        }
        $finayearData = $financialYear;
        
       $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();         
        $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();
       $selectedBusId = $buId->nameofthebu_id;
        
        if ($selectedBusId) {
            $selectedBu = "$selectedBusId";
        } else {
            //$products = Project::all();
            $employee = Employee::find($auth_id);
            $selectedBu = $employee->nameofthebu_id;
        }
        
        if ($selectedBusId && $selectedBusId !== "all") {
            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
            $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)->where('financial_year', $finayearData)->get();
            
            
           $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $quaterBillAmount2 = 0;
            $quaterBillMargin2 = 0;
            
            foreach ($quaterdata as $SingleQ) {
                $allProject = Project::where('bu_number', $selectedBu)
                    ->where('financial_year', $finayearData)
                    ->where('project_quarter', $SingleQ) 
                    ->get();
                
                $quaterBillAmount = 0;
                $quaterBillMargin = 0;
            
                foreach ($allProject as $singleProject) {
                    $billData = AccountData::where('project_id', $singleProject->id)->first();
                    if ($billData) {
                        $billAmount = $billData->bill_amt;
                        $billmargin = $billData->actual_margin;
                    } else {
                        $billAmount = 0;
                        $billmargin = 0;
                    }
            
                    $quaterBillAmount += $billAmount; 
                    $quaterBillMargin += $billmargin; 
                }
            
                $quaterBillAmount1 = $quaterBillAmount;
                $quaterBillMargin1 = $quaterBillMargin;
                $totalQuater[] = [
                    'quater_bill' => $quaterBillAmount1,
                    'quater_margin' => $quaterBillMargin1,
                ];
            
                $quaterBillAmount2 += $quaterBillAmount1;
                $quaterBillMargin2 += $quaterBillMargin1;
            }
            
            $totalQuater[] = [
                'quater_bill' => $quaterBillAmount2,
                'quater_margin' => $quaterBillMargin2,
            ];

            $firstQuarterSum = [];
            
        } else {
            $selectedBu = "all";
            
            $allEmployees = [];

            foreach ($nameofthebus as $bu) {
                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                
                $allEmployee[$bu->id] = $employeesForBu;
            }

            $allEmployee = collect($allEmployee)->flatten();
            
            
            $targetsAllocator = TargetAllocator::select('bu_id')->where('financial_year', $finayearData)->groupBy('bu_id')->get();

            $firstQuarterSum = [
                'topline_target1' => 0,
                'bottomline_target1' => 0,
                'topline_target2' => 0,
                'bottomline_target2' => 0,
                'topline_target3' => 0,
                'bottomline_target3' => 0,
                'topline_target4' => 0,
                'bottomline_target4' => 0,
                'topline_target5' => 0,
                'bottomline_target5' => 0,
            ];
            
            foreach ($targetsAllocator as $singleLocator) {
                $targetBuTask = TargetAllocator::where('bu_id', $singleLocator->bu_id)->where('financial_year', $finayearData)->get();
            
                // Check if each element exists before accessing it
                if (isset($targetBuTask[0])) {
                    $firstQuarterSum['topline_target1'] += (int)$targetBuTask[0]->topline_target;
                    $firstQuarterSum['bottomline_target1'] += (int)$targetBuTask[0]->bottomline_target;
                }
            
                if (isset($targetBuTask[1])) {
                    $firstQuarterSum['topline_target2'] += (int)$targetBuTask[1]->topline_target;
                    $firstQuarterSum['bottomline_target2'] += (int)$targetBuTask[1]->bottomline_target;
                }
            
                if (isset($targetBuTask[2])) {
                    $firstQuarterSum['topline_target3'] += (int)$targetBuTask[2]->topline_target;
                    $firstQuarterSum['bottomline_target3'] += (int)$targetBuTask[2]->bottomline_target;
                }
            
                if (isset($targetBuTask[3])) {
                    $firstQuarterSum['topline_target4'] += (int)$targetBuTask[3]->topline_target;
                    $firstQuarterSum['bottomline_target4'] += (int)$targetBuTask[3]->bottomline_target;
                }
            
                if (isset($targetBuTask[4])) {
                    $firstQuarterSum['topline_target5'] += (int)$targetBuTask[4]->topline_target;
                    $firstQuarterSum['bottomline_target5'] += (int)$targetBuTask[4]->bottomline_target;
                }
            }


            $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $quaterBillAmount2 = 0;
            $quaterBillMargin2 = 0;
            
             foreach ($quaterdata as $SingleQ) {
                $allProject = Project::where('financial_year', 'LIKE', trim($financialYear) . '%')
                    ->where('project_quarter', $SingleQ) 
                    ->get();
                    
                $quaterBillAmount = 0;
                $quaterBillMargin = 0;
            
                foreach ($allProject as $singleProject) {
                   // dd($singleProject->id);
                    $billData = AccountData::where('project_id', $singleProject->id)->first();
                    if ($billData) {
                        $billAmount = $billData->bill_amt;
                        $billmargin = $billData->actual_margin;
                    } else {
                        $billAmount = 0;
                        $billmargin = 0;
                    }
            
                    $quaterBillAmount += $billAmount; 
                    $quaterBillMargin += $billmargin; 
                }
            
                $quaterBillAmount1 = $quaterBillAmount;
                $quaterBillMargin1 = $quaterBillMargin;
                $totalQuater[] = [
                    'quater_bill' => $quaterBillAmount1,
                    'quater_margin' => $quaterBillMargin1,
                ];
            
                $quaterBillAmount2 += $quaterBillAmount1;
                $quaterBillMargin2 += $quaterBillMargin1;
            }
             $totalQuater[] = [
                'quater_bill' => $quaterBillAmount2,
                'quater_margin' => $quaterBillMargin2,
            ];
            
            $targetAllocator = [];
         
        }
        //dd($totalQuater);
        
        return view('cs.bu_tracker.bubottomstatus', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'targetAllocator', 'finayearData', 'totalQuater', 'firstQuarterSum'));
    }
    
    public function toplinedetail(Request $request)
    {
        $title = ' Top Line Details';
        $user = auth()->user();
        $auth_id = $user->id;
        
        if (session()->has('financial_year')) {
            $financialYear = session('financial_year');
        } else {
            $financialYear = '';
        }
        
        $finayearData = $financialYear;
        
       $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first(); 
        $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();        
       $selectedBusId = $buId->nameofthebu_id;
        
        if ($selectedBusId) {
            $selectedBu = "$selectedBusId";
        } else {
            $selectedBu = "all";
            $selectedBusId = "all";
           
        }
        
        if ($selectedBu) {
            if($selectedBu == "all"){
                 foreach ($nameofthebus as $bu) {
                    $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                    
                    $allEmployee[$bu->id] = $employeesForBu;
                    }
        
                    $allEmployee = collect($allEmployee)->flatten();
            }else{
                $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
            }
            
            $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)->where('financial_year', $finayearData)->get();
            
            
           $q1projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
            ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
            ->where('projects.project_quarter','Q1')
            ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                $query->where('projects.bu_number', $selectedBu);
            })
            ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
            ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
            
            $q2projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
            ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
            ->where('projects.project_quarter','Q2')
            ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                $query->where('projects.bu_number', $selectedBu);
            })
            ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
            ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
            
            $q3projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
            ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
            ->where('projects.project_quarter','Q3')
             ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                $query->where('projects.bu_number', $selectedBu);
            })
            ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
            ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
            
            $q4projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
            ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
            ->where('projects.project_quarter','Q4')
            ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                $query->where('projects.bu_number', $selectedBu);
            })
            ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
            ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
            
        } else {
            $allEmployee = [];
            $targetAllocator = [];
            $finayearData = "";
            $totalQuater = [];
            $q1projects = [];
            $q2projects = [];
            $q3projects = [];
            $q4projects = [];
        }
        
        return view('cs.bu_tracker.butoplinedetail', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'targetAllocator', 'finayearData','q1projects','q2projects','q3projects','q4projects'));
    }
    
    public function buproductsold(Request $request)
    {
        $title = 'Product Sold';
        $user = auth()->user();
        $auth_id = $user->id;
        
         if (session()->has('financial_year')) {
            $financialYear = session('financial_year');
        } else {
            $financialYear = '';
        }
        
        $finayearData = $financialYear;
        
       $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();   
        $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();      
       $selectedBusId = $buId->nameofthebu_id;
        $ProductsOfNykas = ProductsOfNykas::where('status',1)->get();
        
        if ($selectedBusId) {
            $selectedBu = "$selectedBusId";
        } else {
            $selectedBu = "all";
        }
        
        if ($selectedBusId && $selectedBusId !== "all") {
            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
            
        } else {
            $allEmployees = [];

            foreach ($nameofthebus as $bu) {
                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                
                $allEmployee[$bu->id] = $employeesForBu;
            }

            $allEmployee = collect($allEmployee)->flatten();
          
        }
        return view('cs.bu_tracker.buproductsold', compact('title', 'nameofthebus', 'ProductsOfNykas','selectedBu', 'allEmployee', 'finayearData'));
    }
    
    
   
    public function buproductsolddetail(Request $request)
    {
        $title = 'Product Sold Detail';
        $user = auth()->user();
        $auth_id = $user->id;
    
        if (session()->has('financial_year')) {
            $financialYear = session('financial_year');
        } else {
            $financialYear = '';
        }
    
        $finayearData = $financialYear;
        
       $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first(); 
        $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();
        $allProductOfNyka = ProductsOfNykas::where('status',1)->get();        
       $selectedBusId = $buId->nameofthebu_id;
        $selectedSoldId = $request->input('soldid');
        
        if($selectedSoldId){
            $soldId = $selectedSoldId;
        }else{
            $soldId = "";
        }
    
        if ($selectedBusId) {
            $selectedBu = $selectedBusId;
        } else {
            $selectedBu = "all";
        }
        
       
        if ($selectedBu) {
            
            if($selectedBu == "all"){
                $allEmployees = [];

                foreach ($nameofthebus as $bu) {
                    $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                    
                    $allEmployee[$bu->id] = $employeesForBu;
                }

               $allEmployee = collect($allEmployee)->flatten();
               
            }else{
                $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
            }
            
            
            $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
            $allQuater = [];
    
            foreach ($quaterdata as $SingleQ) {
                $query = Project::where('financial_year', $finayearData)
                    ->where('project_quarter', $SingleQ);
                    
                     if ($selectedBu && $selectedBu != "all") {
                        $query->where('bu_number', $selectedBu);
                    }
        
                    if ($selectedSoldId && $selectedSoldId != "all") {
                        $query->where('product_sold', $soldId);
                    }
    
                $allProject = $query->get();
                $totalQuater = [];
   //dd($allProject);
                foreach ($allProject as $singleProject) {
                    $productOfNykas = ProductsOfNykas::find($singleProject->product_sold);
                    $clientDetails = Clients::find($singleProject->client_id);
    
                    $totalQuater[] = [
                        'quarter' => $singleProject->project_quarter,
                        'bu_no' => $singleProject->bu_number,
                        'product_sold' => $productOfNykas->products_of_nyka,
                        'project_name' => $singleProject->project_name,
                        'company_name' => $clientDetails->company,
                    ];
                }
    
                $allQuater[] = [
                    'quater' => $SingleQ,
                    'quater_data' => $totalQuater,
                ];
            }
        } else {
            $allEmployee = [];
            $finayearData = "";
            $allQuater = [];
        }
        
        return view('cs.bu_tracker.buproductsolddetail', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'finayearData', 'allQuater', 'allProductOfNyka', 'soldId'));
    }
    
        public function projecttracking(Request $request)
            {
                $title = 'Project Tracking';
                $user = auth()->user();
                $auth_id = $user->id;
            
                if (session()->has('financial_year')) {
                    $financialYear = session('financial_year');
                } else {
                    $financialYear = '';
                }
            
                $finayearData = $financialYear;
                
               $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();    
                $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();     
               $selectedBusId = $buId->nameofthebu_id;
                if ($selectedBusId) {
                    $selectedBu = $selectedBusId;
                } else {
                    $selectedBu = "all";
                }
            
                if ($selectedBu) {
                    
                    if($selectedBu == "all"){
                            $allEmployees = [];
            
                            foreach ($nameofthebus as $bu) {
                                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                                
                                $allEmployee[$bu->id] = $employeesForBu;
                            }
            
                           $allEmployee = collect($allEmployee)->flatten();
                           
                        }else{
                            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
                        }
                        
                    $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
                    $allQuater = [];
            
                    foreach ($quaterdata as $SingleQ) {
                        $allProject = Project::where('financial_year', $finayearData)
                            ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                                $query->where('bu_number', $selectedBu);
                            })
                            ->where('project_quarter', $SingleQ)
                            ->get();
            
                        $totalQuater = [];
            
                        foreach ($allProject as $singleProject) {
                            $projectTracking = ProjectTracking::where('project_id', $singleProject->id)->first();
                            if ($projectTracking) {
                                $pichFaceTrack = PitchPhaseTrackings::find($projectTracking->project_tracker);
            
                                if ($pichFaceTrack) {
                                    $projectStatus = $pichFaceTrack->pitch_phase_tracking;
                                    $carbonDateStart = Carbon::parse($projectTracking->prjct_s_date);
                                    $formattedStart = $carbonDateStart->format('d-m-Y');
            
                                    $carbonDateEnd = Carbon::parse($projectTracking->prjct_e_date);
                                    $formattedEnd = $carbonDateEnd->format('d-m-Y');
            
                                    $carbonStartDate = Carbon::parse($projectTracking->prjct_s_date);
                                    $carbonEndDate = Carbon::parse($projectTracking->prjct_e_date);
                                    $numberOfDays = $carbonStartDate->diffInDays($carbonEndDate);
                                } else {
                                    $projectStatus = "";
                                    $formattedStart = "";
                                    $formattedEnd = "";
                                    $numberOfDays = "";
                                }
                            } else {
                                $projectStatus = "";
                                $formattedStart = "";
                                $formattedEnd = "";
                                $numberOfDays = "";
                            }
            
                            $currentDate = Carbon::now();
                            $openingDate = Carbon::parse($singleProject->opening_date);
                            $currentNoofday = $openingDate->diffInDays($currentDate);
            
                            $carbonDateOpen = Carbon::parse($singleProject->opening_date);
                            $formattedOpen = $carbonDateOpen->format('d-m-Y');
            
                            $totalQuater[] = [
                                'quarter' => $singleProject->project_quarter,
                                'opening_date' => $formattedOpen,
                                'project_name' => $singleProject->project_name,
                                'project_cs_owner' => $singleProject->project_csowner,
                                'project_tracking' => $projectStatus,
                                'track_start_date' => $formattedStart,
                                'track_end_date' => $formattedEnd,
                                'track_day' => $numberOfDays,
                                'day_since_opening' => $currentNoofday,
                            ];
                        }
            
                        $allQuater[] = [
                            'quater' => $SingleQ,
                            'quater_data' => $totalQuater,
                        ];
                    }
                } else {
                    $allEmployee = [];
                    $finayearData = "";
                    $allQuater = [];
                }
            
                return view('cs.bu_tracker.projecttracking', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'finayearData', 'allQuater'));
            }
            
            
            public function buprojectstatus(Request $request)
                {
                    $title = 'Project Status';
                    $user = auth()->user();
                    $auth_id = $user->id;
                
                    if (session()->has('financial_year')) {
                        $financialYear = session('financial_year');
                    } else {
                        $financialYear = '';
                    }
                
                    $finayearData = $financialYear;
                    
                   $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();   
                    $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();      
                   $selectedBusId = $buId->nameofthebu_id;
                    $selectedBu = $selectedBusId ?: "all";
                
                    if ($selectedBu) {
                        
                         if($selectedBu == "all"){
                            $allEmployees = [];
            
                            foreach ($nameofthebus as $bu) {
                                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                                
                                $allEmployee[$bu->id] = $employeesForBu;
                            }
            
                           $allEmployee = collect($allEmployee)->flatten();
                           
                        }else{
                            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
                        }
                        
                        
                        $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
                        $allQuater = [];
                
                        foreach ($quaterdata as $SingleQ) {
                            $allProject = Project::where('financial_year', $finayearData)
                                ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                                    $query->where('bu_number', $selectedBu);
                                })
                                ->where('project_quarter', $SingleQ)
                                ->get();
                
                            $totalQuater = [];
                
                            foreach ($allProject as $singleProject) {
                                $clientDetails = Clients::where('id', $singleProject->client_id)->first();
                
                                $statusName = "";
                                $clientName = "";
                                $companyName = "";
                
                                if ($clientDetails) {
                                    $projectStatus = ProjectStatus::find($singleProject->project_status);
                
                                    $statusName = $projectStatus ? $projectStatus->project_status : "";
                                    $clientName = $clientDetails->f_name . ' ' . $clientDetails->m_name . '' . $clientDetails->l_name;
                                    $companyName = $clientDetails->company;
                                }
                
                                $carbonDateOpen = Carbon::parse($singleProject->opening_date);
                                $formattedOpen = $carbonDateOpen->format('d-m-Y');
                
                                $totalQuater[] = [
                                    'quarter' => $singleProject->project_quarter,
                                    'opening_date' => $formattedOpen,
                                    'bu_number' => $singleProject->bu_number,
                                    'project_name' => $singleProject->project_name,
                                    'project_cs_owner' => $singleProject->project_csowner,
                                    'client_name' => $clientName,
                                    'company_name' => $companyName,
                                    'project_status' => $statusName,
                                ];
                            }
                
                            $allQuater[] = [
                                'quater' => $SingleQ,
                                'quater_data' => $totalQuater,
                            ];
                        }
                    } else {
                        $allEmployee = [];
                        $finayearData = "";
                        $allQuater = [];
                    }
                
                    return view('cs.bu_tracker.buprojectstatus', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'finayearData', 'allQuater'));
                }
                
                
        
        
        public function buindustrybreakup(Request $request)
            {
                $title = 'Industry Breakup';
                $user = auth()->user();
                $auth_id = $user->id;
            
                if (session()->has('financial_year')) {
                    $financialYear = session('financial_year');
                } else {
                    $financialYear = '';
                }
            
                $finayearData = $financialYear;
                
               $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();  
                $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();       
               $selectedBusId = $buId->nameofthebu_id;
                $selectedBu = $selectedBusId ?: "all";
            
                if ($selectedBu) {
                    
                         if($selectedBu == "all"){
                              $allEmployees = [];
                
                              foreach ($nameofthebus as $bu) {
                                    $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                                    
                                    $allEmployee[$bu->id] = $employeesForBu;
                                }
                
                               $allEmployee = collect($allEmployee)->flatten();
                               
                            }else{
                            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
                       }
                     
                    $quaterdata = ['Q1', 'Q2', 'Q3', 'Q4'];
                    $allQuater = [];
            
                    foreach ($quaterdata as $SingleQ) {
                        $allProject = Project::where('financial_year', $finayearData)
                            ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                                    $query->where('bu_number', $selectedBu);
                                })
                            ->where('project_quarter', $SingleQ)
                            ->get();
            
                        $totalQuater = [];
            
                        foreach ($allProject as $singleProject) {
                            $billData = AccountData::where('project_id', $singleProject->id)->first();
                            $bill_to_client_date = '';
            
                            if ($billData && $billData->bill_sub_date !== '' && $billData->bill_sub_date !== 'NA') {
                                $bill_to_client_date = date("d-m-Y", strtotime($billData->bill_sub_date));
                            }
            
                            $industryName = '';
            
                            if ($singleProject->client_id !== null) {
                                $company = Clients::find($singleProject->client_id);
            
                                if ($company) {
                                    $industryId = $company->industry;
            
                                    if ($industryId !== null) {
                                        $industry = Industry::find($industryId);
            
                                        if ($industry) {
                                            $industryName = $industry->industry_name;
                                        }
                                    }
                                }
                            }
            
                            $totalQuater[] = [
                                'quarter' => $singleProject->project_quarter,
                                'project_id' => $singleProject->project_id,
                                'project_name' => $singleProject->project_name,
                                'bu_number' => $singleProject->bu_number,
                                'project_cs_owner' => $singleProject->project_csowner,
                                'bill_to_client_date' => $bill_to_client_date,
                                'industry' => $industryName,
                            ];
                        }
            
                        $allQuater[] = [
                            'quater' => $SingleQ,
                            'quater_data' => $totalQuater,
                        ];
                    }
                } else {
                    $allEmployee = [];
                    $finayearData = "";
                    $allQuater = [];
                }
            
                return view('cs.bu_tracker.buindustrybreakup', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'finayearData', 'allQuater'));
            }
            
            
              public function projectsApproval(Request $request){
                $title = 'Projects Approval';
                $user = auth()->user();
                $auth_id = $user->id;
            
                $financialYear = session('financial_year', '');
            
                $finayearData = $financialYear;
                
               $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();     
                $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();    
               $selectedBusId = $buId->nameofthebu_id;
                $selectedBu = $selectedBusId ?: "";
            
                $allProjects = Project::where('financial_year', $finayearData)
                    ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                        $query->where('bu_number', $selectedBu);
                    })
                    ->get();
            
                $totalData = [];
            
                foreach ($allProjects as $singleProject) {
                    $formattedOpenDate = Carbon::parse($singleProject->opening_date)->format('d-m-Y');
                    $formattedEventStart = Carbon::parse($singleProject->event_st_date)->format('d-m-Y');
                    $formattedEventEnd = Carbon::parse($singleProject->event_end_date)->format('d-m-Y');
            
                    $employeeData = Employee::find($singleProject->allot_ops);
                    $employeeName = $employeeData ? $employeeData->employee_name : "";
            
                    $employeeOpsName = "";
                    $projectHeadsData = QuoteEcProject::where('project_id', $singleProject->id)->first();
                    if ($projectHeadsData) {
                        $employeeOps = Employee::find($projectHeadsData->ops_head_id);
                        $employeeOpsName = $employeeOps ? $employeeOps->employee_name : "";
                    }
            
                    $quoteApproval = QuoteEcApproval::where('project_id', $singleProject->id)->latest()->first();
                    $aprovalQuoteName = "";
                    $aprovalQuoteDate = "";
                    if ($quoteApproval) {
                            $aprovalQuoteName = $quoteApproval->management_approval;
                            $aprovalQuoteDate =  optional(Carbon::parse($quoteApproval->mgmt_approve_date))->format('d-m-Y') ?? "";
                        
                    }
            
                    $clientQuortApr = QuoteApprovals::where('project_id', $singleProject->id)->latest()->first();
                    $clientApproved = "";
                    $clientApprovedDate = "";
                    if($clientQuortApr){
                        $clientApproved = $clientQuortApr->client_approval;
                        $clientApprovedDate = optional(Carbon::parse($clientQuortApr->client_approv_date))->format('d-m-Y') ?? "";
                    }
            
                    $billApproval = BillApprovals::where('project_id', $singleProject->id)->latest()->first();
                    $bill_apprved = "";
                    $bill_apprve_date  = "";
                    $bill_apprved_client = "";
                    $bill_apprve_date_client = "";
                    $mngBillApproval = "";
                    $mngBillApprovalDaet = "";
                    if($billApproval){
                        $bill_apprve_date = optional(Carbon::parse($billApproval->mgmt_approve_date))->format('d-m-Y') ?? "";
                        $bill_apprved = $billApproval->management_approval;
                        $bill_apprved_client = $billApproval->client_approval;
                        $bill_apprve_date_client  = optional(Carbon::parse($billApproval->client_approv_date))->format('d-m-Y') ?? "";
            
                        $mngBillApproval = $billApproval->management_approval;
                        $mngBillApprovalDaet = optional(Carbon::parse($billApproval->mgmt_approve_date))->format('d-m-Y') ?? "";
                    }
            
                    $approvalECBug = QuoteBdApproval::where('project_id', $singleProject->id)->latest()->first();
                    $approvaled_ec_bug = "";
                    $approvaled_ec_bug_date = "";
                    $approvaled_ec_bug_mng = "";
                    $approvaled_ec_mng_date = "";
                    if($approvalECBug){
                        $approvaled_ec_bug = $approvalECBug->management_approval;
                        $approvaled_ec_bug_date = optional(Carbon::parse($approvalECBug->mgmt_approve_date))->format('d-m-Y') ?? "";
                        $approvaled_ec_bug_mng = $approvalECBug->management_approvals;
                        $approvaled_ec_mng_date = optional(Carbon::parse($approvalECBug->mgmt_approve_dates))->format('d-m-Y') ?? "";
                    }
            
                    $QuoteAcApproval = QuoteAcApproval::where('project_id', $singleProject->id)->latest()->first();
                    $opsAchualCost = "";
                    $opsAchualCostDate = "";
                    if($QuoteAcApproval){
                        $opsAchualCost = $QuoteAcApproval->management_approval;
                        $opsAchualCostDate = optional(Carbon::parse($QuoteAcApproval->mgmt_approve_date))->format('d-m-Y') ?? "";
                    }
            
                    $totalData[] = [
                        'fy' => $singleProject->financial_year,
                        'bu_no' => $singleProject->bu_number,
                        'project_id' => $singleProject->project_id,
                        'project_owner' => $singleProject->project_csowner,
                        'project_name' => $singleProject->project_name,
                        'opening_date' => $formattedOpenDate,
                        'event_start_date' => $formattedEventStart,
                        'event_end_date' => $formattedEventEnd,
                        'alloted_ops_mag' => $employeeName,
                        'project_head_ops' => $employeeOpsName,
                        'aproval_on_quote' => $aprovalQuoteName,
                        'date_of_approval' => $aprovalQuoteDate,
                        'approved_client' => $clientApproved,
                        'date_approved_client' => $clientApprovedDate,
                        'bill_approval' => $bill_apprved,
                        'date_approval_bill' => $bill_apprve_date,
                        'bill_approval_client' => $bill_apprved_client,
                        'bill_approval_c_date' => $bill_apprve_date_client,
                        'approval_ec_buged' => $approvaled_ec_bug,
                        'approval_ec_buged_date' => $approvaled_ec_bug_date,
                        'approval_ec_buged_mng' => $approvaled_ec_bug_mng,
                        'approval_ec_buged_date_mng' => $approvaled_ec_mng_date,
                        'ops_achual_cost' => $opsAchualCost,
                        'ops_achual_cost_date' => $opsAchualCostDate,
                        'mng_achual_cost' => $mngBillApproval,
                        'mng_achual_cost_date' => $mngBillApprovalDaet,
                    ];
                }

   //dd($totalData);

    return view('cs.reports.projectsapproval', compact('title', 'nameofthebus', 'selectedBu', 'finayearData', 'totalData'));
}


       public function projectprofitabilitycs(Request $request)
            {
                $title = 'Projects Approval';
                $user = auth()->user();
                $auth_id = $user->id;
            
                $financialYear = session('financial_year', '');
            
                $finayearData = $financialYear;
                
               $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first();  
                $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();       
               $selectedBusId = $buId->nameofthebu_id;
                $selectedBu = $selectedBusId ?: "";
            
                $allProjects = Project::where('financial_year', $finayearData)
                    ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                        $query->where('bu_number', $selectedBu);
                    })
                    ->get();
            
                $totalData = [];
            
                foreach ($allProjects as $singleProject) {
                    $formattedOpenDate = Carbon::parse($singleProject->opening_date)->format('d-m-Y');
                    $formattedEventStart = Carbon::parse($singleProject->event_st_date)->format('d-m-Y');
                    $formattedEventEnd = Carbon::parse($singleProject->event_end_date)->format('d-m-Y');
            
                    $employeeData = optional(Employee::find($singleProject->allot_ops))->employee_name;
                    $employeeName = $employeeData ?? "";
            
                    $employeeOpsName = "";
                    $quoteToClient = "";
                    $projectHeadsData = QuoteEcProject::where('project_id', $singleProject->id)->first();
                    if ($projectHeadsData) {
                        $employeeOps = optional(Employee::find($projectHeadsData->ops_head_id))->employee_name;
                        $employeeOpsName = $employeeOps ?? "";
                        $quoteToClient = $projectHeadsData->ttl_bamt ?? "";
                        $expectCostWOGst = $projectHeadsData->ttl_bamts ?? "";
                    }
            
                    $quoteApproval = QuoteEcApproval::where('project_id', $singleProject->id)->latest()->first();
                    $aprovalQuoteName = "";
                    $aprovalQuoteDate = "";
                    if ($quoteApproval) {
                        $expected_margin = $quoteApproval->expected_margin ?? "";
                        $expected_margin_per = $quoteApproval->ec_margin_perc ?? "";
                    }
            
                    $budgetedCostStore = BudgetedCostStore::where('project_id', $singleProject->id)->latest()->first();
                    $bugetedCostwtGst = $budgetedCostStore->tolbaseamt ?? "";
            
                    $approvalECBug = QuoteBdApproval::where('project_id', $singleProject->id)->latest()->first();
                    $bugtedMargin = "";
                    $bugtedMarginPer = "";
                    if ($approvalECBug) {
                        if ($approvalECBug->Expected_save_over == null) {
                            $bugtedMargin = $approvalECBug->Expected_save;
                            $bugtedMarginPer = $approvalECBug->Expected_save_per;
                        } else {
                            $bugtedMargin = $approvalECBug->Expected_save_over;
                            $bugtedMarginPer = $approvalECBug->Expected_save_per_over;
                        }
                    }
            
                    $billStore = BillStore::where('project_id', $singleProject->id)->latest()->first();
                    $billwoGst = $billStore->ttl_bamt ?? "";
            
                    $actualCostStore = ActualCostStore::where('project_id', $singleProject->id)->latest()->first();
                    $actual_cost_gst_rs = $actualCostStore->tolbaseamt ?? "";
            
                   $acmaramts = '';
                    if ($billwoGst !== '' && $actual_cost_gst_rs !== '') {
                        $acmaramts = (float)$billwoGst - (float)$actual_cost_gst_rs;
                    }
                    
                    $acmarpers = '';
                    if ($acmaramts !== '' && $billwoGst !== 0) {
                        $acmarpers = ($acmaramts / (float)$billwoGst) * 100;
                        $acmarpers = number_format($acmarpers, 2);
                    }
                    
                     $QuoteStore = QuoteStore::where('project_id', $singleProject->id)->latest()->first();

                    if (empty($QuoteStore)) {
                        $purchase_order = "Pending";
                    } else {
                        $QuoteImage = QuoteImage::where('quoteproject_id', $QuoteStore->id)->latest()->first();
                        $purchase_order = empty($QuoteImage) ? "Pending" : "Done";
                    }

            
                    $totalData[] = [
                        'fy' => $singleProject->financial_year,
                        'bu_no' => $singleProject->bu_number,
                        'project_id' => $singleProject->project_id,
                        'project_owner' => $singleProject->project_csowner,
                        'project_name' => $singleProject->project_name,
                        'opening_date' => $formattedOpenDate,
                        'event_start_date' => $formattedEventStart,
                        'event_end_date' => $formattedEventEnd,
                        'alloted_ops_mag' => $employeeName,
                        'project_head_ops' => $employeeOpsName,
                        'purchase_order' => $purchase_order,
                        'quote_to_client' => $quoteToClient,
                        'expected_cost_gst' => $expectCostWOGst,
                        'expected_margin_rs' => $expected_margin,
                        'expected_margin_per' => $expected_margin_per,
                        'buget_cost_rs' => $bugetedCostwtGst,
                        'budget_margin_rs' => $bugtedMargin,
                        'pudget_mergin_per' => $bugtedMarginPer,
                        'bill_gst_rs' => $billwoGst,
                        'actual_cost_gst_rs' => $actual_cost_gst_rs,
                        'actual_margin_rs' => $acmaramts,
                        'actual_margin_per' => $acmarpers,
                    ];
                }
            
                return view('cs.reports.projectprofitabilitycs', compact('title', 'nameofthebus', 'selectedBu', 'finayearData', 'totalData'));
            }
            
            
             public function projectprofitabilityops(Request $request)
            {
                $title = 'Project Profitability_ops';
                $user = auth()->user();
                $auth_id = $user->id;
            
                $financialYear = session('financial_year', '');
            
                $finayearData = $financialYear;
            
                
               $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first(); 
               $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();
               $selectedBusId = $buId->nameofthebu_id;
                $selectedBu = $selectedBusId ?: "";
            
                $allProjects = Project::where('financial_year', $finayearData)
                    ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                        $query->where('bu_number', $selectedBu);
                    })
                    ->get();
            
                $totalData = [];
            
                foreach ($allProjects as $singleProject) {
                    $formattedOpenDate = Carbon::parse($singleProject->opening_date)->format('d-m-Y');
                    $formattedEventStart = Carbon::parse($singleProject->event_st_date)->format('d-m-Y');
                    $formattedEventEnd = Carbon::parse($singleProject->event_end_date)->format('d-m-Y');
            
                    $employeeData = optional(Employee::find($singleProject->allot_ops))->employee_name;
                    $employeeName = $employeeData ?? "";
            
                    $employeeOpsName = "";
                    $quoteToClient = "";
                    $projectHeadsData = QuoteEcProject::where('project_id', $singleProject->id)->first();
                    if ($projectHeadsData) {
                        $employeeOps = optional(Employee::find($projectHeadsData->ops_head_id))->employee_name;
                        $employeeOpsName = $employeeOps ?? "";
                       // $quoteToClient = $projectHeadsData->ttl_bamt ?? "";
                        $expectCostWOGst = $projectHeadsData->ttl_bamts ?? "";
                    }
            
                    // $quoteApproval = QuoteEcApproval::where('project_id', $singleProject->id)->latest()->first();
                    // $aprovalQuoteName = "";
                    // $aprovalQuoteDate = "";
                    // if ($quoteApproval) {
                    //     $expected_margin = $quoteApproval->expected_margin ?? "";
                    //     $expected_margin_per = $quoteApproval->ec_margin_perc ?? "";
                    // }
            
                    $budgetedCostStore = BudgetedCostStore::where('project_id', $singleProject->id)->latest()->first();
                    $bugetedCostwtGst = $budgetedCostStore->tolbaseamt ?? "";
            
                    $approvalECBug = QuoteBdApproval::where('project_id', $singleProject->id)->latest()->first();
                    $bugtedMargin = "";
                    $bugtedMarginPer = "";
                    $bugtedMarginOver = "";
                    $bugtedMarginPerOver = "";
                    if ($approvalECBug) {
                          $bugtedMargin = $approvalECBug->Expected_save;
                          $bugtedMarginPer = $approvalECBug->Expected_save_per;
                          $bugtedMarginOver = $approvalECBug->Expected_save_over;
                          $bugtedMarginPerOver = $approvalECBug->Expected_save_per_over;
                       }
            
                //     $billStore = BillStore::where('project_id', $singleProject->id)->latest()->first();
                //     $billwoGst = $billStore->ttl_bamt ?? "";
            
                    $actualCostStore = ActualCostStore::where('project_id', $singleProject->id)->latest()->first();
                    $actual_cost_gst_rs = $actualCostStore->tolbaseamt ?? "";
            
                //   $acmaramts = '';
                //     if ($billwoGst !== '' && $actual_cost_gst_rs !== '') {
                //         $acmaramts = (float)$billwoGst - (float)$actual_cost_gst_rs;
                //     }
                    
                //     $acmarpers = '';
                //     if ($acmaramts !== '' && $billwoGst !== 0) {
                //         $acmarpers = ($acmaramts / (float)$billwoGst) * 100;
                //         $acmarpers = number_format($acmarpers, 2);
                //     }
                    
                //     $QuoteStore = QuoteStore::where('project_id', $singleProject->id)->latest()->first();

                //     if (empty($QuoteStore)) {
                //         $purchase_order = "Pending";
                //     } else {
                //         $QuoteImage = QuoteImage::where('quoteproject_id', $QuoteStore->id)->latest()->first();
                //         $purchase_order = empty($QuoteImage) ? "Pending" : "Done";
                //     }
                   
                    
                     $totalData[] = [
                        'fy' => $singleProject->financial_year,
                        'bu_no' => $singleProject->bu_number,
                        'project_id' => $singleProject->project_id,
                        'project_owner' => $singleProject->project_csowner,
                        'project_name' => $singleProject->project_name,
                        'opening_date' => $formattedOpenDate,
                        'event_start_date' => $formattedEventStart,
                        'event_end_date' => $formattedEventEnd,
                        'alloted_ops_mag' => $employeeName,
                        'project_head_ops' => $employeeOpsName,
                        'expected_cost_gst' => $expectCostWOGst,
                        'buget_cost_rs' => $bugetedCostwtGst,
                        'amt_save_ec_rs' => $bugtedMargin,
                        'amt_save_ec_per' => $bugtedMarginPer,
                        'amt_excess_over_ec_rs' => $bugtedMarginOver,
                        'amt_excess_over_ec_per' => $bugtedMarginPerOver,
                        'actual_cost_gst_rs' => $actual_cost_gst_rs,
                        'cost_saving_rs' => "",
                        'cost_saving_per' => "",
                        'cost_escalation_rs' => "",
                        'cost_escalation_per' => "",
                    ];
                }
            
                return view('cs.reports.projectprofitabilityops', compact('title', 'nameofthebus', 'selectedBu', 'finayearData', 'totalData'));
            }
            
            
            public function clientbillingpending(Request $request)
            {
                $title = 'Client Billing Pending';
                $user = auth()->user();
                $auth_id = $user->id;
            
                $financialYear = session('financial_year', '');
            
                $finayearData = $financialYear;
                
               $buId = Employee::where('id',$auth_id)->select('nameofthebu_id')->first(); 
                $nameofthebus = NameOfTheBus::where('id',$buId->nameofthebu_id)->where('status', 1)->first();        
               $selectedBusId = $buId->nameofthebu_id;
                $selectedBu = $selectedBusId ?: "";
            
                $allProjects = Project::where('financial_year', $finayearData)
                    ->when($selectedBu && $selectedBu != "all", function ($query) use ($selectedBu) {
                        $query->where('bu_number', $selectedBu);
                    })
                    ->get();
            
                $totalData = [];
            
                foreach ($allProjects as $singleProject) {
                    $formattedOpenDate = Carbon::parse($singleProject->opening_date)->format('d-m-Y');
                    $formattedEventStart = Carbon::parse($singleProject->event_st_date)->format('d-m-Y');
                    $formattedEventEnd = Carbon::parse($singleProject->event_end_date)->format('d-m-Y');
            
                    $employeeData = optional(Employee::find($singleProject->allot_ops))->employee_name;
                    $employeeName = $employeeData ?? "";
            
                    $employeeOpsName = "";
                    $quoteToClient = "";
                    $projectHeadsData = QuoteEcProject::where('project_id', $singleProject->id)->first();
                    if ($projectHeadsData) {
                        $employeeOps = optional(Employee::find($projectHeadsData->ops_head_id))->employee_name;
                        $employeeOpsName = $employeeOps ?? "";
                        $expectCostWOGst = $projectHeadsData->ttl_bamts ?? "";
                    }
            
                    $budgetedCostStore = BudgetedCostStore::where('project_id', $singleProject->id)->latest()->first();
                    $bugetedCostwtGst = $budgetedCostStore->tolbaseamt ?? "";
            
                    $approvalECBug = QuoteBdApproval::where('project_id', $singleProject->id)->latest()->first();
                    $bugtedMargin = "";
                    $bugtedMarginPer = "";
                    $bugtedMarginOver = "";
                    $bugtedMarginPerOver = "";
                    if ($approvalECBug) {
                          $bugtedMargin = $approvalECBug->Expected_save;
                          $bugtedMarginPer = $approvalECBug->Expected_save_per;
                          $bugtedMarginOver = $approvalECBug->Expected_save_over;
                          $bugtedMarginPerOver = $approvalECBug->Expected_save_per_over;
                       }
            
                    $actualCostStore = ActualCostStore::where('project_id', $singleProject->id)->latest()->first();
                    $actual_cost_gst_rs = $actualCostStore->tolbaseamt ?? "";
                    
                    //////////
                    
                     $billData = AccountData::where('project_id', $singleProject->id)->first();
                        if(!empty($billData)){
                            $bill_date = $billData->bill_sub_date;
                        }else{
                            $bill_date = '';
                        }
                        
                        if($bill_date!='' && $bill_date!='NA' && $formattedEventEnd!='' && $formattedEventEnd!='NA'){
                          $bill_to_client_date = date("d-m-Y", strtotime($bill_date));
                            $openingdate = Carbon::parse($formattedEventEnd);
                            $clientapprovaldate = Carbon::parse($bill_to_client_date);
                            $numberOfDays = $openingdate->diffInDays($clientapprovaldate);
                            $statusBill = "Done";
                        }
                        else{
                           $openingdate = Carbon::parse($formattedEventEnd);
                            $clientapprovaldate = Carbon::now();
                            $numberOfDays = $openingdate->diffInDays($clientapprovaldate);
                            $bill_to_client_date = "";
                             $statusBill = "Pending";
                        }
                    
                    ///////////
                   
                    
                     $totalData[] = [
                        'fy' => $singleProject->financial_year,
                        'quater' => $singleProject->project_quarter,
                        'bu_no' => $singleProject->bu_number,
                        'project_id' => $singleProject->project_id,
                        'project_owner' => $singleProject->project_csowner,
                        'project_name' => $singleProject->project_name,
                        'event_end_date' => $formattedEventEnd,
                        'alloted_ops_mag' => $employeeName,
                        'project_head_ops' => $employeeOpsName,
                        'number_of_day_bill' => $numberOfDays,
                        'bill_to_client_date' => $bill_to_client_date,
                        'bill_to_client_status' => $statusBill,
                       
                    ];
                }
            
                return view('cs.reports.clientbillingpending', compact('title', 'nameofthebus', 'selectedBu', 'finayearData', 'totalData'));
            }



       public function notifications()
                {
                    $title = 'Notifications';
                    $user_id = Auth::user()->id;
                
                    // Mark all notifications as read
                    Notification::where('recipient_id', $user_id)
                        ->update(['read' => 1]);
                
                    // Retrieve the updated notifications
                    $allnotifications = Notification::where('recipient_id', $user_id)
                        ->orderByDesc('created_at')
                        ->get();
                
                    return view('management.notifications', compact('title', 'allnotifications'));
                }
                
                
                public function bubottomline(Request $request)
                {
                    $title = 'BU BottomLine - Detail View';
                    $user = auth()->user();
                    $auth_id = $user->id;
                    
                    if (session()->has('financial_year')) {
                        $financialYear = session('financial_year');
                    } else {
                        $financialYear = '';
                    }
                    
                    $finayearData = $financialYear;
                    
                    $nameofthebus = NameOfTheBus::where('status', 1)->get();
                    //$selectedBusId = $request->input('busId');
                    
                    $employeedata = Employee::find($auth_id);
                    $selectedBusId = $employeedata->nameofthebu_id;
                    
                    if ($selectedBusId) {
                        $selectedBu = $selectedBusId;
                    } else {
                        $selectedBu = "";
                        $selectedBusId = "";
                       
                    }
                    
                    if ($selectedBu) {
                        if($selectedBu == "all"){
                             foreach ($nameofthebus as $bu) {
                                $employeesForBu = Employee::where('nameofthebu_id', $bu->id)->get();
                                
                                $allEmployee[$bu->id] = $employeesForBu;
                                }
                    
                                $allEmployee = collect($allEmployee)->flatten();
                        }else{
                            $allEmployee = Employee::where('nameofthebu_id', $selectedBu)->get();
                        }
                     
                        $targetAllocator = TargetAllocator::where('bu_id', $selectedBu)->where('financial_year', $finayearData)->get();
                        
                        
                      $q1projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
                        ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
                        ->where('projects.project_quarter','Q1')
                        ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                            $query->where('projects.bu_number', $selectedBu);
                        })
                        ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
                        ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
                        
                        $q2projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
                        ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
                        ->where('projects.project_quarter','Q2')
                        ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                            $query->where('projects.bu_number', $selectedBu);
                        })
                        ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
                        ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
                        
                        $q3projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
                        ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
                        ->where('projects.project_quarter','Q3')
                         ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                            $query->where('projects.bu_number', $selectedBu);
                        })
                        ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
                        ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
                        
                        $q4projects = Project::join('clients', 'clients.id', '=', 'projects.client_id')
                        ->join('products_of_nykas', 'products_of_nykas.id', '=', 'projects.product_sold')
                        ->where('projects.project_quarter','Q4')
                        ->when($selectedBusId != "all", function ($query) use ($selectedBu) {
                            $query->where('projects.bu_number', $selectedBu);
                        })
                        ->where('projects.financial_year', 'LIKE', trim($financialYear) . '%')
                        ->get(['projects.*', 'products_of_nykas.products_of_nyka','clients.f_name', 'clients.m_name', 'clients.l_name', 'clients.company']);
                        
                    } else {
                        $allEmployee = [];
                        $targetAllocator = [];
                        $finayearData = "";
                        $totalQuater = [];
                        $q1projects = [];
                        $q2projects = [];
                        $q3projects = [];
                        $q4projects = [];
                    }
                    
                    return view('cs.bu_tracker.bubottomline', compact('title', 'nameofthebus', 'selectedBu', 'allEmployee', 'targetAllocator', 'finayearData','q1projects','q2projects','q3projects','q4projects'));
                }


                public function butrackerallcs(Request $request){
                    $title = 'Bu Tracker';
                
                    $projectInfo = [
                        [
                            'info' => [
                                [
                                    'name' => "TopLine + BottomLine Target Status",
                                    'link' => route('cs.butracker.butopbottamstatus'),
                                ],
                                [
                                    'name' => "TopLine Target Status",
                                    'link' => route('cs.butracker.butopstatus'),
                                ],
                                [
                                    'name' => "Top Line Detail",
                                    'link' => route('cs.butracker.toplinedetail'),
                                ],
                                [
                                    'name' => "BottomLine Target Status",
                                    'link' => route('cs.butracker.bubottomstatus'),
                                ],
                            ],
                        ],
                        [
                            'info' => [
                                [
                                    'name' => "BU BottomLine - Detail View",
                                    'link' => route('cs.butracker.bubottomline'),
                                ],
                                [
                                    'name' => "Product Sold",
                                    'link' => route('cs.butracker.buproductsold'),
                                ],
                                [
                                    'name' => "Product Sold Detail",
                                    'link' => route('cs.butracker.buproductsolddetail'),
                                ],
                                [
                                    'name' => "Project Tracking",
                                    'link' => route('cs.butracker.projecttracking'),
                                ],
                            ],
                        ],
                        [
                            'info' => [
                                [
                                    'name' => "Project Status",
                                    'link' => route('cs.butracker.buprojectstatus'),
                                ],
                                [
                                    'name' => "Industry Breakup",
                                    'link' => route('cs.butracker.buindustrybreakup'),
                                ],
                                
                            ],
                        ],
                    ];
                
                    return view('management.headpage', compact('title', 'projectInfo'));
                }





    
    
    





    



    
}
