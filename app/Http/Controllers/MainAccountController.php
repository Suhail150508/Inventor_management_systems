<?php

namespace App\Http\Controllers;

use App\Models\Amount_invest;
use App\Models\Amount_withdraw;
use App\Models\Due_Sales_Payment;
use App\Models\Expence_Invoice;
use App\Models\Main_account;
use App\Models\Paid;
use App\Models\Purchase_invoice;
use App\Models\Return_Invoice;
use App\Models\Return_Sales_Invoice;
use App\Models\Sales_invoice;
use Illuminate\Http\Request;

class MainAccountController extends Controller
{
  public function mainAccount(){

    // @$main_account = Main_account::sum('total_amount');

    // @$total_amount_invest = Amount_invest::sum('amount');
    // @$total_amount_withdraw = Amount_withdraw::sum('amount');

    // @$paid_purchase_product = Purchase_invoice::where('status','Paid')->sum('paid');
    // @$return_purchase_product = Purchase_invoice::where('status','Paid')->sum('due');

//    @$purchase_return = Return_Invoice::sum('paid');
    // @$due_payment_purchase = Paid::sum('paid_amount');

    // @$expence = Expence_Invoice::sum('amount');

    // @$paid_sales_product = Sales_invoice::where('status','Paid')->sum('paid');
    // @$sales_invoice_due = Sales_invoice::where('status','Paid')->sum('due');
    // @$return_sales = Return_Sales_Invoice::sum('paid');
    // @$due_payment_sales = Due_Sales_Payment::sum('paid_amount');


    // $total_account = (
    //     @$main_account +
    //     @$total_amount_invest -
    //     @$total_amount_withdraw -
    //     @$paid_purchase_product +
    //     @$paid_sales_product -
    //     @$expence +
    //     @$due_payment_sales -
    //     @$due_payment_purchase -
    //     @$return_sales +
    //    @$purchase_return
    // );

// @$main_account_update = Main_account::find(1);
// if(@$main_account_update){

//     $main_account_update->update([
//         'total_amount' => $total_account
//     ]);
// }else{
//     $insert = new Main_account();
//     $insert->total_amount = $total_account;
//     $insert->save();
// }


    // $customer_due_account =( @$sales_invoice_due - @$due_payment_sales );
    // $vendor_due_account =( @$return_purchase_product - @$due_payment_purchase );



    @$main_account_update = Main_account::find(1);
    $total_account = @$main_account_update->total_amount;
    $customer_due_account = @$main_account_update->customer_due;
    $vendor_due_account = @$main_account_update->supliyer_due;

    return view('account.main_account',compact('total_account','customer_due_account', 'vendor_due_account'));
  }
  public function mainAccountReport(){

    // @$main_account = Main_account::sum('total_amount');

    // @$total_amount_invest = Amount_invest::sum('amount');
    // @$total_amount_withdraw = Amount_withdraw::sum('amount');

    // @$paid_purchase_product = Purchase_invoice::where('status','Paid')->sum('paid');
    // @$return_purchase_product = Purchase_invoice::where('status','Paid')->sum('due');

//    @$purchase_return = Return_Invoice::sum('paid');
    // @$due_payment_purchase = Paid::sum('paid_amount');

    // @$expence = Expence_Invoice::sum('amount');

    // @$paid_sales_product = Sales_invoice::where('status','Paid')->sum('paid');
    // @$sales_invoice_due = Sales_invoice::where('status','Paid')->sum('due');
    // @$return_sales = Return_Sales_Invoice::sum('paid');
    // @$due_payment_sales = Due_Sales_Payment::sum('paid_amount');


    // $total_account = (
    //     @$main_account +
    //     @$total_amount_invest -
    //     @$total_amount_withdraw -
    //     @$paid_purchase_product +
    //     @$paid_sales_product -
    //     @$expence +
    //     @$due_payment_sales -
    //     @$due_payment_purchase -
    //     @$return_sales +
    //    @$purchase_return
    // );

// @$main_account_update = Main_account::find(1);
// if(@$main_account_update){

//     $main_account_update->update([
//         'total_amount' => $total_account
//     ]);
// }else{
//     $insert = new Main_account();
//     $insert->total_amount = $total_account;
//     $insert->save();
// }


    // $customer_due_account =( @$sales_invoice_due - @$due_payment_sales );
    // $vendor_due_account =( @$return_purchase_product - @$due_payment_purchase );



    @$main_account_update = Main_account::find(1);
    $total_account = @$main_account_update->total_amount;
    $customer_due_account = @$main_account_update->customer_due;
    $vendor_due_account = @$main_account_update->supliyer_due;

    return view('account.main_account',compact('total_account','customer_due_account', 'vendor_due_account'));
  }
}
