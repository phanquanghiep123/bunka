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
                        <h4 class="card-title">_general_informations_</h4>
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>[_customer_code_]</label>
                                    <input type="text" name="authorized_code" value="<?php echo @$record['authorized_code']; ?>" validate="true" data-validate="required" class="form-control" placeholder="[_customer_code_]">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>_CUSTOMERNAME_</label>
                                    <input type="text" validate="true" data-validate="required" name="authorized_name" value="<?php echo @$record['authorized_name']; ?>" class="form-control" placeholder="_CUSTOMERNAME_">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>[_abbreviations_]</label> 
                                    <input type="text" validate="true" data-validate="required" name="abbreviations" value="<?php echo @$record['abbreviations']; ?>" class="form-control" placeholder=" [_abbreviations_]">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>_customer_information_owner_</label>
                                    <input type="text" validate="true" data-validate="required" name="owner" value="<?php echo @$record['owner']; ?>" class="form-control" placeholder="_customer_information_owner_">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>_address_</label>
                                    <input type="text" name="address"  value="<?php echo @$record['address']; ?>" class="form-control" placeholder="_address_">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>_PHONE_</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo @$record['phone']; ?>" placeholder="_PHONE_">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>_FAX_</label>
                                    <input type="text" name="fax" value="<?php echo @$record['fax']; ?>" class="form-control" placeholder="_FAX_">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>_EMAIL_</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo @$record['email']; ?>" placeholder="_EMAIL_">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>[_tax_code_] </label>
                                    <input type="text" name="tax_code" value="<?php echo @$record['tax_code']; ?>" class="form-control" placeholder="[_tax_code_]">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>[_type_of_business_] </label>
                                    <input type="text" name="type_of_business" value="<?php echo @$record['type_of_business']; ?>" class="form-control" placeholder="[_type_of_business_]">
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
                            <?php if($_SEFF->checkUserAllowAction('delete')): ?>
                                <div class="col-6">
                                    <a class="btn btn-danger btn-block text-white" onclick="return confirm('_warning_delete_');" href="{{ route($_SEFF->_ROUTE_FIX .'.delete',@$record['id']) }}">_delete_</a>
                                </div>
                            <?php endif; ?>
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
