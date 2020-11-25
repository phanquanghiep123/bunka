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
                <form class="card-body" action='{{ route("$_SEFF->_ROUTE_FIX.update") }}' method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-sm-8 col-md-9 col-lg-10">
                            <h4 class="card-title">{{$_PAGETITLE}}</h4>
                        </div>
                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <div class="form-group">
                                <label>[_year_]</label>
                                <select class="form-control" name="year">
                                    <?php if(isset($years) && $years != null): ?>
                                        <?php foreach($years as $key => $item): ?>
                                            <option value="<?php echo $item->year; ?>" <?php echo $item->year == @$year ? 'selected' : ''; ?>><?php echo $item->year; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>[_month_]</th>
                                <th>[_expected_]</th>
                                <!--<th>[_system_percentage_]</th>-->
                                <!--<th>_status_</th>-->
                                <th>[_actual_]</th>
                                <th>_COMPLETED_</th>
                                <th>_PERCENT_</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($models))
                                @foreach ($models as $key => $value)
                                    <tr>
                                        <td>{{ $value->month }}</td>
                                        <td class="text-right"><span class="targe" data-targe="{{ $value->target }}">{{ number_format($value->target) }} VND</span></td>
                                        <?php /*<td><span class="system_percent" data-targe="{{ $value->system_percent }}">{{ number_format($value->system_percent) }}%</span></td>*/ ?>
                                        <?php /*<td><?php echo $value->status == 1 ? '_COMPLETED_' : ''; ?></td>*/ ?>
                                        <td>
                                            <p class="text-right">{{ number_format($value->expected) }} VND</p>
                                            <?php if(false): ?>
                                                <div class="input-group">
                                                    <input type="text" name="expected[{{ $value->month }}]" value="{{ $value->expected != 0 ? $value->expected : $value->target }}" class="form-control currency-mask">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VND</span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <p class="text-right">{{ number_format($value->current) }} VND</p>
                                            <?php if(false): ?>
                                                <div class="input-group">
                                                    <input type="text" name="price[{{ $value->month }}]" value="{{ $value->current }}" class="form-control currency-mask">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VND</span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="percent" data-targe="{{ $value->percent }}">{{ number_format($value->percent) }}%</span></td>
                                        <?php /*
                                        <td>
                                            <?php if($value->status != 1): ?>
                                                <button type="submit" class="btn btn-primary">[_save_submit_]</button>
                                            <?php endif; ?>
                                        </td>*/ ?>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js_add')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="year"]').change(function(){
                window.location = '{{ route("$_SEFF->_ROUTE_FIX.index") }}?year=' + $(this).val();
            });
        });
    </script>
@stop