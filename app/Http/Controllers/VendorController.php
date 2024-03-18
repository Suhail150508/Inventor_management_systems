<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\purchase_product;
use App\Models\Vendor;
use Illuminate\Http\Request;

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
        // Get the total number of items submitted
        $totalItems = count($request->qty);
        // dd($totalItems);
        // Loop over each item
        for ($i = 0; $i < $totalItems; $i++) {
            // Access the corresponding values for each field
            $code = $request->code[$i];
            $unit_price = $request->unit_price[$i];
            $qty = $request->qty[$i];
            // Assuming purchase_product is your model class
            purchase_product::create([
                'code' => $code,
                'unit_price' => $unit_price,
                'qty' => $qty
            ]);
        }

        // Redirect back after processing
        return redirect()->back()->with('message','Purchase Product created successfully..');
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
    public function fetchCode(Request $request) {
        $selectedValue = $request->input('selectedValue');
        // Fetch data based on $selectedValue
        $product = Product::find( $selectedValue);
        $data =  $product->code;
        dd($data);
        return response()->json($data);
    }
}
