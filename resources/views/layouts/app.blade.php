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

    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}





     {{-- toastr --}}
           {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
           <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


   <!---New bootstrap cdn---->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- end:-->
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<style>

.icon-arrow{
    margin-left:6.5rem;
}
.icon-arrow1{
    margin-left:5.1rem;
}

.icon-arrow2{
    margin-left:6.6rem;
}
.icon-arrow3{
    margin-left:.9rem;
}
.icon-arrow4{
    margin-left:.7rem;
}

.sub_menu{
    font-size:.755rem;
}
.ul-menu{
    height:100%;
}

@media (max-width: 700px) {

    .icon-arrow{
        margin-left:15rem;
    }
    .icon-arrow1{
        margin-left:13.5rem;
    }
    .icon-arrow2{
        margin-left:15.2rem;
    }
    .icon-arrow3{
        margin-left:8.73rem;
    }
    .icon-arrow4{
        margin-left:8.55rem;
    }
    .ul-menu{
        height:100%;
    }
}

</style>
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
				        <a class="brand" href="/dashboard"><span><i class="fas fa-tachometer-alt"></i> Dashboard</span></a>

                        <!-- start: Header Menu -->
                        <div class="nav-no-collapse header-nav">
                            <ul class="nav pull-right">

                                <li class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="halflings-icon white user"></i> User
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-menu-title">
                                            <span>Account Settings</span>
                                        </li>

                                        <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                        <li><a href="/logout"><i class="halflings-icon off"></i> Logout</a></li>
                                        {{-- <li><a href="/admin-logout"><i class="halflings-icon off"></i> Logout</a></li> --}}
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

            <div class="container-fluid-full" style="min-height:120vh">
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">

                            <li>
                                <a class="dropmenu" href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Reports </span><span class="icon-arrow"><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                <ul class="ul-menu">
                                    <li><a class="submenu" href="/investor-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Investors </span></a></li>
                                    <li><a class="submenu" href="/investors_statement"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Investor Statement </span></a></li>
                                    <li><a class="submenu" href="/all-purchase-invoice-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Purchase Invoice  </span></a></li>
                                    <li><a class="submenu" href="/all-return-purchase-invoice-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Return Purchase Invoice  </span></a></li>
                                    <li><a class="submenu" href="/due-payment-invoice-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Due Payment Invoice  </span></a></li>
                                    <li><a class="submenu" href="/all-sales-invoice-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet" sub_menu> All Sales Invoice </span></a></li>
                                    <li><a class="submenu" href="/all-return-sales-invoice-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Return Sales Invoice  </span></a></li>
                                    <li><a class="submenu" href="/due-sales-payment-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Due Sales Payment  </span></a></li>
                                    <li><a class="submenu" href="/show-vendor-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu">All Vendors </span></a></li>
                                    <li><a class="submenu" href="/all-customer-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Customer  </span></a></li>
                                    <li><a href="/expence-invoice-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Expence Invoice </span></a></li>
                                    <li><a class="submenu" href="/main_account-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Main Accounts </span></a></li>
                                    <li> <a href="/company-info-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Company Information </span></a></li>
                                    <li> <a href="/all-product-info-report"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Products </span></a></li>

                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Investors </span><span class="icon-arrow1"></span><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                <ul class="ul-menu">
                                    <li><a class="submenu" href="/invest-create"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Investors </span></a></li>
                                    <li><a class="submenu" href="/invest"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Amount-add </span></a></li>
                                    <li><a class="submenu" href="/invest_return"><i class="icon-minus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Amount-return </span></a></li>
                                    <li><a class="submenu" href="/investor"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Investors </span></a></li>
                                    {{-- <li><a class="submenu" href="/investors_statement"><i class="icon-minus"></i><span class="hidden-tablet">Investor Statement </span></a></li> --}}
                                    {{-- <li><a class="submenu" href="/investors_invoice"><i class="icon-minus"></i><span class="hidden-tablet">Investor Invoices </span></a></li> importent --}}

                                </ul>
                            </li>

                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Purchase </span><span class="icon-arrow1" ></span><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                {{-- <a class="dropmenu" href="#"><i class="icon-barcode"></i><span class="hidden-tablet"> Purchase </span><span class="icon-arrow" style="margin-left:5rem"></span><i class="fa-solid fa-chevron-down " style="font-size:.8rem"></i></a> --}}
                                <ul class="ul-menu">
                                    <li><a class="submenu" href="/all-products"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Stock Products </span></a></li>
                                    <li><a class="submenu" href="/purchase_invoice"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Purchase Invoice </span></a></li>
                                    <li><a class="submenu" href="/return-purchase-invoice"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Return Purchase Invoice  </span></a></li>
                                    <li><a class="submenu" href="/all-purchase-invoice"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Purchase Invoice  </span></a></li>
                                    <li><a class="submenu" href="/due-payment-invoice-create"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Due Payment Invoice  </span></a></li>
                                    <li><a class="submenu" href="/due-payment-invoice"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Due Payment Invoice  </span></a></li>
                                    <li><a class="submenu" href="/create-vendor"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Vendors create </span></a></li>
                                </ul>
                            </li>

                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Sales </span><span class="icon-arrow2"></span><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                <ul class="ul-menu">
                                    {{-- <li><a class="submenu" href="/customer_invoice"><i class="icon-plus"></i><span class="hidden-tablet"> Invoice </span></a></li> --}}
                                    {{-- <li><a class="submenu" href="#"><i class="icon-plus"></i><span class="hidden-tablet"> Invoice Return </span></a></li> --}}
                                    <li><a class="submenu" href="/sales_invoice"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu">Sales Invoice </span></a></li>
                                    <li><a class="submenu" href="/return-sales-invoice"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Return Sales Invoice  </span></a></li>
                                    <li><a class="submenu" href="/all-sales-invoice"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet" sub_menu> All Sales Invoice </span></a></li>
                                    <li><a class="submenu" href="/all-return-sales-invoice"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Return Sales Invoice  </span></a></li>
                                    <li><a class="submenu" href="/due-sales-payment-create"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Due Sales Payment  </span></a></li>
                                    <li><a class="submenu" href="/due-sales-payment"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Due Sales Payment  </span></a></li>
                                    <li><a class="submenu" href="/customer-create"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Customer </span></a></li>

                                </ul>
                            </li>
                            {{-- <li>
                                <a class="dropmenu" href="#"><i class="icon-barcode"></i><span class="hidden-tablet"> Account </span><span class="icon-arrow"></span></a>
                                <ul>
                                    <li><a class="submenu" href="/main_account"><i class="icon-plus"></i><span class="hidden-tablet"> Main Accounts </span></a></li>
                                </ul>
                            </li> --}}


                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Expence Information </span><span class="icon-arrow3"></span><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                    <ul class="ul-menu">
                                        <li><a href="/expence-create"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Expence Invoice </span></a> </li>
                                        <li><a href="/expence-invoice"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Expence Invoice </span></a></li>

                                    </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Products Information </span><span class="icon-arrow3"></span><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                    <ul class="ul-menu">
                                        <li><a href="/purchase-product"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Create New Product </span></a> </li>
                                        <li> <a href="/all-product-info"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Products </span></a></li>

                                    </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Company Information </span><span class="icon-arrow4"></span><i class="fa-solid fa-chevron-down " style="font-size:.6rem"></i></a>
                                    <ul class="ul-menu">
                                        <li><a href="/company-create"><i class="icon-plus" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> Company Create </span></a></li>
                                        <li> <a href="/company-info"><i class="icon-eye-open" style="font-size:13px"></i><span class="hidden-tablet sub_menu"> All Company </span></a></li>

                                    </ul>
                            </li>
                            {{-- <li>
                                <a href="/all-posts"><i class="icon-plus"></i><span class="hidden-tablet"> Products</span></a>
                                <a href="/home"><i class="icon-eye-open"></i><span class="hidden-tablet"> All Posts</span></a>
                            </li> --}}
					    </ul>
				    </div>
			    </div>

                <noscript>
                    <div class="alert alert-block span10">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                    </div>
                </noscript>

                <div id="content" >
                    <main class="py-4" >
                        @yield('content')
                    </main>
                </div>
		    </div>
	{{-- </div> --}}

        {{-- <div class="clearfix"></div> --}}

        {{-- <footer class="footer">
            <p>
                <span style="text-align:left;float:left">&copy; 2024 <a  alt="Bootstrap_Metro_Dashboard">Inventor Management System</a></span>

            </p>
        </footer> --}}

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

