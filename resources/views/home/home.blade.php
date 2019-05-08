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

    <link href="{{ url('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ url('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>


    <script src="{{ url('/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/global/js/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ url('/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ url('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>

</head>
<body>

        <div class="top-right">
            <br/>
            <span >Hi, {{ Session::get('name') }}</span>
            
              <form method="GET" action="{{ url('user_logout') }}" class="logoutBtn">
                  <button class="logout-btn" type="submit">Log out</button>
              </form>

        </div>


    <div class="row clearfix">
        <div class="col-md-6">
            <ul class="page-breadcrumb">
                <!-- <li>
                    <span>Customers</span>
                </li> -->
            </ul>
        </div>
        <div class="col-md-6">
            <div class="table-toolbar pull-right">
                    <div class="btn-group" id="pending">
                        <a data-toggle="modal" data-target="#myModal" class="btn btn-default sbold"> Add New
                        </a>
                    </div>
                
                <div class="btn-group">
                    <a href="javascript:;" onclick="reload_table();" id="reload-users-table" class="btn btn-default sbold"> Reload
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br/>
<div class="tab">
  <button class="tablinks" id="defaultOpen" style="border: 1px solid #000;">Customer Data</button>
  <!-- <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
</div>

<div class="tabcontent">

  <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" id="users-management">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="table-users">
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

</div>

<!-- Modal content to add new departments -->
    <div class="modal fade bs-modal-lg in" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header panel-heading bg-ihrms">
                    <a type="button" class="modal-close pull-right fa-lg" data-dismiss="modal" aria-hidden="true">x</a>
                    <h4 class="modal-title">Add New Customer</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="newCustomer" role="form" enctype="multipart/form-data">
                        <div class="form-group row clearfix">
                            <div class="col-md-6">
                                <label class="control-label form-label bold" for="name">Enter Name<span class="required"> *</span></label>
                                <div class="">
                                    <input type="text" class="form-control" id="name" placeholder="name"/>
                                    <span class="help-block" id="nameError" style="display:none;">Please enter proper values</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label form-label bold" for="email">Enter Email <span class="required"> *</span></label>
                                <div class="">
                                    <input type="text" class="form-control" id="email" placeholder="email"/>
                                    <span class="help-block" id="emailError" style="display:none;">Please enter proper values</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <div class="col-md-6">
                                <label class="control-label form-label bold" for="mobile">Enter Mobile Number <span class="required"> *</span></label>
                                <div class="">
                                    <input type="text" class="form-control" id="mobile" placeholder="mobile"/>
                                    <span class="help-block" id="mobileError" style="display:none;">Please enter proper values</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="save()" style="width: 15%;">Save</button>
                </div>
            </div>

        </div>
    </div>
    <!-- end of modal -->

    <!-- Modal content to edit departments -->
    <div class="modal fade bs-modal-lg in" id="myModalEdit" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header panel-heading bg-ihrms">
                    <a type="button" class="modal-close pull-right fa-lg" data-dismiss="modal" aria-hidden="true">x</a>
                    <h4 class="modal-title">Edit Customer Details</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row clearfix">
                            <div class="col-md-6">
                                <label class="control-label bold form-label" for="nameEdit">Name <span class="required"> *</span></label>
                                <div class="">
                                    <input type="text" class="form-control" id="nameEdit" placeholder="employee"/>
                                    <span class="help-block" id="nameEditError" style="display:none;">Please enter proper values</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label bold form-label" for="emailEdit">Email <span class="required"> *</span></label>
                                <div class="">
                                    <input type="text" class="form-control" id="emailEdit" placeholder="email"/>
                                    <span class="help-block" id="emailEditError" style="display:none;">Please enter proper values</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <div class="col-md-6">
                                <label class="control-label bold form-label" for="mobileEdit">Mobile Number <span class="required"> *</span></label>
                                <div class="">
                                    <input type="text" class="form-control" id="mobileEdit" placeholder="mobile"/>
                                    <span class="help-block" id="mobileEditError" style="display:none;">Please enter proper values</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="updateID" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="saveEdit()" style="width:15%;">Save</button>
                </div>
            </div>

        </div>
    </div>
    <!-- end of modal -->

<script type="text/javascript">
  $('.date-picker').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
        }).datepicker('setData', new Date());

        var table = $('#table-users'); editimgsrc = '';

        $(document).ready(function () {
            //To bind data to datatable
            table.dataTable({
                responsive: true,
                "aaSorting": [],
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"] // change per page values here
                ],
                "pageLength": 25,
                //Ajax Request
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{ url('/getcustomers') }}"
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_Row_Index', className : 'center fit-width', orderable: false, searchable: false},
                    {data: 'name', name: 'name', className : 'center fit-width', orderable: false},
                    {data: 'email', name: 'email', className : 'center fit-width', orderable: false},
                    {data: 'mobile', name: 'mobile', className : 'center fit-width', orderable: false},
                    {data: 'action', name: 'action', orderable: false, className : 'center fit-width', searchable: false}
                ]
            });

        });

        function reload_table() {
            $('#table-users').dataTable().api().ajax.reload();
        }

        function delete_user(id) {

            if (confirm('Are you sure to delete this customer?')) {
                $.ajax({
                    type: "GET",
                    url: '{{ url('changeCustomer') }}' + '/' + id + '/delete',
                    dataType: "JSON",
                    success: function (data) {
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error deleting this customer');
                    }
                });
            }
        }

        function save() {
            var newname = $("#name").val();
            var newemail     = $("#email").val();
            var newmobile     = $("#mobile").val();

            var val_name = nameValidate(newname);
            var val_email = emailValidate(newemail);
            var val_mobile = mobileValidate(newmobile);

            if(val_name && val_email && val_mobile) {

                $.ajax({
                    type: "POST",
                    url: '{{ url('newCustomer') }}',
                    data: { name:newname,
                            email:newemail,
                            mobile:newmobile,
                            _token: '{{csrf_token()}}'},
                    success: function (data) {
                      
                        $("#name").val('');
                        $("#nameError").hide();
                        $("#email").val('');
                        $("#emailError").hide();
                        $("#mobile").val('');
                        $("#mobileError").hide();
                        
                        $('#myModal').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error adding new customer');
                    }
                });

            }

            if(val_mobile) {
              $("#mobileError").hide();
            } else {
              $("#mobileError").show();
            }

            if(val_email) {
              $("#emailError").hide();
            } else {
              $("#emailError").show();
            }

            if(val_name) {
              $("#nameError").hide();
            } else {
              $("#nameError").show();
            }

        }

        function edit(id) {

            if(id!='')
            {
                $.ajax({
                    type: "GET",
                    url: '{{ url('changeCustomer') }}' + '/' + id + '/edit',
                    dataType: "JSON",
                    success: function (data) {
                        $('#myModalEdit').modal('show');
                        
                        $("#nameEdit").val(data.name);
                        $("#emailEdit").val(data.email);
                        $("#mobileEdit").val(data.mobile);
                        
                        $("#updateID").val(data.id);
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error editing customer details');
                    }
                });
            }
            else {
                alert("Can't edit this detail");
            }

        }

        function emailValidate(email) {

          if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
          {
            return true;
          } else {
            return false;
          }

        }

        function nameValidate(name) {

          if(/^[a-zA-Z][a-zA-Z\s]*$/.test(name)) {
            return true;
          } else {
            return false;
          }

        }

        function mobileValidate(mobile) {

          if(/^\d+$/.test(mobile) && mobile.length == 10) {
            return true;
          } else {
            return false;
          }

        }

        function saveEdit() {
            
            var nameEdit     = $("#nameEdit").val();
            var emailEdit     = $("#emailEdit").val();
            var mobileEdit = $("#mobileEdit").val();
            
            var id = $("#updateID").val();

            var val_name = nameValidate(nameEdit);
            var val_email = emailValidate(emailEdit);
            var val_mobile = mobileValidate(mobileEdit);

            if(val_name && val_email && val_mobile) {

                $.ajax({
                    type: "POST",
                    url: '{{ url('editCustomer') }}',
                    data: { name:nameEdit,
                            email:emailEdit,
                            mobile:mobileEdit,
                            id:id,
                            _token: '{{csrf_token()}}'},
                    success: function (data) {
                        $("#nameEditError").hide();
                        $("#nameEdit").val('');
                        $("#emailEditError").hide();
                        $("#emailEdit").val('');
                        $("#mobileEditError").hide();
                        $("#mobileEdit").val('');
                        $('#myModalEdit').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error editing customer details');
                    }
                });

            }

            if(val_mobile) {
              $("#mobileEditError").hide();
            } else {
              $("#mobileEditError").show();
            }

            if(val_email) {
              $("#emailEditError").hide();
            } else {
              $("#emailEditError").show();
            }

            if(val_name) {
              $("#nameEditError").hide();
            } else {
              $("#nameEditError").show();
            }

        }

</script>

<script src="{{ url('/global/js/tabs.js') }}"></script>

</body>
</html>
