<?php
namespace App\Repositories;

use App\Models\LoanDetail;

interface LoanRepositoryInterface{
    public function getAllLoan();
    public function processEMI();
}