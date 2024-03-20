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
            <form action="/search-vendor-invoice" method="POST" class="row pt-5" style="width:50%;height:40%;display:flex;justify-content:center;padding:.2rem;margin:.9rem 5rem">
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
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody>id
                @foreach ($purchase_invoices as $key => $invoice )

                @php
                    $total += $invoice->total;
                    $paid += $invoice->paid;
                    $due += $invoice->due;

                @endphp


                    <tr>
                        <td class="center">#INV-000{{ $key+1 }}</td>
                        {{-- <td class="center">{{ $invoice->id }}</td> --}}
                        <td class="center">{{ $invoice->vendor_id }}</td>
                        <td class="center">{{ $invoice->sub_total }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->total }}</td>
                        <td class="center">{{ $invoice->paid }}</td>
                        <td class="center">{{ $invoice->due }}</td>
                        {{-- <td class="center">

                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/invoice-edit/'.$invoice->id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>

                            <div class="span2">
                                <form method="post" action="{{ url('/invoice-delete/'.$invoice->id ) }}" style="margin-left:1rem">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <i class="halflings-icon white trash"></i></button>

                                </form>
                            </div>

                        </td> --}}
                        <td>
                            <div class="dropdown">
                                <div class="">
                                <select name="name" style="width: 50%;border-radius:70px">
                                    <option  value="">select</option>
                                    <option  value="index"><a href="{{ url('#') }}"> Details </a> </option>
                                    <option  value="index"><a href="{{ url('#') }}"> Edit </a> </option>
                                    <option  value="index"><a href="{{ url('#') }}"> Delete </a> </option>
                                    <option  value="index"><a href="{{ url('#') }}"> Pdf </a> </option>
                                </select>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tr>
              </tbody>
          </table>
                <div style="float: right;margin:4rem 2rem;background-color:#d9d9ebc6;padding:8px;width:21%;">
                    <p style="font-weight:bold;font-size:1rem">Total: {{ $total }}  </p>
                    <p style="font-weight:bold;font-size:1rem">Total Paid: {{ $paid }} </p>
                    <p style="font-weight:bold;font-size:1rem">Total Due: {{ $due }} </p>
                </div>
        </div>
    </div>
</div>






@endsection
