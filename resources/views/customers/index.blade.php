@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$_PAGETITLE}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">_construction_information_manager_ {{$_PAGETITLE}}</h4>
                    <div class="table-form row align-items-center">
                        <div class="col-12 col-xl-8 order-xl-2">
                            <form>
                                <div class="form-row align-items-center justify-content-end">
                                    <div class="col-12 col-md-auto mb-2">
                                        <input type="text" class="form-control" value="<?php echo @$_GET['keyword']; ?>" name="keyword" placeholder="_NAME_">
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <div id="daterange">
                                            <input type="text" class="form-control" value="<?php echo @$_GET['date']; ?>" name="date" placeholder="_date_" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <button type="submit" class="btn btn-primary btn-block">_SEARCH_</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-xl-4 mb-2 order-xl-1">
                            <a class="btn btn-secondary" href ="{{ route($_SEFF->_ROUTE_FIX.'.export') }}" download="download"><i class="menu-icon mdi mdi-file-excel"></i> _export_</a>
                            <a class="btn btn-secondary" href ="javascript:;" onclick="$('#uploadfile').trigger('click');"><i class="menu-icon mdi mdi-file-excel"></i> [_import_]</a>
                            <input type="file" class="none" onchange="uploadfile(this);" style="display: none;" name="uploadfile" id="uploadfile">
                        </div>
                    </div>
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>[_customer_code_]</th>
                            <th>_CUSTOMERNAME_</th>
                            <th>_address_</th>
                            <th>_PHONE_</th>
                            <th>_EMAIL_</th>
                            <th>_TOTALORDER_</th>
                            <th>_DATECREATE_</th>
                            <th>_STATUS_</th>
                            <th data-sortable="false">_ACTION_</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($models))
                            @foreach ($models as $key => $value)
                                <tr>
                                    <td>{{($key + 1)}}</td>
                                    <td>{{$value->authorized_code}}</td>
                                    <td>{{$value->authorized_name}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>10</td>
                                    <td>{{ date('m/d/Y',strtotime($value->created_at)) }}</td>
                                    <td>
                                        <label class="badge" style="background-color: {{@$value->status->bg}};color: {{@$value->status->color}}">{{@$value->status->get_name()}}</label>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="<?php echo route($_SEFF->_ROUTE_FIX .'.edit',$value->id); ?>">_View_</a>
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
                                        {{$models->appends(@$input)->links()}}
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js_add')
    <script type="text/javascript">
        $(document).on("click","table input.onchangevalue",function(){
            var _this = $(this);
            var v = _this.parent().find(".apply").val() == 0  ? 1 : 0;
            _this.parent().find(".apply").val(v);
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
