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