<?php

namespace App\Repositories;

use App\Models\EmiDetail;
use Illuminate\Support\Facades\DB;
class EmiRepository implements EmiRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(private EmiDetail $model){    
    }

    public function getAllEmi(){
        return $this->model->all();
    }

    public function createCols(){
          // Get the min and max dates from loan_details table
          $minDate = DB::table('loan_details')->min('first_payment_date');
          $maxDate = DB::table('loan_details')->max('last_payment_date');
         
          // Generate month columns
          $months = [];
          $currentDate = $minDate;
  
          while (strtotime($currentDate) <= strtotime($maxDate)) {
              $months[] = date('Y_M', strtotime($currentDate));
              $currentDate = date('Y-m-d', strtotime("+1 month", strtotime($currentDate)));
          }
          return $months;
    }
}
