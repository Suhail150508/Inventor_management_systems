<?php

namespace App\Http\Controllers;

use App\Models\Amount_invest;
use App\Models\Amount_withdraw;
use App\Models\Expence_Invoice;
use App\Models\Main_account;
use App\Models\Purchase_invoice;
use App\Models\Sales_invoice;
use Illuminate\Http\Request;

class MainAccountController extends Controller
{
  public function mainAccount(){

    $main_account = Main_account::sum('total_amount');

    $total_amount_invest = Amount_invest::sum('amount');
    $total_amount_withdraw = Amount_withdraw::sum('return_amount');
    $paid_purchase_product = Purchase_invoice::sum('paid');
    $paid_sales_product = Sales_invoice::sum('paid');
    $return_purchase_product = Purchase_invoice::sum('paid');
    $return_sales_product = Sales_invoice::sum('paid');
    $expence = Expence_Invoice::sum('amount');

    $total_account = $main_account + $total_amount_invest - $total_amount_withdraw - $paid_purchase_product + $paid_sales_product - $expence;
    // dd($total_account);



    return view('account.main_account',compact('total_account'));
  }
}
