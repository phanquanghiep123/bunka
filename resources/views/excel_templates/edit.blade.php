@extends('layouts.master')
@section('content')
@php
    $status  = $_SEFF->getCommonListStatus();
@endphp
<div class="row">
    <div class="col-lg-12 grid-margin">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="sales.html">_DASHBOARD_</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_SEFF->_ROUTE_FIX .'.index') }}">{{$_PAGETITLE}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">_addnew_</li>
            </ol>
        </nav>
        <h4>_addnew_</h4>
    </div>
</div>
<form class="form form-ajax" method="post" action="{{ route($_SEFF->_ROUTE_FIX .'.update',$data['id']) }}" enctype="multipart/form-data" autocomplete="off">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card grid-margin">
                <div class="modal-body">
                    <div class="card-body">
                        <h4 class="card-title">_general_informations_</h4>
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>_KEY_</label>
                                    <input type="text" validate="true" data-validate="required" name="key" class="form-control" value="{{$data['key']}}" placeholder="_KEY_">
                                </div>
                            </div>
                        </div>
                        <?php if (isset($data['languages']) && $data['languages'] != null): ?>
                            <?php
$languages = $data['languages'];
foreach ($languages as $key => $language): ?>
                                    <hr/>
                                    <h4 class="card-title">{{ $language->language->name }}</h4>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>_name_</label>
                                                <input type="text" name="languages[{{$language->language->id}}][name]" class="form-control" value="{{$language->name}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>_CONTENT_</label>
                                                <textarea class="form-control content" rows="10" name="languages[{{$language->language->id}}][content]">{{$language->content}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="layout-col-2-inner">
                <div class="card grid-margin">
                    <div class="card-body">
                        <h4 class="card-title">_publish_</h4>
                        <div class="form-group">
                            <select validate="true" data-validate="required" class="form-control" name="status_id">
                                <option value="">--_choose_ _status_--</option>
                                @foreach ($status as $key => $value)
                                    @if($value->id == $data["status_id"])
                                        <option value="{{$value->id}}" selected="">{{@$value->get_name()}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{@$value->get_name()}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">_SUBMIT_</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
@section('js_add')
<script src="{{asset('/vendors/tinymce/tinymce.js')}}"></script>
<script type="text/javascript">
    var font_size = "";
    for (var i = 10; i < 100; i++) {
        font_size += i + "px ";
    }
    var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

    //Function to convert rgb color to hex format
    function rgb2hex(rgb) {
        rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    function hex(x) {
        return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
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
        height:400,
        /*init_instance_callback: function (editor) {
            editor.on('blur', function (e) {
                var activeEditor = tinyMCE.activeEditor;
                var content = tinyMCE.activeEditor.getContent();
                $JqHtml = $('<div>' +content+'</div>');

                $.each($JqHtml.find('td'),function(){
                    var css = $(this).css('border-style');
                    var color = $(this).css('border-color');
                    var width = $(this).css('border-width');
                    width = width.replace("px", "");
                    width = width.replace("PX", "");
                    width = width ? width : 1;
                    color = color ? color : '#000000';
                    color = 'rgb(0, 0, 0)' == color ? '#000000' : color;
                    if(css){
                        $(this).css({
                            'border-top' : width + 'px ' + css + ' ' + color,
                            'border-bottom' : width + 'px ' + css + ' ' + color,
                            'border-right' : width + 'px ' + css + ' ' + color,
                            'border-left' : width + 'px ' + css + ' ' + color
                        });
                    
                    }
                   
                });

                activeEditor.setContent($JqHtml.html());
            });
        }*/
         
    });
</script>
@stop
