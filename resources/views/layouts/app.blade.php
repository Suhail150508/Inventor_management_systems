<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
	<link id="base-style" href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/admin/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->


     {{-- toastr --}}
           {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
           <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


   <!---New bootstrap cdn---->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- end:-->
</head>

<body>
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><span><i class="fas fa-tachometer-alt"></i> Dashboard</span></a>

				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">

						<!-- start: User Dropdown -->
                        {{-- @php
                            $user_id = Session::get('id');
                            dd($user_id)
                            $user = App\Models\User::find($user_id)->first();
                        @endphp --}}
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> Dennis Ji
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                    <li><a href="/admin-logout"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->

			</div>
		</div>
	</div>
	<!-- start: Header -->

	<div class="container-fluid-full" style="min-height:100vh">
		<div class="row-fluid">
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
                            <a href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a>
                        </li>

						<li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Investors </span><span class="icon-arrow"></span></a>
                            <ul>
                                <li><a class="submenu" href="/investor"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Investors </span></a></li>
                                <li><a class="submenu" href="/invest"><i class="icon-plus"></i><span class="hidden-tablet"> Amount-add </span></a></li>
                                <li><a class="submenu" href="/invest_return"><i class="icon-minus"></i><span class="hidden-tablet"> Amount-return </span></a></li>
                                <li><a class="submenu" href="/investors_statement"><i class="icon-minus"></i><span class="hidden-tablet">Investor Statement </span></a></li>
                                <li><a class="submenu" href="/investors_invoice"><i class="icon-minus"></i><span class="hidden-tablet">Investor Invoices </span></a></li>

                            </ul>
                        </li>

						<li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Sales & Payment </span><span class="icon-arrow"></span></a>
                            <ul>
                                <li><a class="submenu" href="/customer_invoice"><i class="icon-plus"></i><span class="hidden-tablet"> Invoice </span></a></li>
                                <li><a class="submenu" href="#"><i class="icon-plus"></i><span class="hidden-tablet"> Invoice Return </span></a></li>
                                <li><a class="submenu" href="/all-sales-invoice"><i class="icon-plus"></i><span class="hidden-tablet"> All Sales Invoice </span></a></li>
                                <li><a class="submenu" href="/all-customer"><i class="icon-eye-open"></i><span class="hidden-tablet"> Customer </span></a></li>
                                <li><a class="submenu" href="/all-return-sales-invoice"><i class="icon-eye-open"></i><span class="hidden-tablet"> Return Sales Invoice  </span></a></li>
                                <li><a class="submenu" href="/due-sales-payment"><i class="icon-eye-open"></i><span class="hidden-tablet"> Due Sales Payment  </span></a></li> 


                            </ul>
                        </li>
						<li>
                            <a class="dropmenu" href="#"><i class="icon-barcode"></i><span class="hidden-tablet"> Purchase </span><span class="icon-arrow"></span></a>
                            <ul>
                                <li><a class="submenu" href="/show-vendor"><i class="icon-plus"></i><span class="hidden-tablet"> Vendors </span></a></li>
                                <li><a class="submenu" href="/all-products"><i class="icon-plus"></i><span class="hidden-tablet"> Stock Products </span></a></li>
                                <li><a class="submenu" href="/purchase_invoice"><i class="icon-plus"></i><span class="hidden-tablet"> Purchase Invoice </span></a></li>
                                <li><a class="submenu" href="/all-purchase-invoice"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Purchase Invoice  </span></a></li>
                                <li><a class="submenu" href="/all-return-purchase-invoice"><i class="icon-eye-open"></i><span class="hidden-tablet"> Return Purchase Invoice  </span></a></li>
                                <li><a class="submenu" href="/due-payment-invoice"><i class="icon-eye-open"></i><span class="hidden-tablet"> Due Payment Invoice  </span></a></li>
                            </ul>
                        </li>
						<li>
                            <a class="dropmenu" href="#"><i class="icon-barcode"></i><span class="hidden-tablet"> Account </span><span class="icon-arrow"></span></a>
                            <ul>
                                <li><a class="submenu" href="/main_account"><i class="icon-plus"></i><span class="hidden-tablet"> Main Accounts </span></a></li>
                            </ul>
                        </li>

						<li>
                            <a href="/company-info"><i class="icon-eye-open"></i><span class="hidden-tablet"> Company Information </span></a>
                        </li>
						<li>
                            <a href="/expence-invoice"><i class="icon-eye-open"></i><span class="hidden-tablet"> Expence Invoice </span></a>
                        </li>
						<li>
                            <a href="/home"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Posts</span></a>
                        </li>
					</ul>
				</div>
			</div>

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<div id="content" class="span10">
                <main class="py-4" style="height:100%;width:100%">
                    @yield('content')
                </main>
	        </div>
		</div>
	</div>

	<div class="clearfix"></div>

	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

		</p>
	</footer>

	<!-- start: JavaScript-->
    <script src="{{ asset('admin/js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-migrate-1.0.0.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery-ui-1.10.0.custom.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.ui.touch-punch.js') }}"></script>

    <script src="{{ asset('admin/js/modernizr.js') }}"></script>

    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.cookie.js') }}"></script>

    <script src='admin/js/fullcalendar.min.js'></script>

    <script src='admin/js/jquery.dataTables.min.js'></script>

    <script src="{{ asset('admin/js/excanvas.js') }}"></script>
	<script src="{{ asset('admin/js/jquery.flot.js') }}"></script>
	<script src="{{ asset('admin/js/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('admin/js/jquery.flot.stack.js') }}"></script>
	<script src="{{ asset('admin/js/jquery.flot.resize.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.chosen.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.uniform.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.cleditor.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.noty.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.elfinder.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.raty.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.iphone.toggle.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.uploadify-3.1.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.gritter.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.imagesloaded.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.masonry.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.knob.modified.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('admin/js/counter.js') }}"></script>

    <script src="{{ asset('admin/js/retina.js') }}"></script>

    <script src="{{ asset('admin/js/custom.js') }}"></script>




    {{-- //   -- toastr info here -- --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    @if (Session::has('message'))

    toastr.options={
          'clossButton':true,
          'progressBar':true
    }

    toastr.success("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    );

    // toastr.warnig("{{ Session::get('message') }}"
    // , 'Success! New Student added'
    // );

    @endif
</script>
</body>
</html>

