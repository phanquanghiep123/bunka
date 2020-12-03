@extends('layouts.app')
@section('content')
@php
    $status  = $_SEFF->getCommonListStatus();
    $commons = $_SEFF->getIsCommonList();
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
            <th data-priority="1" data-sortable="false">_name_</th>
            <th data-priority="2">_icon_</th>
            <th data-priority="2">_rate_price_</th>
            <th data-priority="2">_price_label_</th>
            <th>_status_</th>
            <th>_created_at_</th>
            <td>_is_default_</td>
            <th data-priority="1" data-sortable="false">_action_</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($models))
        @foreach ($models as $key => $value) 
        <tr>
            <td>{{($key + 1)}}</td>
            <td>{{$value->name}}</td>

            <td>
                @if($value->icon)
                    <img style="border-radius: 100%;height:50px;width:50px;border:1px solid #ccc;object-fit: cover;" src="{{asset($value->icon)}}">
                @endif
            </td>
            <td>{{$value->rate}}</td>
            <td>{{$value->price_label}}</td>
            <td><label class="badge" style="background-color: {{@$value->status->bg}};color: {{@$value->status->color}}">{{@$value->status->get_name()}}</label></td>
            <td>{{$value->created_at}}</td>
            <td>{{$_SEFF->activerCommon($value->is_default)}}</td>
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
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">_new_ {{$_PAGETITLE}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_name_</label>
                                <input type="text" validate="true" data-validate="required" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_icon_</label>
                                <div class="row box-parent">
                                    <div class="col-md-6">
                                        <input type="file" name="icon" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <img style="border-radius: 100%;height:50px;width:50px;border:1px solid #ccc;object-fit: cover;" src="#">
                                    </div>
                                </div>
                                
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
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">_is_default_</label>
                                <select validate="true" data-validate="required" class="form-control" name="is_default">
                                    <option value="">--_choose_ _is_default_--</option>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">_edit_ {{$_PAGETITLE}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_name_</label>
                                <input type="text" validate="true" data-validate="required" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="Name">_icon_</label>
                                <div class="row box-parent">
                                    <div class="col-md-6">
                                        <input type="file" name="icon" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <img style="border-radius: 100%;height:50px;width:50px;border:1px solid #ccc;object-fit: cover;" src="#">
                                    </div>
                                </div>
                                
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
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">_is_default_</label>
                                <select validate="true" data-validate="required" class="form-control" name="is_default">
                                    <option value="">--_choose_ _is_default_--</option>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('js_add')
<script type="text/javascript">
    $(document).ready(function(){
        var addFrom = $("#modal-add");
        var editFrom = $("#modal-edit");
        var form ;
        $("#modal-add form.form-ajax").submit(function() { 
            form = $(this).validateform()
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1) addFrom.modal("hide");
                        else{
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
            form = $(this).validateform()
            if(form.checkInvalid(false)){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 1) editFrom.modal("hide");
                        else{
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
                            editFrom.modal();
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
</script>
@stop