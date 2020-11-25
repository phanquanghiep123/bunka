@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $_PAGETITLE }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <form class="card" method="post" action="{{ route("construction_completion.approve") }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 col-md-9 col-lg-10">
                            <h4 class="card-title">{{ $_PAGETITLE }}</h4>
                        </div>
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
                                <th>[_month_]</th>
                                <th>[_expected_]</th>
                                <!--<th>[_system_percentage_]</th>-->
                                <th>[_actual_]</th>
                                <th>_COMPLETED_</th>
                                <th>_PERCENT_</th>
                                <!--<th></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($models))
                                @foreach ($models as $key => $value)
                                    <tr>
                                        <td>{{ $value->month }}</td>
                                        <td style="width: 250px;">
                                    		<span style="display: none;" class="targe" data-targe="{{ $value->target }}">{{ number_format($value->target) }} VND</span>
                                    		<div class="input-group">
                                                <input type="text" name="target[{{ $value->month }}]" value="{{ $value->target }}" placeholder="Target" class="form-control currency-mask">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">VND</span>
                                                </div>
                                            </div>
                                    	</td>
                                        <?php /*<td><span class="system_percent" data-targe="{{ $value->system_percent }}">{{ number_format($value->system_percent) }}%</span></td>*/?>
                                        <td class="text-right">{{ number_format($value->expected) }} VND</td>
                                        <td class="text-right">{{ number_format($value->current) }} VND</td>
                                        <td><span class="percent" data-targe="{{ $value->percent }}">{{ number_format($value->percent) }}%</span></td>
                                        <?php /*
                                        <td class="text-center">
                                            <?php if($value->status != 1): ?>
                                                <form action='{{ route("$_SEFF->_ROUTE_FIX.approve") }}' method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <input type="hidden" name="year" value="{{ $year }}">
                                                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                                                    <button type="submit" class="btn btn-primary">[_approve_]</button>
                                                </form>
                                            <?php endif; ?>
                                        </td>*/ ?>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a class="btn btn-default" href="{{ route("$_SEFF->_ROUTE_FIX.index") }}?year={{ $year }}">[_back_]</a>
                    	<button class="btn btn-primary">[_save_submit_]</button>
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	<input type="hidden" name="id" value="<?php echo @$_GET['id']; ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js_add')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="year"]').change(function(){
                window.location = '{{ route("construction_completion.edit") }}?id=<?php echo @$_GET['id']; ?>&year=' + $(this).val();
            });
        });
    </script>
@stop