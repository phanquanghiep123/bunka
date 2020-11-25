@extends('layouts.master')
@section('content')
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
<form class="form form-ajax" method="post" action="{{$_SEFF->_ADDURL}}" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id" value="0">
    <input type="hidden" name="page" value="1">
    <div class="row flex-xl-nowrap layout-2-cols">
        <div class="col-lg-12 col-xl-auto flex-fill layout-col-1">
            <div class="card grid-margin">
                <div class="modal-body">
                    <div class="card-body">
                        <h4 class="card-title">_general_informations_</h4>
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>_KEY_</label>
                                    <input type="text" validate="true" data-validate="required" name="key_id" class="form-control" placeholder="_KEY_">
                                </div>
                            </div>
                        </div>
                        <?php if(isset($languages) && $languages != null): ?>
                            <?php foreach($languages as $key => $language): ?>
                                <hr/>
                                <h4 class="card-title">{{ $language->name }}</h4>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>_TITLE_</label>
                                            <input type="text" name="title[{{ $language->id }}]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>_CONTENT_</label>
                                            <textarea class="form-control content" rows="10" name="content[{{ $language->id }}]"></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-auto layout-col-2">
            <div class="layout-col-2-inner">
                <div class="card grid-margin">
                    <div class="card-body">
                        <h4 class="card-title">_publish_</h4>
                        <div class="form-group">
                            <select name="status" class="form-control" validate="true" data-validate="required">
                                <option value="1">_SAVE_ _ACTIVE_</option>
                                <option value="0">_SAVE_ _DEACTIVE_</option>
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
    tinymce.init({ 
        selector:'textarea.content',
        //plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help formatpainter permanentpen pageembed tinycomments mentions linkchecker',
       toolbar: 'code | formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link | image | media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment | table',
        plugins: "code,table,link,media,image",
        menubar : false,
        relative_urls : false,
        remove_script_host : false,
        document_base_url : "{{asset('/')}}",
        convert_urls : true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ],
        link_list: [
            { title: 'My page 1', value: 'http://www.tinymce.com' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_list: [
            { title: 'My page 1', value: 'http://www.tinymce.com' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
        ],
        image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        height: 400,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
              callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
              callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
              callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
        },
        templates: [
            { title: 'Some title 1', description: 'Some desc 1', content: 'My content' },
            { title: 'Some title 2', description: 'Some desc 2', content: '<div class="mceTmpl"><span class="cdate">cdate</span><span class="mdate">mdate</span>My content2</div>' }
        ],
        template_cdate_format: '[CDATE: %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[MDATE: %m/%d/%Y : %H:%M:%S]',
        image_caption: true,
        spellchecker_dialog: true,
        spellchecker_whitelist: ['Ephox', 'Moxiecode'],
        tinycomments_mode: 'embedded',
        content_style: '.mce-annotation { background: #fff0b7; } .tc-active-annotation {background: #ffe168; color: black; }'
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var addFrom      = $("form.form-ajax");
        var validateAdd  = addFrom.validateform();
        addFrom.submit(function() { 
            if(validateAdd.checkInvalid()){
                $(this).ajaxSubmit({
                    success: function(response){
                        if(response.status == 0){
                            $.each(response.message,function(key,val){
                                validateAdd.addError(key,val);
                            });
                            validateAdd.showError();
                        }
                        else{
                            location.href = response['_redirect'];
                        }
                    },
                    error: function(data){
                        //console.log(data['responseText']);
                    }
                });
            }
            return false; 
        });
    });
</script>
@stop
