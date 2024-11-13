<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LoanService;
use Illuminate\Support\Facades\DB;

class LoanDetailsController extends Controller
{
    public function __construct(public LoanService $loanService){   
    }
    public function index(){
         $loanDetails = $this->loanService->getAllLoan();
         return view('loan_details.index', compact('loanDetails')); 
    }
    public function processData(){
        $months = $this->loanService->processEMI();
        return redirect()->back();
    }

    public function processDataView(){
        return view('loan_details.process_data');
    }
}
