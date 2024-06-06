@extends('layouts.app')

@section('content')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<style>

body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.card {
  width: 100%;
  margin-right: 6rem;
  margin: 50px auto;
  /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
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






body {
  font-family: 'Roboto', sans-serif;
  padding: 0;
  margin: 0;
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





body {
	min-height: 100vh;
	padding: 0;
	margin: 0;
	color: #555;
}

.datetimepicker {
	display: inline-flex;
	align-items: center;
	background-color: #fff;
	border: 2px solid rgb(159, 215, 228);
	border-radius: 8px;

	&:focus-within {
		border-color: teal;
	}

	input {
		font: inherit;
		color: inherit;
		appearance: none;
		outline: none;
		border: 0;
		background-color: transparent;

		&[type=date] {
			width: 13rem;
			padding: .1rem 0 .25rem .5rem;
			border-right-width: 0;
		}

		&[type=time] {
			width: 5.5rem;
			/* padding: .25rem .5rem .25rem 0; */
			border-left-width: 0;
		}
	}

	span {
		height: .1rem;
		margin-right: .25rem;
		margin-left: .25rem;
		border-right: 1px solid #ddd;
	}
}

.info {
	padding-top: .5rem;
	font-size: .8rem;
	color: rgba(255, 255, 255, .5);
}

.container_modal{
  max-width: 100vw;
  background: #fff;
  width: 100%;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container_modal .text{
  text-align: center;
  font-size: 20px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container_modal form{
  padding: 30px 0 0 0;
}
.container_modal form .form-row{
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
  .container_modal .text{
    font-size: 30px;
  }
  .container_modal form{
    padding: 10px 0 0 0;
  }
  .container_modal form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}
@media print{
    .btn{
        display: none;
    }
}

</style>

</head>
<body>
    <div class="container card" style="height:100%;width:90%">
        <div class="card-body">
            <div class="">
                <div class="header" style="margin-bottom:4rem">
                    <strong style="font-size: 1.6rem">Investor Statement</strong>
                </div>

                <div>

                </div>


                <form action="/investor_statement" method="GET" class="container row form-group input-group" style=" display:flex;justify-content:left; gap:30; flex-wrap:wrap">


                    <div class=" col-md-3">
                        <h4>Investor</h4>
                        <div class="">

                            <select type="text" name="id" id="date" placeholder="Name" class="form-control" style="border:2px solid rgb(0, 204, 255)">
                                <option value="">Search</option>

                                @php
                                    $investors =App\Models\Investor::all();
                                @endphp

                                @foreach ($investors as $investor)
                                    <option value="{{ $investor->id }}" {{ session('selectedInvestorId') == $investor->id ? 'selected' : '' }}>{{ $investor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <h4>Search by</h4>
                        <div class="">
                            <select type="text" name="record" placeholder="Name" class="form-control" style="border:2px solid rgb(0, 204, 255)">
                                <option style="font-size:1.1rem" value="">Select One</option>
                                <option style="font-size:1.1rem" value="invest_record" {{ session('selectedRecord') == 'invest_record' ? 'selected' : '' }}>Invest Amount Record</option>
                                <option style="font-size:1.1rem" value="return_record" {{ session('selectedRecord') == 'return_record' ? 'selected' : '' }}>Return Amount Record</option>
                                <option style="font-size:1.1rem" value="all_record" {{ session('selectedRecord') == 'all_record' ? 'selected' : '' }}>All Record</option>
                            </select>
                        </div>
                    </div>

                    <div class=" col-md-3 " style="margin-top: 2rem">
                        <button type="submit" class="col-md-3 btn btn-secondary" style="font-size:1.2rem;width:100px;height:35px;border-radius:5px">Search </button>

                    </div>

                </form>

            </div>

            <div class="table-container" style="padding-bottom: 2rem">
                 @php
                    $totalAmount = 0;
                    $totalReturnAmount = 0;
                    $investor_invest_amounts = @$investor_invest_amounts;
                    $investor_return_amounts = @$investor_return_amounts;
                    $joined_records = @$joined_records;
                    $investor_all_amounts = @$investor_all_amounts;

                    @endphp

                    {{-- @dd(@$investor_invest_amounts,@$investor_return_amounts); --}}

            @if ($investor_invest_amounts)

                <table>
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Investor Name</th>
                        <th>Invest Amount</th>
                        {{-- <th>Return Amount</th> --}}
                        <th>Description</th>
                        <th>Date</th>
                        <th>Present Amount</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                    </thead>
                    <tbody>



                        @foreach ($investor_invest_amounts as $investor_invest)
                            <tr>
                                <td>{{ $investor_invest->id }}</td>
                                @php
                                    $investor = App\Models\Investor::find($investor_invest->investor_id);

                                    $totalAmount += $investor_invest->amount;
                                    $totalReturnAmount += $investor_invest->return_amount;
                                @endphp
                                <td>{{ $investor ? $investor->name : 'Unknown Investor' }}</td>
                                <td>{{ $investor_invest->amount }}</td>
                                <td>{{ $investor_invest->category }}</td>
                                <td>{{ $investor_invest->created_at }}</td>
                                <td>{{ $investor_invest->amount - $investor_invest->return_amount }}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                </div>


                <div style="text-align:right;width:100%">

                    <div class="additional-info">
                        <p>Total Calculation </p>
                    </div>
                    <div class="total">
                        <ul>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Invest Amount: {{$totalAmount}}</span></li>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Return Amount: {{ $totalReturnAmount }}</span></li>
                        </ul>
                        <p style="font-size:1.4rem;font-weight:bold">Total Amount:{{$totalAmount -  $totalReturnAmount}}</p>
                    </div>
                    <hr>

                </div>

            @endif
            @if ($investor_return_amounts)

                <table>
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Investor Name</th>
                        {{-- <th>Invest Amount</th> --}}
                        <th>Return Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Present Amount</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                    </thead>
                    <tbody>



                        @foreach ($investor_return_amounts as $investor_return)
                            <tr>
                                <td>{{ $investor_return->id }}</td>
                                @php
                                    $investor = App\Models\Investor::find($investor_return->investor_id);

                                    $totalAmount += $investor_return->amount;
                                    $totalReturnAmount += $investor_return->return_amount;
                                @endphp
                                <td>{{ $investor ? $investor->name : 'Unknown Investor' }}</td>
                                {{-- <td>{{ $investor_return->amount }}</td> --}}
                                <td>{{ $investor_return->return_amount }}</td>
                                <td>{{ $investor_return->category }}</td>
                                <td>{{ $investor_return->created_at }}</td>
                                <td>{{ $investor_return->amount - $investor_return->return_amount }}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                </div>


                <div style="float: right;text-align:center">

                    <div class="additional-info">
                        <p>Total Calculation </p>
                    </div>
                    <div class="total">
                        <ul>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Invest Amount: {{$totalAmount}}</span></li>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Return Amount: {{ $totalReturnAmount }}</span></li>
                        </ul>
                        <p style="font-size:1.4rem;font-weight:bold">Total Amount:{{$totalAmount -  $totalReturnAmount}}</p>
                    </div>
                    <hr>

                </div>

            @endif

            @if ($investor_all_amounts)
                <table>
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Investor Name</th>
                        <th>Invest Amount</th>
                        <th>Return Amount</th>
                        <th>Description</th>
                        <th> Date</th>
                        <th>Present Amount</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($investor_all_amounts as $investor_all_amount)
                        {{-- @dd($investor_all_amount->id); --}}
                            <tr>
                                <td>{{ $investor_all_amount->id }}</td>
                                @php
                                    $investor = App\Models\Investor::find($investor_all_amount->investor_id);

                                    $totalAmount += $investor_all_amount->amount;
                                    $totalReturnAmount += $investor_all_amount->return_amount;
                                @endphp
                                <td>{{ $investor ? $investor->name : 'Unknown Investor' }}</td>
                                <td>{{ $investor_all_amount->amount? $investor_all_amount->amount :'0' }}</td>
                                <td>{{ $investor_all_amount->return_amount? $investor_all_amount->return_amount :'0' }}</td>
                                <td>{{ $investor_all_amount->category }}</td>
                                <td>{{ $investor_all_amount->created_at }}</td>
                                <td>{{ $investor_all_amount->amount - $investor_all_amount->return_amount }}</td>
                                {{-- <td>
                                    <div class="dropdown">
                                        <div class="">
                                            <select name="name" style="width: 50%;border-radius:70px">
                                                <option  value=""></option>
                                                <option  value="index"><a href="{{ url('#') }}"> Invoice </a> </option>
                                                <option  value="index"><a href="{{ url('#') }}"> Delete </a> </option>
                                            </select>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                </div>


                <div style="float: right;text-align:center">

                    <div class="additional-info">
                        <p>Total Calculation </p>
                    </div>
                    <div class="total">
                        <ul>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Invest Amount: {{$totalAmount}}</span></li>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Return Amount: {{ $totalReturnAmount }}</span></li>
                        </ul>
                        <p style="font-size:1.4rem;font-weight:bold">Total Amount:{{$totalAmount -  $totalReturnAmount}}</p>
                    </div>
                    <hr>

                </div>

            @endif
            @if ($joined_records)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Investor Name</th>
                        <th>Amount</th>
                        <th>Return Amount</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($joined_records as $groupKey => $group)
                        @php $firstIteration = true; @endphp
                        @foreach($group as $record)

                        @php
                            $investor = App\Models\Investor::find($record->investor_id);

                            $totalAmount += $record->amount;
                            $totalReturnAmount += $record->return_amount;
                        @endphp
                            <tr>
                                @if($firstIteration)
                                    <td rowspan="{{ count($group) }}">{{ $groupKey }}</td>
                                    @php $firstIteration = false;


                                    @endphp
                                @endif
                                {{-- <td>{{ $record->investor_id }}</td> --}}
                                <td>{{ $investor ? $investor->name : 'Unknown Investor' }}</td>
                                <td>{{ $record->amount? $record->amount :'0' }}</td>
                                <td>{{ $record->return_amount? $record->return_amount :'0' }}</td>
                                <td>{{ $record->category }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

                </div>
                <div style="float: right;text-align:center">

                    <div class="additional-info">
                        <p>Total Calculation </p>
                    </div>
                    <div class="total">
                        <ul>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Invest Amount: {{$totalAmount}}</span></li>
                        <li><span style="font-size:1.2rem;font-weight:normal">Total Return Amount: {{ $totalReturnAmount }}</span></li>
                        </ul>
                        <p style="font-size:1.4rem;font-weight:bold">Total Amount:{{$totalAmount -  $totalReturnAmount}}</p>
                    </div>
                    <hr>

                </div>

            @endif
        </div>
    </div>
    <div style="text-align:center">
        {{-- <button type="button" class="btn btn-secondary" onclick="GetPrint()" style="width:10%">print</button> --}}
        <button type="button" style=" padding:6px 25px;font-size:2.2rem;margin-left:5rem" onclick="GetPrint()" class="btn btn-primary ">Print</button>

    </div>
</body>
{{-- </html> --}}

@endsection
