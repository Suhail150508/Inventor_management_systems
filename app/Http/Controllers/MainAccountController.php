<?php

namespace App\Http\Controllers;

use App\Models\Amount_invest;
use App\Models\Amount_withdraw;
use App\Models\Main_account;
use Illuminate\Http\Request;

class MainAccountController extends Controller
{
  public function mainAccount(){

    $main_account = Main_account::sum('total_amount');

    $total_amount_invest = Amount_invest::sum('amount');
    $total_amount_withdraw = Amount_withdraw::sum('return_amount');

    $total_account = $main_account + $total_amount_invest - $total_amount_withdraw;
    // dd($total_account);



    return view('account.main_account',compact('total_account'));
  }
}
