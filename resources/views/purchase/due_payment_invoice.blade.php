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

}

.print{
    /* margin-top:-3rem; */
    padding:3px 20px;
    font-size:1.3rem;
}
@media (max-width: 700px) {

.form_section{
    display: flex;
    justify-content:column;
     flex-wrap:wrap;
     margin-top:3rem;
     text-align: center;
     margin-left: 5rem;
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


}

@media print{
    .print{
        display: none;
    }
}
</style>

<div class="row-fluid sortable">
    <div class="box span12">
        {{-- <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Vendor Due Payment</h2>
        </div> --}}
            {{-- <div class="box-icon">
                <a href="/due-payment-invoice-create" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Due Payment Create</a>
            </div> --}}

        <div class="box-header" style="display: flex;justify-content:space-between">
            <strong><i class="halflings-icon user"></i><span class="break"></span>Vendor Due Payment</strong>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <button type="button" class="action btn btn-secondary print" style="height: 30px" onclick="GetPrint()" >Print</button>
            <div></div>
        </div>

        <script>
             function GetPrint(){
                window.print();
            }
        </script>




        <form  action="{{ url('/due-vendor-payment') }}" method="GET" style="display: flex;justify-content:center; flex-wrap:wrap;margin-top:5rem">
            @csrf
            <div class=" form_inner col-md-1" >
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


        <div>
            {{-- <form action="/due-vendor-payment" method="GET" class="row pt-5" style="width:50%;height:40%;display:flex;justify-content:center;padding:.2rem;margin:.9rem 5rem">
                @csrf
                @php
                    $vendors = App\Models\Vendor::all();
                @endphp

                <strong style="font-size:1.2rem" for=""> Vendors </strong>
                <select  name="vendor_id"  id="selectField">

                    <option style="font-size:1.1rem" value="all">All</option>
                    @foreach ($vendors as $vendor )
                    <option style="font-size:1.1rem" value="{{ $vendor->id }}" {{ session('selectedVendorId') == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="col-md-3 btn btn-success" style="font-size:1.2rem;width:100px;height:32px">Search </button>
            </form> --}}
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
                      <th>Id</th>
                      <th>Vendor Id</th>
                      <th>Paid Amount</th>
                      <th>Discount</th>
                      <th>Description</th>
                      <th>Date</th>
                  </tr>
              </thead>

              <tbody>
        @foreach ($paids as $key => $invoice )

                @php
                    $paid += $invoice->paid_amount;

                @endphp


                    <tr>
                        <td class="center">#INV-000{{ $key+1 }}</td>
                        {{-- <td class="center">{{ $invoice->id }}</td> --}}
                        <td class="center">{{ $invoice->vendor_id }}</td>
                        <td class="center">{{ $invoice->paid_amount }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->description }}</td>
                        <td class="center">{{ $invoice->created_at }}</td>
                        {{-- <td class="center"> --}}

                            {{-- <div class="span2">

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
                            </div> --}}

                        {{-- </td> --}}
                        {{-- <td>
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
                        </td> --}}
                    </tr>

            @endforeach
                </tr>
              </tbody>
          </table>
                <div style="float: right;margin:4rem 2rem;background-color:#d9d9ebc6;padding:8px;width:20%;">
                    {{-- <p style="font-weight:bold;font-size:1rem">Total: {{ $total }}  </p> --}}
                    <p style="font-weight:bold;font-size:1rem">Total Paid: {{ $paid }} </p>
                </div>
        </div>
    </div>
</div>






@endsection
