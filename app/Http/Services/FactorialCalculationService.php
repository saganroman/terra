<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\AbstractCalculationService;

class FactorialCalculationService extends AbstractCalculationService
{

    public function calculate(): float
    {

       return $this->factorial($this->input1);
    }
}
