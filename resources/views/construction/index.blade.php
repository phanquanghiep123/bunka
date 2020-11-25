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
                    <h4 class="card-title">_construction_information_manager_ {{$_PAGETITLE}} 
                        @if($_SEFF->checkUserAllowAction('add'))
                        <a href="{{route($_SEFF->_ROUTE_FIX .'.create') }}" class="btn btn-sm btn-secondary"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
                        @endif
                    </h4>
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
                        </div>
                    </div>
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>_CODE_</th>
                                <th>_NAME_</th>
                                <th>_ADDRESS_</th>
                                <th>_PHONE_</th>
                                <th>_FAX_</th>
                                <th>_type_</th>
                                <th>_construction_manager_</th>
                                <th>_DATECREATE_</th>
                                <th>_STATUS_</th>
                                <th>_ACTION_</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $arr = array(
                                    'factories'    => '[_factories_]',
                                    'warehouses'   => '[_warehouses_]',
                                    'offices'      => '[_offices_]',
                                    'condominiums' => '[_condominiums_]',
                                    'government_offices' => '[_government_offices_]',
                                    'schools'      => '[_schools_]',
                                    'hospitals'    => '[_hospitals_]',
                                    'markets'      => '[_markets_]',
                                    'etc'          => '[_etc_]',
                                );
                            ?>
                            @if(isset($models))
                                @foreach ($models as $key => $value)
                                    <tr>
                                        <td>{{($key + 1)}}</td>
                                        <td>{{$value->code}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->fax}}</td>
                                        <td><?php echo @$arr[$value->type]; ?></td>
                                        <td>{{$value->manager}}</td>
                                        <td>{{$value->created_at}}</td>
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
    </script>
@stop
