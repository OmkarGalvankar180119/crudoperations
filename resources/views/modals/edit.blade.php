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