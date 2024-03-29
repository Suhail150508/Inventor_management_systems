@extends('layouts.app')

@section('content')

     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>

        body {
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
        }

        .address,
        .invoice-details {
        flex: 1;
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
<body style="height: 100%">
    <div class="container">
        <div class="card-body">
                <div class="header" style="display: flex;margin-bottom:7rem">
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

            <form action="/sales-invoice-store" method="POST">
                @csrf



                <div class="shift" style="margin-top:-8rem;margin-bottom:10rem;width:20%">

                        <h3 for=""> Customers </h3>

                        <select class="form-control" id="selectField" name="customer_id"  style="width: 20rem" required>
                            <option value="">select</option>

                            @php
                                $products = App\Models\Customer::all();
                            @endphp

                            @foreach ($products as $product )
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>

                        <div id="dataContainer" style="background-color: #aaa;color:#000;width:100%;">
                            <p style="margin: .8rem " id="name"></p>
                            <p style="margin: .8rem " id="email"></p>
                            <p style="margin: .8rem " id="mobile"></p>
                        </div>

                </div>

                <table class="table table-hover table-white" id="tableEstimate">
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

                        <td>
                                <select class="form-control" id="selectProduct" name="product_id[]"  style="width: 10rem" required>
                                    <option value="">select</option>

                                    @php
                                        $products = App\Models\StockProduct::all();
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


                <div  style="margin:3rem .1rem;">

                    <a href="javascript:void(0)" class="btn btn-success font-18" title="Add" id="addBtn" style="font-size:1.7rem"><i class="icon-plus"></i> Add Item</a>
                </div>

                <div style="text-align:center;display:flex;justify-content:center">
                    <strong style="font-size: 1.7rem">Select Status</strong>
                    <select class="form-control" name="status" id="status" required style="width:14rem">
                        <option value="Unpaid">Pending</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>

                <div style="float: right;margin:4rem 2rem;background-color:#d9d9ebc6;padding:8px;width:21%;">

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

            <hr>
          </div>
        </div>
      </div>

      </div>


      {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> --}}
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <script>

            document.addEventListener('DOMContentLoaded', function() {
                function calculateSubtotal() {
                    var subtotal1Value = parseFloat($('#subtotal1').val());
                    var subtotal2Value = parseFloat($('#subtotal2').val());
                    var subtotal = subtotal1Value + subtotal2Value;
                    console.log(subtotal,'skdjflksdjflksdjf;l');
                    $('#subtotal').val(subtotal);
                }


                $(document).on('click', calculateSubtotal);
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

                            response.forEach(function(item) {

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

                            productCode.value = response;


                            response.forEach(function(item) {
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



<script>
    $(document).ready(function() {

        var rowIdx = 1;

        $("#addBtn").on("click", function () {
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

            var selectedOption = $(this).val();
            console.log(selectedOption, 'tttsss');

            var $this = $(this);

            $.ajax({
                url: "{{ route('product.fetch') }}",
                type: "GET",
                data: { selectedValue: selectedOption },
                success: function(response) {
                    var productCodeInputs = $this.closest('tr').find('.code');
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
            var selectedOption = parseFloat(this.value);


            var qty = parseFloat($(this).closest('tr').find('.qty').val());

            var totalAmount = qty * selectedOption;


            var totalPriceInput = $(this).closest('tr').find('.total_price');
            totalPriceInput.val(totalAmount.toFixed(2));

            calculation();

        });


        calculation();

        function calculation(){
            var totalPricesSum = 0;

            $("#tableEstimate tbody tr").each(function() {
                var totalPrice = parseFloat($(this).find('.total_price').val());
                if (!isNaN(totalPrice)) {
                    totalPricesSum += totalPrice;
                }
            });

            $('#subtotal2').val(totalPricesSum.toFixed(2));
            console.log(totalPricesSum, 'wwwwww');
        }


        $("#tableEstimate tbody").on("click", ".remove", function () {
            $(this).closest("tr").remove();

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
