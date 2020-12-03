@extends('layouts.app')
@section('content')
@php
    $status  = $_SEFF->getCommonListStatus();
@endphp
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div id="modal-add" class="card grid-margin">
    <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}">
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="Name">_name_</label>
                        <input type="text" validate="true" data-validate="required" name="name" class="form-control" placeholder="_name_">
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="address">_address_</label>
                        <input type="text" validate="true" data-validate="required" name="address" class="form-control" placeholder="_address_">
                    </div>
                </div>
                
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="phone">_short_name_</label>
                        <input type="text" validate="true" data-validate="required" name="short_name" class="form-control" placeholder="_short_name_">
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">_status_</label>
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
    </form>
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
<script type="text/javascript">
    $(document).on("click","body .more-status",function(){
        var data = $(this).attr("data-id");
        $(".container-table-status-"+data+"").toggleClass("show");
        return false;
    })
    $(document).ready(function(){
        
        var addFrom = $("#modal-add");
        var form  = $("#modal-add form.form-ajax").validateform();
        $("#modal-add form.form-ajax").submit(function() { 
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
                                addFrom.find("[name="+$k+"]").val($v);
                                addFrom.find("[name="+$k+"]").change();
                            });
                            addFrom.modal();
                        }else alert(response.message);
                    }
                })
            }
            return false;
        });
        $(".modal-rule").click(function(){
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
        $(".modal-delete").click(function(){
            var txt;
            var r = confirm("Are you sure!");
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
    
</script>
@stop