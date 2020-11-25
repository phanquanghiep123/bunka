@extends('layouts.app')

@section('content')
<h4 class="card-title font-weight-bold">@lang($_PAGETITLE)</h4>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form id="filterForm" method="POST" onsubmit="return false;">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="keyword" placeholder="@lang('Keyword')" name="Keyword">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <select class="form-control" name="ClassKey">
                        <option value="">@lang('Select Product Class')</option>
                        @foreach ($groupclass as $productClass)
                            <option value="{{$productClass->ClassKey}}">{{$productClass->ClassName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <select class="form-control" name="ItemClassId">
                        <option value="">@lang('Select Item Class')</option>
                        @foreach ($itemclass as $itemClass)
                            <option value="{{$itemClass->ItemClassId}}">{{$itemClass->ItemClassName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">@lang('Search')</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-4 mb-2 order-xl-1">
        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add"><i class="menu-icon mdi mdi-plus"></i> @lang('Add new')</a>
        {{-- <button type="button" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> Export</button> --}}
        <a href="{{route('admin.item-price.import')}}" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> @lang('Export/Import')</a>
    </div>
</div>

{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
@include($slug . '.modify')
@stop

@section('js_add')
{!! $html->scripts() !!}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.2.2/dist/select2-bootstrap4.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
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
    .on('change', '#modal-modify form', function () {
        var formData = $(this).serializeJSON();

        if ( !_.isEmpty(formData.ClassKey) && !_.isEmpty(formData.ItemClassId) ) {

        }
    })
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

        $('.select2-hidden-accessible', this).prop('disabled', false).trigger('change.select2');
    })
    .on('click', '[data-toggle="modal"]', function (e) {
        var data = $(e.target).data();
        e.preventDefault();
        if (data.id) {
            $.get("{{route('admin.'.$slug.'.show', ['id' => ''])}}/" + data.id, function (res) {
                $.each(res, function (k, v) {
                    var $input = $('[name='+k+']');
                    if ($input.length) {
                        if ($input.is(':checkbox') || $input.is(':radio')) {
                            $input.prop('checked', v == 1);
                        } else {
                            $input.val(v);

                            if ($input.is('select[name="ItemId"]')) {
                                var option = new Option(res.ItemName, res.ItemId, true, true);
                                $input.append(option);
                            }
                        }
                    }
                });

                $('select[name="ClassKey"]').prop('disabled', true).trigger('change.select2');
                $('select[name="ItemClassId"]').prop('disabled', true).data('is-data-init', true).trigger('change.select2');
                $('select[name="ItemId"]').prop('disabled', true).trigger('change.select2');

                $('#modal-modify').find('.modal-title').text('#' + res.ItemId + ' - ' + res.ItemName);
                $('#modal-modify').data('id', data.id).modal('show');
            });
        } else {
            $('#modal-modify').data('id', null).modal('show');
        }
    })
    .on('change.select2', '#inputItemClass', function () {
        if ($(this).data('is-data-init') === false) {
            $('#inputItem').val(null).trigger('change.select2');
        }

        $(this).data('is-data-init', false);
    });

    $('[ctrl-select2]').select2({
        dropdownParent: $('[ctrl-select2]').parents('.modal') ? $('[ctrl-select2]').parents('.modal-body') : 'body',
        theme: 'bootstrap4',
        width: 'style'
    });

    $('#inputItem')
    .select2({
        dropdownParent: $('#inputItem').parents('.modal') ? $('#inputItem').parents('.modal-body') : 'body',
        theme: 'bootstrap4',
        width: 'style',
        ajax: {
            url: "{{route('admin.items.by-class')}}",
            dataType: 'json',
            data: function (params) {
                var formData = $('#modal-modify form').serializeJSON();
                var query = {};

                if (formData.UnitPrice > 0) {
                    query.price = formData.UnitPrice
                }

                if (formData.ClassKey > 0) {
                    query.class = formData.ClassKey;
                }

                if (formData.ItemClassId > 0) {
                    query.type = formData.ItemClassId;
                }

                if (params.term) {
                    query.term = params.term;
                }

                return query;
            }
        }
    });

    $('#filterForm')
    .change(function (event) {
        var formData = $(this).serializeJSON();

        var keyword = $(this).val();
        if ( window.searchTimeout ) {
            clearTimeout(window.searchTimeout);
        }

        window.searchTimeout = setTimeout(function () {

            LaravelDataTables.dataTableBuilder.column(0).search(formData.ClassKey);
            LaravelDataTables.dataTableBuilder.column(1).search(formData.ItemClassId);
            LaravelDataTables.dataTableBuilder.search(formData.Keyword);

            LaravelDataTables.dataTableBuilder.draw();
            LaravelDataTables.dataTableBuilder.columns('').search('');
        }, 1000);
    });
});
</script>
@stop