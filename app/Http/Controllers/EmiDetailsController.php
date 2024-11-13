<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmiDetail;
use App\Services\EmiService;
use App\Repositories\EmiRepositoryInterface;
use Illuminate\Support\Facades\DB;
class EmiDetailsController extends Controller
{
    public function __construct(public EmiService $emiService){
    }
    public function index(){
        $months = $this->emiService->createCols();
        $emiDetails = $this->emiService->getAllEmi();
        return view('emi_details.index', compact('emiDetails','months'));
    }
}
