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
                        <div class="col-12 col-xl-4 order-xl-1">
                        	<h4 class="card-title">{{$_PAGETITLE}}</h4>
                        </div>
                        <div class="col-12 col-xl-8 order-xl-2">
                            <form>
                                <div class="form-row align-items-center justify-content-end">
                                    <div class="col-12 col-md-auto mb-2">
                                        <input type="text" class="form-control" value="<?php echo @$_GET['keyword']; ?>" name="keyword" placeholder="_NAME_">
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <div id="daterange-c">
                                            <input type="text" class="form-control daterange" name="date" value="<?php echo @$_GET['date']; ?>" placeholder="_date_" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <select class="form-control" name="status">
                                            <option value="">Status</option>
                                            <?php if(isset($status) && $status != null): ?>
                                                <?php foreach ($status as $key => $value): ?>
                                                    <option value="<?php echo $value->id; ?>" <?php echo $value->id == @$_GET['status'] ? 'selected' : ''; ?>><?php echo $value->get_name(); ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <button type="submit" class="btn btn-primary btn-block">_SEARCH_</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <table id="example1" class="table table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th data-sortable="false">_CONTRACT_NO_</th>
                                <th data-sortable="false">_order_no_</th>
                                <th data-sortable="false">_customer_</th>
                                <th data-sortable="false">1st</th>
                                <th data-sortable="false">2sd</th>
                                <th data-sortable="false">3rd</th>
                                <th data-sortable="false">_total_(VND)</th>
                                <th data-sortable="false">_PAY_(VND)</th>
                                <th data-sortable="false">_DATECREATE_</th>
                                <th data-sortable="false">_DATESIGNED_</th>
                                <th data-sortable="false">_status_</th>
                                <th data-sortable="false">_action_</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($models))
                                @foreach ($models as $value)
                                    <?php $contract_periods = $value->periods; ?>
                                    <?php $i = 0; ?>
                                    <tr>
                                        <td><a href="{{ route($_SEFF->_ROUTE_FIX .'.edit',$value->id) }}">{{$value->contract_number}}</a></td>
                                        <td><a href="{{ route('orders.edit',$value->order_id) }}">{{$value->order->order_number}}</a></td>
                                        <td>{{$value->customer()->authorized_name}}</td>
                                        <?php foreach ($contract_periods as $item):  ?>
                                            <?php if($i < 3): ?>
                                                <td><?php echo $item->percent; ?>%</td>
                                            <?php endif; $i++; ?>
                                        <?php endforeach; ?>
                                        <?php if($i < 3): ?>
                                            <?php for ($j = $i; $j < 3; $j++): ?>
                                                <td></td>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                        <td class="text-right">{{ number_format($value->value_has_vat) }}</td>
                                        <td class="text-right">{{ number_format($value->payments->sum('payment_amount')) }}</td>
                                        <td><?php echo date('d/m/Y',strtotime(@$value->created_at)); ?></td>
                                        <td><?php echo date('d/m/Y',strtotime(@$value->date_signed)); ?></td>
                                        <td>
                                            @if(@$value->status != null)
                                                <label class="badge" style="background-color: {{@$value->status->bg}};color: {{@$value->status->color}}">
                                                    {{@$value->status->get_name()}}
                                                </label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route($_SEFF->_ROUTE_FIX .'.edit',$value->id) }}" class="btn btn-primary btn-xs">_VIEW_</a>
                                            <?php /*
                                            <div class="dropdown">
                                                <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="menu-icon mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item modal-edit" href="{{ route($_SEFF->_ROUTE_FIX .'.edit',$value->id) }}">_edit_</a>
                                                    <a class="dropdown-item modal-delete" href="javascript:;" data-href="{{ route($_SEFF->_ROUTE_FIX .'.delete',$value->id) }}">_delete_</a>
                                                </div>
                                            </div>*/ ?>
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
	<script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.js')}}"></script>
    <link rel="stylesheet" href="{{asset('js/datetimepicker/build/jquery.datetimepicker.min.css')}}">
    <script type="text/javascript">
        $(document).ready(function(){
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

            /*$('.daterange').daterangepicker({
                //singleDatePicker: true,
                //autoUpdateInput: true,
                opens: 'left',
                locale: {
                    format: 'DD/MM/YYYY'
                },
                //parentEl: current,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
            }, function (a, t, n) {
                current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                current.find('input.date-range').val(a.format("DD/MM/YYYY"));
            });*/

            $(".daterange").each(function(){
            	$(this).datetimepicker({
            		format:	'd/m/Y',
            		timepicker: false
            	});
            });

            $('#example1').dataTable( {
                "ordering": false,
                "searching": false,
                "lengthChange": false
            });

        });
        $(document).on("click","table input.onchangevalue",function(){
            var _this = $(this);
            var v = _this.parent().find(".apply").val() == 0  ? 1 : 0;
            _this.parent().find(".apply").val(v);
        });
    </script>
@stop
