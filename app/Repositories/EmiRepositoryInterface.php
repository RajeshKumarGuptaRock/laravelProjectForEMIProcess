<?php
namespace App\Repositories;

use App\Models\EmiDetail;

interface EmiRepositoryInterface{
    public function getAllEmi();
    public function createCols();
}