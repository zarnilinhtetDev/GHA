<?php

use App\Models\Car;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\InOutController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\AddPaymentController;
use App\Http\Controllers\CarCompanyController;
use App\Http\Controllers\CarExpenseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompanyIncomeController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\ExpenseCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'adminLogin'])->name('admin. login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout']);



Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', function () {
            $car = Car::latest()->get();
            return view('dashboard', compact('car'));
        })->name('dashboard');


        //Car

        Route::match(['get', 'post'], '/cars_register', [CarController::class, 'carsRegister']);

        Route::get('/cars_delete/{id}', [CarController::class, 'delete']);
        Route::get('/cars_show/{id}', [CarController::class, 'show']);
        Route::post('/cars_update/{id}', [CarController::class, 'update']);
        Route::get('/Car_Detail/{id}', [CarController::class, 'car_detail']);

        //Add Payment
        Route::get('/payment-detail/{id}', [AddPaymentController::class, 'add_pay'])->name('payment.detail');
        Route::post('/Add_Payment/{id}', [AddPaymentController::class, 'Add_Payment']);
        Route::get('/payment_delete/{id}', [AddPaymentController::class, 'delete']);
        Route::get('/payment-edit/{id}', [AddPaymentController::class, 'show']);
        Route::post('/payment-update/{id}', [AddPaymentController::class, 'update']);

        //SoldOut
        Route::get('/sold_out_car', [CarController::class, 'soldcar']);
        // Route::get('/soldcar/{id}', [CarController::class, 'soldcar']);
        Route::get('/Soldout_Detail/{id}', [CarController::class, 'Soldout_Detail']);

        Route::any('/soldout_search', [CarController::class, 'search']);


        //Car Buy
        Route::post('/Buying_Price/{id}', [BuyController::class, 'buying_price'])->name('Buying_Price');
        Route::get('/delete-car-price/{carId}', [BuyController::class, 'deleteCarPrice'])->name('delete.car.price');
        Route::post('/buyprice_edit/{id}', [BuyController::class, 'update']);

        //Car Offer
        Route::post('/Offer_Price/{id}', [OfferController::class, 'offer_price'])->name('Offer_Price');

        //Car Expense
        Route::get('/car_expense/{id}', [CarExpenseController::class, 'car_expense']);
        Route::post('/car_expense_store/{id}', [CarExpenseController::class, 'car_expense_store']);
        Route::get('/expense/delete/{id}', [CarExpenseController::class, 'delete'])->name('delete.expense');
        Route::post('/expense/edit/{id}', [CarExpenseController::class, 'update'])->name('edit.expense');

        Route::controller(ExpenseController::class)->group(function () {
            Route::get('/expense', 'expense');
            Route::post('/expense_register', 'register');
            Route::get('/expense_delete/{id}', 'delete');
            Route::get('/expense_show/{id}', 'show');
            Route::post('/expense_update/{id}', 'update');
        });
        Route::get('/expense/filter', [ExpenseController::class, 'filter'])->name('filter.companyExpense');


        //Expense-Category
        Route::controller(ExpenseCategoryController::class)->group(function () {
            Route::get('expense-category', 'expense_category')->name('expense-category');
            Route::post('category_register', 'category_store');
            Route::get('category/delete/{id}', 'category_delete');
            Route::get('category_show/{id}', 'category_show');
            Route::post('category_update/{id}', 'category_update');
        });
        //Daily Expenses
        Route::get('daily_expense', [ExpenseController::class, 'dailyShow']);
        //Account
        Route::get('account', [AccountController::class, 'account']);
        Route::post('/accounts_register', [AccountController::class, 'accountRegister']);
        Route::get('/account', [AccountController::class, 'accountStore']);
        Route::get('/accounts_delete/{id}', [AccountController::class, 'delete']);
        Route::get('/accounts_show/{id}', [AccountController::class, 'show']);
        Route::post('/accounts_update/{id}', [AccountController::class, 'update']);

        //Transaction
        Route::get('/transaction', [TransactionController::class, 'transaction']);
        Route::post('/transaction_register', [TransactionController::class, 'register']);
        Route::get('/transaction_delete/{id}', [TransactionController::class, 'delete']);
        Route::get('/transaction_show/{id}', [TransactionController::class, 'show']);
        Route::post('/transaction_update/{id}', [TransactionController::class, 'update']);

        //Company Income
        Route::get('/company_income', [CompanyIncomeController::class, 'company']);
        Route::post('/companyincome_register', [CompanyIncomeController::class, 'incomeRegister']);
        Route::get('/companyincome_delete/{id}', [CompanyIncomeController::class, 'delete']);
        Route::get('/companyincome_show/{id}', [CompanyIncomeController::class, 'show']);
        Route::post('/companyincome_show/{id}', [CompanyIncomeController::class, 'update'])->name('companyincome.update'); // Added a name for the update route
        Route::post('BuyingCar/{id}', [BuyerController::class, 'buyingCar'])->name('BuyingCar');


        //Car-Company Expenses
        Route::get('car_company_expense', [CarCompanyController::class, 'show']);

        Route::post('search', [CarCompanyController::class, 'filter']);

        Route::get('/expense/filter', [ExpenseController::class, 'filter'])->name('filter.companyExpense');

        //In
        Route::get('/inout', [InOutController::class, 'inout']);
        Route::post('/ya_yan', [InOutController::class, 'inRegister']);

        Route::get('inout_edit/{id}', [InOutController::class, 'show']);
        Route::post('inout_update/{id}', [InOutController::class, 'update'])->name('inout.update');
        Route::get('inout_delete/{id}', [InOutController::class, 'delete']);

        //Out
        Route::post('outRegister', [InOutController::class, 'outRegister']);
        Route::get('out_edit/{id}', [InOutController::class, 'outShow']);
        Route::post('out_update/{id}', [InOutController::class, 'outUpdate']);

        Route::get('user', [UserController::class, 'user_register']);
        Route::post('User_Register', [UserController::class, 'user_store']);
        Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
        Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
        Route::get('/userShow/{id}', [UserController::class, 'userShow']);

        Route::post('/update_user/{id}', [UserController::class, 'update_user']);

        Route::get('/sold_out/filter', [CarController::class, 'filterData'])->name('filter.soldout');

        //Monthly Report
        Route::get('monthly_report', [MonthlyReportController::class, 'index']);
        Route::get('monthly_search', [MonthlyReportController::class, 'search']);

        //Car report
        Route::get('car_report', [MonthlyReportController::class, 'car_report']);
    }
);
