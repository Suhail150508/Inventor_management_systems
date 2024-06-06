<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Due_Sales_Payment;
use App\Models\Expence_Invoice;
use App\Models\Return_Sales_Invoice;
use App\Models\Return_Sales_Product_Invoice;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Models\Sales_invoice;
use Illuminate\Support\Facades\DB;
use App\Models\Sales_product_invoice;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SalesProductController extends Controller
{
    public function allSalesInv(){
        $sales_invoices = Sales_invoice::orderByRaw("CASE WHEN status = 'Unpaid' THEN 0 ELSE 1 END") // Order unpaid first
        ->orderBy('created_at', 'desc')
        ->paginate(6); // Retrieve the records

        $due_sales_payment = Due_Sales_Payment::paginate(5);
        return view('sales.all_sales_invoice',compact('sales_invoices','due_sales_payment'));
    }
    public function SalesInvoice(){
        return view('sales.sales_invoice_create');
    }

    public function slfetchsQty(Request $request) {
        $selectedValue = $request->input('selectedValue');
        $old_qty_stores = $request->input('old_qty_stores');
        $minimum_qty = $old_qty_stores - $selectedValue;
        $code = $request->input('code');

        // Fetch data based on $selectedValue
        $product = StockProduct::where('code', $code)->first();

        if($product){
            // Adjusting reserve quantity based on the selected value
            $new_reserve_qty = $product->reserve_qty - $minimum_qty; // Or whatever calculation you need

            // Update the product's reserve quantity
            $product->update(['reserve_qty' => $new_reserve_qty]);

            return response()->json(['data' => $product]);
        } else {
            // Handle case where product is not found
            return response()->json(['error' => 'Product not found'], 404);
        }
    }


    // public function slfetchsQty(Request $request) {
    //     $selectedValue = $request->input('selectedValue');
    //     $old_qty_stores = $request->input('old_qty_stores');
    //     $minimum_qty = $old_qty_stores - $selectedValue;
    //     $code = $request->input('code');
    //     // Fetch data based on $selectedValue
    //     $product = StockProduct::where('code',$code);
    //     if($product){
    //         $old_reserve_qty = $product->reserve_qty + 1;
    //         // $minus_reserve_qty = $old_reserve_qty - $minimum_qty;

    //         $data = $product->update(
    //             [
    //                 'reserve_qty'=>$old_reserve_qty
    //                 // 'reserve_qty'=>$selectedValue
    //             ]
    //         );
    //         // dd($data);
    //         // return response()->json($data);
    //         return response()->json([
    //             'data'=>  $data
    //           ]);
    //     }
    // }



    public function fetchData(Request $request) {
        // dd($request->all());
        $selectedValue = $request->input('selectedValue');
        // Fetch data based on $selectedValue
        // $data = Vendor::where('id', $selectedValue)->get();
        $data = Customer::find($selectedValue);
        return response()->json($data);
    }
    public function fetchsCode(Request $request) {
        $selectedValue = $request->input('selectedValue');
        // Fetch data based on $selectedValue
        $product = StockProduct::find( $selectedValue);
        $data =  $product->code;
        // dd($data);
        return response()->json($data);
    }
    public function fetchCode(Request $request) {
        $selectedValue = $request->input('selectedValue');
        // Fetch data based on $selectedValue
        $product = StockProduct::find( $selectedValue);
        $avl_qty =  $product->available_qty;
        $data =  $product->code;
        // dd($data);
        return response()->json([
          'data'=>  $data,
          'avl_qty' => $avl_qty
        ]);
    }

    public function salesInvoiceStore(Request $request){
        // $invoiceNumber = IdGenerator::generate(['table' => 'sales_invoices', 'length' => 8, 'prefix' =>'INV-']);
        if($request->status == 'paid'){

            $invoice = new Sales_invoice;
            // $invoice->id = $invoiceNumber;
            $invoice->customer_id = $request->customer_id;
            $invoice->sub_total = $request->sub_total;
            $invoice->discount = $request->discount;
            $invoice->total = $request->total;
            $invoice->paid = $request->paid;
            $invoice->due = $request->due;
            $invoice->status = $request->status;

            $invoice->save();


            $totalItems = count($request->qty);
            for ($i = 0; $i < $totalItems; $i++) {
                $product_id = $request->product_id[$i];
                $code = $request->code[$i];
                $unit_price = $request->unit_price[$i];
                $qty = $request->qty[$i];
                $total_price = $request->total_price[$i];

                Sales_product_invoice::create([
                    'product_id' => $product_id,
                    'invoice_id' => $invoice->id,
                    'customer_id' => $request->customer_id,
                    'code' => $code,
                    'unit_price' => $unit_price,
                    'qty' => $qty,
                    'total_price' => $total_price
                ]);

                $old = StockProduct::find($product_id);
                $old_qty = $old->total_sold_qty;
                $old_price = $old->product_unit_price;
                $old_available_qty = $old->available_qty;
                $new_qty = $request->qty[$i];
                $new_price = $request->unit_price[$i];

                $main_qty = $old_qty + $new_qty;
                $average_price = ($old_price + $new_price) / 2;
                $new_available =  $old_available_qty - $new_qty;
                StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----
                    'total_sold_qty' => $main_qty,
                    'available_qty' => $new_available
                ]);

            }

            // Redirect back after processing
            return redirect('all-sales-invoice')->with('message','Purchase Product created successfully..');
        }

        if($request->status == 'Unpaid'){

            $invoice = new Sales_invoice;
            $invoice->customer_id = $request->customer_id;
            $invoice->sub_total = $request->sub_total;
            $invoice->discount = $request->discount;
            $invoice->total = $request->total;
            $invoice->paid = $request->paid;
            $invoice->due = $request->due;
            $invoice->status = $request->status;
            $invoice->save();


            // Create the sales product invoices
            $totalItems = count($request->qty);
            for ($i = 0; $i < $totalItems; $i++) {
                $product_id = $request->product_id[$i];
                $code = $request->code[$i];
                $unit_price = $request->unit_price[$i];
                $qty = $request->qty[$i];
                $total_price = $request->total_price[$i];

                // Create sales product invoice and associate it with the invoice
                Sales_product_invoice::create([
                    'product_id' => $product_id,
                    'invoice_id' => $invoice->id, // Use the obtained invoice ID
                    'customer_id' => $request->customer_id,
                    'code' => $code,
                    'unit_price' => $unit_price,
                    'qty' => $qty,
                    'total_price' => $total_price
                ]);

                // Update the stock quantity
                $old = StockProduct::find($product_id);
                $old_qty = $old->reserve_qty;
                $new_qty = $request->qty[$i];

                $main_qty = $old_qty + $new_qty;
                StockProduct::find($product_id)->update([
                    'reserve_qty' => $main_qty,
                ]);
            }

            // // Redirect back after processing
            return redirect()->back()->with('message','Sales Product reserved successfully..');

        }

    }
    public function salesInvoiceUpdate(Request $request){

        // dd($request->all());
        if($request->status == 'Paid'){
            $invoice = Sales_invoice::find( $request->invoice_id);
            if ($invoice) {
                    // Update the attributes of the Sales_invoice model
                    $invoice->update([
                        'sub_total' => $request->sub_total,
                        'discount' => $request->discount,
                        'total' => $request->total,
                        'paid' => $request->paid,
                        'due' => $request->due,
                        'status' =>'Paid',
                    ]);



            $totalItems = count($request->qty);
            for ($i = 0; $i < $totalItems; $i++) {
                $product_id = $request->product_id[$i];
                // $customer_id = $request->customer_id[$i];
                $code = $request->code[$i];
                $unit_price = $request->unit_price[$i];
                $qty = $request->qty[$i];
                $total_price = $request->total_price[$i];

                Sales_product_invoice::where('product_id',$product_id)->update([
                    'qty' => $qty,
                    'unit_price' => $unit_price,
                    'total_price' => $total_price
                ]);

                $old = StockProduct::find($product_id);
                $old_qty = $old->total_sold_qty;
                $old_reserve_qty = $old->reserve_qty;
                $old_available_qty = $old->available_qty;
                $new_qty = $request->qty[$i];

                $main_qty = $old_qty + $new_qty;
                $new_available =  $old_available_qty - $new_qty;
                $new_reserve_qty = $old_reserve_qty - $new_qty;
                StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----
                    'total_sold_qty' => $main_qty,
                    'available_qty' => $new_available,
                    'reserve_qty' => $new_reserve_qty
                ]);

            }

            // Redirect back after processing
            return redirect('all-sales-invoice')->with('message','Sales Product created successfully.');
        }
    }
}

        public function salesInvoiceEdit($id){

            $sales_edits =Sales_product_invoice::where('invoice_id',$id)->get();
            $sales_invoice_edits =Sales_invoice::find($id);
            $customer_edits =Customer::find($sales_invoice_edits->customer_id);
            // dd($sales_invoice_edits,$customer_edits);
            return view('sales.sales_invoice_edit',compact('sales_edits','sales_invoice_edits','customer_edits'));
        }
        public function salesInvoiceShow($id){

            $sales_edits =Sales_product_invoice::where('invoice_id',$id)->get();
            $sales_invoice_edits =Sales_invoice::find($id);
            $customer_edits =Customer::find($sales_invoice_edits->customer_id);
            // dd($sales_invoice_edits,$customer_edits);
            return view('sales.sales_invoice_show',compact('sales_edits','sales_invoice_edits','customer_edits'));
        }
        public function returnSalesInvoiceEdit($id){
            $return_sales_invoice =Return_Sales_invoice::find($id);
            // dd($return_sales_invoice->customer_id);
            $return_sales_edits =Return_Sales_product_invoice::where('invoice_id',$id)->get();
            $customer_edits =Customer::find($return_sales_invoice->customer_id);

            // $return_sales_edits = $return_sales_invoice->merge($return_sales_editss);
            // dd($sales_edits);
            return view('sales.return_sales_invoice_edit',compact('return_sales_edits','return_sales_invoice','customer_edits'));
        }


        public function returnSalesInvoice(){

            return view('sales.return_sales_invoice');
        }
        public function allReturnSalesInvoiceStore(){
            $sales_invoices = Return_Sales_Invoice::all();

            return view('sales.all_return_sales_invoice',compact('sales_invoices'));
        }
        public function returnSalesInvoiceStore(Request $request){
            // dd($request->all());
                $invoice = new Return_Sales_Invoice;
                $invoice->customer_id = $request->customer_id;
                $invoice->sub_total = $request->sub_total;
                $invoice->discount = $request->discount;
                $invoice->total = $request->total;
                $invoice->paid = $request->paid;
                $invoice->due = $request->due;

                $invoice->save();


                $totalItems = count($request->qty);
                for ($i = 0; $i < $totalItems; $i++) {
                    $product_id = $request->product_id[$i];
                    $code = $request->code[$i];
                    $unit_price = $request->unit_price[$i];
                    $qty = $request->qty[$i];
                    $total_price = $request->total_price[$i];

                    Return_Sales_Product_Invoice::create([
                        'product_id' => $product_id,
                        'invoice_id' => $invoice->id,
                        'customer_id' => $request->customer_id,
                        'code' => $code,
                        'unit_price' => $unit_price,
                        'qty' => $qty,
                        'total_price' => $total_price
                    ]);

                    $old = StockProduct::find($product_id);
                    $old_qty = $old->total_sold_qty;
                    $old_price = $old->product_unit_price;
                    $old_available_qty = $old->available_qty;
                    $new_qty = $request->qty[$i];
                    $new_price = $request->unit_price[$i];

                    $main_qty = $old_qty - $new_qty;
                    $new_available =  $old_available_qty + $new_qty;
                    // dd($main_qty,$new_available);
                    StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----
                        'total_sold_qty' => $main_qty,
                        'available_qty' => $new_available
                    ]);

                }
                     return redirect()->back()->with('message','Purchase Product created successfully..');

        }

        public function duePaySales(){

            $paid_invoices = Due_Sales_Payment::all();
            return view('sales.due_sales_payment',compact('paid_invoices'));
        }
        public function duePayInvoiceCreate(){
            $paids = Due_Sales_Payment::all();
            return view('sales.due_sales_payment_create',compact('paids'));
        }

        public function duePayInvoiceStore(Request $request){
            //    $infos = Due_paid_invoice::find(1);
            //    foreach($infos as $info){
            //     dd($info->vendor_id);
            //    }
                // dd($request->vendor_id);
                $invoice = new Due_Sales_Payment;
                $invoice->customer_id = $request->customer_id;
                $invoice->paid_amount = $request->paid_amount;
                $invoice->discount = $request->discount;
                $invoice->description = $request->description;
                $invoice->save();

                return back()->with('message','Due Amount Paided Successfully');
            }

    public function customerDuePayInvoices(Request $request){


        $customer_id = $request->input('customer_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        $paid_invoices = Due_Sales_Payment::all();
        $query = Due_Sales_Payment::query();
        $due_paid_purchase = Due_Sales_Payment::where('customer_id', $customer_id)->get();

        if ($customer_id =='all') {
            session(['selectedCustomerId' => $customer_id]);

            if (!empty($date_from)) {
                $query->whereDate('created_at', '>=', $date_from);
            }

            if (!empty($date_to)) {
                $query->whereDate('created_at', '<=', $date_to);
            }

            $paid_invoices = $query->get();
            return view('sales.due_sales_payment',compact('paid_invoices'));
        }

        if (!empty($customer_id)) {
            $query->where('customer_id', $customer_id);
            session(['selectedCustomerId' => $customer_id]);
        }

        if (!empty($date_from)) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($date_to)) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        $paid_invoices = $query->get();

        return view('sales.due_sales_payment',compact('paid_invoices'));

    }

}
