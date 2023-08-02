<?php

namespace App\Http\Services\Contracts;

abstract class AbstractCalculationService
{
    public function __construct(array $validatedData)
    {
        foreach ($validatedData as $key => $value) {

            $this->$key = $value;
        }
    }

    public abstract function calculate(): float;

    protected function factorial(int $number): int
    {
        if ($number <= 1) {
            return 1;
        } else {
            return $number * $this->factorial($number - 1);
        }
    }
}
