@extends('layouts.app')
@section('content')
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form method="get" id="search-data">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="name" name="keyword" placeholder="Name">
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
        @if($_SEFF->checkUserAllowAction('add'))
            <a href="{{$_SEFF->_ADDURL}}" class="btn btn-secondary"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
        @endif
        <button type="button" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> _export_</button>
         <a class="btn btn-secondary" href ="javascript:;" onclick="$('#uploadfile').trigger('click');"><i class="menu-icon mdi mdi-file-excel"></i> [_import_]</a>
        <input type="file" class="none" onchange="uploadfile(this);" style="display: none;" name="uploadfile" id="uploadfile">
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
    <script type="text/javascript">
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