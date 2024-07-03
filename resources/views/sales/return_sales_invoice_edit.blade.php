
@extends('layouts.app')

@section('content')

    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
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

        .customer_name{
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
        position: absolute;
        padding:6px 25px;
        font-size:1.3rem;
        margin-left:25rem;
        width:100px;
        height: 30px;

    }
    .customer_body{
        width:60%;
    }
    .customer_part{
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
    .dataContainer{
        color:#000;
        width:60%;
    }


        @media (max-width: 700px) {
        .customer_name{
            font-size:1rem;
        }
        .customer_body{
            width:100% !important;
        }
        .customer_select{
            width:70% !important;
        }
        .invoice_name{
            font-size: .9rem;
        }
        .customer_part{
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
        .company_image{
            margin-bottom:2rem;
        }
        .dataContainer{
            color:#000;
            width:50%;
        }

        thead {
            font-size:.7rem;
            margin-right:0px 5px;
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
            float: right;
            margin-top:-5rem;
        }
        .print{
            position: absolute;
            padding:3px 10px;
            font-size:.9rem;
            margin-left:5rem;
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

@media print{
    .btn{
        display: none;
    }
    .form-control{
        border: 0px;
    }
    .table_input0{
        width:185.4px;
    }
}

</style>

</head>
<body style="height: 100%">
    {{-- <div class="container card"> --}}
    <div class="">
        <div class="card-body">

            <form action="/sales-invoice-update" method="POST">
                @csrf
                <div style="width:95%;text-align:center">
                    @php
                        @$company = App\Models\Company::latest()->first();
                    @endphp
                      <div class="company_image">
                            <img width="80" style="border-radius:25%" src="{{ URL::asset('/teacher/'.@$company->logo) }}" alt="{{ @$company->logo }}">
                            <button type="button" class="btn print" onclick="GetPrint()">Print</button>
                    </div>
                    <strong class="invoice_name">Sales Edit</strong>

                </div>

                <div class="header" style="display: flex;margin-top:3rem;margin-bottom:5rem;width:95%">

                    <div class="customer_part">

                            <div class="customer_body">

                                <select class="form-control customer_select" id="selectField" name="customer_id"  style="display:none">
                                    <option value=""></option>
                                        @php
                                            $products = App\Models\Customer::all();
                                        @endphp

                                    @foreach ( $products as $product )
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="dataContainer">
                                <p style="margin:1px;padding: 0px 5px" id="name"></p>
                                <p style="margin:1px;padding: 0px 5px" id="email"></p>
                                <p style="margin:1px;padding: 0px 5px" id="mobile"></p>
                                <p style="margin:1px;padding: 0px 5px" id="address"></p>
                            </div>

                            @if ($customer_edits)

                                <div id="dataContainer">
                                    <strong>Customers Information:</strong>
                                    <p style="margin: 1px" id="name">{{ $customer_edits->name ?? '' }}</p>
                                    <p style="margin: 1px" id="email">{{ $customer_edits->email ?? '' }}</p>
                                    <p style="margin: 1px" id="mobile">{{ $customer_edits->mobile ?? '' }}</p>
                                </div>
                            @endif
                            {{-- <div>
                                <strong>Shipinng Information:</strong>
                                <div>
                                    <small style="color:black;font-size:1.3rem">Dinajpur</small>
                                </div>
                                <div>
                                    <small style="color:black;font-size:1.3rem">Chirirbander</small>
                                </div>
                                <div>
                                    <small style="color:black;font-size:1.3rem">Parbotipur</small>
                                </div>
                            </div> --}}
                    </div>

                    <div class="invoice_part">
                        <strong class="invoice_name"></strong>
                    </div>
                    <div class="company_part">

                        @php
                            @$company = App\Models\Company::latest()->first();
                        @endphp


                        <div style="">

                                <h4 style="text-align: center;padding:0 .2rem">{{ @$company->name }}</h4>
                                <p style="text-align: center;padding:0 .2rem">{{ @$company->email }}</p>
                                <p style="text-align: center;padding:0 .2rem">{{ @$company->address }}</p>

                        </div>

                    </div>

                </div>

                <table class="table table-hover table-white tableEstimate1" id="tableEstimate">
                    <thead>
                        <tr>
                            <th class="col-sm-3">product</th>
                            <th class="col-sm-3">code</th>
                            <th class="col-sm-3">Qty</th>
                            <th class="col-sm-3">unit_price</th>
                            <th class="col-sm-3">total_price</th>
                            <th class="col-sm-3">Actions</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($return_sales_edits as $key=>$edit )
                        {{-- @dd($edit->invoice_id); --}}
                    <tr>
                        @php
                            $items = App\Models\Product::where('code',$edit->code)->get();
                        @endphp
                        <td style="display: flex">

                            <select class="form-control  table_input0" id="selectProduct" name="product_id[]" >
                                @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                @endforeach

                                @php
                                    // $products = App\Models\StockProduct::all();
                                    $products = App\Models\Product::all();
                                @endphp

                                @foreach ($products as $product )
                                {{-- <option value="{{ $product->id }}">{{ $product->name }}</option> --}}
                                <option value="{{ $product->id }}" data-image="{{ URL::asset('/teacher/'.$product->image) }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <div id="productImageContainer" style="display: none;margin-left:.3rem">
                                <img id="productImage" width="35" style="border-radius: 50%" src="" alt="Product Image">
                            </div>


                        </td>
                        <td><input class="form-control code table_input1"  type="textarea"  name="code[]" value="{{ $edit->code }}"></td>

                        <td>
                            {{-- <form class="quantity_update_form" data-id="{{ $edit->id }}">
                                @csrf --}}
                                <input class="form-control qty table_input2" type="textarea"  name="qty[]" value="{{ $edit->qty }}">
                                {{-- <button class="submit1" type="submit" class="btn btn-success">Update</button>
                            </form> --}}
                        </td>
                        <td><input class="form-control unit_price table_input3" type="textarea"  name="unit_price[]" value="{{ $edit->unit_price }}"></td>
                        <td><input class="form-control total_price table_input4" type="textarea"  name="total_price[]" value="{{ $edit->total_price }}"></td>
                       <td><a href="javascript:void(0)" class="btn btn-danger remove" title="Add" id="remove" style=""><i class="icon-minus"></i></a>
                       </td>
                    </tr>
                    <input class="form-control code"  style="width:130px;display:none" type="textarea"  name="invoice_id" value="{{ $edit->invoice_id }}">
                    @endforeach
                    </tbody>
                </table>


                <div  style="margin:3rem .1rem;">

                    <a href="javascript:void(0)" class="btn btn-success item" title="Add" id="addBtn" style="font-size:1.1rem"><i class="icon-plus"></i> Add Item</a>
                </div>


                <div class="discount" style="display: flex;justify-content:space-around">
                    <div></div>
                    <div></div>
                    <div></div>

                    <div style="background-color:#d9d9ebc6;padding:8px;">
                        <p style="display:none">Sub Total1: <input type="text" id="subtotal1" ></p>
                        <p style="display:none">Sub Total2: <input type="text" id="subtotal2" ></p>
                        <div>

                        </div>
                        <div>
                            <small class="small" style="font-weight:bold;color:#000;">Sub Total: <input type="text" class="form-control0" id="subtotal" name="sub_total"  value="{{ $return_sales_invoice->sub_total }}"></small>

                        </div>
                        <div>
                            <small class="small" style="font-weight:bold;color:#000;padding-top:-1rem">Discount: <input type="text" class="form-control1" id="discount" name="discount" value="{{ $return_sales_invoice->discount }}"></small>

                        </div>
                        <div>
                            <small class="small" style="font-weight:bold;color:#000;padding-top:-1rem">Total: <input type="text" class="form-control2" id="total" name="total" value="{{ $return_sales_invoice->total}}"></small>

                        </div>
                        <div>
                            <small class="small" style="font-weight:bold;color:#000;padding-top:-1rem">Paid: <input type="text" class="form-control3" id="paid" name="paid" value="{{ $return_sales_invoice->paid }}"></small>

                        </div>
                        <div>
                            <small class="small" style="font-weight:bold;color:#000;padding-top:-1rem">Due: <input type="text" class="form-control4" id="due" name="due" value="{{ $return_sales_invoice->due }}"></small>

                        </div>
                    </div>
                </div>



            </form>

            <hr>
          </div>
        </div>
      </div>

      </div>


<script>

    document.addEventListener("DOMContentLoaded", function () {
      var selectProduct = document.getElementById('selectProduct');
      var productImage = document.getElementById('productImage');

      selectProduct.addEventListener('click', function () {
          var selectedOption = selectProduct.options[selectProduct.selectedIndex];
          var imageSrc = selectedOption.getAttribute('data-image');

          if (imageSrc) {
              productImage.src = imageSrc;
              document.getElementById('productImageContainer').style.display = 'block';
          } else {
              productImage.src = '';
              document.getElementById('productImageContainer').style.display = 'none';
          }
      });
  });
</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <!-- Your custom scripts -->
<!-- Add this script to your HTML -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script>
    // JavaScript function to handle quantity update
    function updateQuantity(productId, editId, newValue) {
        $.ajax({
            url: '/quantity_update/' + editId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                qty: newValue
            },
            success: function(response) {
                // Update the quantity field if needed
                console.log('Quantity updated successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error updating quantity:', error);
            }
        });
    }

    // Attach change event handler to quantity input fields
    $(document).on('change', '.qty', function() {
        var productId = $(this).closest('tr').find('.code').val();
        var editId = $(this).data('edit-id');
        var newValue = $(this).val();
        alert( newValue, productId);
        updateQuantity(productId, editId, newValue);
    });
</script> --}}



        <script>

            document.addEventListener('DOMContentLoaded', function() {
                function calculateSubtotal() {
                    var subtotal1Value = parseFloat($('#subtotal1').val());
                    var subtotal2Value = parseFloat($('#subtotal2').val());
                    var old_qty = parseFloat($('.qty').val());
                    // alert(old_qty);
                    var subtotal = subtotal1Value + subtotal2Value;
                    $('#subtotal').val(subtotal);
                }

                // Call calculateSubtotal function whenever subtotal1 or subtotal2 changes
                $(document).on('click', calculateSubtotal);
            });

            document.querySelectorAll('#paid').forEach(function(element) {
                element.addEventListener('change', function() {
                    var selectedValue = parseFloat(this.value);

                    var qty = $('#total').val();

                    var totall_pricess = qty - selectedValue;
                    var total_priceess = $('#due');
                    total_priceess.val(totall_pricess);

                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('selectField').addEventListener('change', function() {
                    var selectedValue = this.value;
                    $.ajax({
                        url: "{{ route('salesdatafatch') }}",
                        type: "GET",
                        data: { selectedValue: selectedValue },
                        success: function(response) {
                            var name = document.getElementById('name');
                            var email = document.getElementById('email');
                            var mobile = document.getElementById('mobile');

                            name.append(response.name);
                            email.append(response.email);
                            mobile.append(response.mobile);
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
                document.querySelectorAll('.selectProduct').forEach(function(element) {
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

                // document.querySelectorAll('#unit_price').forEach(function(element) {
                //     element.addEventListener('change', function() {
                //         var selectedValue = parseFloat(this.value);

                //         var qty = $('#qty').val();

                //         var totall_pricess = qty * selectedValue;
                //         var total_priceess = $('#total_price');
                //         total_priceess.val(totall_pricess);

                //         var subtotal1 = $('#subtotal1');
                //         console.log(subtotal1,'qq');
                //         subtotal1.val(totall_pricess);

                //         // total();
                //         // var total_pricee = $('.total_price').val();
                //         // total_price.val(price);

                //         console.log(selectedValue);
                //     });


                //     calculation1();
                // });

            });
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.qty').forEach(function(element) {
                    element.addEventListener('click', function() {
                        var old_qty = parseFloat($(this).closest('tr').find('.qty').val());
                        var old_qty_store = $('#old_qty');
                        old_qty_store.val(old_qty);

                    });
                });

                document.querySelectorAll('.qty').forEach(function(element) {
                    element.addEventListener('change', function() {
                        // var old_qty = parseFloat($(this).closest('tr').find('.qty').val());
                        var selectedValue =  $(this).val();
                        var ut_price = parseFloat($(this).closest('tr').find('.unit_price').val());
                        var total_price = ut_price * selectedValue;
                        $(this).closest('tr').find('.total_price').val(total_price.toFixed(2));
                        var old_qty_stores = $('#old_qty').val();
                        var code = parseFloat($(this).closest('tr').find('.code').val());

                        // Include CSRF token in AJAX request headers
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');
                        // alert(old_qty);
                        $.ajax({
                            url: "{{ route('slproduct.fetchs') }}",
                            type: "GET",
                            data: {
                                selectedValue: selectedValue,
                                old_qty_stores: old_qty_stores,
                                code: code,
                                },
                            success: function(response) {
                                // Find the product code input field in the same row
                                var productCodeInputs = parseFloat($(this).closest('tr').find('.unit_price'));
                                // console.log(productCodeInputs, 'bbbbbbo');
                                // Clear previous data (if needed)
                                // productCodeInputs.val('');

                                if (response) {
                                    var productCode = parseFloat(response.data);
                                    console.log(productCode, 'bbbbbbffggg');
                                    productCodeInputs.val(productCode);
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });

                        // Perform any other calculations if needed
                        calculations();
                    });
                });



                calculations();
                function calculations(){
                    var totalPricesSum = 0;

                    $(".tableEstimate1 tbody tr").each(function() {
                        var totalPrice = parseFloat($(this).find('.total_price').val());
                        if (!isNaN(totalPrice)) {
                            totalPricesSum += totalPrice;
                        }
                    });


                    var subtotal1 = $('#subtotal1');
                    console.log(subtotal1,'qq');
                    subtotal1.val(totalPricesSum);
                    // $('#subtotal2').val(totalPricesSum.toFixed(2));
                }


                $(".tableEstimate1 tbody").on("click", "#remove", function () {
            // Remove the row
            $(this).closest("tr").remove();

            // Update row indices of all subsequent rows
            $("#tableEstimate1 tbody tr").each(function(index) {
                $(this).find('.row-index p').text(index + 1);
                $(this).attr('id', 'R' + (index + 1));
            });
            calculations();
        });
            });


        // function calculation1(){
        //     var totalPricesSum = 0;

        //     $(".tableEstimate1 tbody tr").each(function() {
        //         var totalPrice = parseFloat($(this).find('.total_price').val()); // Extract total price from each row
        //         if (!isNaN(totalPrice)) { // Check if the value is a valid number
        //             totalPricesSum += totalPrice; // Add the total price to the sum
        //         }
        //         alert(totalPricesSum,'cal');
        //     });

        //     // Update the subtotal value

        // //   var sb =  $('#subtotal').val();
        //     $('#subtotal2').val(totalPricesSum.toFixed(2));
        //     console.log(totalPricesSum, 'wwwwww');
        // }


            document.getElementById('discount').addEventListener('change', function() {
                var selectedValue = this.value;
                var sub = $('#subtotal').val();

                var total_amount = sub - selectedValue;
                // alert(total_amount)
                var total = $('#total');
                total.val(total_amount);
                console.log(selectedValue);

            });

        </script>
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
                <td style="display:flex">
                        <select class="selectProduct form-control table_input0" name="product_id[]"  required>
                            <option value="">select</option>
                            @php

                                $products = App\Models\Product::all();
                            @endphp
                            @foreach ($products as $product )
                            <option value="{{ $product->id }}" data-image="{{ URL::asset('/teacher/'.$product->image) }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div class="productImageContainer" style="display: none;margin-left:.3rem">
                            <img class="productImage" width="35" style="border-radius: 15%" src="" alt="Product Image">
                        </div>
                    </td>
                    <td><input class="form-control code table_input1" type="textarea"  name="code[]"></td>
                    <td><input class="form-control  table_input2"  type="textarea" id="qty" name="qty[]"></td>
                    <td><input class="form-control  table_input3"  type="textarea" id="unit_price" name="unit_price[]"></td>
                    <td><input class="form-control  table_input4"  type="textarea" id="total_price" name="total_price[]"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger  remove" title="Remove"><i class="icon-minus"></i></a></td>
                </tr>
            `);
            rowIdx++;
        });


        $(document).on('click', '.selectProduct', function () {
            var selectedOption = $(this).find('option:selected');
            var imageSrc = selectedOption.attr('data-image');
            var productImageContainer = $(this).closest('tr').find('.productImageContainer');
            var productImage = productImageContainer.find('.productImage');

            if (imageSrc) {
                productImage.attr('src', imageSrc);
                productImageContainer.css('display', 'block');
            } else {
                productImage.attr('src', '');
                productImageContainer.css('display', 'none');
            }
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


        $("#tableEstimate").on("change", "#unit_price", function () {
            var rowIndex = $(this).closest('tr').index();
            console.log("Row index:", rowIndex);

            // Get the selected unit price
            var selectedOption = parseFloat(this.value);

            // Find the quantity input field in the same row and get its value
            var qty = parseFloat($(this).closest('tr').find('#qty').val());

            // Calculate the total amount
            var totalAmount = qty * selectedOption;

            // Find and set the value of the total_price input field in the same row
            var totalPriceInput = $(this).closest('tr').find('#total_price');
            totalPriceInput.val(totalAmount.toFixed(2)); // Round to 2 decimal places

            calculation(); // Call the calculation function after updating the total price

        });
        $("#tableEstimate").on("change", "#qty", function () {
            var rowIndex = $(this).closest('tr').index();
            console.log("Row index:", rowIndex);

            // Get the selected unit price
            var selectedValue =  $(this).val();

            // Find the quantity input field in the same row and get its value
            var code = parseFloat($(this).closest('tr').find('.code').val());

            $.ajax({
                        url: "{{ route('slproduct.fetchs') }}",
                        type: "GET",
                        data: {
                                code: code,
                                selectedValue: selectedValue,
                            },
                        success: function(response) {
                            // Find the product code input field in the same row
                            var productCodeInputs = parseFloat($(this).closest('tr').find('.unit_price'));
                            // console.log(productCodeInputs, 'bbbbbbo');
                            // Clear previous data (if needed)
                            // productCodeInputs.val('');

                            if (response) {
                                var productCode = parseFloat(response.data);
                                console.log(productCode, 'bbbbbbffggg');
                                productCodeInputs.val(productCode);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
        });


        // Call calculation function initially when the page loads
        calculation();

        function calculation(){
            var totalPricesSum = 0;

            $("#tableEstimate tbody tr").each(function() {
                var totalPrice = parseFloat($(this).find('#total_price').val()); // Extract total price from each row
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
