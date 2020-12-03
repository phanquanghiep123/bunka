@extends('layouts.app')
@section('content')
<h1 class="card-title">_change_password_</h1>
<form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}" enctype="multipart/form-data" autocomplete="off">
    <div class="modal-body">
        <div class="row">
            <div class="col-12 col-md-auto flex-fill">
                <div class="alert-message"></div>
                <div class="form-row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label>_current_password_</label>
                            <input type="password" class="form-control" placeholder="_current_password_" validate="true" data-validate="required|min:6" name="current" >
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label>_NEW_PASSWORD_</label>
                            <input type="password" class="form-control" placeholder="_NEW_PASSWORD_" validate="true" data-validate="required|min:6" name="password" >
                        </div>
                    </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label>_CONFIRM_PASSWORD_</label>
                            <input type="password" class="form-control" placeholder="_CONFIRM_PASSWORD_" validate="true" data-validate="required|min:6" name="confirm" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@stop
@section('js_add')
<style type="text/css">
    .badge.badge-1 {
        border: 1px solid #00ce68;
        color: #ffffff;
        background-color: #00ce68;
    }
    .badge.badge-0 {
        border: 1px solid #424964;
        color: #ffffff;
        background-color: #424964;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        var addFrom      = $("form.form-ajax");
        var validateAdd  = addFrom.validateform();
        addFrom.submit(function() {
            if(validateAdd.checkInvalid()){
                $(".alert-message").html('');
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 0){
                            $.each(response.message,function(key,val){
                                validateAdd.addError(key,val);
                            });
                            validateAdd.showError();
                        }else if(response.status == 1){
                            $(".alert-message").html(`<div class="alert alert-success" role="alert">
                              <strong>Done!</strong> `+response.message+`
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>`);
                            addFrom[0].reset();
                        }
                    }
                });
            }
            return false;
        });
        $(".onselect-avatar").change(function(){
            var file = $(this)[0].files[0];
            var p = $(this).parent();
            var windowURL    = window.URL || window.webkitURL;
            uploadedImageURL = windowURL.createObjectURL(file);
            p.css("background-image",'url('+uploadedImageURL+')');
        });
    });
</script>
@stop
