<?php

namespace App\Http\Controllers;

use App\Models\Paid;
use App\Models\Vendor;
use App\Models\Company;
use App\Models\Product;
use App\Models\Main_account;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Models\Return_Invoice;
use App\Models\Expence_Invoice;
use App\Models\Due_paid_invoice;
use App\Models\Expence_Category;
use App\Models\Purchase_invoice;
use App\Models\purchase_product;
use Illuminate\Support\Facades\DB;
use App\Models\Return_Product_Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class VendorController extends Controller
{
    public function showVendor(){

        $vendors = Vendor::all();
        return view('vendor.vendor_create',compact('vendors'));
    }
    public function showVendorReport(){

        $vendors = Vendor::all();
        return view('vendor.vendor_create',compact('vendors'));
    }
    public function CreateVendor(){

        return view('purchase.vendor_create');
    }
    public function storeVendor(Request $request){
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->address = $request->address;
        $vendor->vendor_origin = $request->vendor_origin;
        $vendor->email = $request->email;
        $vendor->mobile = $request->mobile;
        $vendor->save();
        return redirect('show-vendor')->with('message','vendor created successfully');
    }
    public function VendorEdit($id){
        $edit_vendors = Vendor::find($id);
        return view('vendor.vendor_update',compact('edit_vendors'));
    }
    public function VendorUpdate(Request $request, $id){
        $update_vendors = Vendor::find($id);
        $update_vendors->name = $request->name;
        $update_vendors->email = $request->email;
        $update_vendors->address = $request->address;
        $update_vendors->mobile = $request->mobile;
        $update_vendors->vendor_origin = $request->vendor_origin;
        $update_vendors->save();
        return redirect('show-vendor')->with('message', 'Vendor Updated Successfully');
    }

    public function vendorDelete($id){

        $vendor_deletes = Purchase_invoice::where('vendor_id',$id)->get();
        foreach($vendor_deletes as $vendor){

            if($vendor){

                return redirect('show-vendor')->with('message','Already invoice created by this Vendor');

            }
        }

        DB::beginTransaction();
        try {
            $delete = Vendor::find($id)->delete();
            DB::commit($delete);
            return redirect('show-vendor')->with('message','Vendor Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
    public function showProduct(){

        $products = StockProduct::all();

        return view('vendor.all_product',compact('products'));
    }
    public function allProductInfo(){

        $products = Product::all();

        return view('vendor.purchase_product',compact('products'));
    }
    public function allProductInfoReport(){

        $products = Product::all();

        return view('vendor.purchase_product',compact('products'));
    }

    public function PurchaseProduct(){

        return view('vendor.create_purchase_product');
    }

    private function generateUniqueCode() {
        do {
            $code = mt_rand(1000, 9999); // Generates a random 6-digit number
        } while (Product::where('code', $code)->exists());

        return $code;
    }

    public function PurchaseProductStore(Request $request){
        // $request->validate([
        //     'code' => 'required|unique:product,code',
        // ]);
        $product = new Product();
        $product->name = $request->name;
        $product->code = $this->generateUniqueCode();
        $product->origin = $request->origin;
        $product->year = $request->year;
        $product->unit_amount = $request->unit_amount;
        $product->sales_amount = $request->sales_amount;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->expire_date = $request->expire_date;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $product->image = $fileName;
        }

        $product->save();

        // $stock = new StockProduct();
        // $stock->name = $request->name;
        // $stock->code = $product->code;
        // $stock->save();

        return redirect('all-product-info')->with('message','Product created successfully..');
    }

    public function PurchaseProductEdit($id){
        $edit_product = Product::findOrFail($id);
        return view('vendor.product_edit',compact('edit_product'));
    }
    public function PurchaseProductUpdate(Request $request, $id){
        $update_product = Product::findOrFail($id);
        $update_product->name = $request->name;
        $update_product->code = $request->code;
        $update_product->origin = $request->origin;
        $update_product->year = $request->year;
        $update_product->unit_amount = $request->unit_amount;
        $update_product->sales_amount = $request->sales_amount;
        $update_product->quantity = $request->quantity;
        $update_product->status = $request->status;
        $update_product->expire_date = $request->expire_date;

        if ($request->image) {
            if ($update_product->image) {

                unlink(public_path('teacher/' . $update_product->image));
            }

            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $update_product->image = $fileName;
        }

        $update_product->save();

        return redirect('all-product-info')->with('message','Product Updated successfully.');
    }

    public function PurchaseProductDelete($id){
        $delete_product = Product::findOrFail($id)->delete();

        if($delete_product){

            return redirect('all-product-info')->with('message','Product Deleted successfully.');
        }
    }

    public function storeProduct(Request $request){

        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->contact = $request->contact;
        $company->year = $request->year;

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

        return view('purchase.purchase_invoice');
    }

    // public function purchaseInvoiceStore(Request $request){
    //     // dd($request->all());

    //     if( $request->status == 'Paid'){
    //         $invoice = new Purchase_invoice;
    //         // $invoice->id = $invoiceNumber;
    //         $invoice->vendor_id = $request->vendor_id;
    //         $invoice->sub_total = $request->sub_total;
    //         $invoice->discount = $request->discount;
    //         $invoice->total = $request->total;
    //         $invoice->paid = $request->paid;
    //         $invoice->status = $request->status;
    //         $invoice->due = $request->due;
    //         $invoice->save();
    //         $totalItems = count($request->qty);
    //         for ($i = 0; $i < $totalItems; $i++) {
    //             $product_id = $request->product_id[$i];
    //             $code = $request->code[$i];
    //             $unit_price = $request->unit_price[$i];
    //             $qty = $request->qty[$i];
    //             $total_price = $request->total_price[$i];

    //             purchase_product::create([
    //                 'product_id' => $product_id,
    //                 'invoice_id' => $invoice->id,
    //                 'code' => $code,
    //                 'unit_price' => $unit_price,
    //                 'qty' => $qty,
    //                 'total_price' => $total_price
    //             ]);

    //             $product = Product::findOrFail($product_id);

    //             $stock_product = StockProduct::all();

    //             if(!$stock_product){
    //                 $stock = new StockProduct();
    //                 $stock->name = $product->name;
    //                 $stock->code = $code;
    //                 $stock->save();
    //             }


    //             @$old = StockProduct::where('code',$code)->first();
    //             @$old_qty = @$old->total_purchase_qty;
    //             @$old_price = @$old->product_unit_price;
    //             @$old_available_qty = @$old->available_qty;

    //             $new_qty = $request->qty[$i];
    //             $new_price = $request->unit_price[$i];

    //             $main_qty = @$old_qty + $new_qty;
    //             $average_price =  ((@$old_price * @$old_qty) + ($new_price * $new_qty)) / (@$old_available_qty + $new_qty);
    //             // dd(@$old_price ,@$old_qty , $new_price, $new_qty ,@$old_available_qty,$new_qty,$average_price,'ok');
    //             // dd($product_id );
    //             $new_available =  @$old_available_qty + $new_qty;
    //             StockProduct::where('code',$code)->first()->update([
    //             // StockProduct::find($product_id)->update([
    //             // StockProduct::find($product_id)  // ****Info**** don't update without protected fillable data----
    //                 'total_purchase_qty' => $main_qty,
    //                 'product_unit_price' => $average_price,
    //                 'available_qty' => $new_available
    //             ]);

    //         }

    //         @$main_account_update = Main_account::first();
    //         $update = @$main_account_update->total_amount - $request->paid;
    //         $due = @$main_account_update->supliyer_due + $request->due;
    //         // dd(@$main_account_update->supliyer_due,$due,'okkk' );
    //         // dd(@$main_account_update->total_amount,$update);
    //         if(@$main_account_update){

    //             $main_account_update->update([
    //                 'total_amount' => $update,
    //                 'supliyer_due' => $due
    //             ]);
    //         }else{
    //             $insert = new Main_account();
    //             $insert->total_amount = $request->paid;
    //             $insert->save();
    //         }


    //         return redirect('all-purchase-invoice')->with('message','Purchase Product created successfully..');
    //     }
    //     if( $request->status == 'Unpaid'){
    //         $invoice = new Purchase_invoice;
    //         // $invoice->id = $invoiceNumber;
    //         $invoice->vendor_id = $request->vendor_id;
    //         $invoice->sub_total = $request->sub_total;
    //         $invoice->discount = $request->discount;
    //         $invoice->total = $request->total;
    //         $invoice->paid = $request->paid;
    //         $invoice->status = $request->status;
    //         $invoice->due = $request->due;
    //         $invoice->save();

    //         $totalItems = count($request->qty);
    //         for ($i = 0; $i < $totalItems; $i++) {
    //             $product_id = $request->product_id[$i];
    //             $code = $request->code[$i];
    //             $unit_price = $request->unit_price[$i];
    //             $qty = $request->qty[$i];
    //             $total_price = $request->total_price[$i];

    //             purchase_product::create([
    //                 'product_id' => $product_id,
    //                 'invoice_id' => $invoice->id,
    //                 'code' => $code,
    //                 'unit_price' => $unit_price,
    //                 'qty' => $qty,
    //                 'total_price' => $total_price
    //             ]);

    //             $old = StockProduct::where('id',$product_id)->first();
    //             $old_qty = $old->purchase_upcoming_qty;
    //             $new_qty = $request->qty[$i];

    //             $main_qty = $old_qty + $new_qty;
    //             StockProduct::find($product_id)->update([   // ****Info**** don't update without protected fillable data----

    //                 'purchase_upcoming_qty' => $main_qty
    //             ]);

    //         }

    //         // Redirect back after processing
    //         return redirect('all-purchase-invoice')->with('message','Purchase Product created successfully..');
    //     }


    // }



    public function purchaseInvoiceStore(Request $request)
    {
        // dd($request->all());

        $invoice = new Purchase_invoice;
        $invoice->vendor_id = $request->vendor_id;
        $invoice->sub_total = $request->sub_total;
        $invoice->discount = $request->discount;
        $invoice->total = $request->total;
        $invoice->paid = $request->paid;
        $invoice->status = $request->status;
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

            $product = Product::findOrFail($product_id);

            $stock_product = StockProduct::where('code', $code)->first();
            if (!$stock_product) {
                $stock = new StockProduct();
                $stock->name = $product->name;
                $stock->code = $code;
                $stock->save();
                $stock_product = $stock;
            }

            if ($request->status == 'Paid') {
                $old_qty = $stock_product->total_purchase_qty;
                $old_price = $stock_product->product_unit_price;
                $old_available_qty = $stock_product->available_qty;

                $main_qty = $old_qty + $qty;
                $average_price = (($old_price * $old_qty) + ($unit_price * $qty)) / ($old_available_qty + $qty);
                $new_available = $old_available_qty + $qty;

                $stock_product->update([
                    'total_purchase_qty' => $main_qty,
                    'product_unit_price' => $average_price,
                    'available_qty' => $new_available
                ]);
            } else {
                $old_qty = $stock_product->purchase_upcoming_qty;
                $main_qty = $old_qty + $qty;

                $stock_product->update([
                    'purchase_upcoming_qty' => $main_qty
                ]);
            }
        }

        if ($request->status == 'Paid') {
            @$main_account_update = Main_account::first();
            if (@$main_account_update) {
                $update = @$main_account_update->total_amount - $request->paid;
                $due = @$main_account_update->supliyer_due + $request->due;

                @$main_account_update->update([
                    'total_amount' => $update,
                    'supliyer_due' => $due
                ]);
            } else {
                $insert = new Main_account();
                $insert->total_amount = -$request->paid;
                $insert->supliyer_due = $request->due;
                $insert->save();
            }
        }

        return redirect('all-purchase-invoice')->with('message', 'Purchase Product created successfully.');
    }


    public function purchaseInvoiceEdit($id){
        $purchase_edits =purchase_product::where('invoice_id',$id)->get();
        $purchase_invoices =Purchase_invoice::find($id);
        $vendorss =Vendor::find($purchase_invoices->vendor_id);
        // dd($vendorss);
        $vendors_info = $vendorss->created_at;
        return view('purchase.purchase_invoice_edit',compact('purchase_edits','purchase_invoices','vendorss'));
    }
    public function purchaseInvoiceShow($id){
        $purchase_edits =purchase_product::where('invoice_id',$id)->get();
        $purchase_invoices =Purchase_invoice::find($id);
        $vendorss =Vendor::find($purchase_invoices->vendor_id);
        $vendors_info = $vendorss->created_at;
        return view('purchase.purchase_invoice_show',compact('purchase_edits','purchase_invoices','vendorss'));
    }

    public function purchaseInvoiceUpdate(Request $request){
        if($request->status == 'Paid'){
            // dd($request->all(),'ss');
            $invoice = Purchase_invoice::find( $request->invoice_id);
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


                $old = StockProduct::where('code',$code)->first();

                $old_qty = $old->total_purchase_qty;
                $old_purchase_upcoming_qty = $old->purchase_upcoming_qty;
                $old_price = $old->product_unit_price;
                $old_available_qty = $old->available_qty;
                $new_qty = $request->qty[$i];
                $new_price = $request->unit_price[$i];

                $main_qty = $old_qty + $new_qty;
                // dd($old_price ,$old_qty , $new_price, $new_qty ,$old_available_qty,'ok');

                if ($old_available_qty + $new_qty != 0) {
                    $average_price = (($old_price * $old_qty) + ($new_price * $new_qty)) / ($old_available_qty + $new_qty);

                    // $average_price =  (($old_price * $old_qty) + ($new_price * $new_qty)) / ($old_available_qty + $new_qty);

                    $new_available =  $old_available_qty + $new_qty;
                    $new_purchase_upcoming_qty = $old_purchase_upcoming_qty - $new_qty;
                    StockProduct::where('code',$code)->update([   // ****Info**** don't update without protected fillable data----
                        'total_purchase_qty' => $main_qty,
                        'product_unit_price' => $average_price,
                        'available_qty' => $new_available,
                        'purchase_upcoming_qty' => $new_purchase_upcoming_qty
                    ]);
                }

            }


            @$main_account_update = Main_account::first();
            $update = @$main_account_update->total_amount - $request->paid;
            $due = @$main_account_update->supliyer_due + $request->due;
            // dd(@$main_account_update->supliyer_due,$due,'okkk' );
            // dd(@$main_account_update->total_amount,$update);
            if(@$main_account_update){

                $main_account_update->update([
                    'total_amount' => $update,
                    'supliyer_due' => $due
                ]);
            }else{
                $insert = new Main_account();
                $insert->total_amount = - $request->paid;
                $insert->supliyer_due = $request->due;
                $insert->save();
            }


            // Redirect back after processing
            return redirect('all-purchase-invoice')->with('message','Sales Product created successfully.');
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
        $purchase_invoices = Purchase_invoice::paginate(6);

        $due_paid_purchase = Paid::paginate(5);

        return view('purchase.all_purchase_invoice',compact('purchase_invoices','due_paid_purchase'));
    }
    public function allPInvoiceReport(){
        $purchase_invoices = Purchase_invoice::paginate(6);

        $due_paid_purchase = Paid::paginate(5);

        return view('purchase.all_purchase_invoice',compact('purchase_invoices','due_paid_purchase'));
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
    public function duePayInvoice(Request $request)
    {
        $vendor_id = $request->input('vendor_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        $paids = Paid::all();
        $query = Paid::query();
        $due_paid_purchase = Paid::where('vendor_id', $vendor_id)->get();

        if ($vendor_id =='all') {
            session(['selectedVendorId' => $vendor_id]);

            if (!empty($date_from)) {
                $query->whereDate('created_at', '>=', $date_from);
            }

            if (!empty($date_to)) {
                $query->whereDate('created_at', '<=', $date_to);
            }

            $paids = $query->get();
            return view('purchase.due_payment_invoice',compact('paids'));
        }

        if (!empty($vendor_id)) {
            $query->where('vendor_id', $vendor_id);
            session(['selectedVendorId' => $vendor_id]);
        }

        if (!empty($date_from)) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($date_to)) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        $paids = $query->get();

        return view('purchase.due_payment_invoice',compact('paids'));

    }
    public function duePayInvoiceReport(Request $request)
    {
        $vendor_id = $request->input('vendor_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        $paids = Paid::all();
        $query = Paid::query();
        $due_paid_purchase = Paid::where('vendor_id', $vendor_id)->get();

        if ($vendor_id =='all') {
            session(['selectedVendorId' => $vendor_id]);

            if (!empty($date_from)) {
                $query->whereDate('created_at', '>=', $date_from);
            }

            if (!empty($date_to)) {
                $query->whereDate('created_at', '<=', $date_to);
            }

            $paids = $query->get();
            return view('purchase.due_payment_invoice',compact('paids'));
        }

        if (!empty($vendor_id)) {
            $query->where('vendor_id', $vendor_id);
            session(['selectedVendorId' => $vendor_id]);
        }

        if (!empty($date_from)) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($date_to)) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        $paids = $query->get();

        return view('purchase.due_payment_invoice',compact('paids'));

    }
    public function duePayInvoiceCreate(){

        return view('purchase.due_payment_invoice_create');
    }
    public function duePayInvoiceStore(Request $request){
        // dd($request->vendor_id);
        $invoice = new Paid;
        $invoice->vendor_id = $request->vendor_id;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->discount = $request->discount;
        $invoice->description = $request->description;
        $invoice->save();

        @$main_account_update = Main_account::first();
        $update = @$main_account_update->total_amount - $request->paid_amount;
        $due = @$main_account_update->supliyer_due - $request->paid_amount;
        // dd(@$main_account_update->supliyer_due,$due,'okkk' );
        // dd(@$main_account_update->total_amount,$update);
        if(@$main_account_update){

            $main_account_update->update([
                'total_amount' => $update,
                'supliyer_due' => $due
            ]);
        }else{
            $insert = new Main_account();
            $insert->total_amount = $request->paid_amount;
            $insert->save();
        }



        // $accounts = Main_account::all();
        // foreach ($accounts as $account) {
        //     try {
        //         $main = $account->total_amount;
        //         $new_paid = $request->paid_amount;
        //         $update_amount = $main + $new_paid;

        //         $account->total_amount = $update_amount;
        //         $account->save();
        //     } catch (\Exception $e) {

        //         dd($e->getMessage());
        //     }
        // }



        return redirect('due-payment-invoice')->with('message','Due Amount Paided Successfully');
    }

    public function companyInfo(){

        $companies = Company::all();
        return view('company.create-company',compact('companies'));
    }
    public function companyInfoReport(){

        $companies = Company::all();
        return view('company.create-company',compact('companies'));
    }

    public function expenceInvoice(){

        $expences = Expence_Invoice::all();
        return view('company.expence_invoice',compact('expences'));
    }
    public function expenceInvoiceReport(){

        $expences = Expence_Invoice::all();
        return view('company.expence_invoice',compact('expences'));
    }

    public function expenceInvoiceCreate(){

        return view('company.expence_create');
    }
    public function companyCreate(){

        return view('company.company_create');
    }
    public function companyEdit($id){
        $company_edit = Company::findOrFail($id);
        return view('company.company-update',compact('company_edit'));
    }

    public function companyUpdate(Request $request, $id){
        $company_edit = Company::findOrFail($id);

        $company_edit->name = $request->name;
        $company_edit->email = $request->email;
        $company_edit->contact = $request->contact;
        $company_edit->address = $request->address;

        if ($request->logo) {
            if ($company_edit->logo) {

                unlink(public_path('teacher/' . $company_edit->logo));
            }

            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $company_edit->logo = $fileName;
        }

        $company_edit->save();

        return redirect('company-info')->with('message','Company Information Updated successfully.');
    }
    public function comInfoStore(Request $request){
        $product = new Company();
        $product->name = $request->name;
        $product->address = $request->address;
        $product->contact = $request->contact;
        $product->email = $request->email;
        // dd( $request->hasFile('logo'),'kk');
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $product->logo = $fileName;
        }

        $product->save();

        return redirect('company-info')->with('message','Company Information created successfully..');
    }
    public function comInfoDelete($id){
        Company::findOrFail($id)->delete();
        return redirect('company-info')->with('message','Company Information Deleted successfully..');
    }
    public function expenceInvoiceStore(Request $request){
        $expence = new Expence_Invoice();
        $expence->category_id = $request->category_id;
        $expence->amount = $request->amount;
        $expence->description = $request->description;

        $expence->save();


        @$main_account_update = Main_account::first();
        $update = @$main_account_update->total_amount - $request->amount;
        // dd(@$main_account_update->total_amount,$update);
        if(@$main_account_update){

            $main_account_update->update([
                'total_amount' => $update,
            ]);
        }else{
            $insert = new Main_account();
            $insert->total_amount = $request->amount;
            $insert->save();
        }


        return redirect('expence-invoice')->with('message','New Expence created successfully..');
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

    // Initialize the queries for both Purchase_invoice and Paid models
    $query = Purchase_invoice::query();
    $paidd = Paid::query();

    // Apply filters based on the input values
    if ($vendor_id && $vendor_id != 'all') {
        $query->where('vendor_id', $vendor_id);
        $paidd->where('vendor_id', $vendor_id);
    }

    if (!empty($date_from)) {
        $query->whereDate('created_at', '>=', $date_from);
        $paidd->whereDate('created_at', '>=', $date_from);
    }

    if (!empty($date_to)) {
        $query->whereDate('created_at', '<=', $date_to);
        $paidd->whereDate('created_at', '<=', $date_to);
    }

    // Execute the queries to get the filtered results
    $purchase_invoices = $query->get();
    $due_paid_purchase = $paidd->get();

    // Store the selected vendor ID in the session
    session(['selectedVendorId' => $vendor_id]);

    return view('purchase.all_purchase_invoice',compact('purchase_invoices','due_paid_purchase'));


         if ($vendor_id && $vendor_id =='all') {
            session(['selectedVendorId' => $vendor_id]);
            $purchase_invoices = Purchase_invoice::all();
            $due_paid_purchase = Paid::all();

            if (!empty($date_from)) {
                $query->whereDate('created_at', '>=', $date_from);
                $paidd->whereDate('created_at', '>=', $date_from);
            }

            if (!empty($date_to)) {
                $query->whereDate('created_at', '<=', $date_to);
                $paidd->whereDate('created_at', '<=', $date_to);
            }

            $purchase_invoices = $query->get();
            return view('purchase.all_purchase_invoice',compact('purchase_invoices','due_paid_purchase'));
        }

        // $vendor_id = $request->input('vendor_id');
        // $date_from = $request->input('date_from');
        // $date_to = $request->input('date_to');

        // $purchase_invoices = Purchase_invoice::all();
        // $due_paid_purchase = Paid::all();
        // $paidd = Paid::query();
        // $query = Purchase_invoice::query();
        // $due_paid_purchase = Paid::where('vendor_id', $vendor_id)->get();

        // if ($vendor_id =='all') {
        //     session(['selectedVendorId' => $vendor_id]);
        //     $purchase_invoices = Purchase_invoice::all();
        //     $due_paid_purchase = Paid::all();

        //     if (!empty($date_from)) {
        //         $query->whereDate('created_at', '>=', $date_from);
        //     }

        //     if (!empty($date_to)) {
        //         $query->whereDate('created_at', '<=', $date_to);
        //     }

        //     $purchase_invoices = $query->get();
        //     return view('purchase.all_purchase_invoice',compact('purchase_invoices','due_paid_purchase'));
        // }

        // if (!empty($vendor_id)) {
        //     $query->where('vendor_id', $vendor_id);
        //     $paidd->where('vendor_id', $vendor_id);
        //     session(['selectedVendorId' => $vendor_id]);
        // }

        // if (!empty($date_from)) {
        //     $query->whereDate('created_at', '>=', $date_from);
        //     $paidd->whereDate('created_at', '>=', $date_from);
        // }

        // if (!empty($date_to)) {
        //     $query->whereDate('created_at', '<=', $date_to);
        //     $paidd->whereDate('created_at', '<=', $date_to);
        // }

        // $purchase_invoices = $query->get();
        // $due_paid_purchase = $query->get();




    }


    // public function searchVendor(Request $request){

    //     $vendor_id = $request->input('vendor_id');
    //     $date_from = $request->input('date_from');
    //     $date_to = $request->input('date_to');

    //     $query = Purchase_invoice::query();
    //     $query->leftJoin('paids', 'purchase_invoices.vendor_id', '=', 'paids.vendor_id');

    //     if (!empty($vendor_id) && $vendor_id != 'all') {
    //         $query->where('purchase_invoices.vendor_id', $vendor_id);
    //     }

    //     if (!empty($date_from)) {
    //         $query->whereDate('purchase_invoices.created_at', '>=', $date_from);
    //     }

    //     if (!empty($date_to)) {
    //         $query->whereDate('purchase_invoices.created_at', '<=', $date_to);
    //     }

    //     $purchase_invoices = $query->get();

    //     return view('purchase.all_purchase_invoice', compact('purchase_invoices'));
    // }


    public function addCategory(){
        return view('company.add_category');
    }
    public function categoryStore(Request $request){
        $category = new Expence_Category();
        $category->category = $request->category;

        $category->save();

        return redirect('expence-create')->with('message','New Category created successfully..');
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
        $product = Product::find( $selectedValue);
        $data =  $product->code;
        // dd($data);
        return response()->json($data);
    }
    public function fetchCode(Request $request) {
        $selectedValue = $request->input('selectedValue');
        // Fetch data based on $selectedValue
        $product = Product::find( $selectedValue);
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
    public function allReturnPurchaseInvoiceReport() {
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

            @$old = StockProduct::where('code',$code)->first();
            @$old_qty = @$old->total_purchase_qty;
            $old_price = @$old->product_unit_price;
            @$old_available_qty = @$old->available_qty;
            $new_qty = $request->qty[$i];
            $new_price = $request->unit_price[$i];

            $main_qty = @$old_qty - $new_qty;
            // $average_price =  (($old_price * $old_available_qty) + ($new_price * $new_qty) / ($old_available_qty + $new_qty);
            $new_available =  @$old_available_qty - $new_qty;
            StockProduct::where('code',$code)->first()->update([   // **** ******* Info**** don't update without protected fillable data----
                // 'total_purchase_qty' => $main_qty,
                // 'product_unit_price' => $average_price,
                'available_qty' => $new_available
            ]);

        }


        $main_account_update = Main_account::first();
        $update = $main_account_update->total_amount + $request->paid;
        // dd(@$main_account_update->total_amount,$update);
        if($main_account_update){

            $main_account_update->update([
                'total_amount' => $update,
            ]);
        }else{
            $insert = new Main_account();
            $insert->total_amount = $request->paid;
            $insert->save();
        }



        return redirect('all-return-purchase-invoice')->with('message','Purchase Return invoice created successfully..');
    }

    public function returnPurchaseInvoiceEdit($id){
        $purchase_return = Return_Invoice::find($id);
        $purchase_edits = Return_Product_Invoice::where('invoice_id',$id)->get();
        $vendorr = Vendor::find($purchase_return->vendor_id);

        return view('purchase.return_purchase_invoice_edit',compact('purchase_edits','vendorr','purchase_return'));
    }

    public function vendorDuePayInvoices(Request $request){
        $vendor_id = $request->input('vendor_id');
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        $paids = Paid::all();
        $query = Paid::query();
        $due_paid_purchase = Paid::where('vendor_id', $vendor_id)->get();

        if ($vendor_id =='all') {
            session(['selectedVendorId' => $vendor_id]);
            $query = Paid::query();

            if (!empty($date_from)) {
                $query->whereDate('created_at', '>=', $date_from);
            }

            if (!empty($date_to)) {
                $query->whereDate('created_at', '<=', $date_to);
            }

            $paids = $query->get();
            return view('purchase.due_payment_invoice',compact('paids'));
        }

        if (!empty($vendor_id)) {
            $query->where('vendor_id', $vendor_id);
            session(['selectedVendorId' => $vendor_id]);
        }

        if (!empty($date_from)) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($date_to)) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        $paids = $query->get();

        return view('purchase.due_payment_invoice',compact('paids'));
    }

    public function searchVendorInfo(Request $request){
        $search = $request->search;
        $vendors = Vendor::where(function($query)use($search){
            $query->where('name','like',"%$search%")
            ->orWhere('email','like',"%$search%")
            ->orWhere('address','like',"%$search%")
            ->orWhere('vendor_origin','like',"%$search%")
            ->orWhere('mobile','like',"%$search%");
                 })->paginate(9);
        return view('vendor.vendor_create', compact('vendors'));
    }
    public function searchVendorInvoice(Request $request){

        if($request->vendor_id == 'All'){
            session(['selectedVendorId' => 'All']);
            $purchase_invoices = Return_Invoice::all();
            return view('purchase.all_return_purchase_invoice',compact('purchase_invoices'));
        }

        $purchase_invoices = Return_Invoice::where('vendor_id',$request->vendor_id)->get();
        session(['selectedVendorId' => $request->vendor_id]);
        return view('purchase.all_return_purchase_invoice',compact('purchase_invoices'));

    }

    public function pdfExport(){
        // dd('ok');
            // Fetch user data from the database
            // $teacher = NewTeacher::findOrFail($id);
            // set_time_limit(120);
            $name = 'Suhail';
            $pdf = Pdf::loadView('customer.all_customer');
            return $pdf->stream('teacher_info.pdf',compact('name'));
        }
}
