@extends('layouts.app')

@section('content')

<style>

@media (max-width: 700px) {
    .row-fluid{

    }

    #content{
        padding-left: 4rem;
    }
    .title_info h1{
        font-size: 1.4rem;
        /* width:80%; */
        margin-right: 2rem;

    }
}

</style>

<body>
		<!-- start: Header -->

	<!-- start: Header -->

	<div class="container-fluid-full"  style="width:95%">
		<div class="row-fluid">

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">

				<div class="title_info" style="width:90%">
					<h1 style="text-align: center">Sales Information</h1>
				</div>

				<div class="row-fluid" style="margin-left:-3rem">

					<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>
						@php
							use Carbon\Carbon;
							use App\Models\Sales_invoice;
							$amounts = Sales_invoice::whereDate('created_at', Carbon::today())->get();
							$sales_amount = 0;
                            $sales_due = 0;
                            @endphp

							@foreach ($amounts as $amount)
                                @php
                                    $sales_amount += $amount->sub_total;
                                    $sales_due += $amount->due
                                @endphp
							@endforeach

						@if ($sales_amount)
						{{-- <div class="title">visits</div> --}}
						<div class="">
							Today Sales Amount
						</div>
						<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ $sales_amount }}</div>

						@else
						{{-- <div class="title">visits</div> --}}
						<div class="">
							Today Sales Amount
						</div>
						<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ 0 }}</div>

						@endif
					</div>
					<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>
						@if ($sales_due)
						<div class="">
							Today Sales Due
						</div>
						<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ $sales_due }}</div>

						@else
						<div class="">
							Today Sales Due
						</div>
						<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ 0 }}</div>

						@endif
					</div>

					@php
						use App\Models\Return_Sales_Invoice;

						$return_customers = Return_Sales_Invoice::whereDate('created_at', Carbon::today())->get();
						// $return_customer = Return_Sales_Invoice::all();
                        $return_amount = 0;
					@endphp

                    @foreach ($return_customers as $return_customer)
                    @php
                        $return_amount += $return_customer->sub_total;
                        // $sales_due += $amount->due
                    @endphp
                    @endforeach

					<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>

						@if (!$return_amount )

						<div class="">
							Today Customer Return
						</div>
						<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{0}}</div>

						@endif
						@if($return_amount )
						<div class="">
							Today Customer Return
						</div>
						<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{  $return_amount  }}</div>

						@endif
					</div>

					@php
					use App\Models\Due_Sales_Payment;

						$due_sales_payments = Due_Sales_Payment::whereDate('created_at', Carbon::today())->get();
					// $return_customer = Return_Sales_Invoice::all();
                        $sales_paid =0;
					@endphp

                    @foreach ($due_sales_payments  as $due_sales_payment )
                    @php
                        $sales_paid += $due_sales_payment->paid_amount;
                    @endphp
                    @endforeach

					<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>

						@if (!$sales_paid)

							<div class="">
								Today Sales Due Paid
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ 0 }}</div>

						@endif

						@if ($sales_paid)

							<div class="">
								Today Sales Due Paid
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ $sales_paid }}</div>

						@endif


					</div>

				</div>

				<div class="title_info" style="width:90%">
					<h1 style="text-align: center">Purchase Information</h1>
				</div>

				<div class="row-fluid" style="margin-left:-3rem">

					<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>
						@php
							use App\Models\Purchase_invoice;
							$purchase_amounts = Purchase_invoice::whereDate('created_at', Carbon::today())->get();
                            $purchase_total =0;
                            $purchase_due =0;
						@endphp

                        @foreach ($purchase_amounts as $purchase_amount)
                        @php
                            $purchase_total += $purchase_amount->sub_total;
                            $purchase_due += $purchase_amount->due;
                        @endphp
                        @endforeach

						@if ($purchase_total)
							<div class="text-center" >
								Today Purchase Amount
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ $purchase_total }}</div>
							{{-- <div class="title">visits</div> --}}

						@else
							<div class="">
								Today Purchase Amount
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ 0 }}</div>
							{{-- <div class="title">visits</div> --}}

						@endif
					</div>
					<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>
						@if ($purchase_due)
							<div class="">
								Today Purchase Due
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ $purchase_due }}</div>

						@else
							<div class="">
								Today Purchase Due
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ 0 }}</div>

						@endif
					</div>

					@php
						use App\Models\Return_Invoice;

						$return_customers = Return_Invoice::whereDate('created_at', Carbon::today())->get();
						// $return_customer = Return_Sales_Invoice::all();
                        $purchase_return_amount =0;
					@endphp
                    @foreach ($return_customers as $return_customer)
                        @php
                            $purchase_return_amount += $return_customer->sub_total;
                        @endphp
                    @endforeach

					<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>

						@if (!$purchase_return_amount)

							<div class="">
								Today Purchase Return
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{0}}</div>

						@endif
						@if($purchase_return_amount)
							<div class="">
								Today Purchase Return
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{  $purchase_return_amount }}</div>

						@endif
					</div>

					@php
					use App\Models\Paid;

						$due_purchase_payments = Paid::whereDate('created_at', Carbon::today())->get();
					// $return_customer = Return_Sales_Invoice::all();
                    $purchase_paid_amount =0;
					@endphp

                    @foreach ($due_purchase_payments as $due_purchase_payment)
                    @php
                        $purchase_paid_amount += $due_purchase_payment->paid_amount;
                    @endphp
                    @endforeach

					<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
						<div class="boxchart"></div>

						@if (!$purchase_paid_amount)

							<div class="">
								Today Purchase Due Paid
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ 0 }}</div>

						@endif

						@if ($purchase_paid_amount)

							<div class="">
								Today Purchase Due Paid
							</div>
							<div class="text-center" style="margin-top:2rem;font-size:1.4rem">{{ $purchase_paid_amount }}</div>

						@endif


					</div>

				</div>

				<div class="title_info" style="width:90%">
					<h1 style="text-align: center">Main Account & Expence Information</h1>
				</div>

				<div class="row-fluid" style="margin-left:-3rem">
					@php
						use App\Models\Main_account;
						@$main_account = Main_account::find(1);
						// $main_accounts = Main_account::whereDate('created_at', Carbon::today())->get();
                        // $main_acco =0;
					@endphp

                    {{-- @foreach ($main_accounts as $main_account)
                    @php
                        $main_acco += $main_account->total_amount;
                    @endphp
                    @endforeach --}}
					@if ( $main_account)
						<a class="quick-button metro red span3">
							{{-- <i class="icon-group"></i> --}}
							<div class="">
								Today Cash
							</div>
							<div class="text-center" style="margin:1rem;font-size:1.4rem">{{ $main_account->total_amount }}</div>
						</a>
					@else
						<a class="quick-button metro red span3">
							{{-- <i class="icon-group"></i> --}}
							<div class="">
								Today Cash
							</div>
							<div class="text-center" style="margin:1.3rem;font-size:1.4rem">{{ 0 }}</div>
						</a>

					@endif
					{{-- @if ( $main_account->total_amount)
						<a class="quick-button metro blue span3">
							<div class="">
								Previous Cash
							</div>
							<div class="text-center" style="margin:1rem;font-size:1.4rem">{{ $main_account->total_amount }}</div>
						</a>
					@else
						<a class="quick-button metro blue span3">
							<div class="">
								Previous Cash
							</div>
							<div class="text-center" style="margin:1rem;font-size:1.4rem">{{ 0 }}</div>
						</a>

					@endif --}}

                @php
                    use App\Models\Expence_Invoice;
                    use App\Models\Expence_Category;
                    $expences = Expence_Invoice::whereDate('created_at', Carbon::today())->get();
                    $expence_category = Expence_Category::latest()->first();
                    $expence_amount =0;

                @endphp
                  @foreach ($expences as $expence)
                    @php
                        $expence_amount += $expence->amount;
                    @endphp
                    @endforeach



                @if ($expence_amount)
                <a class="quick-button metro pink  span3">
                    {{-- Today Expence {{ $expence->amount }} --}}
                        {{-- <i class="icon-group"></i> --}}
                        <div class="" >
                            Today Expence  <span style="margin:.01rem .3rem;font-size:1.2rem">{{ $expence_amount}}</span>
                            Expence Category  <span style="margin:.01rem .3rem;font-size:1.2rem">{{ $expence_category->category }}</span>
                        </div>
                        <div class="" style="margin:1rem;font-size:1.4rem"></div>
                </a>

                @else
                    <a class="quick-button metro pink  span3">
                        {{-- <i class="icon-group"></i> --}}
                        <div class="" >
                        <div>	Today Expence  <span style="margin:.01rem .3rem;font-size:1.2rem">{{ 0 }}</span></div><br>
                        <div>	Expence Category  <span style="margin:.01rem .3rem;font-size:1.2rem">{{ 0 }}</span> </div>
                        </div>
                        <div class="" style="margin:1rem;font-size:1.4rem"></div>
                    </a>

                @endif


					{{-- @endif --}}
					{{-- <a class="quick-button metro red span3">
						<p>Comments</p>
						<span class="badge">46</span>
					</a>
					<a class="quick-button metro blue span2">
						<p>Orders</p>
						<span class="badge">13</span>
					</a>
					<a class="quick-button metro green span2">
						<i class="icon-barcode"></i>
						<p>Products</p>
					</a>
					<a class="quick-button metro pink span2">
						<i class="icon-envelope"></i>
						<p>Messages</p>
						<span class="badge">88</span>
					</a>
					<a class="quick-button metro black span2">
						<i class="icon-calendar"></i>
						<p>Calendar</p>
					</a> --}}

					<div class="clearfix"></div>

				</div><!--/row-->



			</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
	</div><!--/fluid-row-->


	<!-- start: JavaScript-->


</body>
@endsection
