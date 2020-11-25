@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_SEFF->_ROUTE_FIX .'.index') }}">{{$_PAGETITLE}}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo @$record['code']; ?></li>
            </ol>
        </nav>
        <h4><?php echo @$record['code']; ?></h4>
    </div>
</div>
<form class="form form-ajax" method="post" action="{{$_SEFF->_EDITURL}}" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="id" value="0">
    <input type="hidden" name="page" value="1">
    <div class="row flex-xl-nowrap layout-2-cols">
        <div class="col-lg-12 col-xl-auto flex-fill layout-col-1">
            <div class="card grid-margin">
                <div class="modal-body">
                    <div class="card-body">
                        <h4 class="card-title">_construction_</h4>
                        <div class="form-row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>_CODE_</label>
                                    <input type="text" validate="true" data-validate="required" name="code" value="<?php echo @$record['code']; ?>" class="form-control" placeholder="_CODE_">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>_NAME_</label>
                                    <input type="text" validate="true" data-validate="required" name="name" value="<?php echo @$record['name']; ?>" class="form-control" placeholder="_NAME_">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>_ADDRESS_</label>
                                    <input type="text" validate="true" data-validate="required" name="address" value="<?php echo @$record['address']; ?>" class="form-control" placeholder="_ADDRESS_">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>_type_</label>
                                    <?php 
                                        $arr = array(
                                            'factories'    => '[_factories_]',
                                            'warehouses'   => '[_warehouses_]',
                                            'offices'      => '[_offices_]',
                                            'condominiums' => '[_condominiums_]',
                                            'government_offices' => '[_government_offices_]',
                                            'schools'      => '[_schools_]',
                                            'hospitals'    => '[_hospitals_]',
                                            'markets'      => '[_markets_]',
                                            'etc'          => '[_etc_]',
                                        );
                                    ?>
                                    <select class="form-control" name="type">
                                        <option value="">_type_</option>
                                        <?php foreach ($arr as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" <?php echo @$record['type'] == $key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>_PHONE_</label>
                                    <input type="text" name="phone" value="<?php echo @$record['phone']; ?>" class="form-control" placeholder="_PHONE_">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>_FAX_</label>
                                    <input type="text" name="fax" value="<?php echo @$record['fax']; ?>" class="form-control" placeholder="_FAX_">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>_construction_information_manager_</label>
                                    <input type="text" name="manager" value="<?php echo @$record['manager']; ?>" class="form-control" placeholder="Manager">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>_MAP_</label>
                            <div class="panel panel-info">
                                <div class="map-embed-holder">
                                    <iframe src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=<?php echo @$record['address']; ?>&ie=UTF8&t=&z=14&iwloc=B&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
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
                            <select name="status_id" class="form-control" validate="true" data-validate="required">
                                @foreach ($status as $key => $value)
                                    <option value="{{$value->id}}" <?php echo @$record['status_id'] == $value->id ? 'selected' : ''; ?>>_save_ {{$value->status_name->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">_SUBMIT_</button>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-danger btn-block text-white" onclick="return confirm('_warning_delete_');" href="{{ route($_SEFF->_ROUTE_FIX .'.delete',@$record['id']) }}">_delete_</a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-success btn-block text-white">_EXPORT_</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
@section('js_add')
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
                    }
                });
            }
            return false; 
        });
    });
</script>
@stop
