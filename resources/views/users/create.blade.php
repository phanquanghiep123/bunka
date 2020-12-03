@extends('layouts.app')
@section('content')
@php
    $status = $_SEFF->getListStatus();
@endphp
<h1 class="card-title">_new_ _USER_</h1>
<form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}" enctype="multipart/form-data" autocomplete="off">
    <div class="modal-body">
            <div class="row">
                <div class="col-12 col-md-auto">
                   <div class="form-group">
                   <label>_AVATAR_</label>
                    <div class="custom-upload">
                        <div class="file-control d-flex justify-content-center align-items-center">
                            <input class="onselect-avatar" type="file" name="photo">
                            <div class="inner-holder">
                                <i class="mdi mdi-plus"></i>
                                <div class="text-secondary text-control">_SELECTAVT_</div>
                            </div>
                        </div>
                        <div class="text-help">.PNG, .JPG, .GIF. Max size 64MB</div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto flex-fill">
                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_FIRSRNAME_</label>
                                <input type="text" class="form-control" placeholder="_FIRSRNAME_" validate="true" data-validate="required" name="first_name" >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_LASTNAME_</label>
                                <input type="text" class="form-control" placeholder="_LASTNAME_" validate="true" data-validate="required" name="last_name" >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_EMAIL_</label>
                                <input type="text" class="form-control" placeholder="_EMAIL_" validate="true" data-validate="required|email" name="email" >
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_PASSWORD_</label>
                                <input type="password" class="form-control" placeholder="_PASSWORD_" validate="true" data-validate="required|min:6" name="password" >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_ROLES_</label>
                                <select class="form-control" validate="true" data-validate="required" name="role_module_id">
                                    <option value="">--choose _ROLES_--</option>
                                    @foreach(@$roles as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_STATUS_</label>
                                <select class="form-control" name="status" validate="true" data-validate="required" >
                                    <option value="">--choose _STATUS_--</option>
                                    @foreach ($status as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
     <div class="modal-footer">
        <input type="hidden" name="id" value="0">
        <input type="hidden" name="page" value="1">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
        <button type="submit" class="btn btn-primary">_save_</button>
    </div>
</form>
@stop
@section('js_add')

<script type="text/javascript">
    $(document).ready(function(){
        var addFrom      = $("form.form-ajax");
        var validateAdd  = addFrom.validateform();
        addFrom.submit(function() { 
            if(validateAdd.checkInvalid()){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 0){
                            $.each(response.message,function(key,val){
                                validateAdd.addError(key,val);
                            });
                            validateAdd.showError();
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
