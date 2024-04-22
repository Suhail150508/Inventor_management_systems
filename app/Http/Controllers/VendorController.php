<?php

namespace App\Http\Controllers;

use App\Models\Expence_Category;
use App\Models\Expence_Invoice;
use App\Models\Return_Invoice;
use App\Models\Return_Product_Invoice;
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

        // $products = Product::all();
        $products = StockProduct::all();

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

        // $invoiceNumber = IdGenerator::generate(['table' => 'purchase_invoices', 'length' => 8, 'prefix' =>'INV-']);
    if( $request->status == 'Recieved'){
        $invoice = new Purchase_invoice;
        // $invoice->id = $invoiceNumber;
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
            $code = $request->code[$i];
            $unit_price = $request->unit_price[$i];
            $qty = $request->qty[$i];
            $total_price = $request->total_price[$i];

            purchase_product::create([
                'product_id' => $product_id,
                'invoice_id' => $invoice->id,
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
            $average_price =  ($old_price * $old_qty + $new_price * $new_qty) / $old_available_qty + $new_qty;
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
    if( $request->status == 'Unpaid'){
        $invoice = new Purchase_invoice;
        // $invoice->id = $invoiceNumber;
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
            $code = $request->code[$i];
            $unit_price = $request->unit_price[$i];
            $qty = $request->qty[$i];
            $total_price = $request->total_price[$i];

            purchase_product::create([
                'product_id' => $product_id,
                'invoice_id' => $invoice->id,
                'code' => $code,
                'unit_price' => $unit_price,
                'qty' => $qty,
                'total_price' => $total_price
            ]);

            $old = StockProduct::where('id',$product_id)->first();
            $old_qty = $old->purchase_upcoming_qty;
            $new_qty = $request->qty[$i];

            $main_qty = $old_qty + $new_qty;
            StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----

                'purchase_upcoming_qty' => $main_qty
            ]);

        }

        // Redirect back after processing
        return redirect()->back()->with('message','Purchase Product created successfully..');
    }


    }

    public function purchaseInvoiceEdit($id){
        $purchase_edits =purchase_product::where('invoice_id',$id)->get();
        $purchase_invoices =Purchase_invoice::find($id);
        $vendorss =Vendor::find($purchase_invoices->id);
        $vendors_info = $vendorss->created_at;
        return view('purchase.purchase_invoice_edit',compact('purchase_edits','purchase_invoices','vendorss'));
    }

    public function purchaseInvoiceUpdate(Request $request){

        if($request->status == 'Paid'){
         // dd($request->all());
            $invoice = Purchase_invoice::find( $request->invoice_id);
            if ($invoice) {
                    // Update the attributes of the Sales_invoice model
                    $invoice->update([
                        'sub_total' => $request->sub_total,
                        'discount' => $request->discount,
                        'total' => $request->total,
                        'paid' => $request->paid,
                        'due' => $request->due,
                        'status' => $request->status,
                    ]);
            }



            $totalItems = count($request->qty);
            for ($i = 0; $i < $totalItems; $i++) {
                $product_id = $request->product_id[$i];
                // $customer_id = $request->customer_id[$i];
                $code = $request->code[$i];
                $unit_price = $request->unit_price[$i];
                $qty = $request->qty[$i];
                $total_price = $request->total_price[$i];

                purchase_product::where('product_id',$product_id)->update([
                    'qty' => $qty,
                    'unit_price' => $unit_price,
                    'total_price' => $total_price
                ]);

                $old = StockProduct::find($product_id);

                $old_qty = $old->total_purchase_qty;
                $old_purchase_upcoming_qty = $old->purchase_upcoming_qty;
                $old_price = $old->product_unit_price;
                $old_available_qty = $old->available_qty;
                $new_qty = $request->qty[$i];
                $new_price = $request->unit_price[$i];

                $main_qty = $old_qty + $new_qty;
                $average_price =  ($old_price * $old_qty + $new_price * $new_qty) / $old_available_qty + $new_qty;
                // dd($main_available );
                $new_available =  $old_available_qty + $new_qty;
                $new_purchase_upcoming_qty = $old_purchase_upcoming_qty - $new_qty;
                StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----
                    'total_purchase_qty' => $main_qty,
                    'product_unit_price' => $average_price,
                    'available_qty' => $new_available,
                    'purchase_upcoming_qty' => $new_purchase_upcoming_qty
                ]);

            }

            // Redirect back after processing
            return redirect()->back()->with('message','Sales Product created successfully..');
        }
    }

        public function purfetchsQty4(Request $request) {
            $selectedValue = $request->input('selectedValue');
            $old_qty_stores = $request->input('old_qty_stores');
            $minimum_qty = $old_qty_stores - $selectedValue;
            $code = $request->input('code');

            // Fetch data based on $selectedValue
            $product = StockProduct::where('code', $code)->first();

            if($product){
                // Adjusting reserve quantity based on the selected value
                $new_purchase_upcoming_qty = $product->purchase_upcoming_qty - $minimum_qty; // Or whatever calculation you need

                // Update the product's reserve quantity
                $product->update(['purchase_upcoming_qty' => $new_purchase_upcoming_qty]);

                return response()->json(['data' => $product]);
            } else {
                // Handle case where product is not found
                return response()->json(['error' => 'Product not found'], 404);
            }
        }

        public function allPInvoice(){
            $purchase_invoices = Purchase_invoice::all();

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

    public function expenceInvoice(){

        $expences = Expence_Invoice::all();
        return view('company.expence_invoice',compact('expences'));
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
    public function expenceInvoiceStore(Request $request){
        $expence = new Expence_Invoice();
        $expence->category_id = $request->category_id;
        $expence->amount = $request->amount;
        $expence->description = $request->description;

        $expence->save();

        return redirect()->back()->with('message','New Expence created successfully..');
    }

    public function expenceInvoiceEdit($id){
        $expence_edit = Expence_Invoice::find($id);
        return view('company.expence_invoice_edit',compact('expence_edit'));

    }

    public function searchExpence(Request $request){
        // dd($request->all());

        $category_id = $request->input('category_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');
        // $all = $request->input('all');

        $expences = Expence_Invoice::all();
        $query = Expence_Invoice::query();

        if ($category_id =='all') {
            session(['selectedCategoryId' => $category_id]);
            return view('company.expence_invoice',compact('expences'));
        }

        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
            session(['selectedCategoryId' => $category_id]);
        }

        if (!empty($date_from)) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($date_to)) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        $expences = $query->get();

        return view('company.expence_invoice',compact('expences'));

    }


    public function searchVendor(Request $request){

        $vendor_id = $request->input('vendor_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        $purchase_invoices = Purchase_invoice::all();
        $query = Purchase_invoice::query();
        $paid_invoice = Paid::query();

        if ($vendor_id =='all') {
            session(['selectedVendorId' => $vendor_id]);
            $paid_invoice = Paid::sum('paid_amount');
            return view('purchase.all_purchase_invoice',compact('purchase_invoices','paid_invoice'));
        }

        if (!empty($vendor_id)) {
            $query->where('vendor_id', $vendor_id);
            $paid_invoice->where('vendor_id', $vendor_id);
            session(['selectedVendorId' => $vendor_id]);
        }

        if (!empty($date_from)) {
            $query->whereDate('created_at', '>=', $date_from);
            $paid_invoice->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($date_to)) {
            $query->whereDate('created_at', '<=', $date_to);
            $paid_invoice->whereDate('created_at', '<=', $date_to);
        }

        $purchase_invoices = $query->get();

        return view('purchase.all_purchase_invoice',compact('purchase_invoices','paid_invoice'));

    }


    public function addCategory(){
        return view('company.add_category');
    }
    public function categoryStore(Request $request){
        $category = new Expence_Category();
        $category->category = $request->category;

        $category->save();

        return redirect()->back()->with('message','New Category created successfully..');
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
    public function allReturnPurchaseInvoice() {
        $purchase_invoices = Return_Invoice::all();
        return view('purchase.all_return_purchase_invoice',compact('purchase_invoices'));
    }
    public function returnPurchaseInvoice() {
        return view('purchase.return_purchase_invoice');
    }

    public function returnPurchaseInvoiceStore(Request $request) {

            // dd($request->all());
            $invoice = new Return_Invoice;
            // $invoice->id = $invoiceNumber;
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
                $code = $request->code[$i];
                $unit_price = $request->unit_price[$i];
                $qty = $request->qty[$i];
                $total_price = $request->total_price[$i];

                Return_Product_Invoice::create([
                    'vendor_id' => $product_id,
                    'product_id' => $product_id,
                    'invoice_id' => $invoice->id,
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

                $main_qty = $old_qty - $new_qty;
                $average_price =  ($old_price * $old_qty + $new_price * $new_qty) / $old_available_qty + $new_qty;
                // dd($main_available );
                $new_available =  $old_available_qty - $new_qty;
                StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----
                    'total_purchase_qty' => $main_qty,
                    'product_unit_price' => $average_price,
                    'available_qty' => $new_available
                ]);


            // Redirect back after processing
        }

        return redirect()->back()->with('message','Purchase Return invoice created successfully..');
    }

    public function returnPurchaseInvoiceEdit($id){
        $purchase_edits = Return_Product_Invoice::where('invoice_id',$id)->get();
        return view('purchase.return_purchase_invoice_edit',compact('purchase_edits'));
    }
}
