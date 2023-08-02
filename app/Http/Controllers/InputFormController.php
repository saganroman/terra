<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputFormRequest;
use App\Http\Services\Contracts\AbstractCalculationService;
use App\Models\Result;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class InputFormController extends Controller
{
    private const PRECISION = 1;

    public function handleInputForm(InputFormRequest $request)
    {
        $resultArray = $this->getCalculationResult($request->validated());
        if (!$resultArray) {

            return Redirect::back()->withErrors(['failure' => ['Data can not be processed! Please try again!']]);
        }

        Result::create([
            'high' => round(max($resultArray), self::PRECISION),
            'average' => round(array_sum($resultArray) / count($resultArray), self::PRECISION),
            'low' => round(min($resultArray), self::PRECISION),
        ]);

        return Redirect::route('result.all');
    }

    private function getCalculationResult(array $validatedData): array
    {
        $directoryPath = app_path(config('services.calculation.directory_path'));

        $resultArray = [];

        $files = File::files($directoryPath);

        foreach ($files as $file) {
            $className = config('services.calculation.namespace') . pathinfo($file, PATHINFO_FILENAME);

            if (class_exists($className) && is_subclass_of($className, AbstractCalculationService::class)) {
                $instance = new $className($validatedData);

                $resultArray[] = $instance->calculate();
            }
        }

        return $resultArray;
    }
}
