@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$_PAGETITLE}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$_PAGETITLE}}</h4>
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
                            <button type="button" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> Export</button>
                        </div>
                    </div>
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th data-priority="1">#</th>
                            <th data-priority="1">Group</th>
                            <th>Date Created</th>
                            <th data-priority="1">Status</th>
                            <th data-priority="1" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($models))
                            @foreach ($models as $key => $value)
                                <tr>
                                    <td><a class="modal-edit" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.edit',[$order->id,$value->id])}}">{{($key + 1)}}</a></td>
                                    <td>{{$value->group()}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>1
{{--                                        <label class="badge" style="background-color: {{@$value->status->bg}};color: {{@$value->status->color}}">{{@$value->status->name($_SEFF->_LANG_ID)->name}}</label>--}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="menu-icon mdi mdi-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item modal-edit" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.edit',[$order->id,$value->id])}}">Edit</a>
                                                <a class="dropdown-item modal-delete" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.delete',[$order->id,$value->id])}}">Delete</a>
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
                        <div class="modal-dialog modal-lg" role="document">
                            <form class="form form-ajax" method="post" action="{{route($_SEFF->_ROUTE_FIX .'.store',$order->id)}}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New {{$_PAGETITLE}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Group</label>
                                                    <select validate="true" data-validate="required" name="group_id" class="form-control" placeholder="Group">
                                                        <option value="">Select Group</option>
                                                        <option value="1">Door</option>
                                                        <option value="2">Steel Shutter</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="">Design Company</label>
                                                    <input type="text" validate="true" data-validate="required" name="company" class="form-control" placeholder="Design Company">
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="">Design Company</label>
                                                    <input type="text" validate="true" data-validate="required" name="managers" class="form-control" placeholder="Design Company">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Designing Expense</label>
                                                    <div class="input-group">
                                                        <input type="number" validate="true" data-validate="required" name="expense" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Designing Expense">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">VND</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group" id="date-send">
                                                    <label for="exampleInputEmail1">Date Send</label>
                                                    <input type="text" validate="true" data-validate="required" name="date_send" class="form-control" placeholder="Date Send">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit">Files</label>
                                            <div class="d-flex flex-wrap">
                                                <div class="form-check form-check-flat mr-3 mt-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="files[]" class="form-check-input" data-value="site-drawing"> Site drawing
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check form-check-flat mr-3 mt-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="files[]" class="form-check-input" data-value="exterior-drawing"> Exterior drawing
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check form-check-flat mr-3 mt-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="files[]" class="form-check-input" data-value="detailed-drawings-of-house-structures"> Detailed drawings of house structures
                                                        <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check form-check-flat mr-3 mt-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="files[]" class="form-check-input" data-value="exterior-drawing-of-the-door"> Exterior drawing of the door
                                                        <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Requirements</label>
                                            <textarea name="requirements" class="form-control" placeholder="Requirements" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="0">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js_add')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#date-send").daterangepicker({
                singleDatePicker: true,
                parentEl: '#date_signed',
                "opens": 'left',
                buttonClasses: "btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            }, function (a, t, n) {
                $("#date-send .form-control").val(a.format("DD/MM/YYYY"));
            });

            var addFrom = $("#modal-add");
            var validateAdd  = addFrom.validateform();
            addFrom.find("form.form-ajax").submit(function() {
                if(validateAdd.checkInvalid()){
                    $(this).ajaxSubmit({
                        success: function(response){
                            if(response.status == 1){
                                addFrom.modal("hide");
                            } else {
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
            $(".modal-edit").click(function(){
                var url = $(this).attr("data-href");
                if(url){
                    $.ajax({
                        url : url ,
                        type:"get",
                        success : function(response){
                            if(response.status == 1){
                                var $module = response.data;
                                var $files = $module.files;
                                var $checkbox = addFrom.find("[name='files[]']");
                                $.each ($module,function($k,$v){
                                    if ($k !== 'files[]') {
                                        addFrom.find("[name="+$k+"]").val($v);
                                        addFrom.find("[name="+$k+"]").change();
                                    }
                                });
                                $checkbox.each(function() {
                                    var value = $(this).data('value');
                                    console.log(value);
                                    $(this).val(value);
                                    if ($files.indexOf(value) > -1) {
                                        $(this).prop('checked', true);
                                    } else {
                                        $(this).prop('checked', false);
                                    }
                                });
                                addFrom.modal();
                            }else {
                                $.each(response.message,function(key,val){
                                    validateAdd.addError(key,val);
                                });
                                validateAdd.showError();
                            }
                        }
                    })
                }
                return false;
            });
            $(".modal-delete").click(function(){
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

            addFrom.on('shown.bs.modal', function (e) {
                var $checkbox = addFrom.find("[name='files[]']");
                $checkbox.each(function() {
                    var value = $(this).data('value');
                    $(this).val(value);
                });
            })
        });
        $(document).on("click","table input.onchangevalue",function(){
            var _this = $(this);
            var v = _this.parent().find(".apply").val() == 0  ? 1 : 0;
            _this.parent().find(".apply").val(v);
        });
    </script>
@stop
