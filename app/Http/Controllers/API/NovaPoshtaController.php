<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\NovaPoshta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NovaPoshtaController extends Controller
{
    public function cities(Request $request){
        if (isset($request->area)){
            $cities = NovaPoshta::getCities($request->area);
            return response()->json($cities, 200);
        }
        return response()->json([], 200);
    }

    public function warehouses(Request $request){
        if (isset($request->city)){
            $warehouses = NovaPoshta::getWarehouses($request->city);
            return response()->json($warehouses, 200);
        }
        return response()->json([], 200);
    }
}
