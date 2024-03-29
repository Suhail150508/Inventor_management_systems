<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Company;
use App\Models\Due_paid_invoice;
use App\Models\Paid;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Purchase_invoice;
use App\Models\purchase_product;
use App\Models\StockProduct;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class VendorController extends Controller
{
    public function showVendor(){

        $vendors = Vendor::all();
        return view('vendor.vendor_create',compact('vendors'));
    }
    public function storeVendor(Request $request){

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->address = $request->address;
        $vendor->vendor_origin = $request->vendor_origin;
        $vendor->email = $request->email;
        $vendor->mobile = $request->mobile;
        $vendor->save();
        return back()->with('message','vendor created successfully');
    }
    public function showProduct(){

        $products = Product::all();

        return view('vendor.all_product',compact('products'));
    }
    public function storeProduct(Request $request){

        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->contact = $request->contact;
        $company->year = $request->year;
        // dd( $request->hasFile('image'),'kk');
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $company->image = $fileName;
        }

        $company->save();

        return redirect()->back()->with('message','company created successfully..');
    }

    public function purchaseInvoice(){

        // $companies = Company::all();
        // return view('purchase.purchase_invoice',compact('companies'));
        return view('purchase.purchase_invoice');
    }
    // public function purchaseInvoiceStore(Request $request){
    //     $purchase = new purchase_product();
    //     $purchase->vendor_id = $request->vendor_id;
    //     $purchase->product_id = $request->product_id;
    //     $purchase->code = $request->code;
    //     $purchase->qty = $request->qty;
    //     $purchase->unit_price = $request->unit_price;
    //     $purchase->total_price = $request->total_price;
    //     $purchase->discount = $request->discount;
    //     $purchase->total = $request->total;
    //     $purchase->paid = $request->paid;
    //     $purchase->due = $request->due;
    //     $purchase->save();
    //     return back()->with('message','Purchase Invoice created successfully');
    // }
    // public function purchaseInvoiceStore(Request $request){


    //     foreach($request->inputs as $key => $value){

    //         $name = $value['name'];
    //         $qty = $value['qty'];
    //         dd($value,'ok');
    //         // purchase_product::create($value);
    //         // return back();
    //     }
    // }

    public function purchaseInvoiceStore(Request $request){
        //   dd($request->all());

        $invoiceNumber = IdGenerator::generate(['table' => 'purchase_invoices', 'length' => 8, 'prefix' =>'INV-']);

        $invoice = new Purchase_invoice;
        $invoice->id = $invoiceNumber;
        $invoice->vendor_id = $request->vendor_id;
        $invoice->sub_total = $request->sub_total;
        $invoice->discount = $request->discount;
        $invoice->total = $request->total;
        $invoice->paid = $request->paid;
        $invoice->due = $request->due;
        $invoice->save();

        $totalItems = count($request->qty);
        for ($i = 0; $i < $totalItems; $i++) {
            $product_id = $request->product_id[$i];
            $invoice_id = $invoiceNumber;
            $code = $request->code[$i];
            $unit_price = $request->unit_price[$i];
            $qty = $request->qty[$i];
            $total_price = $request->total_price[$i];

            purchase_product::create([
                'product_id' => $product_id,
                'invoice_id' => $invoice_id,
                'code' => $code,
                'unit_price' => $unit_price,
                'qty' => $qty,
                'total_price' => $total_price
            ]);

            $old = StockProduct::where('id',$product_id)->first();
            $old_qty = $old->total_purchase_qty;
            $old_price = $old->product_unit_price;
            $old_available_qty = $old->available_qty;
            $new_qty = $request->qty[$i];
            $new_price = $request->unit_price[$i];

            $main_qty = $old_qty + $new_qty;
            $average_price = ($old_price * $old_qty + $new_price * $new_qty) / $old_available_qty;
            // dd($main_available );
            $new_available =  $old_available_qty + $new_qty;
            StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----
                'total_purchase_qty' => $main_qty,
                'product_unit_price' => $average_price,
                'available_qty' => $new_available
            ]);

        }

        // Redirect back after processing
        return redirect()->back()->with('message','Purchase Product created successfully..');
    }

    public function allPInvoice(){
        $purchase_invoices = Purchase_invoice::all();
        // dd($purchase_invoices);

        return view('purchase.all_purchase_invoice',compact('purchase_invoices'));
    }
    public function searchVInvoice(Request $request){
        $id = $request->vendor_id;

        if($request->vendor_id == 'all'){

            $purchase_invoices = Purchase_invoice::all();
            return view('purchase.all_purchase_invoice', compact('purchase_invoices'));
        }

        $purchase_invoices = Purchase_invoice::where('vendor_id', $id)->get();
        return view('purchase.all_purchase_invoice', compact('purchase_invoices'));
    }
    public function duePayInvoice(){

        $paids = Paid::all();
        // return view('purchase.due_payment_invoice',compact('paids'));
        return view('purchase.due_payment_invoice',compact('paids'));
    }
    public function duePayInvoiceCreate(){

        return view('purchase.due_payment_invoice_create');
    }
    public function duePayInvoiceStore(Request $request){
    //    $infos = Due_paid_invoice::find(1);
    //    foreach($infos as $info){
    //     dd($info->vendor_id);
    //    }
        // dd($request->vendor_id);
        $invoice = new Paid;
        $invoice->vendor_id = $request->vendor_id;
        $invoice->description = $request->description;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->save();

        return back()->with('message','Due Amount Paided Successfully');
    }

    public function companyInfo(){

        $companies = Company::all();
        return view('company.create-company',compact('companies'));
    }
    public function comInfoStore(Request $request){
        $product = new Company();
        $product->name = $request->name;
        $product->address = $request->address;
        $product->contact = $request->contact;
        $product->email = $request->email;
        // dd( $request->hasFile('image'),'kk');
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $product->logo = $fileName;
        }

        $product->save();

        return redirect()->back()->with('message','Company Information created successfully..');
    }


    public function fetchData(Request $request) {

        $selectedValue = $request->input('selectedValue');
        // Fetch data based on $selectedValue
        // $data = Vendor::where('id', $selectedValue)->get();
        $data = Vendor::find($selectedValue);
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
        $data =  $product->code;
        // dd($data);
        return response()->json([
          'data'=>  $data
        ]);
    }
}
