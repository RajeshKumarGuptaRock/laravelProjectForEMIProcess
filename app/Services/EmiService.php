<?php

namespace App\Services;

use App\Repositories\EmiRepositoryInterface;

class EmiService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public EmiRepositoryInterface $emiRepository){
    }
    
    public function getAllEmi(){
        return $this->emiRepository->getAllEmi();
    }

    public function createCols(){
        return $this->emiRepository->createCols(); 
    }
}
