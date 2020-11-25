@extends('layouts.app')
@section('content')
@php
    $commons = $_SEFF->getIsCommonList();
    $status = [
        'Shut down',
        'Active'
    ];
@endphp
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form id="search-data" method="post">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="name" name="keyword" placeholder="Name">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <div id="daterange">
                        <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Start date - End date" autocomplete="off">
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
{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">_new_ _status_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_name_</label>
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($langs as $key => $lang)
                                        @if($key == 0)
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#lang-{{$lang->id}}">{{$lang->name}}</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#lang-{{$lang->id}}">{{$lang->name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                
                                <div class="tab-content">
                                    @foreach ($langs as $key => $lang)
                                        @if($key == 0)
                                            <div id="lang-{{$lang->id}}" class="tab-pane active" style="margin-top: 10px">
                                                <input type="text" validate="true" data-validate="required" name="names[{{$lang->id}}]" class="form-control" placeholder="Name">
                                            </div>
                                        @else
                                            <div id="lang-{{$lang->id}}" class="tab-pane fade" style="margin-top: 10px">
                                                <input type="text" name="names[{{$lang->id}}]" class="form-control" placeholder="Name">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>    
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_MODULES_</label>
                                <select class="form-control" name="module_id">
                                    <option value="">--_choose_ _MODULES_--</option>
                                    @foreach($modules as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_sort_</label>
                                <input type="number" validate="true" min='0' data-validate="required|number" name="sort" class="form-control" placeholder="_sort_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_color_</label>
                                <input type="text" name="color" id="demo" class="form-control" value="" placeholder="_color_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_background_color_</label>
                                <input type="text" name="bg" id="demo1" class="form-control" value="" placeholder="_background_color_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_hidden_select_status_</label>
                                <select validate="true" data-validate="required" class="form-control" placeholder="_hidden_select_status_" name="not_select">
                                    <option value="">--_choose_ _hidden_select_status_--</option>
                                    @foreach ($commons as $key => $value)
                                        <option value="{{$value->id}}">{{@$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_options_</label>
                                <input type="text" name="options" class="form-control" value="" placeholder="_options_" >
                            </div>
                        </div> 
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_is_common_</label>
                                <select validate="true" data-validate="required" class="form-control" name="is_common">
                                    <option value="">--choose _is_common_--</option>
                                    @foreach ($commons as $key => $value)
                                        <option value="{{$value->id}}">{{@$value->name}}</option>
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
                    <h5 class="modal-title" id="exampleModalLabel">_edit_ _status_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_name_</label>
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($langs as $key => $lang)
                                        @if($key == 0)
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#editlang-{{$lang->id}}">{{$lang->name}}</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#editlang-{{$lang->id}}">{{$lang->name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                
                                <div class="tab-content">
                                    @foreach ($langs as $key => $lang)
                                        @if($key == 0)
                                            <div id="editlang-{{$lang->id}}" class="tab-pane active" style="margin-top: 10px">
                                                <input type="text" validate="true" data-validate="required" name="names[{{$lang->id}}]" class="form-control" placeholder="Name">
                                            </div>
                                        @else
                                            <div id="editlang-{{$lang->id}}" class="tab-pane fade" style="margin-top: 10px">
                                                <input type="text" name="names[{{$lang->id}}]" class="form-control" placeholder="Name">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>    
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_MODULES_</label>
                                <select class="form-control" name="module_id">
                                    <option value="">--_choose_ _MODULES_--</option>
                                    @foreach($modules as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_sort_</label>
                                <input type="number" validate="true" min='0' data-validate="required|number" name="sort" class="form-control" placeholder="_sort_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_color_</label>
                                <input type="text" name="color" id="demo" class="form-control" value="" placeholder="_color_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_background_color_</label>
                                <input type="text" name="bg" id="demo1" class="form-control" value="" placeholder="_background_color_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_hidden_select_status_</label>
                                <select validate="true" data-validate="required" class="form-control" placeholder="_hidden_select_status_" name="not_select">
                                    <option value="">--_choose_ _hidden_select_status_--</option>
                                    @foreach ($commons as $key => $value)
                                        <option value="{{$value->id}}">{{@$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_options_</label>
                                <input type="text" name="options" class="form-control" value="" placeholder="_options_" >
                            </div>
                        </div> 
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>_is_common_</label>
                                <select validate="true" data-validate="required" class="form-control" name="is_common">
                                    <option value="">--choose _is_common_--</option>
                                    @foreach ($commons as $key => $value)
                                        <option value="{{$value->id}}">{{@$value->name}}</option>
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
@stop
@section('js_add')
<link href="{{asset('js/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
{!! $html->scripts() !!}
<script type="text/javascript">
    $(document).ready(function(){
        var addFrom = $("#modal-add");
        var editFrom = $("#modal-edit");
        $("#modal-add form.form-ajax").submit(function() { 
            var form  = $("#modal-add form.form-ajax").validateform();
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 0){
                            $.each(response.message,function(key,val){
                                form.addError(key,val);
                            });
                            form.showError();
                        }else {
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                            addFrom.modal('hide');
                        }
                    }
                });
            }
            return false; 
        });
        $("#modal-edit form.form-ajax").submit(function() { 
            var form  = $("#modal-edit form.form-ajax").validateform();
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 0){
                            $.each(response.message,function(key,val){
                                editFrom.addError(key,val);
                            });
                            editFrom.showError();
                        }else {
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                            editFrom.modal('hide');
                        }
                    }
                });
            }
            return false; 
        });
        $(document).on("click",".modal-edit",function(){
            var url = $(this).attr("data-href");
            if(url){
                $.ajax({
                    url : url ,
                    type:"get",
                    success : function(response){
                        if(response.status == 1){
                            var $module = response.data;
                            $.each ($module,function($k,$v){
                                editFrom.find("[name='"+$k+"']").val($v);
                                editFrom.find("[name='"+$k+"']").change();
                            });
                            editFrom.modal();
                        }else alert(response.message);
                    }
                })
            }
            return false;
        });
        $(document).on("click",".modal-rule",function(){
            var url = $(this).attr("data-href");
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            $("#modal-rules .form-ajax [name=id]").val(id);
            $("#modal-rules .name-role").text(name);
            if(url){
                $.ajax({
                    url : url ,
                    type:"get",
                    success : function(response){
                        if(response.status == 1){
                            var $module = response.data;
                            $("#modal-rules table .content-table").html($module);
                            $("#modal-rules").modal();
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
                var url = $(this).attr("data-href");
                if(url){
                    $.ajax({
                        url : url ,
                        type:"get",
                        success : function(response){
                            if(response.status != 1){
                                alert(response.message);
                            }else {
                                window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                            } 
                        }
                    })
                }
            }
            return false;
        });
    });
    $(document).on("click","table input.onchangevalue",function(){
        var _this = $(this);
        var v = _this.parent().find(".apply").val() == 0  ? 1 : 0;
        _this.parent().find(".apply").val(v);
    });
    $(document).on("submit","#modal-rules form.form-ajax",function() { 
        $(this).ajaxSubmit({
            success: function(response){
                if(response.status == 1) $("#modal-rules").modal("hide");
                else alert(response.message);
            }
        });
        return false; 
    });
    $('#demo').colorpicker();
    $('#demo1').colorpicker();
    var DDURL = window.LaravelDataTables["dataTableBuilder"].ajax.url();
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
    // Example using an event, to change the color of the .jumbotron background:
</script>
@stop