@extends('layouts.app')
@section('content')
@php
    $status  = $_SEFF->getCommonListStatus();
@endphp
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form id="search-data" method="post">
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
                    <h5 class="modal-title" id="exampleModalLabel">_new_ _web_config_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="key">_key_</label>
                                <input type="text" validate="true" data-validate="required" name="key" class="form-control" placeholder="_key_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="value">_value_</label>
                                <input type="text" validate="true" data-validate="required" name="value" class="form-control" placeholder="_value_">
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
                    <h5 class="modal-title" id="exampleModalLabel">_edit_ _web_config_</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="key">_key_</label>
                                <input type="text" validate="true" data-validate="required" name="key" class="form-control" placeholder="_key_">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="value">_value_</label>
                                <input type="text" validate="true" data-validate="required" name="value" class="form-control" placeholder="_value_">
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
<style type="text/css">
    .more-status{
        float: right;
    }
    td.show{
        display: table-cell !important;
        height: auto;
        padding:15px !important;
    }
</style>
{!! $html->scripts() !!}
<script type="text/javascript">
    $(document).on("click","body .more-status",function(){
        var data = $(this).attr("data-id");
        $(".container-table-status-"+data+"").toggleClass("show");
        return false;
    })
    $(document).ready(function(){
        
        var addFrom = $("#modal-add");
        var editFrom = $("#modal-edit");
        var form;
        $("#modal-add form.form-ajax").submit(function() { 
            form  = $("#modal-add form.form-ajax").validateform();
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1) addFrom.modal("hide");
                        else alert(response.message);
                    }
                });
            }
            return false; 
        });
        $("#modal-edit form.form-ajax").submit(function() { 
            form  = $("#modal-edit form.form-ajax").validateform();
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1) addFrom.modal("hide");
                        else alert(response.message);
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
                                editFrom.find("[name="+$k+"]").val($v);
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
</script>
@stop