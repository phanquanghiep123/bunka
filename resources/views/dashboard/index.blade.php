@extends('layouts.app')
@section('content')
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form method="get" id="search-data">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="name" name="keyword" placeholder="_keyword_">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <div id="daterange">
                        <input type="text" class="form-control" name="created_at" id="created_at" placeholder="_start_date_end_date_" autocomplete="off">
                    </div>
                </div>

                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">_search_</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-4 mb-2 order-xl-1">
        <a href="{{$_SEFF->_ADDURL}}" class="btn btn-secondary"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
        
    </div>
</div>
{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
<div class="modal fade" id="modal-viewall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            
        </div>
    </div>
</div>
@stop
@section('css_add')
<style type="text/css">
    #modal-viewall tr.activer {
        background-color: yellow;
    }
</style>
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