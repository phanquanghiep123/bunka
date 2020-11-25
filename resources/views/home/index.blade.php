@extends('layouts.app')
@section('content')
<h1 class="card-title">{{$_PAGETITLE}}</h1>
{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
@stop
@section('css_add')
<style type="text/css">
    #modal-viewall tr.activer {
        background-color: yellow;
    }
</style>
@stop
   
@section('dashboad-tiles')
<?php /*
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                <div class="float-left">
                    <i class="mdi mdi-package-variant-closed text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">@lang('Product Class')</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">0</h3>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0">
                <a class="text-decoration-none" href="{{route('admin.product-class.index')}}"><i class="mdi mdi-chevron-right mr-1"></i> @lang('Manage')</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-vector-square text-warning icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">@lang('Price Pattern')</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">0</h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <a class="text-decoration-none" href="{{route('admin.price-pattern.index')}}"><i class="mdi mdi-chevron-right mr-1"></i> @lang('Manage')</a>
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-code-brackets text-success icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">@lang('Matrix Value')</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">0</h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <a class="text-decoration-none" href="{{route('admin.matrix-value.index')}}"><i class="mdi mdi-chevron-right mr-1"></i> @lang('Manage')</a>
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-account-location text-info icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">@lang('Users')</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">0</h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <a class="text-decoration-none" href="{{route('users.index')}}"><i class="mdi mdi-chevron-right mr-1"></i> @lang('Manage')</a>
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-basket-fill text-secondary icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">@lang('Tax')</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">0</h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <a class="text-decoration-none" href="{{route('taxs.index')}}"><i class="mdi mdi-chevron-right mr-1"></i> @lang('Manage')</a>
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-coin text-primary icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">@lang('Currency')</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0">0</h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <a class="text-decoration-none" href="{{route('admin.currency.index')}}"><i class="mdi mdi-chevron-right mr-1"></i> @lang('Manage')</a>
            </p>
        </div>
        </div>
    </div>
</div>*/ ?>
@stop
@section('js_add')
    {!! $html->scripts() !!}
    <script type="text/javascript">
        var DDURL = window.LaravelDataTables["dataTableBuilder"].ajax.url();
        $(document).on("click",".action-delete",function(event){
            event.stopPropagation();
            event.preventDefault();
            var url = $(this).attr("href");
            var warning = '_warning_delete_';
            if (confirm(warning)){
                $.ajax({
                    url : url,
                    type:"get",
                    success : function(data){
                        if(data.status == 1) 
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                        else{
                            alert("_error_!!!");
                        }
                    }
                })
            }
            return false; 
            
        });
        $(document).on("click",".treeview",function(event){
            event.stopPropagation();
            event.preventDefault();
            var url = $(this).attr("href");
            $.ajax({
                dataType:"json",
                url : url,
                type:"get",
                success : function(data){
                    if(data.status == 1) {
                        $("#modal-viewall .modal-content").html(data.data);
                        $("#modal-viewall").modal();
                    }  
                    else{
                        alert("Error!!!");
                    }
                }
            })
            return false; 

        });
        $('#search-data').submit(function(){
            event.stopPropagation();
            event.preventDefault();
            var data = $(this).serialize();
            var ADDD = DDURL;
            if(ADDD.indexOf("?")){
                ADDD += '?search=true';
            }
            ADDD += '&' + data;
            window.LaravelDataTables["dataTableBuilder"].ajax.url(ADDD);
            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
            return false;
        });
    </script>
@stop