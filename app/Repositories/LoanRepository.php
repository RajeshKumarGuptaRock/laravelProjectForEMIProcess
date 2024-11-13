<?php

namespace App\Repositories;

use App\Models\LoanDetail;
use Illuminate\Support\Facades\DB;

class LoanRepository implements LoanRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(private LoanDetail $model){  
    }

    public function getAllLoan(){
        return $this->model->all();
    }

    public function processEMI(){
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

        // Drop the table if it exists
        DB::statement('DROP TABLE IF EXISTS emi_details');
       
        // Create the new table dynamically with clientid and month columns
        array_unshift($months,'clientid');
        $columns = $months;

        $sql = 'CREATE TABLE emi_details (' . implode(' VARCHAR(255), ', $columns) . ' VARCHAR(255))';
        DB::statement($sql);

        // Populate the emi_details table with EMI values
        $loanDetails = DB::table('loan_details')->get();
        
        foreach ($loanDetails as $loan) {
            $emiAmount = $loan->loan_amount / $loan->num_of_payment;
            $emiValues = [];
            $currentDate = $loan->first_payment_date;
            for ($i = 0; $i < $loan->num_of_payment; $i++) {
                $month = date('Y_M', strtotime($currentDate));
                $emiValues[$month] = $emiAmount;
                $currentDate = date('Y-m-d', strtotime("+1 month", strtotime($currentDate)));
            }
           
            // Adjust the last month value to ensure total EMI matches loan amount
            $totalEmi = array_sum($emiValues);
       
            // Insert data into emi_details
            DB::table('emi_details')->insert(array_merge(['clientid' => $loan->clientid], $emiValues));
        }
    }
}
