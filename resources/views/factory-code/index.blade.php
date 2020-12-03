@extends('layouts.app')

@section('content')
<h4 class="card-title">{{$_PAGETITLE}}</h4>
<div class="table-form row align-items-center">

    <div class="col-12 col-xl-8 order-xl-2">
        <form id="filterForm">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="keyword" placeholder="@lang('Keyword')" name="Keyword">
                </div>

                {{-- <div class="col-12 col-md-auto mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="form-control" name="ColumnName">
                                <option>Select Atribute</option>
                                @foreach ($filter_fields as $key => $field)
                                    @if (isset($field['filter']) && $field['filter'])
                                        <option value="{{$key}}">{{$field['title']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Atribute value"name="ColumnValue">
                    </div>
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div> --}}
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-4 mb-2 order-xl-1">
        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modal-modify"><i class="menu-icon mdi mdi-plus"></i> @lang('Add New')</a>
    </div>
</div>
{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
@include($slug . '.modify')
@stop

@section('js_add')
{!! $html->scripts() !!}
<script type="text/javascript" src="{{asset('/vendors/parsley/dist/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery.serializejson/jquery.serializejson.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/bootbox/bootbox.all.min.js')}}"></script>
<script type="text/javascript">
window.ParsleyConfig = {
    excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], [disabled], :hidden",
    errorClass: 'is-invalid text-danger',
    successClass: 'is-valid',
    errorsWrapper: '<span class="form-text text-danger"></span>',
    errorTemplate: '<span></span>'
};

$(function () {

    // checkCodeExist
    window.Parsley.addAsyncValidator('checkCodeExist', function (xhr) {
        return 404 === xhr.status;
    }, "{{route('admin.' . $slug . '.show', ['id' => ''])}}/{value}");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document)
    .on('click', '[type=submit]', function (e) {
        e.preventDefault();
        $('#' + $(this).data('form')).submit();
    })
    .on('submit', '#modal-modify form', function () {
        var formData = $(this).serializeJSON();
        var factoryCode = $(this).parents('.modal').data('id');

        $(this).parsley().whenValidate()
        .done(function () {
            var url = factoryCode ? "{{route('admin.' . $slug . '.update')}}" : "{{route('admin.' . $slug . '.store')}}";
            formData.FactoryCode = factoryCode ? factoryCode : formData.FactoryCode;
            $.post(url, formData, function (data, status, xhr) {
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
        $(this).find('[name=FactoryCode]').prop('disabled', false);
    })
    .on('click', '[data-toggle="modal"]', function (e) {
        var data = $(e.target).data();
        e.preventDefault();
        if (data.id) {
            $.get("{{route('admin.' . $slug . '.show', ['id' => ''])}}/" + data.id, function (res) {
                $.each(res, function (k, v) {
                    var $input = $('[name="'+k+'"]');
                    if ($input.length) {
                        if ($input.is(':checkbox') || $input.is(':radio')) {
                            $input.prop('checked', v == 1);
                        } else {
                            $input.val(v);
                        }
                    }
                });

                $('[name=FactoryCode]').prop('disabled', true);
                $('#modal-modify').find('.modal-title').text('#' + res.FactoryCode + ' - ' + res.FactoryName);
                $('#modal-modify').data('id', data.id).modal('show');
            });
        } else {
            $('#modal-modify').data('id', null).modal('show');
        }
    })

    // On Filter Form Change/Submit
    .on('change submit', '#filterForm', function () {
        var filterData = $(this).serializeJSON();

        if ( window.filterTimeout ) {
            clearTimeout(window.filterTimeout);
        }

        window.filterTimeout = setTimeout(function () {
            if (filterData.ColumnValue && filterData.ColumnName) {
                LaravelDataTables.dataTableBuilder.column(filterData.ColumnName).search(filterData.ColumnValue);
            }

            LaravelDataTables.dataTableBuilder.search(filterData.Keyword);
            LaravelDataTables.dataTableBuilder.draw();
            LaravelDataTables.dataTableBuilder.columns('').search('');
        }, 1000);

        return false;
    })

    .on('click', '.btn-remove', removeFactoryCode );

    function removeFactoryCode(event) {
        var data = $(this).data();
        bootbox.confirm({
            message: "@lang('Your deleted item will cannot recovery. Did you sure want to delete?')",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function(result){
                if (result && data.id) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('admin.' . $slug . '.delete', ['id' => ''])}}/" + data.id,
                        success: function (response) {
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                        }
                    });
                }
            },
            centerVertical: true,
        });
    }
});
</script>
@stop