@extends('layouts.app')

@section('content')
<h4 class="card-title">{{$_PAGETITLE}}</h4>

<div class="table-form row align-items-center">

    <div class="col-12 col-xl-8 order-xl-2">
        <form>
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="keyword" placeholder="Keyword">
                </div>

                <div class="col-12 col-md-auto mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="form-control">
                                <option>Select Atribute</option>
                                <option>Item Class</option>
                                <option>Price Pattern</option>
                                <option>Price Key</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Atribute value">
                    </div>
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-4 mb-2 order-xl-1">
        <a href="#" class="btn btn-secondary" data-toggle="modal"><i class="menu-icon mdi mdi-plus"></i> New</a>
        
    </div>
</div>

{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
@include($slug . '.modify')
@stop

@section('js_add')
{!! $html->scripts() !!}
<script type="text/javascript" src="{{asset('/vendors/parsley/dist/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery.serializejson/jquery.serializejson.min.js')}}"></script>
<script type="text/javascript">
$(function () {

    window.ParsleyConfig = {
        errorClass: 'is-invalid text-danger',
        successClass: 'is-valid',
        errorsWrapper: '<span class="form-text text-danger"></span>',
        errorTemplate: '<span></span>'
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document)
    .on('click', '[type=submit]', function (e) {
        e.preventDefault();
        $($(this).data('form')).submit();
    })
    .on('submit', '#modal-modify form', function () {
        var formData = $(this).serializeJSON();
        formData.Id = $(this).parents('.modal').data('id');

        $(this).parsley().whenValidate()
        .done(function () {
            var request = $.ajax({
                method: formData.Id ? "PUT" : "POST",
                url: formData.Id ? "{{route('admin.'.$slug.'.update')}}" : "{{route('admin.'.$slug.'.store')}}",
                dataType: "json",
                data: formData,
                cache: false
            });

            request.done(function (data, status, xhr) {
                if (xhr.status === 200) {
                    $('#modal-modify').modal('hide');
                    window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                }
            });
        })
        return false;
    })
    .on('hidden.bs.modal', '#modal-modify', function (e) {
        $(this).find('form')[0].reset();
        $(this).find('form').parsley().reset();
        $(this).data('id', null);
        $(this).find('.modal-title').text('Add New');
        $(this).find('[name=ClassKey]').attr('data-parsley-remote-reverse', true).prop('readonly', false);
    })
    .on('click', '[data-toggle="modal"]', function (e) {
        var data = $(e.target).data();
        e.preventDefault();
        if (data.id) {
            $.get("{{route('admin.' . $slug . '.show', ['id' => ''])}}/" + data.id, function (res) {
                $.each(res, function (k, v) {
                    var $input = $('[name='+k+']');
                    if ($input.length) {
                        if ($input.is(':checkbox') || $input.is(':radio')) {
                            $input.prop('checked', v == 1);
                        } else {
                            $input.val(v);
                        }
                    }
                });

                $('#modal-modify').find('.modal-title').text('#' + res.ClassKey + ' - ' + res.Name);
                $('#modal-modify').data('id', data.id).modal('show');
            });
        } else {
            $('#modal-modify').data('id', null).modal('show');
        }
    });
});
</script>
@stop