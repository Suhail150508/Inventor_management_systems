

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
{{--
</head>
<body> --}}
    <div class="container" style="height:100%">
        {{-- <div class="card-body"> --}}
            {{-- <div class=""> --}}
            <div class="header" style="display: flex;justify-content:space-between;width:100%">
                <strong style="font-size: 2rem">Expence Invoice</strong>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-right:1rem;font-size:1.2rem;float:right;margin-bottom:2rem;padding-bottom:7px">
                    <i class="icon-plus"></i> </span> Expence Invoice
                </button> --}}
                <div></div>
                <div></div>
                <div >
                    <button type="button" class="btn" style=" padding:6px 25px;font-size:1.3rem;" onclick="GetPrint()" class="btn btn-primary ">Print</button>
                </div>
                <div></div>
            </div>

            <form class="form_section" action="{{ url('/search-expence-invoice') }}" method="GET" style="margin-top:7rem;" >
                @csrf
                <div class=" form_inner col-md-1">

                    <h4>Category</h4>
                    @php
                        $categories = App\Models\Expence_Category::all();
                        @endphp
                    <label for="">  </label>
                    <select type="text" name="category_id" id="date">

                        <option style="font-size:1.1rem" value="all">All Category</option>
                        @foreach ($categories as $category)
                        <option style="font-size:1.1rem" value="{{ $category->id }}" {{ session('selectedCategoryId') == $category->id ? 'selected' : '' }}>{{ $category->category  }}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form_inner col-md-1">
                    <h4>From</h4>
                    <div class="">
                        <input type="date" name="date_from" id="date_from" placeholder="2018-07-03" value="{{ request()->input('date_from') }}">
                    </div>
                </div>
                <div class="form_inner col-md-1">
                    <h4>To</h4>
                    <div class="">
                        <input type="date" name="date_to" id="date_to" placeholder="2018-07-03" value="{{ request()->input('date_to') }}">
                    </div>
                </div>
                <button class="col-md-1 btn btn-secondary" type="submit" style="height: 2.3rem;margin:2rem .4rem">Search</button>
                <div class=" col-md-1"></div>
                <div class=" col-md-1"></div>
                <div></div>
            </form>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>category</th>
                          <th>Amount</th>
                          <th>Description</th>
                          {{-- <th>Actions</th> --}}
                      </tr>
                  </thead>

                  <tbody>
                    @foreach ($expences as $key => $expence )
                        <tr>
                            <td class="center">{{ $key+1 }}</td>
                            <td class="center">{{ $expence->category_id }}</td>
                            <td class="center">{{ $expence->amount }}</td>
                            <td class="center">{{ $expence->description }}</td>
                            {{-- <td class="center">
                                <div class="span2">

                                    <a class="btn btn-info" href="{{url('/expence-edit/'.$expence->id)}}" style="margin-left:.1rem;border-radius:25%">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                </div>

                            </td> --}}
                        </tr>


                    @endforeach
                    </tr>
                  </tbody>
              </table>
            </div>

            {{-- <div class="additional-info">
              <p>Add additional notes and payment information</p>
            </div>
            <div class="total">
              <ul>
                <li>SubTotal: &#2547;1110</li>
                <li>Tax(15%): &#2547;111</li>
              </ul>
              <p>Total Amount: <span>&#2547;1221</span></p>
            </div>
            <hr>
            <div class="purchase-info">
              <p>Thank you for your purchase</p>
              <button type="button" id="pay-now-btn">Pay Now</button>
            </div> --}}
        {{-- </div> --}}
    </div>





        <script>
             function GetPrint(){
                window.print();
            }
        </script>

@endsection
