<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $recipes = Recipe::all();
        return view('admin.dashboard', compact('recipes'));
    }

    public function customerDashboard()
    {
        return view('customer.dashboard');
    }
}
