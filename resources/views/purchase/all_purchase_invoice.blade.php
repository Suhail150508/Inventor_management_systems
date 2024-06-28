@extends('layouts.app')

@section('content')

<style>

    body {
    font-family: 'lato', sans-serif;
    }
    .container {
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 10px;
    padding-right: 10px;
    }

    h2 {
    font-size: 26px;
    margin: 80px 0;
    text-align: center;
    small {
        font-size: 0.5em;
    }
    }

    .responsive-table {
        li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
        }
        .col-1 {
            flex-basis: 10%;
        }
        .col-2 {
            flex-basis: 40%;
        }
        .col-3 {
            flex-basis: 25%;
        }
        .col-4 {
            flex-basis: 25%;
        }



        @media all and (max-width: 700px) {
            .table-header {
            display: none;
            }
            .table-row{

            }
            li {
            display: block;
            }
            .col {

            flex-basis: 100%;

            }
            .col {
            display: flex;
            padding: 1px 0;
            &:before {
                color: #6C7A89;
                padding-right: 1px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
            }


            /* .break-word {
                word-break: break-word !important;
                overflow-wrap: anywhere !important;
                white-space: normal !important;
                max-width: 100px !important;
                display: inline-block !important;
            } */
            thead{
                width:20%;
            }
            .th1{
                word-break:break-word;
                overflow:anywhere;

            }
            .center{
                width:20px;
            }

            table {
                width: 100% !important;
                border-collapse: collapse !important;
            }

            th {
                border: 1px solid black !important;
                padding: 8px !important;
                text-align: left !important; /* Ensure text aligns properly within the header */
            }

        }

    }
    @media (min-width: 700px) {


        .form_section{
            display: flex;
            justify-content:center;
             flex-wrap:wrap;
             margin-top:3rem;
        }

        .discount{
            float: right;
            margin:4rem 2rem;
            background-color:#d9d9ebc6;
            padding:8px;
            font-size: 1rem;
        }
        .d_para{
            font-weight:bold;
            font-size:1rem;
        }
        .form_inner{
            margin: 0px 10px;
        }

        .print{
            /* margin-top:-3rem; */
            padding:3px 20px;
            font-size:1.3rem;
        }

    }
    @media (max-width: 700px) {

        .form_section{
            display: flex;
            justify-content:column;
             flex-wrap:wrap;
             margin-top:1.2rem;
             text-align: center;
             margin-left: 3rem;
        }
        .form_inner{
            margin-top: -10px;
        }

        .discount{
            float: right;
            margin:4rem 2rem;
            background-color:#d9d9ebc6;
            padding:8px;
            width:35%;
            font-size: 1rem;
        }
        .d_para{
            font-weight:bold;
            font-size:.9rem;
        }
        /* .print{
            margin-top:-5rem;
            padding:4px 17px;
            font-size:1.2rem;
        } */
        .box-header h2{
            font-size:1rem;
        }


    }

    /* @media print{
        .btn{
            display: none;
        }
        input .form-control{
            border: 0px;
        }
        .customer .form-controll{
            display: none;
        }
        .customer{
            border:2px solid #000;
        }
        .customer-heading {
            }
            .form-controll2{
                display: block;
            }
            .origin{
                font-size: 2rem;
            }
            .origin1{
                background-color: #aaa !important;
                height: 200px;
                padding-top: 10px;
            }
            .first{
                margin-right: -6rem;
                width:300px;
            }
            h2{
                margin-top:-15rem;
                text-align: center;
                font-weight: 300;
                color: tomato;
            }
            #dataContainer{
                width:100px;
            }
            .form_section{
                display:none;
            }
            .breadcrumb{
                display:none;

            }
            .action{
                display:none;

            }

    } */

    @media print {
    .btn {
        display: none;
    }
    /* Correct the input field selector */
    .form-control {
        border: 0px;
    }
    /* Ensure correct class naming */
    .customer .form-control {
        display: none;
    }
    .customer {
        border: 2px solid #000;
    }
    .customer-heading {
        /* Uncomment and modify if needed
        display: block !important;
        background-color: #aaa !important;
        padding: 4px;
        margin-top: -3rem;
        */
    }
    .form-control2 {
        display: block;
    }
    .origin {
        font-size: 2rem;
        /* Uncomment and modify if needed
        background-color: #aaa !important;
        */
    }
    .origin1 {
        background-color: #aaa !important;
        height: 200px;
        padding-top: 10px;
    }
    .first {
        margin-right: -6rem;
        width: 300px;
    }
    h2 {
        margin-top: -15rem;
        text-align: center;
        font-weight: 300;
        color: tomato;
    }
    #dataContainer {
        width: 100px;
    }
    .form_section {
        display: none;
    }
    .breadcrumb {
        display: none;
    }
    .action {
        display: none;
    }
}


</style>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Invoices</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title style="display: flex;justify-content:space-between">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Purchase Invoices</h2>
            {{-- <div class="box-icon">
                <a href="/purchase_invoice" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create Purchase</a>
            </div> --}}
            <div style="float: right;margin-right:2rem;">
                <button type="button" class="btn print"  onclick="GetPrint()">Print</button>
            </div>
        </div>


        <div class="form_section">

            <form class="form_section" action="{{ url('/search-purchase-invoice') }}" method="GET">
                @csrf
                <div class="form_inner col-md-1" >
                    <h4>Vendors</h4>
                    @php
                        $vendors = App\Models\Vendor::all();
                    @endphp
                    <label for="">  </label>
                    <select type="text" name="vendor_id" id="vendor_id">
                        <option style="font-size:1.1rem" value="all">All vendors</option>
                        @foreach ($vendors as $vendor)
                            <option style="font-size:1.1rem" value="{{ $vendor->id }}" {{ session('selectedVendorId') == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form_inner col-md-1" >
                    <h4>From</h4>
                    <div class="">
                        <input type="date" name="date_from" id="date_from" placeholder="2018-07-03" value="{{ request()->input('date_from') }}">
                    </div>
                </div>
                <div class="form_inner col-md-1" >
                    <h4>To</h4>
                    <div class="">
                        <input type="date" name="date_to" id="date_to" placeholder="2018-07-03" value="{{ request()->input('date_to') }}">
                    </div>
                </div>
                <button class="col-md-1 btn btn-secondary" type="submit" style="height: 2rem;margin:2rem 1rem">Search</button>
            </form>


        </div>

        @php
            $total = 0;
            $discount_invoice = 0;
            $paid = 0;
            $due = 0;
        @endphp
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th class="th1">Invoice Id</th>
                      <th class="th1">Vendor Id</th>
                      <th class="th1">Sub Total</th>
                      <th class="th1">Discount</th>
                      <th class="th1">Total</th>
                      <th class="th1">Paid</th>
                      <th class="th1">Due</th>
                      <th class="th1">Status</th>
                      <th class="th1">Date</th>
                      <th class="action">Actions</th>
                  </tr>
              </thead>

              <tbody>
                  {{-- @dd($purchase_invoices); --}}
                  @foreach ($purchase_invoices as $key => $invoice )
                @php
                    $total += $invoice->total;
                    $discount_invoice += $invoice->discount;
                    $paid += $invoice->paid;
                    $due += $invoice->due;
                    $vendor_id = $invoice->vendor_id;

                @endphp
                @php
                // echo gettype($invoice->id); // Add this line
                // $invoiceId = is_string($invoice->id) ? $invoice->id : strval($invoice->id);
              @endphp

                    <tr>
                        {{-- <td class="center">#INV-000{{ $key+1 }}</td> --}}
                        <td class="center">#INV-0{{  $invoice->id}}</td>


                        <td class="center">{{ $invoice->vendor_id }}</td>
                        <td class="center">{{ $invoice->sub_total }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->total }}</td>
                        <td class="center">{{ $invoice->paid }}</td>
                        <td class="center">{{ $invoice->due }}</td>
                        <td class="center">{{ $invoice->status }}</td>
                        <td class="center">{{ $invoice->created_at }}</td>
                        <td class="action">
                            <div class="span2">
                                @if ($invoice->status && $invoice->status == 'Paid')
                                    <a class="btn btn-info" href="{{ url('/purchase-invoice-show/'.$invoice->id) }}" style="margin-left:.1rem;">
                                        <i class=" white icon-eye-open" style="width:15px;height:19px"></i>
                                    </a>
                                @else
                                    <a class="btn btn-info" href="{{ url('/purchase-invoice-edit/'.$invoice->id) }}" style="margin-left:.1rem; border-radius: 25%;">
                                        <i class="halflings-icon white edit" style="width:15px;height:19px"></i>
                                    </a>
                                @endif
                            </div>

                        </td>
                    </tr>

                @endforeach
                </tr>
              </tbody>
            </table>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <h3 style="text-align: center; margin:2rem 0px">Due Paid Information</h3>
              <thead>
                  <tr>
                      <th >Invoice Id</th>
                      <th >Vendor Id</th>
                      <th >Paid Amount</th>
                      <th >Discount</th>
                      <th >Discription</th>
                      <th >Date</th>
                      {{-- <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Actions</th> --}}
                  </tr>
              </thead>
              @php
                  $paid_amount=0;
                  $discount=0;
              @endphp
              <tbody>
                  @foreach ($due_paid_purchase as $key => $invoice )
                @php
                $paid_amount += $invoice->paid_amount;
                $discount += $invoice->discount;
              @endphp

                    <tr>
                        <td class="center">#INV-0{{  $invoice->id}}</td>


                        <td class="center">{{ $invoice->vendor_id }}</td>
                        <td class="center">{{ $invoice->paid_amount }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->description }}</td>
                        <td class="center">{{ $invoice->created_at }}</td>
                        {{-- <td>
                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/purchase-invoice-edit/'.$invoice->invoice_id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>
                        </td> --}}
                    </tr>

                @endforeach
                </tr>
              </tbody>
            </table>
          @php
        //   dd($paid_amount);
            // $paid_invoice =  App\Models\Paid::where('vendor_id',$vendor_id )->sum('paid_amount');
            // $discount =  App\Models\Paid::where('vendor_id',$vendor_id )->sum('discount');

            $total_paid = $paid + $paid_amount;
            $total_due = $due - $paid_amount - $discount;
            $total_discount = $discount_invoice + $discount;

          @endphp
            <div class="discount">
                <p class="d_para">Invoice Total: {{ $total }}  </p>
                <p class="d_para">Total Discount: {{ $total_discount }}  </p>
                <p class="d_para">Total Paid: {{ $total_paid }} </p>
                <p class="d_para">Total Due: {{ $total_due }} </p>
            </div>
        </div>
    </div>
</div>


<script>

     function GetPrint(){
        window.print();
    }
</script>
@endsection


