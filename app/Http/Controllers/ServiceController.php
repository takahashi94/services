<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreService;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $service = new Service();

        $service->name = $request->name;
        $service->price = $request->price;
        $service->plan = $request->plan;
        $service->billing_date = $request->billing_date;

        Auth::user()->services()->save($service);

        return response($service, 201);
    }
}
