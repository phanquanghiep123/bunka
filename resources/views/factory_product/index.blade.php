@extends('layouts.app')
@section('content')
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
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
        <!--<button type="button" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> _export_</button>-->
        <a class="btn btn-secondary" href ="javascript:;" onclick="$('#uploadfile').trigger('click');"><i class="menu-icon mdi mdi-file-excel"></i> [_import_]</a>
        <input type="file" class="none" onchange="uploadfile(this);" style="display: none;" name="uploadfile" id="uploadfile">
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>[_received_date_]</th>
                    <th>[_code_works_]</th>
                    <th>[_produce_code_]</th>
                    <th>[_ss_no_]</th>
                    <th>_type_</th>
                    <th>_width_</th>
                    <th>_height_</th>
                    <th>M²</th>
                    <th>[_position_]</th>
                    <th>[_factory_price]</th>
                    <th>[_actual_production_price]</th>
                    <th>[_prices_are_not_discounted_]</th>
                    <th>[_price_of_sales_department_]</th>
                    <th>[_registration_date_of_separation_]</th>
                    <th>[_date_registration_]</th>
                    <th>[_date_registration_complete_]</th>
                    <th>[_date_complete_]</th>
                    <th>[_date_registration_export_]</th>
                    <th>[_date_export_]</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($models))
                    @foreach ($models as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><?php echo date('d/m/Y',strtotime(@$value->received_date)); ?></td>
                            <td>{{ $value->code_works }}</td>
                            <td>{{ $value->produce_code }}</td>
                            <td>{{ $value->ss_no }}</td>
                            <td>{{ $value->type }}</td>
                            <td>{{ $value->w }}</td>
                            <td>{{ $value->h }}</td>
                            <td>{{ $value->m2 }}</td>
                            <td>{{ $value->position }}</td>
                            <td class="text-right">{{ number_format($value->price_factory) }} VND</td>
                            <td class="text-right">{{ number_format($value->price_real) }} VND</td>
                            <td class="text-right">{{ number_format($value->price_no_sale) }} VND</td>
                            <td class="text-right">{{ number_format($value->price_of_sales_department) }} VND</td>
                            <td><?php echo @$value->registration_date_of_separation != null ? date('d/m/Y',strtotime(@$value->registration_date_of_separation)) : ''; ?></td>
                            <td><?php echo @$value->date_registration != null ? date('d/m/Y',strtotime(@$value->date_registration)) : ''; ?></td>
                            <td><?php echo @$value->date_registration_complete != null ? date('d/m/Y',strtotime(@$value->date_registration_complete)) : ''; ?></td>
                            <td><?php echo @$value->date_complete != null ? date('d/m/Y',strtotime(@$value->date_complete)) : ''; ?></td>
                            <td><?php echo @$value->date_registration_export != null ? date('d/m/Y',strtotime(@$value->date_registration_export)) : ''; ?></td>
                            <td><?php echo @$value->date_export != null ? date('d/m/Y',strtotime(@$value->date_export)) : ''; ?></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-xl-12">
                <nav aria-label="Page navigation example" style="float: right;">
                    @if($models instanceof \Illuminate\Pagination\LengthAwarePaginator )
                        {{$models->appends(@$input)->links()}}
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="custom-loading" style="display: none;">
    <div>
        <div class="loader"></div>
    </div>
</div>
@stop
@section('css_add')
<style type="text/css">
    #modal-viewall tr.activer {background-color: yellow;}
    .custom-loading{position: fixed;top: 0;bottom: 0;left: 0;right: 0;background: rgba(0, 0, 0, 0.55);z-index: 99999999;display: none;text-align: center;}
    .custom-loading > div {position: absolute;top: 45%;text-align: center;left: 0;right: 0;}
    .custom-loading > div .loader{border: 8px solid #f3f3f3;border-radius: 50%;border-top: 8px solid #3498db;width: 60px;height: 60px;-webkit-animation: spin 2s linear infinite;animation: spin 2s linear infinite;display: inline-block;}
    .custom-loading div > span{display: block;color: #fff;}
    .loading{border: 4px solid #f3f3f3;border-radius: 50%;border-top: 4px solid #3498db;width: 20px;height: 20px;-webkit-animation: spin 2s linear infinite;animation: spin 2s linear infinite;display: inline-block;}
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@stop
@section('js_add') 
    <script type="text/javascript">
         function uploadfile(_this){
            var file = _this.files[0];
            var formData = new FormData();
            formData.append('file',file);
            $('.custom-loading').show();
            $.ajax({
                url:  "{{route($_SEFF->_ROUTE_FIX.'.import')}}",
                data: formData,
                type: 'POST',
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data['status'] == 'success'){
                        alert('_change_data_success_');
                    }
                    else{
                        alert("_error_!");
                    }
                    setTimeout(function(){
                        location.reload();
                    },500);
                },
                error: function (data) {
                    console.log(data['responseText']);
                    alert("_error_!");
                },
                complete: function(){
                    $('.custom-loading').hide();
                }
            });
    }
    </script>
@stop