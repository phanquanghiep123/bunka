@extends('layouts.app')
@section('content')
@php
    $status = $_SEFF->getListStatus();
@endphp
<h1 class="card-title">_new_ _USER_</h1>
<form class="form form-ajax" method="post" action="{{route($_SEFF->_ROUTE_FIX . '.update')}}" enctype="multipart/form-data" autocomplete="off">
    <div class="modal-body" style="max-width: 800px ;margin: 0 auto;">
            <div class="row">
                <div class="col-3">
                   <div class="form-group">
                   <label>_AVATAR_</label>
                    <div class="custom-upload">
                        <div class="file-control d-flex justify-content-center align-items-center <?php echo @$user->photo != null ? 'active' : ''; ?>" <?php if($user->photo) echo 'style="background-image: url(\''.asset($user->photo).'\');"';?>>
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
                <div class="col-9">
                    <div class="form-row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_FIRSRNAME_</label>
                                <input type="text" class="form-control" placeholder="_FIRSRNAME_" validate="true" data-validate="required" value="{{$user->first_name}}" name="first_name" >
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_LASTNAME_</label>
                                <input type="text" class="form-control" placeholder="_LASTNAME_" validate="true" data-validate="required" value="{{$user->last_name}}" name="last_name" >
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_EMAIL_</label>
                                <input type="text" class="form-control" placeholder="_EMAIL_" validate="true" data-validate="required|email" value="{{$user->email}}" name="email" >
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_LANGUAGES_ </label>
                                <select class="form-control" name="lang_id">
                                    @if(@$langs)
                                        @foreach($langs as $key => $value)
                                            @if($value->id == $user->lang_id)
                                                <option value="{{$value->id}}" selected="">{{$value->name}}</option>
                                            @else
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
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
            p.addClass('active');
        });
    });
</script>
<style type="text/css">
    .custom-upload .file-control{background-size: cover;background-repeat: no-repeat;min-height: 173px;background-position: center;}
    .custom-upload .file-control.active .inner-holder{display: none;}
</style>
@stop
