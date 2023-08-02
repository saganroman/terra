<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\AbstractCalculationService;

class RootCalculationService extends AbstractCalculationService
{

    public function calculate(): float
    {

       return sqrt($this->input2);
    }
}
