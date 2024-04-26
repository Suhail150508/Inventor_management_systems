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
            <h2><i class="halflings-icon user"></i><span class="break"></span>Invoices</h2>
            <div class="box-icon">
                <a href="/purchase_invoice" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create Purchase</a>
            </div>
        </div>


        <div>
            {{-- <form action="/search-vendor-invoice" method="POST" class="row pt-5" style="width:50%;height:40%;display:flex;justify-content:center;padding:.2rem;margin:.9rem 5rem">
                @csrf
                @php
                    $vendors = App\Models\Vendor::all();
                @endphp

                <strong style="font-size:1.2rem" for=""> Vendors </strong>
                <select  name="vendor_id"  id="selectField">

                    <option style="font-size:1.1rem" value="all">All</option>
                    @foreach ($vendors as $vendor )
                    <option style="font-size:1.1rem" value="{{ $vendor->id }}">{{ $vendor->name  }}</option>
                    @endforeach
                </select>
                <button type="submit" class="col-md-3 btn btn-success" style="font-size:1.2rem;width:100px;height:32px">Search </button>
            </form> --}}

            <form action="{{ url('/search-purchase-invoice') }}" method="GET" style="display: flex;justify-content:center; flex-wrap:wrap">
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
                <button class="col-md-1 btn btn-success" type="submit" style="height: 2.3rem;margin:2rem 1rem">Search</button>
            </form>


        </div>

        @php
            $total = 0;
            $paid = 0;
            $due = 0;
        @endphp
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Invoice Id</th>
                      <th>Vendor Id</th>
                      <th>Sub Total</th>
                      <th>Discount</th>
                      <th>Total</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody>
                  {{-- @dd($purchase_invoices); --}}
                  @foreach ($purchase_invoices as $key => $invoice )
                @php
                    $total += $invoice->total;
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
                        <td class="center">{{  $invoice->id}}</td>


                        <td class="center">{{ $invoice->vendor_id }}</td>
                        <td class="center">{{ $invoice->sub_total }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->total }}</td>
                        <td class="center">{{ $invoice->paid }}</td>
                        <td class="center">{{ $invoice->due }}</td>
                        <td class="center">{{ $invoice->status }}</td>
                        <td>
                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/purchase-invoice-edit/'.$invoice->id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="halflings-icon white edit"></i>
                                </a>
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
                      <th>Invoice Id</th>
                      <th>Vendor Id</th>
                      <th>Paid Amount</th>
                      <th>Discount</th>
                      <th>Discription</th>
                      <th>Actions</th>
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
                        <td class="center">{{  $invoice->id}}</td>


                        <td class="center">{{ $invoice->vendor_id }}</td>
                        <td class="center">{{ $invoice->paid_amount }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->description }}</td>
                        <td>
                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/purchase-invoice-edit/'.$invoice->invoice_id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tr>
              </tbody>
            </table>
          @php
        //   dd($paid_amount);
            // $paid_invoice =  App\Models\Paid::where('vendor_id',$vendor_id )->sum('paid_amount');
            // $discount =  App\Models\Paid::where('vendor_id',$vendor_id )->sum('discount');
            $total_due = $due - $paid_amount - $discount;
          @endphp
            <div style="float: right;margin:4rem 2rem;background-color:#d9d9ebc6;padding:8px;width:21%;">
                <p style="font-weight:bold;font-size:1rem">Total: {{ $total }}  </p>
                <p style="font-weight:bold;font-size:1rem">Total Paid: {{ $paid }} </p>
                <p style="font-weight:bold;font-size:1rem">Total Due: {{ $total_due }} </p>
            </div>
        </div>
    </div>
</div>






@endsection
