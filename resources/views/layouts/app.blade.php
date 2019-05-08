<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('/global/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/global/css/tabs.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ url('/global/js/jquery.js') }}"></script>
    
    <link href="{{ url('/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('global/plugins/font-awesome/css/font-awesome.min.css')}}"  rel="stylesheet">
    <link href="{{ url('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ url('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>


    <script src="{{ url('/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/global/js/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ url('/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ url('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>


</head>
<body>
    @yield('content')
    @include('modals.create')
    @include('modals.edit')
    @yield('javascript')
</body>
</html>