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



        .vendor_name{
        font-size:1.6rem;
    }
    .invoice_name{
        font-size: 1.5rem;
    }
    .form-control{
        width:30%;
    }
    .small .form-control0{
        width: 60px;
        height:9px;
        font-size: .6rem;
        margin-left: 2rem;
    }
    .small .form-control1{
        width: 60px;
        height:9px;
        font-size: .6rem;
        margin-left: 2.2rem;
    }
    .small .form-control2{
        width: 60px;
        height:9px;
        font-size: .6rem;
        margin-left: 4.2rem;
    }
    .small .form-control3{
        width: 60px;
        height:9px;
        font-size: .6rem;
        margin-left: 4.4rem;
    }
    .small .form-control4{
        width: 60px;
        height:9px;
        font-size: .6rem;
        margin-left: 4.6rem;
    }
    .discount{
        padding: 8px;
    }
    .small{
        font-size: 1rem;
    }
    .status{
        margin-top:5px;
        font-size:1.2rem;
    }
    .btn{
        font-size:1.2rem;
    }
    .table_input0{
        width: 10rem;
    }
    .table_input1{
        width:90px;
    }
    .table_input2{
        width:110px;
    }
    .table_input3{
        width:110px;
    }
    .table_input4{
        width:110px;
    }
    .submit{
        height: 30px;
        width: 110px;
        padding:6px 25px;
        font-size:1.3rem;
    }
    .print{
        padding:6px 25px;
        font-size:1.3rem;
        margin-left:5rem;
        width:100px;
        height: 30px;

    }
    .vendor_body{
        width:60%;
    }
    .vendor_part{
        width:30%;
    }

    .invoice_part{
            width:30%;
            margin-top:-7rem;
        }

    .company_part{
        padding:7px;
        margin-left:-5rem;
    }
    .company_image{
        margin-bottom:2rem;
    }
    .dataContainer{
        color:#000;
        width:60%;
    }
    }
    @media (max-width: 700px) {
       thead .th_table{
            font-size: .5rem;
        }
        .vendor_name{
            font-size:1rem;
        }
        .vendor_body{
            width:100% !important;
        }
        .vendor_select{
            width:70% !important;
        }
        .invoice_name{
            font-size: .9rem;
        }
        .vendor_part{
            width:30%;
        }
        .invoice_part{
            width:30%;
            margin-top:-7rem;
        }
        .company_part{
            padding:3px;
            margin-right:-1.5rem;
        }
        .dataContainer{
            color:#000;
            width:50%;
        }
        .table_input0{
            width:85.4px;
        }
        .table_input1{
            width:32px;
        }
        .table_input2{
            width:37px;
        }
        .table_input3{
            width:42px;
        }
        .table_input4{
            width:42px;
        }
        .remove{
            width:5px !important;
            height:14px !important;
            font-size:.8rem;
        }

        .small .form-control0{
            width: 30px;
            height:6px;
            font-size: .7rem;
            margin-left: 0.46rem;
            }
        .small .form-control1{
            width: 30px;
            height:6px;
            font-size: .7rem;
            margin-left: 0.56rem;
        }
        .small .form-control2{
            width: 30px;
            height:6px;
            font-size: .7rem;
            margin-left: 2.2rem;
        }
        .small .form-control3{
            width: 30px;
            height:6px;
            font-size: .7rem;
            margin-left: 2.37rem;
        }
        .small .form-control4{
            width: 30px;
            height:6px;
            font-size: .7rem;
            margin-left: 2.55rem;
        }
        .small{
            font-size: .8rem;
        }
        .item{
            font-size:.9rem;
            border-radius:3px;
        }
        .status{
            margin-top:5px;
            font-size:.8rem;
            width:60% ;
        }
        .discount{
            padding: 4px;
            width:40%;
            text-align: center;
        }
        .print{
            padding:3px 10px;
            font-size:.9rem;
            margin-left:3rem;
            height: 30px;
            width: 60px;

        }
        .submit{
            height: 30px;
            width: 80px;
            padding:3px 10px;
            font-size:.8rem;
        }



        .container .text{
            font-size: 30px;
        }
        .container form{
            padding: 20px 0 0 30;
        }
        .container form .form-row{
            display: block;
        }
        form .form-row .input-data{
            margin-top: 50px !important;
            width: 40%!important;
        }
        .submit-btn .input-data{
            width: 60%!important;
        }
    }

</style>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
</ul>

<div class="row-fluid sortable" style="width:97%">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Stock Information</h2>
            {{-- <div class="box-icon">
                <a href="/create-vendor" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create Vendor</a>
            </div> --}}

            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-right:1rem;font-size:1.2rem;float:right;margin-bottom:2rem;padding-bottom:7px">
                <i class="icon-plus"></i> </span> Create Product
            </button> --}}

        </div>

        <div class="box-content" style="margin-top:5rem">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th class="th_table" >Id</th>
                      <th class="th_table" >Name</th>
                      <th class="th_table" >Code</th>
                      <th class="th_table" >Total Purchase Qty</th>
                      <th class="th_table" >Product Unit Price</th>
                      <th class="th_table" >Total Sold Qty</th>
                      <th class="th_table" >Available Qty</th>
                      <th class="th_table" >Reserve Qty</th>
                      <th class="th_table" >Purchase Upcoming Qty</th>
                      <th class="th_table" >Saleable Qty</th>
                      <th class="th_table" >Stock Value</th>
                      {{-- <th>Actions</th> --}}
                  </tr>
              </thead>
              @php
                  $available_qties = 0;
                  $total_unit_price = 0;
              @endphp
              <tbody>
                @foreach ($products as $key => $product )
                @php
                    $available_qties += $product->available_qty;
                    $total_unit_price += $product->product_unit_price;

                @endphp
                    <tr>
                        <td class="center table_input0">{{ $key+1 }}</td>
                        <td class="center table_input1">{{ $product->name }}</td>
                        {{-- <td class="center table_input">
                            <img width="50" style="border-radius:25%" src="{{ URL::asset('/teacher/'.$product->image) }}" alt="{{ $product->image }}">
                        </td> --}}
                        <td class="center table_input2">{{ $product->code }}</td>
                        <td class="center table_input3">{{ $product->total_purchase_qty }}</td>
                        <td class="center table_input4">{{ number_format($product->product_unit_price, 2) }}</td>
                        <td class="center table_input">{{ $product->total_sold_qty }}</td>
                        <td class="center table_input">{{ $product->available_qty }}</td>
                        <td class="center table_input">{{ $product->reserve_qty }}</td>
                        <td class="center table_input">{{ $product->purchase_upcoming_qty }}</td>
                        <td class="center table_input">{{ $product->saleable_qty }}</td>
                        <td class="center table_input">{{number_format($product->product_unit_price * $product->available_qty, 2) }}</td>
                        <td class="center table_input">
                            {{-- <div class="span2">

                                <a class="btn btn-info" href="{{url('/product-edit/'.$product->id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>

                            <div class="span2">
                                <form method="post" action="{{ url('/product-delete/'.$product->id ) }}" style="margin-left:1.5rem">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <i class="halflings-icon white trash"></i></button>

                                </form>
                            </div> --}}

                        </td>
                    </tr>


                @endforeach
                </tr>
              </tbody>
          </table>

          @php

              $total_stock_value = $available_qties * $total_unit_price;

            @endphp
              <div class="discount" style="float: right;margin:4rem 2rem;background-color:#d9d9ebc6;padding:8px;width:30%;">
                  <p style="font-weight:bold;font-size:1rem">Total Stock Value: {{number_format($total_stock_value, 2) }}  </p>
              </div>
          </div>

        </div>
    </div>
</div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <div class="text">
                    <h3 style="font-size:1.4rem"><i class="icon-plus"></i> Add Vendor</h3>
                </div>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            {{-- ... --}}

            <div class="container_modal" style="width:100%">

                <form  action="{{ url('/product-create') }}" method="POST" enctype="multipart/form-data" style="text-align:center">
                    @csrf

                    <div class="form-row" style="display: flex;justify-content:space-between">
                        <div class="input-data">
                            <label for="">Name</label>
                            <input type="text" name="name" required>
                            <div class="underline"></div>
                        </div>

                        <div class="input-data">
                            <label for="">Code</label>
                            <input type="number" name="code" required>
                            {{-- <div class="underline"></div> --}}
                        </div>
                    </div>
                    <div class="form-row" style="display: flex;justify-content:space-between">

                        <div class="data">
                            <label for="">Product Origin</label>
                            <input type="text" name="origin" >

                            {{-- <div class="underline"></div> --}}
                            {{-- <label for="">Date</label> --}}
                        </div>
                        <div class="form-row">
                            <label for=""> Year </label>
                            <input type="text" name="year" class="form control">
                        </div>
                    </div>
                    <div class="form-row" style="display: flex;justify-content:space-between">
                        <div class="form-row">
                            <label for=""> Size </label>
                            <input type="text" name="size" class="form control">
                        </div>
                        <div class="form-row">
                            <label for=""> Image </label>
                            <input type="file" accept="image/jpg, image/jpeg, image/png" name="image"  class="form control">
                        </div>
                    </div>


                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner">

                                </div>
                                <input class="btn btn-primary" type="submit" value="submit">
                            </div>
                        </div>
                </form>

            </div>


            </div>
        </div>
        </div>
    </div>
    <!-- Modal end -->



@endsection
