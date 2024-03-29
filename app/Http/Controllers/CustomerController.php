<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Customer_invoice;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
   public function customers(){
    $customers = Customer::all();
    return view('customer.All_customer',compact('customers'));
   }
   public function customerCreate(){
    return view('customer.customer_create');
   }

   public function customerStore(Request $request)
   {
       // dd($request->all());
       $customer_information = new Customer();
       $customer_information->name = $request->name;
       $customer_information->email = $request->email;
       $customer_information->mobile = $request->mobile;

       if ($request->hasFile('image')) {
           $file = $request->image;
           $extension = $file->getClientOriginalExtension();
           $fileName = time() . '.' . $extension;
           $file->move('teacher', $fileName);
           $customer_information->image = $fileName;
       }

       $customer_information->save();



       return redirect()->back()->with('message','customer created successfully..');
   }

public function customerEdit($id){
    $editinvestor = Customer::findOrFail($id);
    return view('customer.customer_update',compact('editinvestor'));
}
public function customerUpdate(Request $request, $id)
{
    $user = Customer::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->mobile = $request->mobile;

    if ($request->image) {
        if ($user->image) {

            unlink(public_path('teacher/' . $user->image));
        }

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move('teacher', $fileName);
        $user->image = $fileName;
    }

    $user->save();

    return back();
}

public function AllCustomerInvoice(){

    $customer_invoices = Customer_invoice::all();

    return view('customer.customer_invoice',compact('customer_invoices'));
}
public function CustomerInvoiceAdd(Request $request){

    $customer_information = new Customer_invoice();
    $customer_information->customer_id = $request->customer_id;
    $customer_information->total_amount = $request->total_amount;
    $customer_information->due_amount = $request->due_amount;
    $customer_information->date = $request->date;
    $customer_information->status = $request->status;

    $customer_information->save();

    return back();
}

public function invoiceDetails($id){
    $customer = Customer::find($id);
    return view('investor.invoice_details',compact('customer'));
    // return view('investor.return_amount');
}

public function customerDelete($id){
    DB::beginTransaction();
    try {
        $delete = Customer::find($id)->delete();
        DB::commit($delete);
        return back();
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e);
    }

}

public function status(Request $request, $id)
{
    $posts =  Customer::find($id);

    if($posts->status == 'Active'){
        $posts->update(['status'=>'Inactive']);

    }
    else{
        $posts->update(['status'=>'Active']);
    }
    return redirect()->back()->with('message','changed subCategory');
 }



 public function searchCustomer(Request $request){

    $search = $request->search;
    $customers = Customer::where(function($query)use($search){
        $query->where('name','like',"%$search%")
        ->orWhere('email','like',"%$search%")
        ->orWhere('mobile','like',"%$search%");
             })->paginate(6);

    // $students = NewStudent::where('class','LIKE','%'.$request->class.'%');
    return view('customer.All_customer',compact('customers'));

}
 public function searchInvoice(Request $request, $id){

    $customer_invoices = Customer_invoice::find($id);

    return view('customer.customer_invoice',compact('customer_invoices'));


}


}
