<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Buyer;
use App\Models\Expense;
use App\Models\AddPayment;
use App\Models\CarExpense;
use App\Models\CompanyIncome;
use App\Models\InOut;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MonthlyReportController extends Controller
{
    public function index()
    {
        return view('blade.monthly_report.monthly_report');
    }
    public function car_report()
    {
        return view('blade.monthly_report.car_report');
    }
}
