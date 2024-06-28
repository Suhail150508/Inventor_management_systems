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

    .print{
    /* margin-top:-3rem; */
    padding:3px 20px;
    font-size:1.3rem;
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

.print{
    font-size:1rem;

}
.box-header h2{
    font-size:1rem;
}


}


</style>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Return Sales Invoices</h2>
            {{-- <div class="box-icon">
                <a href="/return-sales-invoice" class="" style="background-color: rgb(31, 73, 124);color:aliceblue;padding:6px;border-radius:10px"><i class="icon-plus"></i> Create Return Sales</a>
            </div> --}}

            <div style="float: right;margin-right:2rem;">
                <button type="button" class="btn print"  onclick="GetPrint()">Print</button>
            </div>
        </div>


        <div>
            <form action="/search-customer-invoice" method="POST" class="row pt-5" style="display:flex;justify-content:center;padding:.2rem;margin-top:4rem">
                @csrf
                @php
                    $customers = App\Models\Customer::all();
                @endphp

                <strong style="font-size:1.2rem" for=""> Customers </strong>
                <select  name="customer_id"  id="selectField">

                    <option style="font-size:1.1rem" value="All">All</option>
                    @foreach ($customers as $customer )
                    <option style="font-size:1.1rem" value="{{ $customer->id }}" {{ session('selectedCustomerId') == $customer->id ? 'selected' : '' }}>{{ $customer->name  }}</option>
                    @endforeach
                </select>
                <button type="submit" class="col-md-3 btn btn-secondary" style="font-size:1.2rem;width:100px;height:30px">Search </button>
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
                      <th>Customer Id</th>
                      <th>Sub Total</th>
                      <th>Discount</th>
                      <th>Total</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th class="action">Actions</th>
                  </tr>
              </thead>

              <tbody>
            @foreach ($sales_invoices as $key => $invoice )

                @php
                    $total += $invoice->total;
                    $paid += $invoice->paid;
                    $due += $invoice->due;
                    $vendor_id = $invoice->vendor_id;

                @endphp


                    <tr>
                        <td class="center">#INV-000{{ $invoice->id }}</td>
                        <td class="center">{{ $invoice->customer_id }}</td>
                        <td class="center">{{ $invoice->sub_total }}</td>
                        <td class="center">{{ $invoice->discount }}</td>
                        <td class="center">{{ $invoice->total }}</td>
                        <td class="center">{{ $invoice->paid }}</td>
                        <td class="center">{{ $invoice->due }}</td>



                        <td class="center action">

                            <div class="span2">

                                <a class="btn btn-info" href="{{url('/return-sales-invoice-edit/'.$invoice->id)}}" style="margin-left:.1rem;border-radius:25%">
                                    <i class="white icon-eye-open"></i>
                                </a>
                            </div>

                        </td>
                    </tr>

            @endforeach
                </tr>
              </tbody>
          </table>

                <div class="discount">
                    <p class="d_para">Total: {{ $total }}  </p>
                    <p class="d_para">Total Paid: {{ $paid }} </p>
                    <p class="d_para">Total Due: {{ $due }} </p>
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
