<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="ecommerce,t-shirt,kurta,saree,pant,owmen collection, men collection">
    <meta name="Developed By" content="https://rootsoftbd.com/" />
    <meta name="Developer" content="Root Soft Bangladesh Team | 01905111957" />
    <!-- <meta property="fb:pages" content="114553850372821" /> -->
    <meta name="description" content="This is one of the largest online platform for Point Of Sales Software in Bangladesh." />
    <meta property="og:url" content="https://rootsoftbd.com" />
    <meta property="og:type" content="WEBSITE" />
    <meta property="og:title" content="QLOAQ LUXURY FASHION" />
    <meta property="og:description" content="QLOAQ Luxury Fashion is one the leading E-Commerce platform in Bangladesh." />
    <meta property="og:site_name" content="QLOAQ LUXURY FASHION" />
    <link rel="canonical" href="https://qloaq.com.bd">
    <meta property="og:image:width" content="700" />
    <meta property="og:image:height" content="400" />
    <link rel="icon" type="image/png" href="{{ url('assets/'.companyInfo()->favicon) }}" />
    <meta name="facebook-domain-verification" content="1kjbj0rp00ycjge6njcpl1tqrr89nn" />

    <!-- DataTables -->
    <link href="{{ url('/assets/admin_panel_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/admin_panel_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ url('/assets/admin_panel_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />   

    <link href="{{ url('/assets/admin_panel_assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/assets/admin_panel_assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/admin_panel_assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ url('/assets/admin_panel_assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />  

    <!-- Bootstrap Css -->
    <link href="{{ url('/assets/admin_panel_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('/assets/admin_panel_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('/assets/admin_panel_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{ url('/assets/admin_panel_assets/bootstrap-tags/bootstrap-tagsinput.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>