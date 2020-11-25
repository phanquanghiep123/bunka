@extends('layouts.app')

@section('content')
<h4 class="card-title">{{$_PAGETITLE}}</h4>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-8 order-xl-2">
        <form id="filterForm">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="keyword" placeholder="Keyword" name="Keyword">
                </div>

                <div class="col-12 col-md-auto mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="form-control" name="ColumnName">
                                <option value="">Select Atribute</option>
                                <option value="3">Keisuu</option>
                                <option value="4">Min Square</option>
                                <option value="5">Install Fee Fixed</option>
                                <option value="6">Base Price</option>
                                <option value="7">Factory Cost</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Atribute value" name="ColumnValue">
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

@include('product-class.modify')
@stop

@section('js_add')
{!! $html->scripts() !!}
<script type="text/javascript" src="{{asset('/vendors/parsley/dist/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery.serializejson/jquery.serializejson.min.js')}}"></script>
<script src="{{asset('/vendors/tinymce/tinymce.js')}}"></script>
<script type="text/javascript">
    var font_size = "";
    for (var i = 10; i < 100; i++) {
        font_size += i + "px ";
    }
     
    tinyMCE.init({
        selector  : "textarea.content",
        plugins: [
            'textcolor',
            'code',
            'colorpicker',
            'lineheight',
            'table',
            'advlist autolink lists link image charmap print preview anchor ',

        ],
        invalid_styles: 'width height',
        theme_advanced_buttons3_add : "fullpage",
        contextmenu: true,
        menubar: false,
        document_base_url : "{{asset('/')}}",
        theme : 'modern',
        fontsize_formats: font_size.trim(),
        lineheight_formats: "2px 4px 6px 8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px",
        toolbar: 'fontsizeselect | bold italic | lineheightselect | numlist bullist | forecolor alignleft aligncenter alignright alignjustify | link | table | code',
        height:300,
        setup: function (ed) {
            ed.on('change', function (e) {
                var name = tinyMCE.activeEditor.id;
                $('#'+name).val(tinyMCE.activeEditor.getContent());
                $('#'+name).trigger("change");
            });
        }
    });
   $(document).on('focusin', function(e) {
      if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
      }
    });
</script>
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
        $('#' + $(this).data('form')).submit();
    })
    .on('submit', 'form#ModifyClass', function () {
        var formData = $(this).serializeJSON();
        var classKey = $(this).parents('.modal').data('classKey');

        $(this).parsley().whenValidate()
        .done(function () {
            var url = classKey ? "{{route('admin.product-class.update')}}" : "{{route('admin.product-class.store')}}";
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
        $(this).data('class-key', null);
        $(this).find('.modal-title').text('Add New');
        $(this).find('[name=ClassKey]').attr('data-parsley-remote-reverse', true).prop('readonly', false);
    })
    .on('click', '[data-toggle="modal"]', function (e) {
        var data = $(e.target).data();
        e.preventDefault();
        if (data.classKey) {
            $.get("{{route('admin.product-class.show', ['id' => ''])}}/" + data.classKey, function (res) {
                $.each(res, function (k, v) {
                    var $input = $('[name='+k+']');
                    if ($input.length)
                        $input.val(v);
                });
                var langs = res.languages;
                $.each(langs,function($key,$val){
                    if($val != null){
                        $("[name='languages["+$val.lang_id+"][name]']").val($val.name);
                        if($val.content){
                            $("#language-"+$val.lang_id).val($val.content);
                            tinyMCE.get("language-"+$val.lang_id).setContent($val.content);
                             
                        }
                    }  
                })

                $('#modal-modify').find('.modal-title').text('#' + res.ClassKey + ' - ' + res.ClassName);
                $('#modal-modify').find('[name=ClassKey]').removeAttr('data-parsley-remote-reverse').prop('readonly', true);
                $('#modal-modify').data('class-key', data.classKey).modal('show');
            });
        } else {
            $('#modal-modify').data('class-key', null).modal('show');
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
                LaravelDataTables.dataTableBuilder.columns(filterData.ColumnName).search(filterData.ColumnValue);
            }

            LaravelDataTables.dataTableBuilder.search(filterData.Keyword);
            LaravelDataTables.dataTableBuilder.draw();
            LaravelDataTables.dataTableBuilder.columns('').search('');
        }, 1000);

        return false;
    });
});
</script>
@stop
