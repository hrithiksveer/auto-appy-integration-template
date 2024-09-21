<?php

namespace App\Shared\Apps\Controller;

use App\Http\Controllers\Controller;
use App\Shared\Apps\Actions\ActionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

abstract class BaseController extends Controller    
{
    abstract protected function getConfigData(Request $request): array;

    // This can be customized based on each controller
    protected function getInputData(Request $request): array
    { 
         return $request->all(); 
    }

    protected function executeAction(Request $request, ActionInterface $action)
    {
        $configData = $this->getConfigData($request);
        $inputData = $this->getInputData($request);

        Log::info('Incoming request', [
            'input_data' => $inputData,
            'config_data' => $configData,
        ]);

        try {
            $response = $action->execute($inputData, $configData);

            Log::info('Action executed successfully', ['response' => $response]);
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error('Error executing action', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
}
