@extends('layouts.app')

@section('content')

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>

    body {
    /* margin: 0;
    padding: 0; */
    font-family: Arial, sans-serif;
    }

    .card {
    width: 100%;
    margin: 50px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    }

    .container {
    padding: 20px;
    }

    .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .actions .btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }

    .actions .btn:hover {
    background-color: #66e4b4;
    }

    .logo {
    text-align: center;
    margin-bottom: 20px;
    }

    .address-details {
    display: flex;
    /* justify-content: space-between; */
    }

    .address,
    .invoice-details {
    flex: 1;
    /* margin-left: 6% */
    }

    .address ul,
    .invoice-details ul {
    list-style: none;
    padding: 0;
    }

    .invoice-details .badge {
    background-color: #ffc107;
    color: #000;
    }

    .table-container {
    overflow-x: auto;
    margin-bottom: 20px;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    }

    thead {
    background-color: #84b0ca;
    color: #fff;
    }

    thead th,
    tbody td {
    padding: 10px;
    text-align: left;
    }

    .additional-info p {
    margin-top: 80px;
    }

    .total ul {
    list-style: none;
    padding: 0;
    }

    .total span {
    font-size: 25px;
    font-weight: bold;
    }

    .purchase-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    #pay-now-btn {
    padding: 10px 20px;
    background-color: #60bdf3;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }

    #pay-now-btn:hover {
    background-color: #3c8dbc;
    }






    /* body {
    font-family: 'Roboto', sans-serif;
    padding: 0;
    margin: 0;
    } */

    small {
    font-size: 12px;
    color: rgba(0, 0, 0, 0.4);
    }

    h1 {
    text-align: center;
    padding: 50px 0;
    font-weight: 800;
    margin: 0;
    letter-spacing: -1px;
    color: inherit;
    font-size: 40px;
    }

    h2 {
    text-align: center;
    font-size: 30px;
    margin: 0;
    font-weight: 300;
    color: inherit;
    padding: 50px;
    }

    .center {
    text-align: center;
    }

    /* NAVIGATION */
    nav {
    width: 80%;
    margin: 0 auto;
    background: #fff;
    padding: 50px 0;
    box-shadow: 0px 5px 0px #dedede;
    }
    nav ul {
    list-style: none;
    text-align: center;
    }
    nav ul li {
    display: inline-block;
    }
    nav ul li a {
    display: block;
    padding: 15px;
    text-decoration: none;
    color: #aaa;
    font-weight: 800;
    text-transform: uppercase;
    margin: 0 10px;
    }
    nav ul li a,
    nav ul li a:after,
    nav ul li a:before {
    transition: all .5s;
    }
    nav ul li a:hover {
    color: #555;
    }


    /* stroke */
    nav.stroke ul li a,
    nav.fill ul li a {
    position: relative;
    }
    nav.stroke ul li a:after,
    nav.fill ul li a:after {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 0%;
    content: '.';
    color: transparent;
    background: #aaa;
    height: 1px;
    }
    nav.stroke ul li a:hover:after {
    width: 100%;
    }

    nav.fill ul li a {
    transition: all 2s;
    }

    nav.fill ul li a:after {
    text-align: left;
    content: '.';
    margin: 0;
    opacity: 0;
    }
    nav.fill ul li a:hover {
    color: #fff;
    z-index: 1;
    }
    nav.fill ul li a:hover:after {
    z-index: -10;
    animation: fill 1s forwards;
    -webkit-animation: fill 1s forwards;
    -moz-animation: fill 1s forwards;
    opacity: 1;
    }

    /* Circle */
    nav.circle ul li a {
    position: relative;
    overflow: hidden;
    z-index: 1;
    }
    nav.circle ul li a:after {
    display: block;
    position: absolute;
    margin: 0;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    content: '.';
    color: transparent;
    width: 1px;
    height: 1px;
    border-radius: 50%;
    background: transparent;
    }
    nav.circle ul li a:hover:after {
    -webkit-animation: circle 1.5s ease-in forwards;
    }

    /* SHIFT */
    nav.shift ul li a {
    position:relative;
    z-index: 1;
    }
    nav.shift ul li a:hover {
    color: #91640F;
    }
    nav.shift ul li a:after {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 1px;
    content: '.';
    color: transparent;
    background: #F1C40F;
    border-radius: 3px;
    visibility: none;
    opacity: 0;
    z-index: -1;
    }
    nav.shift ul li a:hover:after {
    opacity: 1;
    visibility: visible;
    height: 100%;
    }



    /* Keyframes */
    @-webkit-keyframes fill {
    0% {
        width: 0%;
        height: 1px;
    }
    50% {
        width: 100%;
        height: 1px;
    }
    100% {
        width: 100%;
        height: 100%;
        background: #333;
    }
    }

    /* Keyframes */
    @-webkit-keyframes circle {
    0% {
        width: 1px;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        height: 1px;
        z-index: -1;
        background: #eee;
        border-radius: 100%;
    }
    100% {
        background: #aaa;
        height: 5000%;
        width: 5000%;
        z-index: -1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        border-radius: 0;
    }
    }

    @media print{
        .btn{
            display: none;
        }
        .form-control{
            border: 0px;
        }
    }

</style>

</head>
<body style="height: 100%;width:100%;">
    {{-- <div class="container card"> --}}
    <div class="container">
        <div class="card-body">
                <div class="header" style="display: flex;margin-bottom:7rem;width:97%">
                    <strong style="font-size: 2rem">Purchase Invoice</strong>

                    <div style="margin-right:2rem;background-color:#aaa;min-width:10%">

                        @php
                            $companies = App\Models\Company::all();
                        @endphp


                        <div style="text-align: left">
                            @foreach ($companies as $company )
                                <div style="text-align: center">
                                    <img width="80" style="border-radius:25%" src="{{ URL::asset('/teacher/'.$company->logo) }}" alt="{{ $company->logo }}">
                                </div>
                                <h3 style="text-align: center;padding:.2rem">{{ $company->name }}</h3>
                                <h4 style="text-align: center;padding:.2rem">{{ $company->email }}</h4>
                                <p style="text-align: center;padding:.2rem">{{ $company->address }}</p>

                            @endforeach
                        </div>

                    </div>

                </div>

            <form action="/purchase-invoice-store" method="POST">
                @csrf

                <div class="shift" style="margin-top:-8rem;margin-bottom:10rem;width:20%">
                    @php
                        $vendors = App\Models\Vendor::all();
                    @endphp

                        <h3 for=""> Vendors </h3>
                        <select class="form-control"  name="vendor_id"  id="selectField" required>

                            <option style="font-size:1.1rem" value=""></option>
                            @foreach ($vendors as $vendor )
                            <option style="font-size:1.1rem" value="{{ $vendor->id }}">{{ $vendor->name  }}</option>
                            @endforeach
                        </select>

                        <div id="dataContainer" style="background-color: #aaa;color:#000;width:100%;">
                            <p style="margin: .8rem " id="name"></p>
                            <p style="margin: .8rem " id="email"></p>
                            <p style="margin: .8rem " id="mobile"></p>
                            <p style="margin: .8rem " id="address"></p>
                        </div>

                </div>

                <table class=" table table-hover table-white" id="tableEstimate" style="width:95%">
                    <thead>
                        <tr>
                            <th class="col-sm-3">product</th>
                            <th class="col-sm-3">code</th>
                            <th class="col-sm-3">Qty</th>
                            <th class="col-sm-3">unit_price</th>
                            <th class="col-sm-3">total_price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{-- <td>1</td> --}}
                        <td>
                                <select class="form-control" id="selectProduct" name="product_id[]"  style="width: 10rem" required>
                                    <option value="">select</option>

                                    @php
                                        $products = App\Models\StockProduct::all();
                                        // $products = App\Models\Product::all();
                                    @endphp

                                    @foreach ($products as $product )
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>

                        </td>
                        <td><input class="form-control "  style="width:130px" type="textarea" id="productCode" name="code[]"></td>
                        <td><input class="form-control " style="width:130px" type="textarea" id="qty" name="qty[]"></td>
                        <td><input class="form-control " style="width:130px" type="textarea" id="unit_price" name="unit_price[]"></td>
                        <td><input class="form-control " style="width:130px" type="textarea" id="total_price" name="total_price[]"></td>
                    </tr>
                    </tbody>
                </table>


                {{-- <table class="table table-bordered" id="table">
                    <tr>
                        <th>qty</th>
                        <th>*</th>
                    </tr>
                    <tr>
                        <td> <input type="text" class="form-control" name="inputs[0][name]" id="name" style="width:40px"> </td>
                        <td> <input type="text" class="form-control" name="inputs[0][qty]" id="name" style="width:40px"> </td>
                        <td> <button type="button" id ="add" class="btn btn-success"> add item </button> </td>
                    </tr>
                </table> --}}

                <div  style="margin:3rem .1rem;">

                    <a href="javascript:void(0)" class="btn btn-success font-18" title="Add" id="addBtn" style="font-size:1.7rem"><i class="icon-plus"></i> Add Item</a>
                </div>

                <div style="text-align:center;display:flex;justify-content:center">
                    <strong style="font-size: 1.7rem">Select Status</strong>
                    <select class="form-control" name="status" id="status" required style="width:14rem">
                        <option value="Unpaid">Pending</option>
                        <option value="Paid">Recieve</option>
                    </select>
                </div>

                <div style="float: right;margin:4rem 5rem;background-color:#d9d9ebc6;padding:8px;width:21%;">

                    <p style="display:none">Sub Total1: <input type="text" id="subtotal1" style="width: 60px;height:20px"></p>
                    <p style="display:none">Sub Total2: <input type="text" id="subtotal2" style="width: 60px;height:20px"></p>
                    <p style="font-weight:bold;font-size:1.7rem">Sub Total: <input type="text" class="form-control" id="subtotal" name="sub_total" style="width: 60px;height:16px"></p>
                    <p style="font-weight:bold;font-size:1.7rem">Discount: <input type="text" class="form-control" id="discount" name="discount" style="width: 60px;height:16px"></p>
                    <p style="font-weight:bold;font-size:1.7rem">Total: <input type="text" class="form-control" id="total" name="total" style="width: 60px;height:16px"></p>
                    <p style="font-weight:bold;font-size:1.7rem">Paid: <input type="text" class="form-control" id="paid" name="paid" style="width: 60px;height:16px"></p>
                    <p style="font-weight:bold;font-size:1.7rem">Due: <input type="text" class="form-control" id="due" name="due" style="width: 60px;height:16px"></p>
                </div>

                <div style="text-align: center;margin-top:27rem">
                    <button type="submit" style=" padding:6px 25px;font-size:2.2rem"  class="btn btn-primary ">submit</button>
                    <button type="button" class="btn" style=" padding:6px 25px;font-size:2.2rem;margin-left:5rem" onclick="GetPrint()" class="btn btn-primary ">Print</button>
                </div>


            </form>





            {{-- <form action="/purchase-invoice-store" method="POST"  class="container row form-group input-group" >
                    <div class="shift" style="margin-top:-4rem;margin-bottom:3rem">
                        @php
                            $vendors = App\Models\Vendor::all();
                        @endphp

                            <h3 for=""> Vendors </h3>
                            <select  name="vendor_id"  id="selectField" required>

                                <option style="font-size:1.1rem" value=""></option>
                                @foreach ($vendors as $vendor )
                                <option style="font-size:1.1rem" value="{{ $vendor->id }}">{{ $vendor->name  }}</option>
                                @endforeach
                            </select>

                            <div id="dataContainer" style="background-color: #aaa;color:#000;padding:.4rem;width:20%;">
                                <p id="name"></p>
                                <p id="email"></p>
                                <p id="phone"></p>
                            </div>

                    </div>
                    <div style="display: flex;justify-content:space-evenly; flex-wrap:wrap;margin-left:-3rem">
                        <h4>Product</h4>
                        <h4> Code </h4>
                        <h4 > QTY </h4>
                        <h4>Unit Price</h4>
                        <h4>Total Price</h4>

                    </div>

                <div id="item1" style="display: flex;justify-content:space-evenly; flex-wrap:wrap;margin-left:-3rem">
                     @csrf
                    <div class=" ">

                        <div class="">
                                    <select id="selectProduct" name="product_id"  style="width: 10rem" required>
                                        <option value="">select</option>

                                        @php
                                            $products = App\Models\Product::all();
                                        @endphp

                                        @foreach ($products as $product )
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                        </div>

                    </div>
                    <div class=" ">
                        <div class="">
                            <input type="text" name="code" id="productCode" style="width: 10rem;border:1.5px solid blue">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="">
                            <input type="text" name="qty" id="qty" style="width: 10rem;border:1.5px solid blue">

                        </div>
                    </div>
                    <div class=" col-md-2 ">
                        <div class="">
                            <input type="text" name="unit_price" id="unit_price" style="width: 10rem;border:1.5px solid blue">
                        </div>
                    </div>
                    <div class=" col-md-2 ">
                        <div class="">
                            <input type="text" name="total_price" id="total_price"  style="width: 10rem;border:1.5px solid blue">
                        </div>
                    </div>

                </div>

                <button type="button" class="delete-item" style="margin-top: 20px;">Delete</button>
                <div  style="text-align: center;margin:2rem">

                    <button type="button" id="copyItem"><i class="icon-plus"></i> Item</button>
                </div>

                <div style="float: right;margin:6rem;background-color:#aaa;padding:8px;width:20%;">

                    <h3>Sub Total: <input type="text" id="subtotal" style="width: 60px;height:12px"></h3>
                    <h3>Discount: <input type="text" id="discount" name="discount" style="width: 60px;height:12px"></h3>
                    <h3>Total: <input type="text" id="total" name="total" style="width: 60px;height:12px"></h3>
                    <h3>Paid: <input type="text" id="paid" name="paid" style="width: 60px;height:12px"></h3>
                    <h3>Due: <input type="text" id="total" name="due" style="width: 60px;height:12px"></h3>
                </div>


                <div  style="margin-top: 20rem;text-align:center">
                    <button type="submit" style="padding:7px 2rem">Submit</button>
                </div>
            </form> --}}


            {{-- <div class="table-container">
              <table>
                <thead style="background-color:white;color:#000">
                  <tr>
                    <th>SL</th>
                    <th>Item</th>
                    <th>Code</th>
                    <th>QTY</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>

                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>


                    @foreach ($product_invoices as $customer_invoice )

                        <tr>
                            <td>{{ $customer_invoice->id }}</td>
                            @php
                                $customer =App\Models\Customer::where('id',$customer_invoice->customer_id)->first();

                            @endphp
                            <td>
                                <img width="40" style="border-radius:30px" src="{{URL::asset('/teacher/'. $customer->image)}}" alt="{{ $customer->image }}">
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer_invoice->date }}</td>
                            <td>&#2547;{{$customer_invoice->total_amount}}</td>
                            <td>&#2547;{{$customer_invoice->due_amount}}</td>
                            <td>{{$customer_invoice->status}}</td>
                            <td>

                                <div class="dropdown">
                                    <div>
                                        <select id="dropdownOptions" name="name" style="width: 50%;border-radius:70px">
                                            <option value="">select</option>
                                            <option value="/invoice-details/{{ $customer->id }}">Details</option>
                                        </select>
                                    </div>
                                </div>


                                    <script>
                                        document.getElementById("dropdownOptions").addEventListener("change", function() {
                                            var selectedOption = this.value;
                                            if (selectedOption !== "") {
                                                window.location.href = selectedOption;
                                            }
                                        });
                                    </script>
                    @endforeach

                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div> --}}


        {{-- <div> --}}
            {{-- <div class="panel panel-default">
                <div class="panel-heading">Dynamic Form Fields - Add & Remove Multiple fields</div>
                <div class="panel-heading">Education Experience</div>
                <div class="panel-body">

                <div id="education_fields">

                </div>
                <div class="col-sm-3 nopadding">
                    <div class="form-group">
                        <input  class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name">
                    </div>
                </div>
                <div class="col-sm-3 nopadding">
                    <div class="form-group">
                        <input  class="form-control" id="Major" name="Major[]" value="" placeholder="Major">
                    </div>
                </div>
                <div class="col-sm-3 nopadding">
                    <div class="form-group">
                        <input  class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree">
                    </div>
                </div>

                <div class="col-sm-3 nopadding">
                    <div class="form-group">
                        <div class="input-group">
                            <select class="form-control" id="educationDate" name="educationDate[]">

                            <option value="">Date</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            </select>
                            <div class="input-group-btn">
                            <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>

                </div>
                <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
                <div class="panel-footer"><small><em><a href="http://shafi.info/">More Info - Developer Shafi (Bangladesh)</a></em></em></small></div>
            </div> --}}
        {{-- </div> --}}

            <hr>
          </div>
        </div>
      </div>

      </div>


      <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        <script>

            document.addEventListener('DOMContentLoaded', function() {
                // Other event listeners and AJAX calls...

                // Calculate subtotal and update field
                function calculateSubtotal() {
                    var subtotal1Value = parseFloat($('#subtotal1').val());
                    var subtotal2Value = parseFloat($('#subtotal2').val());
                    var subtotal = subtotal1Value + subtotal2Value;
                    console.log(subtotal,'skdjflksdjflksdjf;l');
                    $('#subtotal').val(subtotal);
                }

                // Call calculateSubtotal function whenever subtotal1 or subtotal2 changes
                $(document).on('click', calculateSubtotal);
            });

            // calculateSubtotal();

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('selectField').addEventListener('change', function() {
                    var selectedValue = this.value;
                    $.ajax({
                        url: "{{ route('fetch.data') }}",
                        type: "GET",
                        data: { selectedValue: selectedValue },
                        success: function(response) {
                            var name = document.getElementById('name');
                            var email = document.getElementById('email');
                            var mobile = document.getElementById('mobile');
                            var address = document.getElementById('address');

                            name.append(response.name);
                            email.append(response.email);
                            mobile.append(response.mobile);
                            address.append(response.address);
                            // Append fetched data
                            response.forEach(function(item) {
                                // dataContainer.innerHTML += '<p>' + item + '</p>'; // This line is not needed here
                                // Modify 'field_name' according to your actual field name
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });
                document.getElementById('selectProduct').addEventListener('change', function() {
                    var selectedValue = this.value;
                    $.ajax({
                        url: "{{ route('product.fetchs') }}",
                        type: "GET",
                        data: { selectedValue: selectedValue },
                        success: function(response) {
                            var productCode = document.getElementById('productCode');
                            // Clear previous data
                            // console.log(response,'okkkss');
                            productCode.value = response;

                            // Append fetched data
                            response.forEach(function(item) {
                                // dataContainer.innerHTML += '<p>' + item + '</p>'; // This line is not needed here
                                // Modify 'field_name' according to your actual field name
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });

                document.querySelectorAll('#unit_price').forEach(function(element) {
                    element.addEventListener('change', function() {
                        var selectedValue = parseFloat(this.value);

                        var qty = $('#qty').val();

                        var totall_pricess = qty * selectedValue;
                        var total_priceess = $('#total_price');
                        total_priceess.val(totall_pricess);

                        var subtotal1 = $('#subtotal1');
                        console.log(subtotal1,'qq');
                        subtotal1.val(totall_pricess);

                        // total();
                        // var total_pricee = $('.total_price').val();
                        // total_price.val(price);

                        console.log(selectedValue);
                    });
                });

            });


            document.getElementById('discount').addEventListener('change', function() {
                var selectedValue = this.value;
                var sub = $('#subtotal').val();

                var total_amount = sub - selectedValue;
                alert(total_amount)
                var total = $('#total');
                total.val(total_amount);
                console.log(selectedValue);

            });

        </script>


        @php
        $products = App\Models\StockProduct::all();
        @endphp

{{-- <td class="row-index text-center"><p>${rowIdx}</p></td> --}}
{{-- <script>
    $(document).ready(function() {
        var rowIdx = 1;

        $("#addBtn").on("click", function () {
            // Adding a row inside the tbody.
            $("#tableEstimate tbody").append(`
                <tr id="R${rowIdx}">

                    <td>
                            <select id="selectProduct" name="product_id[]"  style="width: 10rem" required>
                                <option value="">select</option>

                                @foreach ($products as $product )
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>

                    </td>
                    <td><input class="form-control" type="textarea" style="width:130px" name="product_id[]"></td>
                    <td><input class="form-control" type="textarea" style="width:130px" name="code[]"></td>
                    <td><input class="form-control qty" style="width:130px" type="textarea" name="qty[]"></td>
                    <td><input class="form-control unit_price" style="width:130px" type="textarea" name="unit_price[]"></td>
                    <td><input class="form-control unit_price" style="width:130px" type="textarea" name="total_price[]"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger font-18 remove" title="Remove"><i class="icon-minus"></i></a></td>
                </tr>
            `);
            rowIdx++;
        });

        $("#tableEstimate tbody").on("click", ".remove", function () {
            // Remove the row
            $(this).closest("tr").remove();

            // Update row indices of all subsequent rows
            $("#tableEstimate tbody tr").each(function(index) {
                $(this).find('.row-index p').text(index + 1);
                $(this).attr('id', 'R' + (index + 1));
            });
        });
    });

    var productIdValue = $("input[name='product_id[]']").val();
    console.log(productIdValue);


</script> --}}

<script>
    $(document).ready(function() {

        var rowIdx = 1;

        $("#addBtn").on("click", function () {
            // Adding a row inside the tbody.
            $("#tableEstimate tbody").append(`
            <tr id="R${rowIdx}">
                    <td>
                        <select class="selectProduct form-control" name="product_id[]" style="width: 10rem" required>
                            <option value="">select</option>
                            @foreach ($products as $product )
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input class="form-control code" type="textarea" style="width:130px" name="code[]"></td>
                    <td><input class="form-control qty" style="width:130px" type="textarea" name="qty[]"></td>
                    <td><input class="form-control unit_price" style="width:130px" type="textarea" name="unit_price[]"></td>
                    <td><input class="form-control total_price" style="width:130px" type="textarea" name="total_price[]"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger font-18 remove" title="Remove"><i class="icon-minus"></i></a></td>
                </tr>
            `);
            rowIdx++;
        });


        $("#tableEstimate").on("change", ".selectProduct", function () {
            var rowIndex = $(this).closest('tr').index();
            console.log("Row index:", rowIndex, 'index');

            // Get the selected product ID
            var selectedOption = $(this).val();
            console.log(selectedOption, 'tttsss');

            var $this = $(this); // Store the reference to $(this) in a variable

            $.ajax({
                url: "{{ route('product.fetch') }}",
                type: "GET",
                data: { selectedValue: selectedOption },
                success: function(response) {
                    // Find the product code input field in the same row
                    var productCodeInputs = $this.closest('tr').find('.code');
                    // console.log(productCodeInputs, 'bbbbbbo');
                    // Clear previous data (if needed)
                    productCodeInputs.val('');

                    if (response) {
                        var productCode = parseFloat(response.data);
                        console.log(response, 'bbbbbbff');
                        productCodeInputs.val(productCode);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });


        $("#tableEstimate").on("change", ".unit_price", function () {
            var rowIndex = $(this).closest('tr').index();
            console.log("Row index:", rowIndex);

            // Get the selected unit price
            var selectedOption = parseFloat(this.value);

            // Find the quantity input field in the same row and get its value
            var qty = parseFloat($(this).closest('tr').find('.qty').val());

            // Calculate the total amount
            var totalAmount = qty * selectedOption;

            // Find and set the value of the total_price input field in the same row
            var totalPriceInput = $(this).closest('tr').find('.total_price');
            totalPriceInput.val(totalAmount.toFixed(2)); // Round to 2 decimal places

            calculation(); // Call the calculation function after updating the total price

        });

        // Call calculation function initially when the page loads
        calculation();

        function calculation(){
            var totalPricesSum = 0;

            $("#tableEstimate tbody tr").each(function() {
                var totalPrice = parseFloat($(this).find('.total_price').val()); // Extract total price from each row
                if (!isNaN(totalPrice)) { // Check if the value is a valid number
                    totalPricesSum += totalPrice; // Add the total price to the sum
                }
            });

            // Update the subtotal value

        //   var sb =  $('#subtotal').val();
            $('#subtotal2').val(totalPricesSum.toFixed(2));
            console.log(totalPricesSum, 'wwwwww');
        }


            // var sub1 = $('#subtotal1').val();
            // var sub2 = $('#subtotal2').val();
            // var subt = sub1 + sub2;
            // var sub = $('#subtotal');
            // sub.val(subt);


        $("#tableEstimate tbody").on("click", ".remove", function () {
            // Remove the row
            $(this).closest("tr").remove();

            // Update row indices of all subsequent rows
            $("#tableEstimate tbody tr").each(function(index) {
                $(this).find('.row-index p').text(index + 1);
                $(this).attr('id', 'R' + (index + 1));
            });
            calculation();
        });


    });

    function GetPrint(){
        window.print();
    }
</script>


    </div>



</body>
</html>

@endsection
