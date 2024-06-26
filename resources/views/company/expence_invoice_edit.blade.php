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





body {
	/* display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center; */
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
		height: .2rem;
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


body{
  align-items: center;
  /* justify-content: center; */
  min-height: 100vh;
  width: 100%;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  /* background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%); */
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

</style>

</head>
<body>
    <div class="container" style="height:100%">
        <div class="card-body">
          <div class="">
            <div class="header">
              <strong style="font-size: 2rem">Invoice</strong>
            </div>
        

            {{-- <section  style="display: flex">
                <nav class="shift">
                    <ul style="background-color:rgb(31, 17, 184); color:whitesmoke;border-radius:25px;width:50%;height:100%">
                    <li><a style="color:whitesmoke;" href="#">All</a></li>
                    <li><a style="color:whitesmoke;" href="#">Paid</a></li>
                    <li><a style="color:whitesmoke;" href="#">Unpaid</a></li>
                    <li><a style="color:whitesmoke;" href="#">Overdue</a></li>
                    </ul>
                </nav>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-right:1rem;font-size:1.3rem">
                        <i class="icon-plus"></i> </span> Create Invoice
                    </button>

                </div>
            </section> --}}






            {{-- <div style="display: flex;justify-content:center;margin:6px 6px"> --}}

                <div class="container row form-group input-group" style="display: flex;justify-content:space-around; flex-wrap:wrap">
                    <div class=" col-md-2">

                        <h4>Customer</h4>
                        <div class="datetimepicker">
                            {{-- <select type="text" name="name" id="date" placeholder="Name">
                                <option style="font-size:1.1rem" value="">select</option>
                                <option style="font-size:1.1rem" value="">files</option>
                            </select> --}}

                                    <select id="" name="name">
                                        <option value="">select</option>

                                        @php
                                            $customers = App\Models\Customer::all();
                                        @endphp

                                        @foreach ($customers as $customer )

                                        <option value="/search-invoice/{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                        </div>

                    </div>
                    <div class=" col-md-2">
                        <h4> From </h4>
                        <div class="datetimepicker">
                            <input type="date" name="date_from" id="date" placeholder="2018-07-03">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <h4 > To </h4>
                        <div class="datetimepicker">
                            <input type="date" name="date_from" id="date" placeholder="2018-07-03">

                            {{-- <span></span>
                            <input type="time" id="time" value="08:00"> --}}
                        </div>
                    </div>
                    <div class=" col-md-2 ">
                        <h4>Invoice Id</h4>
                        <div class="datetimepicker">
                            <input type="text" name="invoice_id" id="date" placeholder="invoice id">
                        </div>
                    </div>


                </div>

            </div>

            <div class="table-container">
              <table>
                <thead>
                  <tr>
                    <th>Invoice No</th>
                    <th>Customer Image</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Due Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>


                    {{-- } --}}

                        {{-- <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown link
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div> --}}

                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="additional-info">
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
            </div>
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
                            <h3 style="font-size:1.4rem"><i class="icon-plus"></i> Customer Invoice</h3>
                        </div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    {{-- ... --}}

                    <div class="container_modal" style="width:90%;">

                        <form action="/customer-invoice-add" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="input-data">
                                        @php
                                            $customers = App\Models\Customer::all();
                                            // dd($customer);
                                        @endphp
                                            <label for=""> Customer </label>
                                            <select type="text" name="customer_id" id="date">

                                                <option style="font-size:1.1rem" value=""></option>
                                                @foreach ($customers as $customer )
                                                <option style="font-size:1.1rem" value="{{ $customer->id }}">{{ $customer->name  }}</option>
                                                @endforeach
                                            </select>

                                </div>
                                <div class="input-data" style="margin-bottom: 1rem">
                                    <input type="text" name="total_amount" required>
                                    <div class="underline"></div>
                                    <label for="">Total Amount</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-data">
                                    <input type="text" name="due_amount" required>
                                    <div class="underline"></div>
                                    <label for="">Due Amount</label>
                                </div>
                                <div class="data" style="margin-top:1rem">
                                    <input type="date" name="date" id="date" placeholder="2018-07-03">

                                    <div class="underline"></div>
                                    {{-- <label for="">Date</label> --}}
                                </div>
                            </div>
                            <div class="form-row">
                                <label for=""> Status </label>
                                <select type="text" name="status" id="date">
                                    <option style="font-size:1.1rem" value=""></option>
                                    <option style="font-size:1.1rem" value="Paid">Paid</option>
                                    <option style="font-size:1.1rem" value="Unpaid">Unpaid</option>
                                </select>
                            </div>
                            {{-- <div class="form-row">
                            <div class="input-data textarea"> --}}
                                <div class="form-row submit-btn">
                                    <div class="input-data">
                                        <div class="inner">

                                        </div>
                                        <input type="submit" value="submit">
                                    </div>
                                </div>
                        </form>

                    </div>


                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal end -->

</body>
</html>

@endsection
