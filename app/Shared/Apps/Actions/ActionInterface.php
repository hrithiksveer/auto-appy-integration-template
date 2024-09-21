<?php
namespace App\Shared\Apps\Actions;

interface ActionInterface
{
    public function execute(array $inputData,$configData): array;    
}
