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
                <?php if($year >= date('Y')): ?>
                    <form class="card-body" action="{{ route("construction_completion.update") }}" method="post">
                <?php endif; ?>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h4 class="card-title">{{$_PAGETITLE}}</h4>
                        <div class="row">
                            <div class="col-sm-8 col-md-9 col-lg-10"></div>
                            <div class="col-sm-4 col-md-3 col-lg-2">
                                <div class="form-group">
                                    <label>[_year_]</label>
                                    <select class="form-control" name="year">
                                        <?php for ($i = date('Y'); $i <=  date('Y') + 10; $i++): ?>
                                            <option value="<?php echo $i; ?>" <?php echo $i == @$year ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>_NAME_</th>
                                    <th>_EMAIL_</th>
                                    <th>[_month_]</th>
                                    <th>_price_</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($models))
                                    @foreach ($models as $key => $value)
                                        <tr>
                                            <td>{{($key + 1)}}</td>
                                            <td>{{ $value->first_name.' '.$value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                <?php
                                                    $total = 0;
                                                    $list = $value->construction_completions($year)->get();
                                                    $arr  = array();
                                                    if(isset($list) && $list != null) {
                                                        foreach ($list as $key => $item) {
                                                            $arr[] = $item->month;
                                                            $total = $item->total;
                                                        }
                                                    }
                                                ?>
                                                <select class="selectpicker" name="month[{{ $value->id }}][]" multiple title="[_choose_month_]">
                                                    <?php for($i=1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo $i; ?>" <?php echo in_array($i,$arr) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="amount[{{ $value->id }}]" value="{{ $total }}" placeholder="_AMOUNT_" class="form-control currency-mask">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VND</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route("$_SEFF->_ROUTE_FIX.edit",['id' => $value->id,'year' => $year]) }}">[_view_all_]</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                <?php if($year >= date('Y')): ?>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">[_save_submit_]</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
@stop
@section('js_add')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-select.css') }}">
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="year"]').change(function(){
                window.location = '{{ route("construction_completion.index") }}?year=' + $(this).val();
            });
        });
    </script>
    <style type="text/css">
        .bootstrap-select{border: none;}
        .bootstrap-select .btn{background-color: #fff;border: 1px solid #000 !important;color: #000 !important;padding-left: 10px;}
        .bootstrap-select > select.selectpicker{display: none;}
        .bootstrap-select .dropdown-menu{padding-top: 0;padding-bottom: 0;position: static;float:none;}
        .bootstrap-select .dropdown-menu > .dropdown-menu.inner{display: block;}
        .bootstrap-select .dropdown-menu > .dropdown-menu.inner li{padding: 0px 10px;outline: 0;box-shadow: none;}
        .bootstrap-select .dropdown-menu > .dropdown-menu.inner li a{display: block;color: #000;outline: 0;box-shadow: none; width: 100%;font-size: 16px;}
        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {position: absolute;display: inline-block;right: 15px;top: 5px;}
        .bootstrap-select .bs-ok-default:after {content: '';display: block;width: .5em;height: 1em;border-style: solid;border-width: 0 .26em .26em 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);}
        .bootstrap-select .bs-actionsbox .btn-block{width: 90%;}
        .bootstrap-select .bs-actionsbox .btn-default{font-size: 12px;padding:5px 10px;}
    </style>
@stop
