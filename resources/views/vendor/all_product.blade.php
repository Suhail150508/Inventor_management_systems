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

    body{
    align-items: center;
    /* justify-content: center; */
    min-height: 100vh;
    padding: 10px;
    font-family: 'Poppins', sans-serif;
    /* background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%); */
    }
    .container{
    max-width: 800px;
    background: #fff;
    width: 800px;
    padding: 25px 40px 10px 40px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    .container .text{
    text-align: center;
    font-size: 41px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    }
    .container form{
    padding: 30px 0 0 0;
    }
    .container form .form-row{
    display: flex;
    margin: 32px 0;
    }
    form .form-row .input-data{
    width: 100%;
    height: 40px;
    margin: 0 20px;
    position: relative;
    }
    form .form-row .textarea{
    height: 70px;
    }
    .input-data input,
    .textarea textarea{
    display: block;
    width: 100%;
    height: 100%;
    border: none;
    font-size: 17px;
    border-bottom: 2px solid rgba(0,0,0, 0.12);
    }
    .input-data input:focus ~ label, .textarea textarea:focus ~ label,
    .input-data input:valid ~ label, .textarea textarea:valid ~ label{
    transform: translateY(-20px);
    font-size: 14px;
    color: #3498db;
    }
    .textarea textarea{
    resize: none;
    padding-top: 10px;
    }
    .input-data label{
    position: absolute;
    pointer-events: none;
    bottom: 10px;
    font-size: 16px;
    transition: all 0.3s ease;
    }
    .textarea label{
    width: 100%;
    bottom: 40px;
    background: #fff;
    }
    .input-data .underline{
    position: absolute;
    bottom: 0;
    height: 2px;
    width: 100%;
    }
    .input-data .underline:before{
    position: absolute;
    content: "";
    height: 2px;
    width: 100%;
    background: #3498db;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 0.3s ease;
    }
    .input-data input:focus ~ .underline:before,
    .input-data input:valid ~ .underline:before,
    .textarea textarea:focus ~ .underline:before,
    .textarea textarea:valid ~ .underline:before{
    transform: scale(1);
    }
    .submit-btn .input-data{
    overflow: hidden;
    height: 45px!important;
    width: 25%!important;
    }
    .submit-btn .input-data .inner{
    height: 100%;
    width: 300%;
    position: absolute;
    left: -100%;
    background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
    transition: all 0.4s;
    }
    .submit-btn .input-data:hover .inner{
    left: 0;
    }
    .submit-btn .input-data input{
    background: none;
    border: none;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    position: relative;
    z-index: 2;
    }
    @media (max-width: 700px) {
    .container .text{
        font-size: 30px;
    }
    .container form{
        padding: 10px 0 0 0;
    }
    .container form .form-row{
        display: block;
    }
    form .form-row .input-data{
        margin: 35px 0!important;
    }
    .submit-btn .input-data{
        width: 40%!important;
    }
    }
</style>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="/">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">invests</a></li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
            {{-- <div class="box-icon">
                <a href="/create-vendor" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create Vendor</a>
            </div> --}}

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-right:1rem;font-size:1.2rem;float:right;margin-bottom:2rem;padding-bottom:7px">
                <i class="icon-plus"></i> </span> Create Product
            </button>

        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Total Purchase Qty</th>
                      <th>Product Unit Price</th>
                      <th>Total Sold Qty</th>
                      <th>Available Qty</th>
                      <th>Reserve Qty</th>
                      <th>Purchase Upcoming Qty</th>
                      <th>Saleable Qty</th>
                      <th>Actions</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($products as $key => $product )
                    <tr>
                        <td class="center">{{ $key+1 }}</td>
                        <td class="center">{{ $product->name }}</td>
                        {{-- <td class="center">
                            <img width="50" style="border-radius:25%" src="{{ URL::asset('/teacher/'.$product->image) }}" alt="{{ $product->image }}">
                        </td> --}}
                        <td class="center">{{ $product->code }}</td>
                        <td class="center">{{ $product->total_purchase_qty }}</td>
                        <td class="center">{{ $product->product_unit_price }}</td>
                        <td class="center">{{ $product->total_sold_qty }}</td>
                        <td class="center">{{ $product->available_qty }}</td>
                        <td class="center">{{ $product->reserve_qty }}</td>
                        <td class="center">{{ $product->purchase_upcoming_qty }}</td>
                        <td class="center">{{ $product->saleable_qty }}</td>
                        <td class="center">
                            <div class="span2">

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
                            </div>

                        </td>
                    </tr>


                @endforeach
                </tr>
              </tbody>
          </table>
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
