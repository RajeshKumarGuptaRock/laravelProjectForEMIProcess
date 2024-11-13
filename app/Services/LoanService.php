<?php

namespace App\Services;

use App\Repositories\LoanRepositoryInterface;

class LoanService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public LoanRepositoryInterface $loanRepository){
    }
    
    public function getAllLoan(){
        return $this->loanRepository->getAllLoan();
    }
    public function processEMI(){
        return $this->loanRepository->processEMI();
    }
}
