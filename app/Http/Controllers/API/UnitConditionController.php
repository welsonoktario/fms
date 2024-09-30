<?php

namespace App\Http\Controllers\API;

use App\Models\UnitCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UnitConditionController extends APIController
{
    public function index()
    {
        $unitConditions = UnitCondition::query()
            ->orderBy('name', 'asc')
            ->get();

        return Response::json([
            'status' => 'ok',
            'data' => $unitConditions
        ]);
    }
}
