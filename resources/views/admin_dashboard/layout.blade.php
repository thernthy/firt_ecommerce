<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
@include('admin_dashboard.style')
</head>
<body class="sidebar-icon-only">
@include('admin_dashboard.header')
@include('admin_dashboard.navbar')
<!-- content -->
@yield('content')
<!-- Placed at the end of the document so the pages load faster -->
@include('admin_dashboard.scripts')
</body>
</html>