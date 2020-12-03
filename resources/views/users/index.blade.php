@extends('layouts.app')
@section('content')
@php
    $commons = [
        'No',
        'Yes'
    ];
    $status = $_SEFF->getCommonListStatus();
@endphp
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form>
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="name" value="{{isset($keyword) ? $keyword : ''}}" name="keyword" placeholder="Name">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <div id="daterange">
                        <input type="text" class="form-control" value="{{isset($created_at) ? $created_at : ''}}" name="created_at" id="created_at" placeholder="Start date - End date" autocomplete="off">
                    </div>
                </div>

                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">_search_</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-4 mb-2 order-xl-1">
        <a href="admin-user-add.html" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
    </div>
</div>
<table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th data-priority="1">#</th>
            <th>[_staff_id_]</th>
            <th data-priority="1" data-sortable="false">_FIRSRNAME_</th>
            <th data-priority="1">_LASTNAME_</th>
            <th data-priority="1">_EMAIL_</th>
            <th data-priority="2">_AVATAR_</th>
            <th data-priority="1">_STATUS_</th>
            <th>_DATECREATE_</th>
            <th data-priority="1" data-sortable="false">_ACTION_</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($models))
            @foreach ($models as $key => $value)
            <tr>
                <td>{{($key + 1)}}</td>
                <td>{{$value->code}}</td>
                <td>{{$value->first_name}}</td>
                <td>{{$value->last_name}}</td>
                <td>{{$value->email}}</td>
                <td>
                    @if ($value->photo)
                        <img class="avatar avatar-sm" src="{{asset($value->photo)}}">
                    @endif
                </td>
                <td>
                    <label class="badge" style="background-color: {{@$value->status->bg}};color: {{@$value->status->color}}">{{@$value->status->get_name()}}</label>
                </td>
                <td>{{$value->created_at}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon mdi mdi-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item modal-edit" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.edit',$value->id)}}">_edit_</a>
                            <a class="dropdown-item modal-delete" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.delete',$value->id)}}">_delete_</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="row">
    <div class="col-xl-12">
        <div class="text-center">
            <nav aria-label="Page navigation example">
                @if($models instanceof \Illuminate\Pagination\LengthAwarePaginator )
                   {{$models->links()}}
                @endif
            </nav>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">_new_</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>_FIRSRNAME_</label>
                                            <input type="text" class="form-control" placeholder="_FIRSRNAME_" validate="true" data-validate="required" name="first_name" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>_LASTNAME_</label>
                                            <input type="text" class="form-control" placeholder="_LASTNAME_" validate="true" data-validate="required" name="last_name" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>_EMAIL_</label>
                                            <input type="text" value="*" class="form-control" placeholder="_EMAIL_" validate="true" data-validate="required|email" name="email" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>_PASSWORD_</label>
                                            <input type="password" value="*" class="form-control" placeholder="_PASSWORD_" validate="true" data-validate="required|min:6" name="password" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>_BRANCH_</label>
                                            <select class="form-control" validate="true" data-validate="required" name="branch_id">
                                                <option value="">--choose _BRANCH_--</option>
                                                @foreach(@$branchs as $key => $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
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
                                            <select class="form-control" name="status_id" validate="true" data-validate="required" >
                                                <option value="">--choose _STATUS_--</option>
                                                @foreach ($status as $key => $value)
                                                    <option value="{{$value->id}}">{{$value->get_name()}}</option>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
                    <button type="submit" class="btn btn-primary">_save_</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">_edit_</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-ajax" method="post" action="{{$_SEFF->_STOREURL}}" enctype="multipart/form-data" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-auto">
                           <div class="form-group">
                           <label>_AVATAR_</label>
                            <div class="custom-upload">
                                <div class="file-control d-flex justify-content-center align-items-center" style="">
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
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>_FIRSRNAME_</label>
                                        <input type="text" class="form-control" placeholder="_FIRSRNAME_" validate="true" data-validate="required" name="first_name" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>_LASTNAME_</label>
                                        <input type="text" class="form-control" placeholder="_LASTNAME_" validate="true" data-validate="required" name="last_name" >
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>[_staff_id_]</label>
                                        <input type="text" class="form-control" placeholder="_code_"  name="code" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>_EMAIL_</label>
                                        <input type="text" autcomplete="false" class="form-control" placeholder="_EMAIL_" validate="true" data-validate="required|email" name="email" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>_PASSWORD_</label>
                                        <input type="password" autcomplete="false" class="form-control" placeholder="_PASSWORD_" validate="true" data-validate="min:6" name="password" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>_BRANCH_</label>
                                        <select class="form-control" disabled>
                                            <option value="">--choose _BRANCH_--</option>
                                            @foreach(@$branchs as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
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
                                       <select class="form-control" name="status_id" validate="true" data-validate="required" >
                                            <option value="">--choose _STATUS_--</option>
                                            @foreach ($status as $key => $value)
                                                <option value="{{$value->id}}">{{@$value->get_name()}}</option>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
                    <button type="submit" class="btn btn-primary">_save_</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
    .custom-upload .file-control{background-size: cover;background-repeat: no-repeat;min-height: 173px;background-position: center;}
    .custom-upload .file-control.active .inner-holder{display: none;}
</style>
<script type="text/javascript">
    $(document).ready(function(){
        var addFrom      = $("#modal-add");
        var editFrom     = $("#modal-edit");
        var validateAdd  = addFrom.validateform();
        var validateEdit = editFrom.validateform();
        addFrom.find("form.form-ajax").submit(function() {
            if(validateAdd.checkInvalid()){
                $(this).ajaxSubmit({
                    success: function(response){
                    	console.log(response);
                        if(response.status == 1){
                            addFrom.modal("hide");
                        }
                        else {
                            $.each(response.message,function(key,val){
                                if(key == 'code'){
                                    var html = '<p class="validate-error error" style="color:red; font-size:12px"><span>' + val + '</span></p>';
                                    $('input[name="code"]').after(html);
                                }
                                else{
                                    validateAdd.addError(key,val);
                                }
                                
                            });
                            validateAdd.showError();
                        }
                    },
                    error:function(data){
                    	console.log(data);
                    }
                });
            }
            return false;
        });


        editFrom.find("form.form-ajax").submit(function() {
            if(validateEdit.checkInvalid()){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1){
                            addFrom.modal("hide");
                        }
                        else {
                            $.each(response.message,function(key,val){
                                validateEdit.addError(key,val);
                            });
                            validateEdit.showError();
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

        $('#modal-add').on('shown.bs.modal', function (e) {
            $('#modal-add input[name="email"]').val('');
            $('#modal-add input[name="password"]').val('');
        });


        $(".modal-edit").click(function(){
            var url = $(this).attr("data-href");
            if(url){
                $.ajax({
                    url : url ,
                    type:"get",
                    success : function(response){
                        if(response.status == 1){
                            var $module = response.data;
                            $.each ($module,function($k,$v){
                                if( editFrom.find("[name="+$k+"]").attr("type") != "file" ){
                                    editFrom.find("[name="+$k+"]").val($v);
                                    editFrom.find("[name="+$k+"]").change();
                                }else{
                                    editFrom.find("[name="+$k+"]").closest('.box-parent').find("img").attr("src",$v);
                                }
                            });
                            var p = editFrom.find('.custom-upload > .file-control');
                            uploadedImageURL = '{{asset("/")}}' + $module.photo;
                            p.css("background-image",'url('+uploadedImageURL+')');
                            editFrom.modal();
                        }else alert(response.message);
                    }
                })
            }
            return false;
        });


        $(".modal-delete").click(function(){
            var txt;
            var r = confirm("_warning_delete_");
            if(r){
                var url = $(this).attr("data-href");
                if(url){
                    $.ajax({
                        url : url ,
                        type:"get",
                        success : function(response){
                            if(response.status != 1){
                                alert(response.message);
                            }
                        }
                    })
                }
            }
            return false;
        });
    });
</script>
@stop