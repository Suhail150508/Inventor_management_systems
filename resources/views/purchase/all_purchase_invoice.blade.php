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

        @media all and (max-width: 767px) {
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
            padding: 10px 0;
            &:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
            }


            .break-word {
                word-break: break-word !important;
                overflow-wrap: anywhere !important;
                color: red !important;
                white-space: normal !important;
                max-width: 100px !important;
                display: inline-block !important;
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

    @media print{
        .btn{
            display: none;
        }
        /* .form-control{
            border: 0px;
        } */
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
            /* display: block !important;
            background-color:#aaa !important;
            padding:4px; */
            /* margin-top: -3rem; */
            }
            .form-controll2{
                display: block;
            }
            .origin{
                font-size: 2rem;
                /* background-color: #aaa !important; */
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
                /* font-size: 30px; */
                /* margin: 35px; */
                font-weight: 300;
                color: tomato;
                /* padding: 50px; */
                /* width: 50px;
                border-bottom:2px solid black; */
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
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Purchase Invoices</h2>
            {{-- <div class="box-icon">
                <a href="/purchase_invoice" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create Purchase</a>
            </div> --}}
        </div>


        <div class="form_section">

            <form action="{{ url('/search-purchase-invoice') }}" method="GET" style="display: flex;justify-content:center; flex-wrap:wrap;margin-top:3rem">
                @csrf
                <div class=" col-md-1" style="margin: 0px 10px">
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
                <div class="col-md-1" style="margin: 0px 10px">
                    <h4>From</h4>
                    <div class="">
                        <input type="date" name="date_from" id="date_from" placeholder="2018-07-03" value="{{ request()->input('date_from') }}">
                    </div>
                </div>
                <div class="col-md-1" style="margin: 0px 10px">
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
                      <th style="word-break:break-word;overflow:anywhere">Invoice Id</th>
                      <th style="word-break:break-word;overflow:anywhere">Vendor Id</th>
                      <th style="word-break:break-word;overflow:anywhere">Sub Total</th>
                      <th style="word-break:break-word;overflow:anywhere">Discount</th>
                      <th style="word-break:break-word;overflow:anywhere">Total</th>
                      <th style="word-break:break-word;overflow:anywhere">Paid</th>
                      <th style="word-break:break-word;overflow:anywhere">Due</th>
                      <th style="word-break:break-word;overflow:anywhere">Status</th>
                      <th style="word-break:break-word;overflow:anywhere">Date</th>
                      <th class="action" style="word-break:break-word;overflow:anywhere">Actions</th>
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
                                    <a class="btn btn-info" href="{{ url('/purchase-invoice-show/'.$invoice->id) }}" style="margin-left:.1rem; border-radius: 25%;">
                                        <i class=" white icon-eye-open"></i>
                                    </a>
                                @else
                                    <a class="btn btn-info" href="{{ url('/purchase-invoice-edit/'.$invoice->id) }}" style="margin-left:.1rem; border-radius: 25%;">
                                        <i class="halflings-icon white edit"></i>
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
                      <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Invoice Id</th>
                      <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Vendor Id</th>
                      <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Paid Amount</th>
                      <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Discount</th>
                      <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Discription</th>
                      <th tstyle="word-break:break-word;overflow:anywhere;max-width:100px">Date</th>
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
            <div style="float: right;margin:4rem 2rem;background-color:#d9d9ebc6;padding:8px;width:21%;">
                <p style="font-weight:bold;font-size:1rem">Invoice Total: {{ $total }}  </p>
                <p style="font-weight:bold;font-size:1rem">Total Discount: {{ $total_discount }}  </p>
                <p style="font-weight:bold;font-size:1rem">Total Paid: {{ $total_paid }} </p>
                <p style="font-weight:bold;font-size:1rem">Total Due: {{ $total_due }} </p>
            </div>
        </div>
    </div>
</div>

<div style="text-align: center;">
    <button type="button" class="btn" style=" padding:6px 25px;font-size:1.3rem;" onclick="GetPrint()" class="btn btn-primary ">Print</button>
</div>


<script>

     function GetPrint(){
        window.print();
    }
</script>
@endsection


