@extends('layouts.app')
@section('content')
@php
    $status  = $_SEFF->getCommonListStatus();
@endphp
<h1 class="card-title">Manage {{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form>
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
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-4 mb-2 order-xl-1">
        <a href="admin-user-add.html" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add"><i class="menu-icon mdi mdi-plus"></i> New</a>
        
        
    </div>
</div>
<table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th data-priority="1">#</th>
            <th data-priority="1" data-sortable="false">Number tax </th>
            <th data-priority="2">Status</th>
            <th>Date Created</th>
            <th data-priority="1" data-sortable="false">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($models))
        @foreach ($models as $key => $value) 
        <tr>
            <td>{{($key + 1)}}</td>
            <td>{{$value->number}}</td>
            <td><label class="badge" style="background-color: {{@$value->status->bg}};color: {{@$value->status->color}}">{{@$value->status->get_name()}}</label></td>
            <td>{{$value->created_at}}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon mdi mdi-dots-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item modal-edit" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.edit',$value->id)}}">Edit</a>
                        <a class="dropdown-item modal-delete" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.delete',$value->id)}}">Delete</a>
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
    <div class="modal-dialog modal-md" role="document">
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New {{$_PAGETITLE}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">Number tax</label>
                                <input type="text" validate="true" data-validate="required" name="number" class="form-control" placeholder="Number tax">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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