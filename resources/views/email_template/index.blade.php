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
                    <div class="table-form row align-items-center">
                        <div class="col-12 col-xl-4 mb-2">
                            <h4 class="card-title">_construction_information_manager_ {{$_PAGETITLE}}</h4>
                        </div>
                        <div class="col-12 col-xl-8">
                            <form>
                                <div class="form-row align-items-center justify-content-end">
                                    <div class="col-12 col-md-auto mb-2">
                                        <input type="text" class="form-control" value="<?php echo @$_GET['keyword']; ?>" name="keyword" placeholder="_NAME_">
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <button type="submit" class="btn btn-primary btn-block">_SEARCH_</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-xl-4 mb-2 order-xl-1">
                            <a href="{{ route($_SEFF->_ROUTE_FIX.'.create') }}" class="btn btn-secondary"><i class="menu-icon mdi mdi-plus"></i>_new_</a>
                            
                        </div>
                    </div>

                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>_KEY_</th>
                            <th>_TITLE_</th>
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
                                        <td>{{$value->key_id}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{ date('m/d/Y',strtotime($value->created_at)) }}</td>
                                        <td>
                                            <?php if($value->status == 1): ?>
                                                <label class="badge" style="background-color: #00A850;color: #FFFFFF;">_ACTIVE_</label>
                                            <?php else: ?>
                                                <label class="badge" style="background-color: #4F0B0B;color: #FFFFFF;">_DEACTIVE_</label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="<?php echo route($_SEFF->_ROUTE_FIX .'.edit',$value->emailtemplate_id); ?>">_View_</a>
                                            <a class="btn btn-xs btn-danger" onclick="return confirm('_warning_delete_');" href="{{ route($_SEFF->_ROUTE_FIX .'.delete',$value->emailtemplate_id) }}">_delete_</a>
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
