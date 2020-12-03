@extends('layouts.app')
@section('content')
@php
    $status  = $_SEFF->getListStatus();
@endphp 
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-7 order-xl-2">
        <form id="search-data">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="name" name="keyword" placeholder="_keyword_">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <div id="daterange">
                        <input type="text" class="form-control" name="created_at" id="created_at" placeholder="_start_date_end_date_" autocomplete="off">
                    </div>
                </div>

                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">_search_</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-5 mb-2 order-xl-1">
        @if($_SEFF->checkUserAllowAction('add'))
        <a href="javascript:;" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-add"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
        @endif
        <a class="btn  btn-sm btn-secondary" href ="{{ route($_SEFF->_ROUTE_FIX.'.export') }}" download="download"><i class="menu-icon mdi mdi-file-excel"></i> [_export_]</a>
        <a class="btn btn-sm btn-secondary" href ="javascript:;" onclick="$('#uploadfile').trigger('click');"><i class="menu-icon mdi mdi-file-excel"></i> [_import_]</a>
        <input type="file" class="none" onchange="uploadfile(this);" style="display: none;" name="uploadfile" id="uploadfile">
    </div>
</div>
{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">_new_ _Language_Labels_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Ikey</label>
                                <input type="text" validate="true" data-validate="required" name="key_id" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        @foreach ($langs as $key => $value)
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label>{{$value->name}}</label>
                                    <input class="not-change" type="hidden" name="lang_ids[]" value="{{$value->id}}">
                                    <input type="text" id="lang_{{$value->id}}" name="values[]" class="form-control" placeholder="Value for {{$value->name}}">
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_status_</label>
                                <select validate="true" data-validate="required" class="form-control" name="status_id">
                                    <option value="">--choose Status--</option>
                                    @foreach ($status as $key => $value)
                                        <option value="{{$value->id}}">{{@$value->get_name()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                     
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
                    <button type="submit" class="btn btn-primary">_save_</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">_edit_ _Language_Labels_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">Ikey</label>
                                <input type="text" validate="true" data-validate="required" name="key_id" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        @foreach ($langs as $key => $value)
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="name_{{$value->id}}">{{$value->name}}</label>
                                    <input class="not-change" type="hidden" name="lang_ids[]" value="{{$value->id}}">
                                    <input type="text" id="lang_{{$value->id}}" name="values[]" class="form-control" placeholder="Value for {{$value->name}}">
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_status_</label>
                                <select validate="true" data-validate="required" class="form-control" name="status_id">
                                    <option value="">--_choose_ _status_--</option>
                                    @foreach ($status as $key => $value)
                                        <option value="{{$value->id}}">{{@$value->get_name()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                     
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
                    <button type="submit" class="btn btn-primary">_save_</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modal-tree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">_new_ _Language_Labels_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <form id="tree-menu-form" action=""> 
                                {{ csrf_field() }}
                                <div class="tree-body">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <ol class="sortable" id="easymm"></ol>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    _add_item_
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="">_name_</label>
                                                        <input type="text" class="form-control" id="add-title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">_url_</label>
                                                        <input type="text" class="form-control" id="add-url">
                                                    </div>
                                                        <div class="form-group text-right">
                                                        <button id="add-menu" type="submit" data-reference="link" class="btn btn-primary">_new_</button>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>      
                                </div>
                            </form>
                        </div>                     
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
                    <button type="submit" class="btn btn-primary">_save_</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('js_add')
<link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mjs.nestedSortable.js')}}"></script>
{!! $html->scripts() !!}
<script type="text/javascript">
    var DDURL = window.LaravelDataTables["dataTableBuilder"].ajax.url();
    $(document).on("click","#action-delete",function(event){
        event.stopPropagation();
        event.preventDefault();
        var url = $(this).attr("href");
        var warning = '_warning_delete_';
        if (confirm(warning)){
            $.ajax({
                url : url,
                type:"get",
                success : function(data){
                    if(data.status == 1) 
                        window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                    else{
                        alert("Error!!!");
                    }
                }
            })
        }
        return false; 
        
    });
    $(document).on("click",".treeview",function(event){
        event.stopPropagation();
        event.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            dataType:"json",
            url : url,
            type:"get",
            success : function(data){
                if(data.status == 1) {
                    $("#modal-viewall .modal-content").html(data.data);
                    $("#modal-viewall").modal();
                }  
                else{
                    alert("Error!!!");
                }
            }
        })
        return false; 

    });
    $('#search-data').submit(function(){
        event.stopPropagation();
        event.preventDefault();
        var data = $(this).serialize();
        var ADDD = DDURL;
        if(ADDD.indexOf("?")){
            ADDD += '?search=true';
        }
        ADDD += '&' + data;
        window.LaravelDataTables["dataTableBuilder"].ajax.url(ADDD);
        window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
        return false;
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var addFrom  = $("#modal-add");
        var editFrom = $("#modal-edit");
        var form;
        $("#modal-add form.form-ajax").submit(function() { 
            form  = $(this).validateform();
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1) {
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                            addFrom.modal("hide");
                        }else{
                            $.each(response.message,function(key,val){
                                addFrom.addError(key,val);
                            });
                            addFrom.showError();
                        }
                    }
                });
            }
            return false; 
        });
        $("#modal-edit form.form-ajax").submit(function() { 
            form  = $(this).validateform();
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1) {
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                            editFrom.modal("hide");
                        }else{
                            $.each(response.message,function(key,val){
                                editFrom.addError(key,val);
                            });
                            editFrom.showError();
                        }
                    }
                });
            }
            return false; 
        });
        $(document).on("click",".modal-edit",function(){
            var url = $(this).attr("href");
            if(url){
                $.ajax({
                    url : url ,
                    type:"get",
                    success : function(response){
                        if(response.status == 1){
                            var $module = response.data;
                            $.each ($module,function($k,$v){
                                editFrom.find("[name="+$k+"]").val($v);
                                editFrom.find("#"+$k).val($v);
                                editFrom.find("[name="+$k+"]").change();
                            });
                            editFrom.modal();
                        }else alert(response.message);
                    }
                })
            }
            return false;
        });
        $(document).on("click",".modal-delete",function(){
            var txt;
            var r = confirm("_warning_delete_");
            if(r){
                var url = $(this).attr("href");
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
    function uploadfile(_this){
        var file = _this.files[0];
        var formData = new FormData();
        formData.append('file',file);
        $.ajax({
            url:  "{{route($_SEFF->_ROUTE_FIX.'.import')}}",
            data: formData,
            type: 'POST',
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (e) {
                var input = $("#uploadfile");
                input.replaceWith(input.val('').clone(true));
            },
            error: function (data) {
                console.log(data['responseText']);
                alert("_error_!");
            }
        });
    }
</script>
@stop