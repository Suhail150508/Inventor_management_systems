<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use App\Models\Amount_invest;
use App\Models\Amount_withdraw;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Investor_invoice;
use Illuminate\Support\Facades\DB;

class InvestorController extends Controller
{

    public function investor(){
        $invests = Investor::all();
        return view('investor.investors',compact('invests'));
    }

    public function investorCreate(){
        return view('investor.create_investor');
    }

    public function investorStore(Request $request)
    {
        // dd($request->all());
        $investor_information = new Investor();
        $investor_information->name = $request->name;
        $investor_information->email = $request->email;
        $investor_information->mobile = $request->mobile;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('teacher', $fileName);
            $investor_information->image = $fileName;
        }

        $investor_information->save();

        return redirect()->back()->with('message','Investor created successfully..');
    }

    public function invest(){
        return view('investor.invest_amount');
    }
    public function investReturn(){
        return view('investor.return_amount');
    }

    public function investAmount(Request $request)
    {
        $invest_amount = new Amount_invest();
        $invest_amount->investor_id = $request->investor_id;
        $invest_amount->amount = $request->amount;
        $invest_amount->category = $request->category;
        $invest_amount->date = $request->date;

        $invest_amount->save();

        // $invoice = new Investor_invoice();
        // $invoice->name = $request->name;
        // $invoice->amount = $request->amount;
        // $invoice->description = $request->description;
        // $invoice->date = $request->date;

        // $invoice->save();
        return redirect()->back()->with('message','Amount added successfully ');
        // return redirect()->back()->with('message','Saved successfully..');
    }
    public function AmountReturn(Request $request)
    {
        // dd($request->all());
        $invest_amount = new Amount_withdraw();
        $invest_amount->investor_id = $request->investor_id;
        $invest_amount->return_amount = $request->return_amount;
        $invest_amount->category = $request->category;
        $invest_amount->date = $request->date;

        $invest_amount->save();

        // $invoice = new Investor_invoice();
        // $invoice->name = $request->name;
        // $invoice->amount = $request->amount;
        // $invoice->description = $request->description;
        // $invoice->date = $request->date;

        // $invoice->save();

        return redirect()->back()->with('message','Amount returned successfully..');
    }
    public function investRrturn(){
        return view('investor.return_amount');
    }
    public function returnAmount(Request $request)
    {
        $invest_amount = new Investor();
        $invest_amount->name = $request->name;
        $invest_amount->amount = $request->amount;
        $invest_amount->description = $request->description;
        $invest_amount->date = $request->date;

        $invest_amount->save();

        $invoice = new Invoice();
        $invoice->name = $request->name;
        $invoice->amount = $request->amount;
        $invoice->description = $request->description;
        $invoice->date = $request->date;

        $invoice->save();

        return redirect()->back()->with('message','Saved successfully..');
    }

    public function InvestorStatement(){

        // $investor_invest_amounts = Amount_invest::all();

        return view('investor.investor_statement');
    }
    public function InvestorStatementInfo(Request $request) {
        // $investor_invest_amounts = [];
        // $investor_return_amounts = [];

        if ($request->id && $request->record && $request->record == 'invest_record') {
            $investor_invest_amounts = Amount_invest::where('investor_id', $request->id)->get();

            $selectedInvestorId = $request->input('id');
            $selectedRecord = $request->input('record');
            session(['selectedInvestorId' => $selectedInvestorId, 'selectedRecord' => $selectedRecord]);

            return view('investor.investor_statement', compact('investor_invest_amounts'));
        } elseif ($request->id && $request->record && $request->record == 'return_record') {
            $investor_return_amounts = Amount_withdraw::where('investor_id', $request->id)->get();

            $selectedInvestorId = $request->input('id');
            $selectedRecord = $request->input('record');
            session(['selectedInvestorId' => $selectedInvestorId, 'selectedRecord' => $selectedRecord]);

            return view('investor.investor_statement', compact('investor_return_amounts'));
        }
        // elseif ($request->id && $request->record && $request->record == 'all_record') {
        //     $investor_all_record_amounts = Amount_invest::all();
        //     $investor_all_record_amounts = Amount_withdraw::all();




        //     $selectedInvestorId = $request->input('id');
        //     $selectedRecord = $request->input('record');
        //     session(['selectedInvestorId' => $selectedInvestorId, 'selectedRecord' => $selectedRecord]);

        //     return view('investor.investor_statement', compact('investor_all_record_amounts'));
        // }

        elseif ($request->id && $request->record && $request->record == 'all_record') {
            // Fetch data from both tables
            // $investor_all_record_invests = Amount_invest::where('investor_id',$request->id)->get();
            // $investor_all_record_withdraws = Amount_withdraw::where('investor_id',$request->id)->get();

            // $joined_records = $investor_all_record_invests->merge($investor_all_record_withdraws)->sortBy('id');

            // $joined_records = [
            //     'investor_all_record_invests' => $investor_all_record_invests,
            //     'investor_all_record_withdraws' => $investor_all_record_withdraws
            // ];



            // $investor_all_record_invests = Amount_invest::where('investor_id', $request->id)->get();
            // $investor_all_record_withdraws = Amount_withdraw::where('investor_id', $request->id)->get();

            // // Merge the collections
            // $merged_records = $investor_all_record_invests->concat($investor_all_record_withdraws);

            // // Group the merged collection by investor_id
            // $grouped_records = $merged_records->groupBy('investor_id');


            $investor_all_record_invests = Amount_invest::where('investor_id', $request->id)->get();
            $investor_all_record_withdraws = Amount_withdraw::where('investor_id', $request->id)->get();

            // Merge the collections
            $merged_records = $investor_all_record_invests->concat($investor_all_record_withdraws);

            // Group the merged collection by created_at
            $joined_records = $merged_records->groupBy(function ($record) {
                return $record->created_at->format('Y-m-d'); // Grouping by date portion only
            });




            // dd($grouped_records);

            // // Merge the collections into a single collection
            // $joined_records = $investor_all_record_amounts->join($investor_all_record_withdraws);


            // $joined_records = DB::table('amount_invests')
            // ->join('amount_withdraws', 'amount_invests.investor_id', '=', 'amount_withdraws.investor_id')
            // ->select('amount_invests.id','amount_invests.amount','amount_invests.investor_id', 'amount_withdraws.return_amount')
            // ->get();



            // Store the selected investor ID and record in session
            $selectedInvestorId = $request->input('id');
            $selectedRecord = $request->input('record');
            session(['selectedInvestorId' => $selectedInvestorId, 'selectedRecord' => $selectedRecord]);

            // Pass the joined result to the view
            return view('investor.investor_statement', compact('joined_records'));
        }




        else{
            // $investor_all_amounts = Amount_invest::all();
            $investor_all_record_invests = Amount_invest::all();
            $investor_all_record_withdraws = Amount_withdraw::all();

            $investor_all_amounts = $investor_all_record_invests->merge($investor_all_record_withdraws);
            // dd($investor_all_amounts,'ddd');

            $selectedInvestorId = $request->input('id');
            $selectedRecord = $request->input('record');
            session(['selectedInvestorId' => $selectedInvestorId, 'selectedRecord' => $selectedRecord]);
            return view('investor.investor_statement', compact('investor_all_amounts'));


        }
    }



    public function totalInformation(Request $request){

    $investor = Investor::where('id',$request->investor_id)->first();

    $total_amount_invest = Amount_invest::where('investor_id',$request->investor_id)->sum('amount');
    $total_amount_withdraw = Amount_withdraw::where('investor_id',$request->investor_id)->sum('amount');
    $present_amount = $total_amount_invest - $total_amount_withdraw;
    // dd( $present_amount);



        return view('investor.total_information',compact('investor','total_amount_invest','total_amount_withdraw','present_amount'));

    }
    public function AllInvoice(){

        $investor_invoices = Investor_invoice::all();

        return view('investor.invoice_create',compact('investor_invoices'));
    }

    // public function downloadPDFStudentInfo()
    // {
    //     // Fetch user data from the database
    //     // $student = NewStudent::findOrFail($id);

    //     // Generate PDF using DomPDF
    //     // $pdf = Pdf::loadView('pdf.student_info', compact('student'));
    //     $pdf = Pdf::loadView('investor.total_information');

    //     // Set headers for download
    //     return $pdf->download('student_info.pdf');
    // }

}
