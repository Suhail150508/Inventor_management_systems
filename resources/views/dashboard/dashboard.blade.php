@extends('layouts.app')

@section('content')



<body>
		<!-- start: Header -->

	<!-- start: Header -->

		<div class="container-fluid-full">
		<div class="row-fluid">

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">


			<div class="row-fluid" style="margin-left:-3rem">

				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart"></div>
                    @php
                        $account = App\Models\Main_account::all();
                    @endphp
					<div class="number">1000</div>
					{{-- <div class="title">visits</div> --}}
					<div class="">
						Main Account
					</div>
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart"></div>
					<div class="number">8954</div>
					<div class="title">visits</div>
					<div class="">
						read full report
					</div>
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart"></div>
					<div class="number">8954</div>
					<div class="title">visits</div>
					<div class="">
						read full report
					</div>
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart"></div>
					<div class="number">8954</div>
					<div class="title">visits</div>
					<div class="">
						read full report
					</div>
				</div>

			</div>



			<div class="row-fluid" style="margin-left:-3rem">

				<a class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Users</p>
					<span class="badge">237</span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-comments-alt"></i>
					<p>Comments</p>
					<span class="badge">46</span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
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
				</a>

				<div class="clearfix"></div>

			</div><!--/row-->



	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->



	<!-- start: JavaScript-->


</body>
@endsection
